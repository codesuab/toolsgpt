import "../../domain";
import updateUsages from "../../count";

const state = {
    files: [],
};
const dropZone = document.getElementById("drop-zone");
const fileInput = document.getElementById("file-input");
const browseBtn = document.getElementById("browse-btn");
const fileList = document.getElementById("file-list");
const fileListContainer = document.getElementById("file-list-container");
const mergeBtn = document.getElementById("merge-btn");
const clearAllBtn = document.getElementById("clear-all-btn");
const resultSection = document.getElementById("result-section");
const downloadLink = document.getElementById("download-link");
const startNewBtn = document.getElementById("start-new-btn");

// Handle File Selection
const handleFiles = (fileList) => {
    Array.from(fileList).forEach((file) => {
        if (file.type === "application/pdf") {
            state.files.push(file);
        }
    });
    renderFileList();
};

const renderFileList = () => {
    fileList.innerHTML = "";
    if (state.files.length === 0) {
        fileListContainer.classList.add("hidden");
        return;
    }
    fileListContainer.classList.remove("hidden");

    state.files.forEach((file, index) => {
        const li = document.createElement("li");
        li.className =
            "flex items-center justify-between p-3 border-b last:border-0 border-[#e2e8f0] bg-white";
        li.innerHTML = `
                    <div class="flex items-center gap-3">
                        <i class="ti ti-file-pdf text-red-500"></i>
                        <span class="text-sm truncate max-w-50">${file.name}</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <button class="p-1 hover:bg-[#f1f5f9] ${index === 0 ? "opacity-30" : ""}" onclick="moveFile(${index}, -1)" ${index === 0 ? "disabled" : ""}><i class="ti ti-chevron-up"></i></button>
                        <button class="p-1 hover:bg-[#f1f5f9] ${index === state.files.length - 1 ? "opacity-30" : ""}" onclick="moveFile(${index}, 1)" ${index === state.files.length - 1 ? "disabled" : ""}><i class="ti ti-chevron-down"></i></button>
                        <button class="p-1 hover:bg-red-50 text-red-600" onclick="removeFile(${index})"><i class="ti ti-trash"></i></button>
                    </div>
                `;
        fileList.appendChild(li);
    });
};

window.moveFile = (index, direction) => {
    const item = state.files.splice(index, 1)[0];
    state.files.splice(index + direction, 0, item);
    renderFileList();
};

window.removeFile = (index) => {
    state.files.splice(index, 1);
    renderFileList();
};

// Event Listeners
browseBtn.addEventListener("click", () => fileInput.click());
fileInput.addEventListener("change", (e) => handleFiles(e.target.files));

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

clearAllBtn.addEventListener("click", () => {
    state.files = [];
    renderFileList();
});

startNewBtn.addEventListener("click", () => {
    state.files = [];
    renderFileList();
    resultSection.classList.add("hidden");
    fileInput.value = "";
    mergeBtn.disabled = false;
    mergeBtn.innerText = "Merge PDF";
});

mergeBtn.addEventListener("click", async () => {
    if (state.files.length < 2) return;

    mergeBtn.disabled = true;
    mergeBtn.innerText = "Processing...";

    const mergedPdf = await PDFLib.PDFDocument.create();

    for (const file of state.files) {
        const arrayBuffer = await file.arrayBuffer();
        const pdf = await PDFLib.PDFDocument.load(arrayBuffer);
        const copiedPages = await mergedPdf.copyPages(
            pdf,
            pdf.getPageIndices(),
        );
        copiedPages.forEach((page) => mergedPdf.addPage(page));
    }

    const pdfBytes = await mergedPdf.save();
    const blob = new Blob([pdfBytes], { type: "application/pdf" });
    const url = URL.createObjectURL(blob);

    downloadLink.href = url;
    downloadLink.download = "merged-document.pdf";

    resultSection.classList.remove("hidden");
    mergeBtn.disabled = false;
    mergeBtn.innerText = "Merge PDF";

    updateUsages('pdf-merge')
});
