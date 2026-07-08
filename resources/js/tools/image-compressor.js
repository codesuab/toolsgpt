import "../domain";
import JSZip from "jszip";
import updateUsages from "../count";

// Core State Management
let filesList = [];
let config = {
    mode: "quality", // 'quality' or 'maxSize'
    quality: 0.75, // range: 0.05 - 1.00
    maxSizeKB: 500, // target max size constraint in KB
    format: "original",
};

// DOM elements
const dropZone = document.getElementById("dropZone");
const fileInput = document.getElementById("fileInput");
const fakeSelectBtn = document.getElementById("fakeSelectBtn");
const accordionToggle = document.getElementById("accordionToggle");
const accordionContent = document.getElementById("accordionContent");
const accordionChevron = document.getElementById("accordionChevron");

const modeQuality = document.getElementById("modeQuality");
const modeMaxSize = document.getElementById("modeMaxSize");
const radioCircleQuality = document.getElementById("radioCircleQuality");
const radioCircleSize = document.getElementById("radioCircleSize");

const globalSlider = document.getElementById("globalSlider");
const sliderTooltip = document.getElementById("sliderTooltip");
const tooltipVal = document.getElementById("tooltipVal");
const sliderMinLabel = document.getElementById("sliderMinLabel");
const sliderMaxLabel = document.getElementById("sliderMaxLabel");
const formatSelector = document.getElementById("formatSelector");
const reapplyBtn = document.getElementById("reapplyBtn");

const queueContainer = document.getElementById("queueContainer");
const fileQueue = document.getElementById("fileQueue");
const batchCountText = document.getElementById("batchCountText");
const totalSavingsPercent = document.getElementById("totalSavingsPercent");
const totalOriginalSize = document.getElementById("totalOriginalSize");
const totalCompressedSize = document.getElementById("totalCompressedSize");
const totalSavedAmount = document.getElementById("totalSavedAmount");
const queueBadge = document.getElementById("queueBadge");
const clearAllBtn = document.getElementById("clearAllBtn");
const downloadZipBtn = document.getElementById("downloadZipBtn");

// Handle accordion toggle
accordionToggle.addEventListener("click", () => {
    if (accordionContent.classList.contains("hidden")) {
        accordionContent.classList.remove("hidden");
        accordionChevron.className =
            "ti ti-chevron-up text-sm transition-transform duration-200";
    } else {
        accordionContent.classList.add("hidden");
        accordionChevron.className =
            "ti ti-chevron-down text-sm transition-transform duration-200";
    }
});

// Sync Radio Circles styling with input state
function updateRadioUI() {
    if (modeQuality.checked) {
        config.mode = "quality";
        radioCircleQuality.classList.add("border-indigo-500");
        radioCircleQuality.querySelector("div").classList.remove("scale-0");
        radioCircleQuality.querySelector("div").classList.add("scale-100");

        radioCircleSize.classList.remove("border-indigo-500");
        radioCircleSize.querySelector("div").classList.add("scale-0");
        radioCircleSize.querySelector("div").classList.remove("scale-100");

        // Adjust Slider boundaries for Quality Mode
        globalSlider.min = "5";
        globalSlider.max = "100";
        globalSlider.value = Math.round(config.quality * 100);
        sliderMinLabel.textContent = "5%";
        sliderMaxLabel.textContent = "100%";
    } else {
        config.mode = "maxSize";
        radioCircleSize.classList.add("border-indigo-500");
        radioCircleSize.querySelector("div").classList.remove("scale-0");
        radioCircleSize.querySelector("div").classList.add("scale-100");

        radioCircleQuality.classList.remove("border-indigo-500");
        radioCircleQuality.querySelector("div").classList.add("scale-0");
        radioCircleQuality.querySelector("div").classList.remove("scale-100");

        // Adjust Slider boundaries for Target Max Size Mode (e.g., 20KB - 2000KB)
        globalSlider.min = "10";
        globalSlider.max = "2000";
        globalSlider.value = config.maxSizeKB;
        sliderMinLabel.textContent = "10 KB";
        sliderMaxLabel.textContent = "2,000 KB";
    }
    updateTooltipPosition();
}

// Attach listeners for radio changes
modeQuality.addEventListener("change", updateRadioUI);
modeMaxSize.addEventListener("change", updateRadioUI);

// Click labels triggers checking inputs
modeQuality.closest("label").addEventListener("click", () => {
    modeQuality.checked = true;
    updateRadioUI();
});
modeMaxSize.closest("label").addEventListener("click", () => {
    modeMaxSize.checked = true;
    updateRadioUI();
});

