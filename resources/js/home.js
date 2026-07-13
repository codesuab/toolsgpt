import EmblaCarousel from "embla-carousel";
const toolsData = document.body.dataset.tool;

// filter
const grid = document.getElementById("tools-grid");
if (grid) {
    const allCards = [...grid.querySelectorAll(".utilities")];
    const tabButtons = document.querySelectorAll(".tab-btn-item");
    let currentFilter = "all";
    tabButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            tabButtons.forEach((item) => {
                item.classList.remove("tab-btn-active");
                item.classList.add("tab-btn");
            });

            btn.classList.remove("tab-btn");
            btn.classList.add("tab-btn-active");

            currentFilter = btn.dataset.filter || "all";

            filterGallery();
        });
    });

    function filterGallery() {
        const scrollY = window.scrollY;

        let count = 0;

        allCards.forEach((card) => {
            const categories = card.dataset.categories;

            const match =
                currentFilter === "all" ||
                categories === currentFilter.toLowerCase();

            if (match) {
                card.style.display = "";
                count++;
            } else {
                card.style.display = "none";
            }
        });

        const empty = document.getElementById("search-empty-state");

        if (empty) {
            empty.classList.toggle("hidden", count > 0);
        }

        requestAnimationFrame(() => {
            window.scrollTo({
                top: scrollY,
                behavior: "instant",
            });
        });
    }
}

// faq
const faqCards = document.querySelectorAll(".faq-card");
faqCards.forEach((card) => {
    const trigger = card.querySelector(".faq-trigger");
    const content = card.querySelector(".faq-content");
    const chevron = card.querySelector(".faq-chevron svg");

    trigger.addEventListener("click", () => {
        const isActive = card.classList.contains("active");

        // Close all other FAQ cards smoothly
        document.querySelectorAll(".faq-card").forEach((otherCard) => {
            if (otherCard !== card && otherCard.classList.contains("active")) {
                otherCard.classList.remove("active");
                otherCard.querySelector(".faq-content").style.gridTemplateRows =
                    "0fr";
                otherCard
                    .querySelector(".faq-chevron svg")
                    .classList.remove("rotate-180");
                otherCard.classList.remove(
                    "border-brand-primary/30",
                    "shadow-[0_12px_30px_rgba(99,102,241,0.06)]",
                );
            }
        });

        if (isActive) {
            card.classList.remove("active");
            content.style.gridTemplateRows = "0fr";
            chevron.classList.remove("rotate-180");
            card.classList.remove(
                "border-brand-primary/30",
                "shadow-[0_12px_30px_rgba(99,102,241,0.06)]",
            );
        } else {
            card.classList.add("active");
            content.style.gridTemplateRows = "1fr";
            chevron.classList.add("rotate-180");
            card.classList.add(
                "border-brand-primary/30",
                "shadow-[0_12px_30px_rgba(99,102,241,0.06)]",
            );
        }
    });
});

// category slider
const viewport = document.querySelector(".embla__viewport");

if (viewport) {
    const embla = EmblaCarousel(viewport, {
        loop: true,
        align: window.innerWidth < 640 ? "center" : "start",
    });

    document.querySelector("#prevBtn")?.addEventListener("click", () => {
        embla.scrollPrev();
    });

    document.querySelector("#nextBtn")?.addEventListener("click", () => {
        embla.scrollNext();
    });
}
