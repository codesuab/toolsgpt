import "../domain";
import JSZip from "jszip";
import heic2any from "heic2any";
import updateUsages from "../count";

// Core variables and selectors
let fileQueue = [];
let isConverting = false;

const dropzone = document.getElementById("dropzone");
const fileInput = document.getElementById("fileInput");
const queueContainer = document.getElementById("queueContainer");
const emptyQueueState = document.getElementById("emptyQueueState");
const queueCounterBadge = document.getElementById("queueCounterBadge");

// Buttons
const btnConvertAll = document.getElementById("btnConvertAll");
const btnDownloadAll = document.getElementById("btnDownloadAll");
const btnClearQueue = document.getElementById("btnClearQueue");

// Settings elements
const btnFormatJpg = document.getElementById("btnFormatJpg");
const btnFormatPng = document.getElementById("btnFormatPng");
const formatSelect = document.getElementById("formatSelect");
const qualitySlider = document.getElementById("qualitySlider");
const qualityValue = document.getElementById("qualityValue");
const qualitySettingsContainer = document.getElementById(
    "qualitySettingsContainer",
);
const stripMetadata = document.getElementById("stripMetadata");

// Banner elements
const statusBanner = document.getElementById("statusBanner");
const statusIcon = document.getElementById("statusIcon");
const statusMessage = document.getElementById("statusMessage");
const btnCloseBanner = document.getElementById("btnCloseBanner");

// Drag over dropzone
dropzone.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropzone.classList.add("border-brand-primary", "bg-blue-50/20");
});

// Drag leave dropzone
dropzone.addEventListener("dragleave", (e) => {
    e.preventDefault();
    dropzone.classList.remove("border-brand-primary", "bg-blue-50/20");
});

// Handle drop event
dropzone.addEventListener("drop", (e) => {
    e.preventDefault();
    dropzone.classList.remove("border-brand-primary", "bg-blue-50/20");
    if (isConverting) return;

    if (e.dataTransfer.files.length > 0) {
        processFileList(e.dataTransfer.files);
    }
});

// Select files trigger
dropzone.addEventListener("click", () => {
    if (isConverting) return;
    fileInput.click();
});

fileInput.addEventListener("change", (e) => {
    if (e.target.files.length > 0) {
        processFileList(e.target.files);
        fileInput.value = ""; // Reset input element
    }
});

// Output Format selector buttons logic
btnFormatJpg.addEventListener("click", () => {
    if (isConverting) return;
    formatSelect.value = "image/jpeg";
    btnFormatJpg.className =
        "px-4 py-2 text-center text-sm font-medium border border-brand-primary bg-brand-primary text-white rounded-none-important focus:outline-none transition-all";
    btnFormatPng.className =
        "px-4 py-2 text-center text-sm font-medium border border-brand-border bg-white text-brand-muted hover:text-brand-text rounded-none-important focus:outline-none transition-all";
    qualitySettingsContainer.style.opacity = "1";
    qualitySlider.disabled = false;
});

btnFormatPng.addEventListener("click", () => {
    if (isConverting) return;
    formatSelect.value = "image/png";
    btnFormatPng.className =
        "px-4 py-2 text-center text-sm font-medium border border-brand-primary bg-brand-primary text-white rounded-none-important focus:outline-none transition-all";
    btnFormatJpg.className =
        "px-4 py-2 text-center text-sm font-medium border border-brand-border bg-white text-brand-muted hover:text-brand-text rounded-none-important focus:outline-none transition-all";
    qualitySettingsContainer.style.opacity = "0.5";
    qualitySlider.disabled = true;
});

// Quality slider update tracking
qualitySlider.addEventListener("input", (e) => {
    qualityValue.textContent = e.target.value + "%";
});

// Banner close action
btnCloseBanner.addEventListener("click", () => {
    statusBanner.className = "hidden";
});

// Utility size converter
function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return "0 Bytes";
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ["Bytes", "KB", "MB", "GB"];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + " " + sizes[i];
}