// Initialize state view triggers
updateRadioUI();

// Calculate and position range tooltip dynamically
function updateTooltipPosition() {
    const val = parseInt(globalSlider.value);
    const min = parseInt(globalSlider.min);
    const max = parseInt(globalSlider.max);

    // Format string
    let displayVal = "";
    if (config.mode === "quality") {
        displayVal = `${val}%`;
        config.quality = val / 100;
    } else {
        displayVal = `${val} KB`;
        config.maxSizeKB = val;
    }

    tooltipVal.textContent = displayVal;

    // Compute dynamic percent width offset
    const percent = ((val - min) / (max - min)) * 100;
    // Align absolute layout tracking slider width
    sliderTooltip.style.left = `calc(${percent}% + (${15 - percent * 0.3}px))`;
}

globalSlider.addEventListener("input", updateTooltipPosition);
window.addEventListener("resize", updateTooltipPosition);

// Output format change
formatSelector.addEventListener("change", (e) => {
    config.format = e.target.value;
});

// Handle File uploading and trigger selection click
dropZone.addEventListener("click", () => fileInput.click());
fakeSelectBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    fileInput.click();
});

dropZone.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZone.classList.add("border-indigo-500", "bg-indigo-100/50");
});
dropZone.addEventListener("dragleave", () => {
    dropZone.classList.remove("border-indigo-500", "bg-indigo-100/50");
});
dropZone.addEventListener("drop", (e) => {
    e.preventDefault();
    dropZone.classList.remove("border-indigo-500", "bg-indigo-100/50");
    if (e.dataTransfer.files.length > 0) {
        handleUploadedFiles(e.dataTransfer.files);
    }
});
fileInput.addEventListener("change", (e) => {
    if (e.target.files.length > 0) {
        handleUploadedFiles(e.target.files);
    }
    fileInput.value = ""; // Reset input selection element
});

function formatBytes(bytes, decimals = 1) {
    if (bytes === 0) return "0 B";
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ["B", "KB", "MB", "GB"];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + " " + sizes[i];
}

function getFilenameWithoutExtension(filename) {
    return filename.substring(0, filename.lastIndexOf(".")) || filename;
}

function getMimeExtension(mime) {
    switch (mime) {
        case "image/jpeg":
            return "jpg";
        case "image/png":
            return "png";
        case "image/webp":
            return "webp";
        default:
            return "jpg";
    }
}

function handleUploadedFiles(files) {
    queueContainer.classList.remove("hidden");

    Array.from(files).forEach((file) => {
        if (!file.type.match("image.*")) return;

        const fileId =
            "img_" +
            Date.now() +
            "_" +
            Math.random().toString(36).substring(2, 9);
        const fileObj = {
            id: fileId,
            name: file.name,
            originalSize: file.size,
            type: file.type,
            status: "pending",
            mode: config.mode,
            quality: config.quality,
            maxSizeKB: config.maxSizeKB,
            format: config.format,
            originalFile: file,
            originalUrl: URL.createObjectURL(file),
            compressedBlob: null,
            compressedUrl: null,
            compressedSize: 0,
            savingsPercent: 0,
            width: 0,
            height: 0,
            newWidth: 0,
            newHeight: 0,
        };

        filesList.push(fileObj);
        renderQueueItem(fileObj);
        compressImageWorkflow(fileObj);
    });

    updateGlobalStats();
}

