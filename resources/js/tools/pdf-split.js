import "../domain";
import JSZip from "jszip";
import updateUsages from "../count";


const dropZone = document.getElementById("drop-zone");
const fileInput = document.getElementById("file-input");
const browseBtn = document.getElementById("browse-btn");
const uploadSection = document.getElementById("upload-section");
const workspaceSection = document.getElementById("workspace-section");
const processBtn = document.getElementById("process-btn");
const resetBtn = document.getElementById("reset-btn");
const resultSection = document.getElementById("result-section");
const outputList = document.getElementById("output-list");
const fileNameEl = document.getElementById("file-name");
const downloadAllBtn = document.getElementById("download-all-btn");

let currentFile = null;
let generatedFiles = [];

const handleFile = (file) => {
    if (file && file.type === "application/pdf") {
        currentFile = file;
        fileNameEl.textContent = file.name;
        uploadSection.classList.add("hidden");
        workspaceSection.classList.remove("hidden");
    }
};

browseBtn.addEventListener("click", () => fileInput.click());
fileInput.addEventListener("change", (e) => handleFile(e.target.files[0]));

dropZone.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZone.classList.add("border-blue-600");
});
dropZone.addEventListener("dragleave", () =>
    dropZone.classList.remove("border-blue-600"),
);
dropZone.addEventListener("drop", (e) => {
    e.preventDefault();
    handleFile(e.dataTransfer.files[0]);
});

resetBtn.addEventListener("click", () => {
    uploadSection.classList.remove("hidden");
    workspaceSection.classList.add("hidden");
    resultSection.classList.add("hidden");
    outputList.innerHTML = "";
    fileInput.value = "";
    generatedFiles = [];
});

processBtn.addEventListener("click", async () => {
    if (!currentFile) return;

    processBtn.disabled = true;
    processBtn.textContent = "Processing...";

    try {
        const arrayBuffer = await currentFile.arrayBuffer();
        const pdfDoc = await PDFLib.PDFDocument.load(arrayBuffer);
        const pageCount = pdfDoc.getPageCount();

        generatedFiles = [];
        outputList.innerHTML = "";

        for (let i = 0; i < pageCount; i++) {
            const newPdf = await PDFLib.PDFDocument.create();
            const [page] = await newPdf.copyPages(pdfDoc, [i]);
            newPdf.addPage(page);
            const pdfBytes = await newPdf.save();
            const blob = new Blob([pdfBytes], { type: "application/pdf" });

            const fileName = `${currentFile.name.replace(".pdf", "")}_page_${i + 1}.pdf`;
            generatedFiles.push({ name: fileName, blob });

            const item = document.createElement("div");
            item.className = "flex items-center justify-between py-4";
            item.innerHTML = `
                        <div class="flex items-center gap-3">
                            <i class="ti ti-file-type-pdf text-red-600 text-xl"></i>
                            <span class="text-sm font-medium">${fileName}</span>
                        </div>
                        <a href="${URL.createObjectURL(blob)}" download="${fileName}" class="text-sm text-blue-600 hover:underline" id='single-download'>Download</a>
                    `;
            outputList.appendChild(item);
        }

        resultSection.classList.remove("hidden");
    } catch (err) {
        console.error(err);
    } finally {
        processBtn.disabled = false;
        processBtn.innerHTML = '<i class="ti ti-scissors"></i> Split Document';
    }
});

downloadAllBtn.addEventListener("click", async () => {
    const zip = new JSZip();
    generatedFiles.forEach((f) => zip.file(f.name, f.blob));
    const content = await zip.generateAsync({ type: "blob" });
    const link = document.createElement("a");
    link.href = URL.createObjectURL(content);
    link.download = `split_${currentFile.name.replace(".pdf", "")}.zip`;
    link.click();

    updateUsages('pdf-split')
});

// single download
document.addEventListener("click", function (e) {
    const link = e.target.closest(".single-download");

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

    updateUsages("pdf-split");
});