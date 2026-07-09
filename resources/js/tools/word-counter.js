import "../domain";
import updateUsages from "../count";
import copyToClipboard from '../clipboard';

const textarea = document.getElementById("text-input");
const wordDisplay = document.getElementById("word-count");
const charDisplay = document.getElementById("char-count");
const timeDisplay = document.getElementById("reading-time");
const sentenceDisplay = document.getElementById("sentence-count");

const copyBtn = document.getElementById("copy-btn");
const clearBtn = document.getElementById("clear-btn");

// Utility to update UI
const updateStats = () => {
    const text = textarea.value.trim();

    // Words
    const words = text ? text.split(/\s+/).filter(Boolean) : [];
    wordDisplay.textContent = words.length;

    // Chars
    charDisplay.textContent = text.length;

    // Reading time (avg 200 wpm)
    const minutes = Math.ceil(words.length / 200);
    timeDisplay.textContent = `${minutes}m`;

    // Sentences (splitting by . ! ?)
    const sentences = text ? text.split(/[.!?]+/).filter(Boolean) : [];
    sentenceDisplay.textContent = sentences.length;
};

// Event Listeners
textarea.addEventListener("input", updateStats);

copyBtn.addEventListener("click", async () => {
    if (!textarea.value) return;

    await copyToClipboard(textarea.value);

    const originalHTML = copyBtn.innerHTML;

    copyBtn.innerHTML = '<i class="ti ti-check"></i> Copied!';

    setTimeout(() => {
        copyBtn.innerHTML = originalHTML;
    }, 2000);
    updateUsages('word-counter')
});

clearBtn.addEventListener("click", () => {
    textarea.value = "";
    updateStats();
});
