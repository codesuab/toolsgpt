import "../domain";
import updateUsages from "../count";
import QRCodeStyling from 'qr-code-styling'

let uploadedLogo = null;

const qrCode = new QRCodeStyling({
    width: 300,
    height: 300,
    data: "https://example.com",
    dotsOptions: { color: "#0f172a", type: "square" },
    backgroundOptions: { color: "#ffffff" },
    imageOptions: { crossOrigin: "anonymous", margin: 10 },
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

const updateQR = () => {
    const config = {
        data: dataInput.value || "https://toolsgpt.com",
        dotsOptions: {
            color: colorInput.value,
            type: dotsTypeInput.value,
        },
        backgroundOptions: { color: bgInput.value },
        qrOptions: { errorCorrectionLevel: eccInput.value },
        cornersSquareOptions: { type: cornerSqInput.value },
        cornersDotOptions: { type: cornerDotInput.value },
        margin: parseInt(marginInput.value) || 0,
    };

    // Fix: Explicitly set image to null if no logo is uploaded
    config.image = uploadedLogo || null;

    qrCode.update(config);
};

const debounce = (func, delay) => {
    let timeout;
    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
    };
};

const debouncedUpdate = debounce(updateQR, 200);

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
    el.addEventListener("input", debouncedUpdate);
});

btnUpload.addEventListener("click", () => logoInput.click());

logoInput.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            uploadedLogo = e.target.result;
            updateQR();
        };
        reader.readAsDataURL(file);
    }
});

btnRemove.addEventListener("click", () => {
    uploadedLogo = null;
    logoInput.value = "";
    updateQR();
});

btnPng.addEventListener("click", () => {
    qrCode.download({ name: "qr-code", extension: "png" });
    updateUsages('qr-code-generator')
});

btnSvg.addEventListener("click", () => {
    qrCode.download({ name: "qr-code", extension: "svg" });
    updateUsages('qr-code-generator')
});
