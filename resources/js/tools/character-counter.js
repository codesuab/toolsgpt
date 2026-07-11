import "../domain";
import updateUsages from "../count";

const input = document.getElementById("textInput");
const clearBtn = document.getElementById("clearBtn");
const copyBtn = document.getElementById("copyBtn");
const toolBtns = document.querySelectorAll(".btn-tool");

const stats = {
    chars: document.getElementById("statChars"),
    charsNoSpace: document.getElementById("statCharsNoSpace"),
    words: document.getElementById("statWords"),
    sentences: document.getElementById("statSentences"),
    readTime: document.getElementById("statReadTime"),
};

const updateStats = () => {
    const text = input.value;
    const charCount = text.length;
    const charNoSpaceCount = text.replace(/\s/g, "").length;
    const wordCount = text.trim() ? text.trim().split(/\s+/).length : 0;
    const sentenceCount = text.trim()
        ? text.split(/[.!?]+/).filter((s) => s.trim().length > 0).length
        : 0;
    const readTime = Math.ceil(wordCount / 200);

    stats.chars.textContent = charCount;
    stats.charsNoSpace.textContent = charNoSpaceCount;
    stats.words.textContent = wordCount;
    stats.sentences.textContent = sentenceCount;
    stats.readTime.textContent = `${readTime} min`;
};

input.addEventListener("input", updateStats);

clearBtn.addEventListener("click", () => {
    input.value = "";
    updateStats();
});

copyBtn.addEventListener("click", () => {
    input.select();
    document.execCommand("copy");
    updateUsages('character-count')
});

toolBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        const action = e.target.getAttribute("data-action");
        let val = input.value;
        if (action === "upper") input.value = val.toUpperCase();
        if (action === "lower") input.value = val.toLowerCase();
        if (action === "title") {
            input.value = val
                .toLowerCase()
                .split(" ")
                .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
                .join(" ");
        }
        updateStats();
    });
});
