import "../domain";
import JSZip from "jszip";
import updateUsages from "../count";

const dropZone = document.getElementById("drop-zone");
const fileInput = document.getElementById("file-input");
const browseBtn = document.getElementById("browse-btn");
const fileList = document.getElementById("file-list");
const fileListContainer = document.getElementById("file-list-container");
const emptyState = document.getElementById("empty-state");
const convertAllBtn = document.getElementById("convert-all");
const clearAllBtn = document.getElementById("clear-all");
const fileCountEl = document.getElementById("file-count");
const resultSection = document.getElementById("result-section");
const downloadZipBtn = document.getElementById("download-zip");

let filesQueue = [];

// --- Event Listeners ---
dropZone.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZone.classList.add("drag-over");
});
dropZone.addEventListener("dragleave", () =>
    dropZone.classList.remove("drag-over"),
);
dropZone.addEventListener("drop", (e) => {
    e.preventDefault();
    dropZone.classList.remove("drag-over");
    handleFiles(e.dataTransfer.files);
});

browseBtn.addEventListener("click", () => fileInput.click());
fileInput.addEventListener("change", (e) => handleFiles(e.target.files));
clearAllBtn.addEventListener("click", clearFiles);
convertAllBtn.addEventListener("click", processAllFiles);
downloadZipBtn.addEventListener("click", downloadZip);

// --- Core Functions ---
function handleFiles(files) {
    Array.from(files).forEach((file) => {
        if (file.type === "image/png") {
            const id = Date.now() + Math.random();
            filesQueue.push({
                id,
                file,
                quality: 0.8,
                status: "pending",
                url: null,
            });
        }
    });
    renderFiles();
}

function renderFiles() {
    if (filesQueue.length === 0) {
        fileListContainer.classList.add("hidden");
        emptyState.classList.remove("hidden");
        resultSection.classList.add("hidden");
        return;
    }

    fileListContainer.classList.remove("hidden");
    emptyState.classList.add("hidden");
    fileCountEl.textContent = filesQueue.length;

    fileList.innerHTML = "";
    filesQueue.forEach((item) => {
        const row = document.createElement("div");
        row.className =
            "flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-3 border border-[#e2e8f0] bg-[#f8fafc]";
        row.innerHTML = `
                    <div class='flex items-center gap-4'>            
                        <div class="w-12 h-12 bg-gray-200 shrink-0 flex items-center justify-center overflow-hidden">
                            <span class="text-xs text-gray-500">PNG</span>
                        </div>
                        <div class="grow">
                            <p class="text-sm font-medium truncate w-48">${item.file.name}</p>
                            <p class="text-xs text-brand-muted">${(item.file.size / 1024).toFixed(1)} KB</p>
                        </div>
                    </div>
                    <div class='flex gap-3 items-center justify-end'>
                        <div class="flex items-center gap-2">
                            <label class="text-xs text-brand-muted">Quality</label>
                            <select class="text-sm border border-brand-border px-2 py-1" onchange="updateQuality(${item.id}, this.value)">
                                <option value="0.9" ${item.quality == 0.9 ? "selected" : ""}>High</option>
                                <option value="0.8" ${item.quality == 0.8 ? "selected" : ""}>Medium</option>
                                <option value="0.5" ${item.quality == 0.5 ? "selected" : ""}>Low</option>
                            </select>
                        </div>
                        <div class='flex items-center gap-2'>
                            <div class="text-right leading-0">
                                ${item.status === "done" ? '<span class="text-green-600 text-xs font-semibold">Ready</span>' : '<span class="text-gray-500 text-xs">Pending</span>'}
                            </div>
                            <button class="text-brand-muted hover:text-[#ef4444]" onclick="removeFile(${item.id})">
                                <i class="ti ti-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
        fileList.appendChild(row);
    });
}

function updateQuality(id, val) {
    const item = filesQueue.find((f) => f.id === id);
    if (item) item.quality = parseFloat(val);
}

function removeFile(id) {
    filesQueue = filesQueue.filter((f) => f.id !== id);
    renderFiles();
}

function clearFiles() {
    filesQueue = [];
    renderFiles();
}

async function processAllFiles() {
    convertAllBtn.disabled = true;
    convertAllBtn.textContent = "Processing...";

    for (let item of filesQueue) {
        if (item.status === "done") continue;

        try {
            const dataUrl = await convertToJpg(item.file, item.quality);
            item.url = dataUrl;
            item.status = "done";
        } catch (e) {
            item.status = "error";
        }
    }

    renderFiles();
    convertAllBtn.disabled = false;
    convertAllBtn.textContent = "Convert All";
    resultSection.classList.remove("hidden");
}

function convertToJpg(file, quality) {
    return new Promise((resolve, reject) => {
        const img = new Image();
        const reader = new FileReader();

        reader.onload = (e) => {
            img.onload = () => {
                const canvas = document.createElement("canvas");
                canvas.width = img.width;
                canvas.height = img.height;
                const ctx = canvas.getContext("2d");
                ctx.fillStyle = "#FFFFFF";
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(img, 0, 0);
                resolve(canvas.toDataURL("image/jpeg", quality));
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
}

async function downloadZip() {
    const zip = new JSZip();
    filesQueue.forEach((item) => {
        if (item.url) {
            const base64Data = item.url.split(",")[1];
            zip.file(item.file.name.replace(".png", ".jpg"), base64Data, {
                base64: true,
            });
        }
    });
    const content = await zip.generateAsync({ type: "blob" });
    const link = document.createElement("a");
    link.href = URL.createObjectURL(content);
    link.download = "converted_images.zip";
    link.click();

    updateUsages("png-to-jpg");
}