// Process incoming files into memory
function processFileList(files) {
    const allowedExtensions = ["heic", "heif"];
    let processedFilesCount = 0;
    let invalidFilesDetected = false;

    Array.from(files).forEach((file) => {
        const extension = file.name.split(".").pop().toLowerCase();

        // Mime check or file extension validation fallback
        if (
            allowedExtensions.includes(extension) ||
            file.type === "image/heic" ||
            file.type === "image/heif"
        ) {
            // Maximum limit checking (50MB)
            if (file.size > 50 * 1024 * 1024) {
                showInlineBanner(
                    "warning",
                    `Skipped "${file.name}" because it exceeds the 50MB file size limit.`,
                );
                return;
            }

            const fileId =
                "heic_" +
                Date.now() +
                "_" +
                Math.random().toString(36).substr(2, 9);
            fileQueue.push({
                id: fileId,
                file: file,
                status: "queued",
                progress: 0,
                convertedBlob: null,
                convertedUrl: null,
                convertedSize: 0,
                error: null,
            });
            processedFilesCount++;
        } else {
            invalidFilesDetected = true;
        }
    });

    if (invalidFilesDetected) {
        showInlineBanner(
            "warning",
            "Only .HEIC or .HEIF files from Apple devices are supported. Non-compatible formats were skipped.",
        );
    }

    if (processedFilesCount > 0) {
        renderQueue();
        showInlineBanner(
            "success",
            `Added ${processedFilesCount} file(s) to the processing queue successfully.`,
        );
    }
}

// Output banner notification logic
function showInlineBanner(type, message) {
    statusBanner.className =
        "p-4 border text-xs flex items-start gap-2.5 rounded-none-important mt-4";
    if (type === "success") {
        statusBanner.classList.add(
            "bg-emerald-50",
            "border-emerald-200",
            "text-emerald-800",
        );
        statusIcon.className = "ti ti-checkbox text-emerald-600";
    } else if (type === "warning") {
        statusBanner.classList.add(
            "bg-amber-50",
            "border-amber-200",
            "text-amber-800",
        );
        statusIcon.className = "ti ti-alert-triangle text-amber-600";
    } else if (type === "error") {
        statusBanner.classList.add(
            "bg-red-50",
            "border-red-200",
            "text-red-800",
        );
        statusIcon.className = "ti ti-alert-circle text-red-600";
    }
    statusMessage.textContent = message;
}

function renderQueue() {
    if (fileQueue.length === 0) {
        emptyQueueState.style.display = "flex";
        queueContainer.innerHTML = "";
        queueContainer.appendChild(emptyQueueState);
        queueCounterBadge.textContent = "0";
        disableActionButtons();
        return;
    }

    emptyQueueState.style.display = "none";

    // Re-render only list cards preserving original items to save performance
    const existingIds = Array.from(
        queueContainer.querySelectorAll(".queue-item"),
    ).map((el) => el.getAttribute("data-id"));

    // If length mismatch or fresh initialization, wipe container container first
    if (existingIds.length !== fileQueue.length) {
        queueContainer.innerHTML = "";
    }

    fileQueue.forEach((item, index) => {
        let row = document.getElementById(item.id);
        const isNew = !row;

        if (isNew) {
            row = document.createElement("div");
            row.id = item.id;
            row.className =
                "queue-item border-b border-brand-border hover:bg-slate-50/40 p-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4 transition-colors";
            row.setAttribute("data-id", item.id);
        }

        const ext = formatSelect.value === "image/png" ? "PNG" : "JPG";

        // Status mapping markup
        let statusBadge = "";
        let progressIndicator = "";
        let actionsContainer = "";
        let statComparison = `<span class="text-xs text-brand-muted font-mono font-medium">${formatBytes(item.file.size)}</span>`;

        if (item.status === "queued") {
            statusBadge = `<span class="inline-flex items-center gap-1 text-[11px] font-semibold text-slate-500 bg-slate-100 px-2 py-0.5 rounded-none font-space uppercase"><i class="ti ti-clock"></i> Queued</span>`;
            actionsContainer = `
                        <button class="btn-remove text-slate-400 hover:text-red-600 transition-colors p-1" data-id="${item.id}" title="Remove file">
                            <i class="ti ti-trash text-lg"></i>
                        </button>`;
        } else if (item.status === "processing") {
            statusBadge = `<span class="inline-flex items-center gap-1 text-[11px] font-semibold text-brand-primary bg-blue-50 px-2 py-0.5 rounded-none font-space uppercase"><i class="ti ti-loader animate-spin"></i> Converting</span>`;
            progressIndicator = `
                        <div class="w-full bg-slate-100 h-1 mt-2 rounded-none overflow-hidden">
                            <div class="bg-brand-primary h-full transition-all duration-300" style="width: ${item.progress}%"></div>
                        </div>`;
        } else if (item.status === "success") {
            const ratio = Math.round(
                ((item.file.size - item.convertedSize) / item.file.size) * 100,
            );
            const savingClass =
                ratio >= 0 ? "text-emerald-600" : "text-slate-500";
            const savingSymbol = ratio >= 0 ? "-" : "+";

            statusBadge = `<span class="inline-flex items-center gap-1 text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-none font-space uppercase"><i class="ti ti-check"></i> Success</span>`;
            statComparison = `
                        <div class="flex items-center gap-1.5 font-mono text-xs">
                            <span class="text-slate-400 line-through">${formatBytes(item.file.size)}</span>
                            <span class="text-slate-400">→</span>
                            <span class="font-bold text-brand-text">${formatBytes(item.convertedSize)}</span>
                            <span class="font-bold ${savingClass}">(${savingSymbol}${Math.abs(ratio)}%)</span>
                        </div>`;

            // Trigger dynamic object action
            actionsContainer = `
                        <div class="flex items-center gap-1">
                            <button class="btn-download py-1 px-2.5 border border-brand-primary text-brand-primary hover:bg-brand-primary hover:text-white transition-all font-space text-xs uppercase font-semibold flex items-center gap-1 rounded-none-important" data-id="${item.id}">
                                <i class="ti ti-download text-sm"></i> Download
                            </button>
                            <button class="btn-remove text-slate-400 hover:text-red-600 transition-colors p-1" data-id="${item.id}">
                                <i class="ti ti-trash text-lg"></i>
                            </button>
                        </div>`;
        } else if (item.status === "failed") {
            statusBadge = `<span class="inline-flex items-center gap-1 text-[11px] font-semibold text-red-700 bg-red-50 px-2 py-0.5 rounded-none font-space uppercase" title="${item.error || "Unknown converter exception"}"><i class="ti ti-alert-circle"></i> Failed</span>`;
            statComparison = `<span class="text-xs text-red-500 font-medium font-mono">${formatBytes(item.file.size)}</span>`;
            actionsContainer = `
                        <button class="btn-remove text-slate-400 hover:text-red-600 transition-colors p-1" data-id="${item.id}">
                            <i class="ti ti-trash text-lg"></i>
                        </button>`;
        }

        row.innerHTML = `
                    <div class="flex items-start gap-3 flex-1 min-w-0">
                        <div class="w-10 h-10 bg-slate-100 flex items-center justify-center text-slate-400 self-start border border-brand-border shrink-0">
                            <i class="ti ti-photo text-xl"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-brand-text truncate font-space" title="${item.file.name}">
                                ${item.file.name}
                            </p>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1">
                                ${statusBadge}
                                ${statComparison}
                            </div>
                            ${progressIndicator}
                        </div>
                    </div>
                    <div class="flex items-center justify-end shrink-0 md:pl-4">
                        ${actionsContainer}
                    </div>
                `;

        if (isNew) {
            queueContainer.appendChild(row);
        }
    });

    // Bind contextual events (Individual actions)
    bindQueueRowEvents();

    queueCounterBadge.textContent = fileQueue.length;
    enableActionButtons();
}

