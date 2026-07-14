import "../domain";
import updateUsages from "../count";
import QRCodeStyling from "qr-code-styling";

// logic
let uploadedLogo = null;

const qrCode = new QRCodeStyling({
    width: 300,
    height: 300,
    data: "https://example.com",

    dotsOptions: {
        color: "#0f172a",
        type: "square",
    },

    backgroundOptions: {
        color: "#ffffff",
    },

    imageOptions: {
        crossOrigin: "anonymous",
        margin: 8,
        imageSize: 0.25,
        hideBackgroundDots: true,
    },
});

const canvasContainer = document.getElementById("qr-canvas");
qrCode.append(canvasContainer);
const dataInput = document.getElementById("qr-data");
const colorInput = document.getElementById("qr-color");
const bgInput = document.getElementById("qr-bg");
const eccInput = document.getElementById("qr-ecc");
const dotsTypeInput = document.getElementById("qr-dots-type");
const cornerSqInput = document.getElementById("qr-corner-sq");
const cornerDotInput = document.getElementById("qr-corner-dot");
const marginInput = document.getElementById("qr-margin");
const logoInput = document.getElementById("qr-logo-input");

const btnUpload = document.getElementById("btn-upload-logo");
const btnRemove = document.getElementById("btn-remove-logo");
const btnPng = document.getElementById("btn-download-png");
const btnSvg = document.getElementById("btn-download-svg");

const qrLoading = document.getElementById("qr-loading");
const logoSizeInput = document.getElementById("qr-logo-size");
const logoSizeValue = document.getElementById("qr-logo-size-value");

const updateQR = () => {
    qrLoading.classList.remove("hidden");

    const config = {
        data: dataInput.value.trim() || "https://toolsgpt.com",

        dotsOptions: {
            color: colorInput.value,
            type: dotsTypeInput.value,
        },

        backgroundOptions: {
            color: bgInput.value,
        },

        qrOptions: {
            errorCorrectionLevel: eccInput.value,
        },

        cornersSquareOptions: {
            type: cornerSqInput.value,
        },

        cornersDotOptions: {
            type: cornerDotInput.value,
        },

        margin: Number(marginInput.value) || 0,

        imageOptions: {
            crossOrigin: "anonymous",
            margin: 8,
            imageSize: Number(logoSizeInput.value),
            hideBackgroundDots: true,
        },
    };

    if (uploadedLogo) {
        config.image = uploadedLogo;
    }

    qrCode.update(config);

    setTimeout(() => {
        qrLoading.classList.add("hidden");
    }, 400);
};

const debounce = (fn, delay = 200) => {
    let timer;

    return (...args) => {
        clearTimeout(timer);

        timer = setTimeout(() => {
            fn(...args);
        }, delay);
    };
};

const debouncedUpdate = debounce(updateQR);
[
    dataInput,
    colorInput,
    bgInput,
    eccInput,
    dotsTypeInput,
    cornerSqInput,
    cornerDotInput,
    marginInput,
].forEach((el) => {
    el?.addEventListener("input", debouncedUpdate);
});

btnUpload?.addEventListener("click", () => logoInput.click());

logoInput.addEventListener("change", (e) => {
    const file = e.target.files?.[0];

    if (!file) return;

    if (file.size > 1024 * 1024) {
        alert("Maximum 1MB image allowed");

        logoInput.value = "";

        return;
    }

    qrLoading.classList.remove("hidden");

    const img = new Image();

    img.onload = () => {
        const canvas = document.createElement("canvas");

        const size = 200;

        canvas.width = size;

        canvas.height = size;

        const ctx = canvas.getContext("2d");

        ctx.drawImage(img, 0, 0, size, size);

        uploadedLogo = canvas.toDataURL("image/png", 0.9);

        qrCode.update({
            image: uploadedLogo,

            imageOptions: {
                crossOrigin: "anonymous",
                margin: 8,
                imageSize: 0.25,
                hideBackgroundDots: true,
            },
        });

        setTimeout(() => {
            qrLoading.classList.add("hidden");
        }, 300);

        URL.revokeObjectURL(img.src);
    };

    img.onerror = () => {
        qrLoading.classList.add("hidden");

        alert("Image load failed");
    };

    img.src = URL.createObjectURL(file);
});

logoSizeInput?.addEventListener("input", () => {

    logoSizeValue.textContent =
        Math.round(Number(logoSizeInput.value) * 100) + "%";

    debouncedUpdate();

});

btnRemove?.addEventListener("click", () => {
    uploadedLogo = null;

    logoInput.value = "";

    qrCode.update({
        image: null,
    });
});

btnPng?.addEventListener("click", () => {
    qrCode.download({
        name: "qr-code",

        extension: "png",
    });

    updateUsages("qr-code-generator");
});

btnSvg?.addEventListener("click", () => {
    qrCode.download({
        name: "qr-code",

        extension: "svg",
    });

    updateUsages("qr-code-generator");
});
