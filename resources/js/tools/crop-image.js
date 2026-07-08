import "../domain";
import updateUsages from "../count";

// Global State & UI Components references
let cropper = null;
let loadedFile = null;
let exportFormat = "image/png";
let exportQuality = 0.9;
let flipH = false;
let flipV = false;

const dropZone = document.getElementById("drop-zone");
const fileInput = document.getElementById("file-input");
const imageTarget = document.getElementById("image-target");
const editorStage = document.getElementById("editor-stage");
const editorSubbar = document.getElementById("editor-subbar");
const ctaInactiveInfo = document.getElementById("cta-inactive-info");
const ctaActiveActions = document.getElementById("cta-active-actions");

// Formats & Labels elements
const zoomRange = document.getElementById("zoom-range");
const zoomValue = document.getElementById("zoom-value");
const rotateRange = document.getElementById("rotate-range");
const rotateValue = document.getElementById("rotate-value");
const qualityRange = document.getElementById("quality-range");
const qualityValue = document.getElementById("quality-value");
const qualityContainer = document.getElementById("quality-selector-container");
const cropDimensionsText = document.getElementById("crop-dimensions");

function handleFiles(files) {
    if (!files || files.length === 0) return;
    const file = files[0];

    // Basic safety verification
    if (!file.type.startsWith("image/")) {
        return;
    }

    loadedFile = file;
    const reader = new FileReader();

    reader.onload = function (e) {
        initCropper(e.target.result, file.name, file.size);
    };

    reader.readAsDataURL(file);
}

// Demo Images loader helper
function loadDemoImage(url, name) {
    const tempImg = new Image();
    tempImg.crossOrigin = "anonymous";
    tempImg.onload = function () {
        const canvas = document.createElement("canvas");
        canvas.width = tempImg.width;
        canvas.height = tempImg.height;
        const ctx = canvas.getContext("2d");
        ctx.drawImage(tempImg, 0, 0);

        try {
            const dataUrl = canvas.toDataURL("image/jpeg");
            const fakeSize = Math.round(((dataUrl.length - 22) * 3) / 4);
            initCropper(
                dataUrl,
                `${name.toLowerCase().replace(" ", "_")}.jpg`,
                fakeSize,
            );
        } catch (e) {
            initCropper(
                url,
                `${name.toLowerCase().replace(" ", "_")}.jpg`,
                450000,
            );
        }
    };
    tempImg.src = url;
}

// Initialize Cropper workspace
function initCropper(imageSrc, filename, filesize) {
    if (cropper) {
        cropper.destroy();
    }

    imageTarget.src = imageSrc;

    // Set dynamic media file labels
    document.getElementById("loaded-filename").innerText = filename;
    document.getElementById("loaded-filesize").innerText =
        formatBytes(filesize);

    // Toggle Visual Workspace States
    dropZone.classList.add("hidden");
    editorStage.classList.remove("hidden");
    editorSubbar.classList.remove("hidden");
    ctaInactiveInfo.classList.add("hidden");
    ctaActiveActions.classList.remove("hidden");
    ctaActiveActions.classList.add("grid");

    // Reset Slider Controls UI
    zoomRange.value = 1.0;
    zoomValue.innerText = "1.0x";
    rotateRange.value = 0;
    rotateValue.innerText = "0°";
    flipH = false;
    flipV = false;

    imageTarget.onload = function () {
        imageTarget.classList.remove("opacity-0");

        cropper = new Cropper(imageTarget, {
            viewMode: 1,
            dragMode: "move",
            autoCropArea: 0.8,
            responsive: true,
            restore: false,
            modal: true,
            guides: true,
            highlight: true,
            cropBoxMovable: true,
            cropBoxResizable: true,
            toggleDragModeOnDblclick: false,
            ready: function () {
                updateDimensions();
            },
            crop: function (event) {
                updateDimensions();
            },
            zoom: function (event) {
                const ratio = Math.min(Math.max(event.detail.ratio, 0.1), 3);
                zoomRange.value = ratio.toFixed(2);
                zoomValue.innerText = ratio.toFixed(1) + "x";
            },
        });
    };
}

function setAspectRatio(ratio, buttonElement) {
    if (!cropper) return;
    cropper.setAspectRatio(ratio);

    document.querySelectorAll(".aspect-btn").forEach((btn) => {
        btn.classList.remove(
            "border-brand-primary",
            "bg-brand-primary/5",
            "text-brand-primary",
        );
        btn.classList.add("border-slate-200", "text-brand-muted");
    });

    buttonElement.classList.remove("border-slate-200", "text-brand-muted");
    buttonElement.classList.add(
        "border-brand-primary",
        "bg-brand-primary/5",
        "text-brand-primary",
    );
}

