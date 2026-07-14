import "@tabler/icons-webfont/dist/tabler-icons.min.css";
import "./home.js";
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

// header
document.addEventListener("DOMContentLoaded", () => {
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenuContainer = document.getElementById(
        "mobile-menu-container",
    );
    const mobileMenuPath = document.getElementById("mobile-menu-path");
    const navbar = document.getElementById("navbar");

    if (mobileMenuBtn && mobileMenuContainer) {
        mobileMenuBtn.addEventListener("click", () => {
            const isClosed =
                mobileMenuContainer.style.gridTemplateRows === "0fr" ||
                mobileMenuContainer.style.gridTemplateRows === "";
            if (isClosed) {
                mobileMenuContainer.style.gridTemplateRows = "1fr";
                if (mobileMenuPath) {
                    mobileMenuPath.setAttribute("d", "M6 18L18 6M6 6l12 12");
                }
            } else {
                mobileMenuContainer.style.gridTemplateRows = "0fr";
                if (mobileMenuPath) {
                    mobileMenuPath.setAttribute("d", "M4 6h16M4 12h16M4 18h16");
                }
            }
        });
    }

    // Desktop Mega Menu click behavior
    const megaTrigger = document.getElementById("mega-menu-trigger");
    const megaDropdown = document.getElementById("mega-menu-dropdown");
    const megaChevron = document.getElementById("mega-menu-chevron");

    if (megaTrigger && megaDropdown) {
        // Click behavior to toggle menu
        megaTrigger.addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation();
            const isOpen = !megaDropdown.classList.contains("opacity-0");
            if (isOpen) {
                closeMegaMenu();
            } else {
                openMegaMenu();
            }
        });

        // Close menu when clicking outside of it
        document.addEventListener("click", (e) => {
            if (
                !megaDropdown.contains(e.target) &&
                !megaTrigger.contains(e.target)
            ) {
                closeMegaMenu();
            }
        });
    }

    function openMegaMenu() {
        megaDropdown.classList.remove(
            "opacity-0",
            "scale-95",
            "pointer-events-none",
        );
        megaDropdown.classList.add(
            "opacity-100",
            "scale-100",
            "pointer-events-auto",
        );
        if (megaChevron) megaChevron.classList.add("rotate-180");
    }

    function closeMegaMenu() {
        megaDropdown.classList.add(
            "opacity-0",
            "scale-95",
            "pointer-events-none",
        );
        megaDropdown.classList.remove(
            "opacity-100",
            "scale-100",
            "pointer-events-auto",
        );
        if (megaChevron) megaChevron.classList.remove("rotate-180");
    }

    // Mobile Mega Menu Accordion toggle on click
    const mobileMegaTrigger = document.getElementById("mobile-mega-trigger");
    const mobileMegaContainer = document.getElementById(
        "mobile-mega-content-container",
    );
    const mobileMegaArrow = document.getElementById("mobile-mega-arrow");

    if (mobileMegaTrigger && mobileMegaContainer) {
        mobileMegaTrigger.addEventListener("click", () => {
            const isClosed =
                mobileMegaContainer.style.gridTemplateRows === "0fr" ||
                mobileMegaContainer.style.gridTemplateRows === "";
            if (isClosed) {
                mobileMegaContainer.style.gridTemplateRows = "1fr";
                if (mobileMegaArrow)
                    mobileMegaArrow.classList.add("rotate-180");
            } else {
                mobileMegaContainer.style.gridTemplateRows = "0fr";
                if (mobileMegaArrow)
                    mobileMegaArrow.classList.remove("rotate-180");
            }
        });
    }

    // toggle Search
    const searchModel = document.getElementById("searchModel");
    const searchToggler = document.querySelectorAll("#searchToggler");
    searchToggler.forEach((btn) => {
        btn.addEventListener("click", function () {
            searchModel.classList.toggle("opacity-0");
            searchModel.classList.toggle("pointer-events-none");
        });
    });

    searchModel.addEventListener("click", function (e) {
        if (e.target.getAttribute("id") == "searchModel") {
            searchModel.classList.toggle("opacity-0");
            searchModel.classList.toggle("pointer-events-none");
        }
    });

    // model search
    const modelSearchInput = document.getElementById("modelSearchInput");
    const modelSearchEmpty = document.getElementById("modelSearchEmpty");
    const modelSearchTools = document.getElementById("modelSearchTools");
    const modelSearchSuggest = document.getElementById("modelSearchSuggest");
    const modelSearchEmptyStackHind = document.getElementById(
        "modelSearchEmptyStackHind",
    );
    const modelSearchResultCount = document.getElementById(
        "modelSearchResultCount",
    );
    const modelSearchLinks = document.querySelectorAll(".modelSearchLink");
    const modelSearchSuggestBtn = document.querySelectorAll(
        ".modelSearchSuggestBtn",
    );

    modelSearchSuggestBtn.forEach((btn) => {
        btn.addEventListener("click", function () {
            const name = this.dataset.name;
            if (!name) return;

            modelSearchInput.value = name;
            modelSearchInput.dispatchEvent(new Event("input"));
        });
    });

    modelSearchInput?.addEventListener("input", function () {
        const keyword = this.value.toLowerCase().trim();

        if (keyword !== "") {
            modelSearchSuggest.classList.add("hidden");
            modelSearchTools.classList.remove("hidden");
        } else {
            modelSearchSuggest.classList.remove("hidden");
            modelSearchTools.classList.add("hidden");
        }

        let hasResult = false;
        let resultCount = 0;

        modelSearchLinks.forEach((link) => {
            const match = link.dataset.search.includes(keyword);

            link.classList.toggle("hidden", !match);

            if (match) {
                hasResult = true;
                resultCount++;
            }
        });

        if (modelSearchResultCount) {
            const resultCountSpan =
                modelSearchResultCount.querySelector("span");
            resultCountSpan.textContent = resultCount;
        }

        if (!hasResult && keyword !== "") {
            modelSearchResultCount.classList.add("hidden");
            modelSearchEmpty.classList.remove("hidden");
            modelSearchEmptyStackHind.textContent = keyword;
        } else {
            modelSearchResultCount.classList.remove("hidden");
            modelSearchEmpty.classList.add("hidden");
            modelSearchEmptyStackHind.textContent = "";
        }
    });

    // share options
    const shareBtn = document.getElementById("shareBtn");
    if (shareBtn) {
        shareBtn?.addEventListener("click", async () => {            
            if (!navigator.share) return;
            try {
                await navigator.share({
                    title: shareBtn.dataset.title,
                    text: `Check ${shareBtn.dataset.title}`,
                    url: shareBtn.dataset.url,
                });
            } catch (err) {}
        });
    }

    // scroll
    window.addEventListener("scroll", () => {
        if (window.scrollY > 0) {
            navbar.classList.remove("max-w-360");
            navbar.classList.add("max-w-7xl");
        } else {
            navbar.classList.remove("max-w-7xl");
            navbar.classList.add("max-w-360");
        }
    });
});
