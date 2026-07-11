import "../domain";
import updateUsages from "../count";
import copyToClipboard from "../clipboard";

const page = document.body.dataset.page;

const tabs = document.querySelectorAll(".tab-trigger");
const contents = document.querySelectorAll(".tab-content");
const actionBtn = document.getElementById("action-btn");
const clearBtn = document.getElementById("clear-btn");
const copyBtn = document.getElementById("copy-btn");
const outputArea = document.getElementById("output-area");
const statusText = document.getElementById("status-text");
const fileInput = document.getElementById("file-input");
const dropZone = document.getElementById("drop-zone");

let currentMode = "decode";

const updateStatus = (msg) => (statusText.textContent = msg);

// Tab Switching
tabs.forEach((tab) => {
    tab.addEventListener("click", (e) => {
        tabs.forEach((t) =>
            t.classList.replace("border-brand-primary", "border-transparent"),
        );
        e.target.classList.replace(
            "border-transparent",
            "border-brand-primary",
        );

        contents.forEach((c) => c.classList.add("hidden"));
        currentMode = e.target.getAttribute("data-tab");
        document
            .getElementById(`content-${currentMode}`)
            .classList.remove("hidden");
        outputArea.value = "";
        updateStatus("");
    });
});

// Processing Logic
actionBtn.addEventListener("click", () => {
    try {
        if (currentMode === "encode") {
            const text = document.getElementById("input-encode").value;
            outputArea.value = btoa(unescape(encodeURIComponent(text)));
            updateStatus("Encoded successfully.");
        } else if (currentMode === "decode") {
            const base64 = document.getElementById("input-decode").value;
            outputArea.value = decodeURIComponent(escape(atob(base64)));
            updateStatus("Decoded successfully.");
        }
    } catch (err) {
        outputArea.value = "";
        updateStatus("Error: Invalid format.");
    }
});

// File Processing
fileInput.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
            outputArea.value = event.target.result;
            updateStatus(`File processed: ${file.name}`);
        };
        reader.readAsDataURL(file);
    }
});

dropZone.addEventListener("click", () => fileInput.click());
dropZone.addEventListener("dragover", (e) => e.preventDefault());
dropZone.addEventListener("drop", (e) => {
    e.preventDefault();
    fileInput.files = e.dataTransfer.files;
    fileInput.dispatchEvent(new Event("change"));
});

// Utilities
clearBtn.addEventListener("click", () => {
    document.querySelectorAll("textarea").forEach((t) => (t.value = ""));
    updateStatus("Cleared.");
});

copyBtn.addEventListener("click", () => {
    if (outputArea.value) {
        copyToClipboard(outputArea.value);
        updateStatus("Copied to clipboard!");
    }
    updateUsages("base64-decode");
});
