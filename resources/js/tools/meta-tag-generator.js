import "../domain";
import updateUsages from "../count";

const form = document.getElementById("metaForm");
const output = document.getElementById("output-code");
const copyBtn = document.getElementById("btn-copy");
const feedback = document.getElementById("copy-feedback");

function generateMeta() {
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    const ogImg = document.getElementById("input-og-img").value;

    const tags = [
        `<!-- Primary Meta Tags -->`,
        `<title>${data.title || "Page Title"}</title>`,
        `<meta name="description" content="${data.description || ""}">`,
        `<meta name="keywords" content="${data.keywords || ""}">`,
        `<link rel="canonical" href="${data.canonical || ""}">`,
        ``,
        `<!-- Open Graph / Facebook -->`,
        `<meta property="og:type" content="website">`,
        `<meta property="og:title" content="${data.title || ""}">`,
        `<meta property="og:description" content="${data.description || ""}">`,
        `<meta property="og:image" content="${ogImg || ""}">`,
        ``,
        `<!-- Twitter -->`,
        `<meta name="twitter:card" content="summary_large_image">`,
        `<meta name="twitter:title" content="${data.title || ""}">`,
        `<meta name="twitter:description" content="${data.description || ""}">`,
    ].join("\n");

    output.textContent = tags;
}

function copyContent() {
    const text = output.textContent;
    const textarea = document.createElement("textarea");
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand("copy");
    document.body.removeChild(textarea);

    feedback.classList.remove("hidden");
    setTimeout(() => feedback.classList.add("hidden"), 2000);

    updateUsages("meta-tag-generator");
}

form.addEventListener("input", generateMeta);
copyBtn.addEventListener("click", copyContent);

// Initial call
generateMeta();