// Render dynamic row item
function renderQueueItem(fileObj) {
    const itemHTML = `
                <div id="${fileObj.id}" class="bg-white border border-slate-200 hover:border-slate-300 rounded-brand-card p-2.5 flex flex-col sm:flex-row items-center justify-between gap-2.5 transition-all relative overflow-hidden group w-full">
                    
                    <!-- Decorative indicator strip -->
                    <div class="status-strip absolute top-0 bottom-0 left-0 w-1 bg-amber-400"></div>

                    <div class="flex items-center space-x-2.5 w-full sm:w-auto">
                        <!-- Thumbnail preview box -->
                        <div class="relative w-11 h-11 bg-slate-50 rounded-brand-card overflow-hidden border border-slate-100 shrink-0 flex items-center justify-center">
                            <img src="${fileObj.originalUrl}" class="w-full h-full object-cover" alt="preview">
                        </div>

                        <!-- Main metadata and title descriptions -->
                        <div class="min-w-0 grow text-left">
                            <p class="font-bold text-brand-text text-xs truncate max-w-50 sm:max-w-md" title="${fileObj.name}">${fileObj.name}</p>
                            <p class="text-[10px] text-slate-500 mt-0.5 flex items-center gap-1.5 flex-wrap">
                                <span class="font-semibold text-slate-600">${formatBytes(fileObj.originalSize)}</span>
                                <span class="res-badge text-[9px] bg-slate-50 px-1.5 py-0.2 rounded text-slate-400 border border-slate-200/50">Estimating...</span>
                            </p>
                        </div>
                    </div>

                    <!-- Process Info and Actions -->
                    <div class="flex flex-row items-center gap-2.5 w-full sm:w-auto justify-between sm:justify-end">
                        
                        <!-- Status indicator details -->
                        <div class="text-left sm:text-right grow sm:grow-0">
                            <div class="status-text text-[10px] text-amber-600 font-bold flex items-center justify-start sm:justify-end gap-1">
                                <span class="inline-block w-1.5 h-1.5 rounded-full bg-amber-400 animate-spin"></span>
                                Processing
                            </div>
                            <div class="savings-data text-[10px] font-bold text-emerald-600 mt-0.5 hidden">
                                Saved 0%
                            </div>
                        </div>

                        <!-- Action controls -->
                        <div class="flex items-center space-x-1.5">
                            <a id="download_${fileObj.id}" href="#" download="compressed_${fileObj.name}" class="download-btn p-1.5 text-white bg-brand-primary hover:bg-brand-primaryHover rounded-brand-btn transition-colors pointer-events-none opacity-50 flex items-center justify-center" title="Download Image">
                                <i class="ti ti-download text-sm"></i>
                            </a>
                            <button data-action="remove" data-id="${fileObj.id}" class="p-1.5 text-slate-400 hover:text-rose-600 bg-slate-50 hover:bg-rose-50 rounded-brand-btn border border-slate-200 hover:border-rose-200 transition-all flex items-center justify-center" title="Remove">
                                <i class="ti ti-trash text-sm"></i>
                            </button>
                        </div>

                    </div>
                </div>
            `;
    fileQueue.insertAdjacentHTML("beforeend", itemHTML);
}

function compressImageWorkflow(fileObj) {
    const fileRow = document.getElementById(fileObj.id);
    if (!fileRow) return;
    const statusStrip = fileRow.querySelector(".status-strip");
    const statusText = fileRow.querySelector(".status-text");
    const savingsData = fileRow.querySelector(".savings-data");
    const resBadge = fileRow.querySelector(".res-badge");
    const downloadBtn = document.getElementById(`download_${fileObj.id}`);

    const img = new Image();
    img.src = fileObj.originalUrl;

    img.onload = function () {
        fileObj.width = img.naturalWidth;
        fileObj.height = img.naturalHeight;
        resBadge.textContent = `${img.naturalWidth}x${img.naturalHeight}`;

        // Run Canvas optimization pipeline
        if (fileObj.mode === "quality") {
            // Standard quality factor compression
            executeCompression(img, fileObj, fileObj.quality, 1.0, (blob) => {
                finalizeCompressionResult(
                    fileObj,
                    blob,
                    fileRow,
                    statusStrip,
                    statusText,
                    savingsData,
                    resBadge,
                    downloadBtn,
                );
            });
        } else {
            // TARGET SIZE OPTIMIZER ALGORITHM (Adaptive compression search loop)
            // We start testing parameters to find the maximum quality matching size constraints
            optimizeToTargetSize(img, fileObj, (bestBlob) => {
                finalizeCompressionResult(
                    fileObj,
                    bestBlob,
                    fileRow,
                    statusStrip,
                    statusText,
                    savingsData,
                    resBadge,
                    downloadBtn,
                );
            });
        }
    };

    img.onerror = function () {
        handleCompressionError(fileObj, fileRow, "Decode failed");
    };
}

// Run smart binary-search step to optimize exact target sizing limit
function optimizeToTargetSize(img, fileObj, callback) {
    const maxAllowedBytes = fileObj.maxSizeKB * 1024;
    let lowQ = 0.05;
    let highQ = 1.0;
    let bestQuality = 0.75;
    let bestBlob = null;
    let step = 0;
    const maxSteps = 5; // Search iterations balance speed/accuracy

    function testNextStep() {
        if (step >= maxSteps) {
            // If target is too small for standard resolution scale, downscale dimensions automatically to meet criteria
            if (!bestBlob || bestBlob.size > maxAllowedBytes) {
                // Squeeze canvas size down to 75% resolution & redo
                executeCompression(
                    img,
                    fileObj,
                    0.4,
                    0.75,
                    (downscaledBlob) => {
                        callback(downscaledBlob);
                    },
                );
            } else {
                callback(bestBlob);
            }
            return;
        }

        const currentQ = (lowQ + highQ) / 2;
        step++;

        executeCompression(img, fileObj, currentQ, 1.0, (blob) => {
            if (blob && blob.size <= maxAllowedBytes) {
                bestBlob = blob;
                bestQuality = currentQ;
                lowQ = currentQ; // Try higher quality
                testNextStep();
            } else {
                highQ = currentQ; // Needs more compression
                testNextStep();
            }
        });
    }

    testNextStep();
}