function zoomCropper(value) {
    if (!cropper) return;
    cropper.zoom(value);
}

function handleZoomSlider(value) {
    if (!cropper) return;
    const currentData = cropper.getCanvasData();
    const originalWidth = currentData.naturalWidth;
    const newWidth = originalWidth * parseFloat(value);
    cropper.zoomTo(newWidth / originalWidth);
    zoomValue.innerText = parseFloat(value).toFixed(1) + "x";
}

function rotateCropper(degree) {
    if (!cropper) return;
    cropper.rotate(degree);

    const currentData = cropper.getData();
    let currentAngle = Math.round(currentData.rotate) || 0;
    if (currentAngle > 180) currentAngle -= 360;
    if (currentAngle < -180) currentAngle += 360;

    rotateRange.value = currentAngle;
    rotateValue.innerText = currentAngle + "°";
}

function handleRotateSlider(value) {
    if (!cropper) return;
    cropper.rotateTo(value);
    rotateValue.innerText = value + "°";
}

function flipCropper(axis) {
    if (!cropper) return;
    if (axis === "h") {
        flipH = !flipH;
        cropper.scaleX(flipH ? -1 : 1);
    } else {
        flipV = !flipV;
        cropper.scaleY(flipV ? -1 : 1);
    }
}

function setExportFormat(format, buttonElement) {
    exportFormat = format;

    if (format === "image/jpeg" || format === "image/webp") {
        qualityContainer.classList.remove("hidden");
    } else {
        qualityContainer.classList.add("hidden");
    }

    document.querySelectorAll(".format-btn").forEach((btn) => {
        btn.classList.remove(
            "border-brand-primary",
            "bg-brand-primary/5",
            "text-brand-primary",
        );
        btn.classList.add("border-slate-200", "text-brand-muted");
    });

    buttonElement.classList.remove("border-slate-200", "text-brand-muted");
    buttonElement.classList.add(
        "border-brand-primary",
        "bg-brand-primary/5",
        "text-brand-primary",
    );
}

function handleQualitySlider(value) {
    exportQuality = parseFloat(value) / 100;
    qualityValue.innerText = value + "%";
}

function updateDimensions() {
    if (!cropper) return;
    const data = cropper.getData(true);
    cropDimensionsText.innerText = `${data.width} × ${data.height} px`;
}

function cropAndPreview() {
    if (!cropper) return;

    setTimeout(() => {
        try {
            const croppedCanvas = cropper.getCroppedCanvas({
                imageSmoothingEnabled: true,
                imageSmoothingQuality: "high",
            });

            if (!croppedCanvas) return;

            const dataUrl = croppedCanvas.toDataURL(
                exportFormat,
                exportQuality,
            );
            const approximateWeight = Math.round(
                ((dataUrl.length - 22) * 3) / 4,
            );
            const formattedSize = formatBytes(approximateWeight);

            const previewImgResult =
                document.getElementById("preview-img-result");
            previewImgResult.src = dataUrl;

            document.getElementById("preview-dimensions").innerText =
                `${croppedCanvas.width} × ${croppedCanvas.height} px`;
            document.getElementById("preview-size").innerText = formattedSize;
            document.getElementById("preview-format").innerText = exportFormat
                .split("/")[1]
                .toUpperCase();

            const modal = document.getElementById("preview-modal");
            modal.classList.remove("opacity-0", "pointer-events-none");
        } catch (error) {
            console.error(error);
        }
    }, 100);
}

function directDownload() {
    if (!cropper) return;

    try {
        const croppedCanvas = cropper.getCroppedCanvas({
            imageSmoothingEnabled: true,
            imageSmoothingQuality: "high",
        });

        if (!croppedCanvas) return;

        croppedCanvas.toBlob(
            (blob) => {
                if (!blob) return;

                const originalName = loadedFile
                    ? loadedFile.name.substring(
                          0,
                          loadedFile.name.lastIndexOf("."),
                      )
                    : "cropsafe_crop";
                const targetExtension = exportFormat.split("/")[1];
                const generatedFilename = `${originalName}_cropped.${targetExtension}`;

                const blobUrl = URL.createObjectURL(blob);
                const anchor = document.createElement("a");
                anchor.href = blobUrl;
                anchor.download = generatedFilename;

                document.body.appendChild(anchor);
                anchor.click();

                document.body.removeChild(anchor);
                URL.revokeObjectURL(blobUrl);

                 updateUsages("crop-images");
            },
            exportFormat,
            exportQuality,
        );
    } catch (err) {
        console.error(err);
    }
}

function closeModal() {
    const modal = document.getElementById("preview-modal");
    modal.classList.add("opacity-0", "pointer-events-none");
}

