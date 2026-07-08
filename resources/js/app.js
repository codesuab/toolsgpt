const page = document.body.dataset.page;

(async () => {
    const page = document.body.dataset.page;

    switch (page) {
        case "compress-image":
            await import("./tools/image-compressor.js");
            break;
        case "crop-images":
            await import("./tools/crop-image.js");
            await import("./tools/extra/image-crop/cropper.min.js");
            await import("./tools/extra/image-crop/cropper.min.css");
            break;
    }
})();