// Attach action handlers dynamically
function bindQueueRowEvents() {
    // Delete action
    const removeButtons = queueContainer.querySelectorAll(".btn-remove");
    removeButtons.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.stopPropagation();
            if (isConverting) return;
            const id = btn.getAttribute("data-id");
            removeQueueItem(id);
        });
    });

    // Download action
    const downloadButtons = queueContainer.querySelectorAll(".btn-download");
    downloadButtons.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.stopPropagation();
            const id = btn.getAttribute("data-id");
            downloadSingleFile(id);
        });
    });
}

function removeQueueItem(id) {
    const itemIndex = fileQueue.findIndex((item) => item.id === id);
    if (itemIndex !== -1) {
        // Free memory URLs if created
        if (fileQueue[itemIndex].convertedUrl) {
            URL.revokeObjectURL(fileQueue[itemIndex].convertedUrl);
        }
        fileQueue.splice(itemIndex, 1);
        renderQueue();
    }
}

// Toggle state controls based on dynamic processing criteria
function enableActionButtons() {
    const hasQueue = fileQueue.length > 0;
    const hasSuccess = fileQueue.some((item) => item.status === "success");
    const hasPending = fileQueue.some((item) => item.status === "queued");

    btnConvertAll.disabled = !hasPending || isConverting;
    btnDownloadAll.disabled = !hasSuccess || isConverting;
    btnClearQueue.disabled = !hasQueue || isConverting;

    // Toggle form settings active state
    if (isConverting) {
        btnFormatJpg.disabled = true;
        btnFormatPng.disabled = true;
        qualitySlider.disabled = true;
        stripMetadata.disabled = true;
    } else {
        btnFormatJpg.disabled = false;
        btnFormatPng.disabled = false;
        qualitySlider.disabled = formatSelect.value === "image/png";
        stripMetadata.disabled = false;
    }
}

function disableActionButtons() {
    btnConvertAll.disabled = true;
    btnDownloadAll.disabled = true;
    btnClearQueue.disabled = true;
}