// Low level canvas processing core
function executeCompression(
    img,
    fileObj,
    qualityFactor,
    dimensionScale,
    callback,
) {
    const canvas = document.createElement("canvas");
    const ctx = canvas.getContext("2d");

    const targetWidth = Math.round(img.naturalWidth * dimensionScale);
    const targetHeight = Math.round(img.naturalHeight * dimensionScale);

    canvas.width = targetWidth;
    canvas.height = targetHeight;

    ctx.drawImage(img, 0, 0, targetWidth, targetHeight);

    let outputMime = fileObj.type;
    if (fileObj.format !== "original") {
        outputMime = fileObj.format;
    }

    canvas.toBlob(
        (blob) => {
            callback(blob);
        },
        outputMime,
        qualityFactor,
    );
}

// Finialize compressed row results
function finalizeCompressionResult(
    fileObj,
    blob,
    fileRow,
    statusStrip,
    statusText,
    savingsData,
    resBadge,
    downloadBtn,
) {
    if (!blob) {
        handleCompressionError(fileObj, fileRow, "Execution failed");
        return;
    }

    fileObj.compressedBlob = blob;
    fileObj.compressedUrl = URL.createObjectURL(blob);
    fileObj.compressedSize = blob.size;
    fileObj.status = "done";

    const originalSize = fileObj.originalSize;
    const compressedSize = fileObj.compressedSize;
    const savings = originalSize - compressedSize;
    const savingsPercent = Math.max(
        0,
        Math.round((savings / originalSize) * 100),
    );

    fileObj.savingsPercent = savingsPercent;

    // Update individual row UI element designs
    statusStrip.className =
        "status-strip absolute top-0 bottom-0 left-0 w-1 bg-emerald-500";
    statusText.className =
        "status-text text-[10px] text-emerald-600 font-bold flex items-center justify-start sm:justify-end gap-0.5";
    statusText.innerHTML = `
                <i class="ti ti-circle-check text-emerald-500 text-sm"></i>
                Ready
            `;

    savingsData.textContent = `Saved ${savingsPercent}% (${formatBytes(savings)})`;
    savingsData.classList.remove("hidden");

    const currentOutputMime =
        fileObj.format === "original" ? fileObj.type : fileObj.format;

    // Show updated resolution dimensions
    resBadge.innerHTML = `
                <span class="text-slate-400 line-through">${fileObj.width}x${fileObj.height}</span>
                <i class="ti ti-arrow-right text-xs inline text-slate-400 mx-0.5"></i>
                <span class="text-brand-primary font-bold">${Math.round(fileObj.width * (fileObj.compressedBlob ? 1.0 : 1.0))}x${Math.round(fileObj.height * (fileObj.compressedBlob ? 1.0 : 1.0))}</span>
            `;

    // Active single item download button state
    downloadBtn.classList.remove("pointer-events-none", "opacity-50");
    downloadBtn.href = fileObj.compressedUrl;
    downloadBtn.download = `optimized_${getFilenameWithoutExtension(fileObj.name)}.${getMimeExtension(currentOutputMime)}`;

    updateGlobalStats();
}

function handleCompressionError(fileObj, fileRow, errorMsg) {
    fileObj.status = "error";
    const statusStrip = fileRow.querySelector(".status-strip");
    const statusText = fileRow.querySelector(".status-text");

    statusStrip.className =
        "status-strip absolute top-0 bottom-0 left-0 w-1 bg-rose-500";
    statusText.className =
        "status-text text-[10px] text-rose-600 font-bold flex items-center justify-start sm:justify-end gap-0.5";
    statusText.innerHTML = `
                <i class="ti ti-alert-triangle text-sm"></i>
                ${errorMsg}
            `;
    updateGlobalStats();
}

// Delegation for remove item buttons
fileQueue.addEventListener("click", (e) => {
    const target = e.target.closest("[data-action]");
    if (!target) return;

    const action = target.getAttribute("data-action");
    const id = target.getAttribute("data-id");

    if (action === "remove") {
        removeQueueItem(id);
    }
});