function resetWorkspace() {
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
    loadedFile = null;

    imageTarget.src = "";
    imageTarget.classList.add("opacity-0");

    dropZone.classList.remove("hidden");
    editorStage.classList.add("hidden");
    editorSubbar.classList.add("hidden");
    ctaInactiveInfo.classList.remove("hidden");
    ctaActiveActions.classList.add("hidden");
    ctaActiveActions.classList.remove("grid");

    const freeBtn = document.querySelector(
        '#aspect-ratio-selector button[data-ratio="NaN"]',
    );
    if (freeBtn) setAspectRatio(NaN, freeBtn);
}

function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return "0 Bytes";
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ["Bytes", "KB", "MB", "GB"];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + " " + sizes[i];
}

// Prevent default global browser actions
["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
    window.addEventListener(
        eventName,
        (e) => {
            e.preventDefault();
            e.stopPropagation();
        },
        false,
    );
});

// Handle visual cues on drop-zone boundaries cleanly
["dragenter", "dragover"].forEach((eventName) => {
    dropZone.addEventListener(
        eventName,
        (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.add("border-brand-primary", "bg-slate-100");
        },
        false,
    );
});

["dragleave", "drop"].forEach((eventName) => {
    dropZone.addEventListener(
        eventName,
        (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.remove("border-brand-primary", "bg-slate-100");
        },
        false,
    );
});

// Process dropped file safely with propagation blocked
dropZone.addEventListener(
    "drop",
    (e) => {
        e.preventDefault();
        e.stopPropagation();
        const dt = e.dataTransfer;
        if (dt && dt.files && dt.files.length > 0) {
            handleFiles(dt.files);
        }
    },
    false,
);

// Input elements file browse triggers
document
    .getElementById("btn-browse-files")
    .addEventListener("click", function (e) {
        e.stopPropagation();
        fileInput.click();
    });

fileInput.addEventListener("change", function (e) {
    handleFiles(this.files);
});

// Demo loading actions
document
    .getElementById("btn-demo-beach")
    .addEventListener("click", function (e) {
        e.stopPropagation();
        loadDemoImage(
            "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80",
            "Tropical Beach",
        );
    });

document
    .getElementById("btn-demo-landscape")
    .addEventListener("click", function (e) {
        e.stopPropagation();
        loadDemoImage(
            "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80",
            "Mountain Lake",
        );
    });

// Utility Bar Tool Adjustments
document.getElementById("btn-zoom-in").addEventListener("click", function () {
    zoomCropper(0.1);
});

document.getElementById("btn-zoom-out").addEventListener("click", function () {
    zoomCropper(-0.1);
});

document
    .getElementById("btn-rotate-left")
    .addEventListener("click", function () {
        rotateCropper(-90);
    });

document
    .getElementById("btn-rotate-right")
    .addEventListener("click", function () {
        rotateCropper(90);
    });

document.getElementById("btn-flip-h").addEventListener("click", function () {
    flipCropper("h");
});

document.getElementById("btn-flip-v").addEventListener("click", function () {
    flipCropper("v");
});

document
    .getElementById("btn-reset-file")
    .addEventListener("click", function () {
        resetWorkspace();
    });

// Precision Range Sliders
zoomRange.addEventListener("input", function () {
    handleZoomSlider(this.value);
});

rotateRange.addEventListener("input", function () {
    handleRotateSlider(this.value);
});

qualityRange.addEventListener("input", function () {
    handleQualitySlider(this.value);
});

// Aspect Ratio Selector Engine binding
document
    .querySelectorAll("#aspect-ratio-selector .aspect-btn")
    .forEach((btn) => {
        btn.addEventListener("click", function () {
            const ratioStr = this.getAttribute("data-ratio");
            const ratio = ratioStr === "NaN" ? NaN : parseFloat(ratioStr);
            setAspectRatio(ratio, this);
        });
    });

// Format Configuration Selector binding
document
    .querySelectorAll("#export-format-selector .format-btn")
    .forEach((btn) => {
        btn.addEventListener("click", function () {
            const format = this.getAttribute("data-format");
            setExportFormat(format, this);
        });
    });

// Action Workspaces CTAs
document
    .getElementById("btn-crop-preview")
    .addEventListener("click", function () {
        cropAndPreview();
    });

document
    .getElementById("btn-instant-download")
    .addEventListener("click", function () {
        directDownload();
    });

// Preview Modal Control bindings
document
    .getElementById("btn-modal-close")
    .addEventListener("click", function () {
        closeModal();
    });

document
    .getElementById("btn-modal-back")
    .addEventListener("click", function () {
        closeModal();
    });

document
    .getElementById("btn-modal-download")
    .addEventListener("click", function () {
        directDownload();
    });
