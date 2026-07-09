import "../domain";
import updateUsages from "../count";

const passwordOutput = document.getElementById("password-output");
const lengthSlider = document.getElementById("length-slider");
const lengthVal = document.getElementById("length-val");
const generateBtn = document.getElementById("generate-btn");
const copyBtn = document.getElementById("copy-btn");
const saveManagerBtn = document.getElementById("save-manager-btn");
const strengthBar = document.getElementById("strength-bar");
const strengthText = document.getElementById("strength-text");

const upperEl = document.getElementById("upper");
const lowerEl = document.getElementById("lower");
const numberEl = document.getElementById("numbers");
const symbolEl = document.getElementById("symbols");
const excludeEl = document.getElementById("exclude");

const charSets = {
    upper: "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
    lower: "abcdefghijklmnopqrstuvwxyz",
    numbers: "0123456789",
    symbols: "!@#$%^&*()_+~`|}{[]:;?><,./-=",
};

const updateStrength = (password) => {
    if (!password) return;
    const length = password.length;
    const hasUpper = /[A-Z]/.test(password);
    const hasLower = /[a-z]/.test(password);
    const hasNum = /[0-9]/.test(password);
    const hasSym = /[^A-Za-z0-9]/.test(password);

    let score = 0;
    if (length > 12) score += 25;
    if (length > 20) score += 25;
    if (hasUpper && hasLower) score += 20;
    if (hasNum) score += 15;
    if (hasSym) score += 15;

    strengthBar.style.width = score + "%";
    if (score < 40) {
        strengthBar.className = "h-full bg-red-500 transition-all duration-300";
        strengthText.textContent = "Weak";
    } else if (score < 70) {
        strengthBar.className =
            "h-full bg-yellow-500 transition-all duration-300";
        strengthText.textContent = "Good";
    } else {
        strengthBar.className =
            "h-full bg-green-500 transition-all duration-300";
        strengthText.textContent = "Strong";
    }
};

const generatePassword = () => {
    let charset = "";
    if (upperEl.checked) charset += charSets.upper;
    if (lowerEl.checked) charset += charSets.lower;
    if (numberEl.checked) charset += charSets.numbers;
    if (symbolEl.checked) charset += charSets.symbols;

    if (excludeEl.checked) {
        const ambiguous = "Il1O0";
        charset = charset
            .split("")
            .filter((char) => !ambiguous.includes(char))
            .join("");
    }

    if (charset === "") {
        passwordOutput.value = "Select an option";
        return;
    }

    let password = "";
    const length = parseInt(lengthSlider.value);
    const array = new Uint32Array(length);
    window.crypto.getRandomValues(array);

    for (let i = 0; i < length; i++) {
        password += charset[array[i] % charset.length];
    }

    passwordOutput.value = password;
    updateStrength(password);
};

lengthSlider.addEventListener("input", () => {
    lengthVal.textContent = lengthSlider.value;
});

generateBtn.addEventListener("click", generatePassword);

copyBtn.addEventListener("click", async () => {
    if (!passwordOutput.value) return;

    const icon = copyBtn.querySelector("i");

    try {
        if (navigator.clipboard && window.isSecureContext) {
            await navigator.clipboard.writeText(passwordOutput.value);
        } else {
            passwordOutput.select();
            passwordOutput.setSelectionRange(0, 99999);
            document.execCommand("copy");
            window.getSelection().removeAllRanges();
        }

        icon.className = "ti ti-check text-xl text-green-600";

        setTimeout(() => {
            icon.className = "ti ti-copy text-xl";
        }, 1500);

        updateUsages("password-generator");
    } catch (error) {
        console.error("Copy failed:", error);
    }
});

async function copyToClipboard(text) {
    if (navigator.clipboard && window.isSecureContext) {
        return navigator.clipboard.writeText(text);
    }

    const textarea = document.createElement("textarea");
    textarea.value = text;
    textarea.style.position = "fixed";
    textarea.style.left = "-9999px";

    document.body.appendChild(textarea);
    textarea.focus();
    textarea.select();

    document.execCommand("copy");
    textarea.remove();
}

// Save to browser manager simulation
saveManagerBtn.addEventListener("click", async () => {
    if (!passwordOutput.value) return;

    try {
        await copyToClipboard(passwordOutput.value);

        saveManagerBtn.innerHTML =
            '<i class="ti ti-check"></i> Ready to paste in Browser';

        saveManagerBtn.className =
            "btn-secondary w-full flex justify-center items-center gap-2 border-green-600 text-green-700 bg-green-50";

        setTimeout(() => {
            saveManagerBtn.innerHTML =
                '<i class="ti ti-browser-check"></i> Save to Browser Manager';

            saveManagerBtn.className =
                "btn-secondary w-full flex justify-center items-center gap-2";
        }, 3000);
        updateUsages("password-generator");
    } catch (error) {
        console.error("Copy failed:", error);
    }
});