function removeQueueItem(id) {
    const index = filesList.findIndex((f) => f.id === id);
    if (index > -1) {
        const item = filesList[index];
        if (item.originalUrl) URL.revokeObjectURL(item.originalUrl);
        if (item.compressedUrl) URL.revokeObjectURL(item.compressedUrl);
        filesList.splice(index, 1);
    }
    const el = document.getElementById(id);
    if (el) el.remove();

    if (filesList.length === 0) {
        queueContainer.classList.add("hidden");
    } else {
        updateGlobalStats();
    }
}

// Apply rules trigger
reapplyBtn.addEventListener("click", () => {
    if (filesList.length === 0) return;

    filesList.forEach((fileObj) => {
        fileObj.mode = config.mode;
        fileObj.quality = config.quality;
        fileObj.maxSizeKB = config.maxSizeKB;
        fileObj.format = config.format;
        fileObj.status = "pending";

        const row = document.getElementById(fileObj.id);
        if (row) {
            row.querySelector(".status-strip").className =
                "status-strip absolute top-0 bottom-0 left-0 w-1 bg-amber-400";
            const statusText = row.querySelector(".status-text");
            statusText.className =
                "status-text text-[10px] text-amber-600 font-bold flex items-center justify-start sm:justify-end gap-0.5";
            statusText.innerHTML = `
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                        Re-optimizing
                    `;
            row.querySelector(".savings-data").classList.add("hidden");
            row.querySelector(".download-btn").classList.add(
                "pointer-events-none",
                "opacity-50",
            );
        }

        compressImageWorkflow(fileObj);
    });
    updateGlobalStats();
});

// Global metrics computation
function updateGlobalStats() {
    if (filesList.length === 0) return;

    let totalOrig = 0;
    let totalComp = 0;

    filesList.forEach((f) => {
        totalOrig += f.originalSize;
        if (f.status === "done" && f.compressedSize) {
            totalComp += f.compressedSize;
        } else {
            totalComp += f.originalSize;
        }
    });

    const diff = totalOrig - totalComp;
    const savingsPct =
        totalOrig > 0 ? Math.max(0, Math.round((diff / totalOrig) * 100)) : 0;

    batchCountText.textContent = `${filesList.length} loaded`;
    queueBadge.textContent = filesList.length;
    totalOriginalSize.textContent = formatBytes(totalOrig);
    totalCompressedSize.textContent = formatBytes(totalComp);
    totalSavedAmount.textContent = formatBytes(Math.max(0, diff));
    totalSavingsPercent.textContent = `Saved: ${savingsPct}%`;
}

// Clear all batch lists
clearAllBtn.addEventListener("click", () => {
    filesList.forEach((f) => {
        if (f.originalUrl) URL.revokeObjectURL(f.originalUrl);
        if (f.compressedUrl) URL.revokeObjectURL(f.compressedUrl);
    });
    filesList = [];
    fileQueue.innerHTML = "";
    queueContainer.classList.add("hidden");
});

// Batch export as ZIP Archive
downloadZipBtn.addEventListener("click", async () => {
    const completedFiles = filesList.filter((f) => f.status === "done");
    if (completedFiles.length === 0) return;

    downloadZipBtn.disabled = true;
    const originalHTML = downloadZipBtn.innerHTML;
    downloadZipBtn.innerHTML = `
                <i class="ti ti-loader animate-spin mr-1.5 inline-block"></i>
                <span>Compiling ZIP...</span>
            `;

    try {
        const zip = new JSZip();

        completedFiles.forEach((f) => {
            const outputMime = f.format === "original" ? f.type : f.format;
            const cleanName = `optimized_${getFilenameWithoutExtension(f.name)}.${getMimeExtension(outputMime)}`;
            zip.file(cleanName, f.compressedBlob);
        });

        const content = await zip.generateAsync({ type: "blob" });
        const zipUrl = URL.createObjectURL(content);
        const a = document.createElement("a");
        a.href = zipUrl;
        a.download = `OptiSqueeze_Export_${Date.now()}.zip`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(zipUrl);

        updateUsages("compress-image");
    } catch (err) {
        console.error(err);
    } finally {
        downloadZipBtn.disabled = false;
        downloadZipBtn.innerHTML = originalHTML;
    }
});

// single download
document.addEventListener("click", function (e) {
    const link = e.target.closest(".download-btn");

    if (!link) return;

    e.preventDefault();

    const url = link.href;
    const filename = link.download;

    const a = document.createElement("a");
    a.href = url;
    a.download = filename;

    document.body.appendChild(a);
    a.click();
    a.remove();

    updateUsages("compress-image");
});

// Initialize tooltip positioning on load
window.addEventListener("load", () => {
    setTimeout(updateTooltipPosition, 100);
});
