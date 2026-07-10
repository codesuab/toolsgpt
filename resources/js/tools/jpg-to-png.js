import "../domain";
import JSZip from "jszip";
import updateUsages from "../count";

const dropZone = document.getElementById("drop-zone");
const fileInput = document.getElementById("file-input");
const queueContainer = document.getElementById("queue-container");
const fileList = document.getElementById("file-list");
const convertAllBtn = document.getElementById("convert-all");
const clearAllBtn = document.getElementById("clear-all");
const downloadZipBtn = document.getElementById("download-zip");

let fileQueue = [];

dropZone.addEventListener("click", () => fileInput.click());
dropZone.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZone.classList.add("bg-slate-50");
});
dropZone.addEventListener("dragleave", () =>
    dropZone.classList.remove("bg-slate-50"),
);
dropZone.addEventListener("drop", (e) => {
    e.preventDefault();
    dropZone.classList.remove("bg-slate-50");
    handleFiles(e.dataTransfer.files);
});

fileInput.addEventListener("change", (e) => handleFiles(e.target.files));
clearAllBtn.addEventListener("click", () => {
    fileQueue = [];
    renderQueue();
});
convertAllBtn.addEventListener("click", () => processQueue());

fileList.addEventListener("click", (e) => {
    const btn = e.target.closest('[data-action="download"]');
    if (btn) {
        const id = btn.getAttribute("data-id");
        const item = fileQueue.find((i) => i.id == id);
        if (item && item.url) {
            const link = document.createElement("a");
            link.href = item.url;
            link.download = item.file.name.replace(/\.[^/.]+$/, "") + ".png";
            link.click();
            updateUsages('jpg-to-png')
        }
    }
});

downloadZipBtn.addEventListener("click", async () => {
    const zip = new JSZip();
    const completed = fileQueue.filter((item) => item.status === "completed");

    for (const item of completed) {
        const response = await fetch(item.url);
        const blob = await response.blob();
        const fileName = item.file.name.replace(/\.[^/.]+$/, "") + ".png";
        zip.file(fileName, blob);
    }

    const content = await zip.generateAsync({ type: "blob" });
    const link = document.createElement("a");
    link.href = URL.createObjectURL(content);
    link.download = "converted_images.zip";
    link.click();

    updateUsages('jpg-to-png')
});

function handleFiles(files) {
    Array.from(files).forEach((file) => {
        if (file.type.startsWith("image/jpeg")) {
            fileQueue.push({
                id: Date.now() + Math.random(),
                file,
                status: "pending",
                url: null,
            });
        }
    });
    renderQueue();
}

function renderQueue() {
    if (fileQueue.length === 0) {
        queueContainer.classList.add("hidden");
        return;
    }
    queueContainer.classList.remove("hidden");

    const hasCompleted = fileQueue.some((item) => item.status === "completed");
    downloadZipBtn.classList.toggle("hidden", !hasCompleted);

    fileList.innerHTML = "";
    fileQueue.forEach((item) => {
        const row = document.createElement("div");
        row.className =
            "flex items-center justify-between p-4 bg-white hover:bg-slate-50 transition-colors";

        let statusHtml = "";
        if (item.status === "pending") {
            statusHtml = '<span class="text-xs text-slate-400">Pending</span>';
        } else if (item.status === "processing") {
            statusHtml =
                '<span class="text-xs text-blue-600 font-medium">Converting...</span>';
        } else if (item.status === "completed") {
            statusHtml = `
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-bold text-emerald-600">Converted</span>
                            <button data-id="${item.id}" data-action="download" class="text-xs text-blue-600 hover:underline font-medium">Download</button>
                        </div>
                    `;
        } else {
            statusHtml = '<span class="text-xs text-red-500">Error</span>';
        }

        row.innerHTML = `
                    <div class="flex items-center gap-3">
                        <div class="text-[10px] font-bold text-slate-400 uppercase border border-slate-200 px-1 py-0.5">JPG</div>
                        <div>
                            <p class="text-xs font-medium text-slate-900">${item.file.name}</p>
                            <p class="text-[10px] text-slate-500">${(item.file.size / 1024).toFixed(1)} KB</p>
                        </div>
                    </div>
                    <div>${statusHtml}</div>
                `;
        fileList.appendChild(row);
    });
}

async function processQueue() {
    for (let item of fileQueue) {
        if (item.status !== "pending") continue;
        item.status = "processing";
        renderQueue();
        try {
            const canvas = await convertToPng(item.file);
            item.url = canvas.toDataURL("image/png");
            item.status = "completed";
        } catch (e) {
            item.status = "error";
        }
        renderQueue();
    }
}

function convertToPng(file) {
    return new Promise((resolve) => {
        const reader = new FileReader();
        reader.onload = (e) => {
            const img = new Image();
            img.onload = () => {
                const canvas = document.createElement("canvas");
                canvas.width = img.width;
                canvas.height = img.height;
                const ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0);
                resolve(canvas);
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
}
