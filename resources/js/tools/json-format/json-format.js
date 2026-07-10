import "../../domain";
import updateUsages from "../../count";

// DOM Elements
const elInput = document.getElementById("json-input");
const elOutput = document.getElementById("json-output");

const btnFormat = document.getElementById("btn-format");
const btnMinify = document.getElementById("btn-minify");
const btnClear = document.getElementById("btn-clear");
const btnCopy = document.getElementById("btn-copy");
const btnUpload = document.getElementById("btn-upload");
const btnDownload = document.getElementById("btn-download");

const fileUpload = document.getElementById("file-upload");
const indentSelect = document.getElementById("indent-select");

const feedbackContainer = document.getElementById("inline-feedback");
const feedbackText = document.getElementById("feedback-text");
const feedbackIcon = document.getElementById("feedback-icon");

let feedbackTimeout;

// Icons for feedback
const iconSuccess = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[var(--color-success)]"><path d="M5 12l5 5l10 -10"></path></svg>`;
const iconError = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[var(--color-error)]"><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M12 8l0 4"></path><path d="M12 16l.01 0"></path></svg>`;

// Helper: Show inline feedback
const showFeedback = (message, type = "success") => {
    clearTimeout(feedbackTimeout);

    feedbackText.textContent = message;
    feedbackText.style.color =
        type === "error" ? "var(--color-error)" : "var(--color-success)";
    feedbackIcon.innerHTML = type === "error" ? iconError : iconSuccess;

    feedbackContainer.classList.remove("opacity-0");
    feedbackContainer.classList.add("opacity-100");

    // If it's an error, maybe highlight the input box subtly
    if (type === "error") {
        elInput.style.borderColor = "var(--color-error)";
    } else {
        elInput.style.borderColor = "var(--color-brand-border)";
    }

    feedbackTimeout = setTimeout(() => {
        feedbackContainer.classList.remove("opacity-100");
        feedbackContainer.classList.add("opacity-0");
        if (type === "error")
            elInput.style.borderColor = "var(--color-brand-border)";
    }, 3000);
};

// Logic: Process JSON
const processJSON = (action) => {
    const rawData = elInput.value.trim();

    if (!rawData) {
        showFeedback("Input is empty", "error");
        elOutput.value = "";
        return;
    }

    try {
        const parsedData = JSON.parse(rawData);
        let result = "";

        if (action === "format") {
            const indentVal = indentSelect.value;
            const space = indentVal === "tab" ? "\t" : parseInt(indentVal, 10);
            result = JSON.stringify(parsedData, null, space);
            showFeedback("Valid JSON Formatted");
        } else if (action === "minify") {
            result = JSON.stringify(parsedData);
            showFeedback("Valid JSON Minified");
        }
        elOutput.innerHTML =result
    } catch (error) {
        let errMsg = error.message;
        // Simplify common error message for better UX
        if (errMsg.includes("Unexpected token")) errMsg = "Invalid token found";
        if (errMsg.includes("Unexpected end")) errMsg = "Incomplete JSON";

        showFeedback(`Invalid JSON: ${errMsg}`, "error");
        elOutput.value = ""; // Clear output on error to prevent confusion
    }
};

// Event Listeners: Main Actions
btnFormat.addEventListener("click", () => processJSON("format"));
btnMinify.addEventListener("click", () => processJSON("minify"));

// Auto-format on indent change if output is already populated
indentSelect.addEventListener("change", () => {
    if (elOutput.value) processJSON("format");
});

// Logic: Clear
btnClear.addEventListener("click", () => {
    elInput.value = "";
    elOutput.value = "";
    elInput.style.borderColor = "var(--color-brand-border)";
    showFeedback("Workspaces cleared");
});

// Logic: Copy to Clipboard
btnCopy.addEventListener("click", async () => {
    const textToCopy = elOutput.value;
    if (!textToCopy) {
        showFeedback("Nothing to copy", "error");
        return;
    }

    try {
        // Fallback for iFrame environments if navigator.clipboard fails
        if (navigator.clipboard && window.isSecureContext) {
            await navigator.clipboard.writeText(textToCopy);
        } else {
            // Legacy execCommand fallback
            elOutput.select();
            document.execCommand("copy");
            window.getSelection().removeAllRanges(); // Deselect
        }
        showFeedback("Copied to clipboard");

        updateUsages("json-formatter");
    } catch (err) {
        showFeedback("Failed to copy", "error");
    }
});

// Logic: File Upload
btnUpload.addEventListener("click", () => {
    fileUpload.click();
});

fileUpload.addEventListener("change", (event) => {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (e) => {
        elInput.value = e.target.result;
        processJSON("format"); // Auto format on upload
        // Reset file input so same file can be uploaded again if cleared
        fileUpload.value = "";
    };
    reader.onerror = () => {
        showFeedback("Error reading file", "error");
    };
    reader.readAsText(file);
});

// Logic: Download
btnDownload.addEventListener("click", () => {
    const content = elOutput.value;
    if (!content) {
        showFeedback("Nothing to download", "error");
        return;
    }

    const blob = new Blob([content], { type: "application/json" });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");

    a.href = url;
    a.download = "formatted.json";
    document.body.appendChild(a);
    a.click();

    document.body.removeChild(a);
    URL.revokeObjectURL(url);
    showFeedback("File downloaded");

    updateUsages("json-formatter");
});

// Logic: Drag and Drop
const handleDragOver = (e) => {
    e.preventDefault();
    e.stopPropagation();
    elInput.style.borderColor = "var(--color-brand-primary)";
    elInput.style.backgroundColor = "#f1f5f9"; // subtle active state
};

const handleDragLeave = (e) => {
    e.preventDefault();
    e.stopPropagation();
    elInput.style.borderColor = "var(--color-brand-border)";
    elInput.style.backgroundColor = "var(--color-brand-card)";
};

const handleDrop = (e) => {
    e.preventDefault();
    e.stopPropagation();
    elInput.style.borderColor = "var(--color-brand-border)";
    elInput.style.backgroundColor = "var(--color-brand-card)";

    if (e.dataTransfer.files && e.dataTransfer.files.length > 0) {
        const file = e.dataTransfer.files[0];
        if (file.type !== "application/json" && !file.name.endsWith(".json")) {
            showFeedback("Please drop a JSON file", "error");
            return;
        }

        const reader = new FileReader();
        reader.onload = (event) => {
            elInput.value = event.target.result;
            processJSON("format");
        };
        reader.readAsText(file);
    }
};

elInput.addEventListener("dragover", handleDragOver);
elInput.addEventListener("dragleave", handleDragLeave);
elInput.addEventListener("drop", handleDrop);
