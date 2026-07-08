const page = document.body.dataset.page;

(async () => {
    const page = document.body.dataset.page;

    switch (page) {
        case "compress-image":
            await import("./tools/image-compressor.js");
            break;
    }
})();