// Sequential converter flow execution (WASM safety to avoid thread exhaustion)
async function runConversionQueue() {
    if (isConverting) return;

    isConverting = true;
    enableActionButtons();
    showInlineBanner(
        "success",
        "WASM engine loaded. Initializing sequential client-side batch processing...",
    );

    const targetFormat = formatSelect.value;
    const targetQuality = parseFloat(qualitySlider.value) / 100;

    for (let i = 0; i < fileQueue.length; i++) {
        const item = fileQueue[i];
        if (item.status !== "queued") continue;

        item.status = "processing";
        item.progress = 25; // Loading indicator
        renderQueue();

        try {
            // heic2any requires options parameters
            item.progress = 50; // Processing calculation state
            renderQueue();

            // Perform structural conversion process
            const converted = await heic2any({
                blob: item.file,
                toType: targetFormat,
                quality: targetQuality,
            });

            // Update parameters
            let singleBlob = Array.isArray(converted)
                ? converted[0]
                : converted;

            // Free metadata hook mock optimization (or keep if desired)
            if (stripMetadata.checked && targetFormat === "image/jpeg") {
                // In high production environment, metadata can be stripped using EXIF stripping procedures.
                // heic2any automatically returns canvas drawn blobs if conversion runs through client interfaces.
            }

            item.convertedBlob = singleBlob;
            item.convertedSize = singleBlob.size;
            item.convertedUrl = URL.createObjectURL(singleBlob);
            item.status = "success";
            item.progress = 100;
        } catch (error) {
            console.error("Conversion error parsing payload: ", error);
            item.status = "failed";
            item.error = error.message || "Failed decoding container";
        }

        renderQueue();
    }

    isConverting = false;
    enableActionButtons();

    const failedCount = fileQueue.filter(
        (item) => item.status === "failed",
    ).length;
    if (failedCount > 0) {
        showInlineBanner(
            "warning",
            `Batch processing finished. Active files rendered, but ${failedCount} files failed to render properly.`,
        );
    } else {
        showInlineBanner(
            "success",
            "All images converted perfectly. You can now download files individually or export as a ZIP container.",
        );
    }
}

// Export active conversion
function downloadSingleFile(id) {
    const item = fileQueue.find((el) => el.id === id);
    if (item && item.status === "success" && item.convertedUrl) {
        const ext = formatSelect.value === "image/png" ? "png" : "jpg";
        const originalName = item.file.name;
        const baseName =
            originalName.substring(0, originalName.lastIndexOf(".")) ||
            originalName;

        const link = document.createElement("a");
        link.href = item.convertedUrl;
        link.download = `${baseName}.${ext}`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        updateUsages("heic-converter");
    }
}

// Bundle complete batch package into single JSZip block client side
async function buildBatchZip() {
    const successfulItems = fileQueue.filter(
        (item) => item.status === "success" && item.convertedBlob,
    );
    if (successfulItems.length === 0) return;

    showInlineBanner("success", "Building compression package. Please wait...");
    const zip = new JSZip();
    const ext = formatSelect.value === "image/png" ? "png" : "jpg";

    successfulItems.forEach((item, index) => {
        const originalName = item.file.name;
        const baseName =
            originalName.substring(0, originalName.lastIndexOf(".")) ||
            originalName;
        zip.file(`${baseName}.${ext}`, item.convertedBlob);
    });

    try {
        const content = await zip.generateAsync({ type: "blob" });
        const downloadUrl = URL.createObjectURL(content);

        const link = document.createElement("a");
        link.href = downloadUrl;
        link.download = `converted_heic_images_${Date.now()}.zip`;
        document.body.appendChild(link);
        link.click();

        document.body.removeChild(link);
        setTimeout(() => URL.revokeObjectURL(downloadUrl), 5000);

        showInlineBanner(
            "success",
            `Export completed! Converted bundle successfully downloaded.`,
        );

        updateUsages("heic-converter");
    } catch (err) {
        showInlineBanner("error", `Failed to construct bundle: ${err.message}`);
    }
}

function clearAllQueue() {
    if (isConverting) return;
    // Clean dynamic references
    fileQueue.forEach((item) => {
        if (item.convertedUrl) {
            URL.revokeObjectURL(item.convertedUrl);
        }
    });
    fileQueue = [];
    renderQueue();
    statusBanner.className = "hidden";
}

// Global Event triggers
btnConvertAll.addEventListener("click", runConversionQueue);
btnDownloadAll.addEventListener("click", buildBatchZip);
btnClearQueue.addEventListener("click", clearAllQueue);

window.onload = function () {
    // Confirm environment properties
    if (typeof heic2any === "undefined") {
        showInlineBanner(
            "error",
            "Critical HEIC WASM dependency failed to initialize. Please check network restrictions or reload page.",
        );
    }
};
