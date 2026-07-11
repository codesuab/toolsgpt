const page = document.body.dataset.page;

(async () => {
    const page = document.body.dataset.page;

    switch (page) {
        case "compress-image":
            await import("./tools/image-compressor.js");
            break;
        case "crop-images":
            await import("./tools/image-crop/crop-image.js");
            await import("./tools/image-crop/cropper.min.js");
            await import("./tools/image-crop/cropper.min.css");
            break;
        case "pdf-compressor":
            await import("./tools/pdf-compressor/pdf-lib.min.js");
            await import("./tools/pdf-compressor/pdf-compressor.js");
            await import("./tools/pdf-compressor/pdf.css");
            break;
        case "json-formatter":
            await import("./tools/json-format/json-format.js");
            await import("./tools/json-format/json-format.css");
            break;
        case "age-calculator":
            await import("./tools/age-calculator.js");
            break;
        case "bmi-calculator":
            await import("./tools/mbi-calculator/mbi-calculator.js");
            await import("./tools/mbi-calculator/bmi-calculator.css");
            break;
        case "password-generator":
            await import("./tools/password-generator.js");
            break;
        case "word-counter":
            await import("./tools/word-counter.js");
            break;
        case "jpg-to-png":
            await import("./tools/jpg-to-png.js");
            break;
        case "png-to-jpg":
            await import("./tools/png-to-jpg.js");
            break;
        case "qr-code-generator":
            await import("./tools/qr-code-generator.js");
            break;
        case "pdf-merge":
            await import("./tools/pdf-merge/pdf-lib.min.js");
            await import("./tools/pdf-merge/pdf-merge.js");
            break;
        case "pdf-split":
            await import("./tools/pdf-merge/pdf-lib.min.js");
            await import("./tools/pdf-split.js");
            break;
        case "character-count":
            await import("./tools/character-counter.js");
            break;
        case "base64-encoder":
            await import("./tools/base64-encoder.js");
            break;
        case "base64-decode":
            await import("./tools/base64-decode.js");
            break;
        case "meta-tag-generator":
            await import("./tools/meta-tag-generator..js");
            break;
    }
})();
