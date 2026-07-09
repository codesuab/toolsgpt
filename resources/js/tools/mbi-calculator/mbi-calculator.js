import "../../domain";
import updateUsages from "../../count";

const form = document.getElementById("bmi-form");
const resultSection = document.getElementById("result-section");
const tabUs = document.getElementById("tab-us");
const tabMetric = document.getElementById("tab-metric");
const fieldsUs = document.getElementById("fields-us");
const fieldsMetric = document.getElementById("fields-metric");
const needle = document.getElementById("gauge-needle");

let currentUnit = "us";

tabUs.addEventListener("click", () => {
    currentUnit = "us";
    tabUs.classList.add("active");
    tabMetric.classList.remove("active");
    fieldsUs.classList.remove("hidden");
    fieldsMetric.classList.add("hidden");
});

tabMetric.addEventListener("click", () => {
    currentUnit = "metric";
    tabMetric.classList.add("active");
    tabUs.classList.remove("active");
    fieldsMetric.classList.remove("hidden");
    fieldsUs.classList.add("hidden");
});

function updateGauge(bmi) {
    const clamped = Math.min(Math.max(bmi, 15), 40);
    const rotation = ((clamped - 15) / 25) * 180 - 90;
    needle.setAttribute("transform", `rotate(${rotation}, 100, 100)`);
}

form.addEventListener("submit", (e) => {
    e.preventDefault();

    let weightKg, heightM;

    if (currentUnit === "us") {
        const feet =
            parseFloat(document.getElementById("height-ft").value) || 0;
        const inches =
            parseFloat(document.getElementById("height-in").value) || 0;
        const lbs =
            parseFloat(document.getElementById("weight-lbs").value) || 0;
        heightM = (feet * 12 + inches) * 0.0254;
        weightKg = lbs * 0.453592;
    } else {
        const cm = parseFloat(document.getElementById("height-cm").value) || 0;
        const kg = parseFloat(document.getElementById("weight-kg").value) || 0;
        heightM = cm / 100;
        weightKg = kg;
    }

    if (heightM > 0 && weightKg > 0) {
        const bmi = weightKg / (heightM * heightM);
        const bmiPrime = bmi / 25;
        const ponderal = weightKg / Math.pow(heightM, 3);

        document.getElementById("bmi-value").textContent = bmi.toFixed(1);

        const cat = document.getElementById("bmi-category");
        if (bmi < 18.5) {
            cat.textContent = "Underweight";
            cat.className =
                "px-4 py-1 text-sm font-bold uppercase text-red-700 bg-red-50";
        } else if (bmi < 25) {
            cat.textContent = "Normal";
            cat.className =
                "px-4 py-1 text-sm font-bold uppercase text-green-700 bg-green-50";
        } else if (bmi < 30) {
            cat.textContent = "Overweight";
            cat.className =
                "px-4 py-1 text-sm font-bold uppercase text-yellow-700 bg-yellow-50";
        } else {
            cat.textContent = "Obese";
            cat.className =
                "px-4 py-1 text-sm font-bold uppercase text-red-700 bg-red-50";
        }

        updateGauge(bmi);

        const minHealthy = 18.5 * (heightM * heightM);
        const maxHealthy = 25 * (heightM * heightM);

        if (currentUnit === "us") {
            document.getElementById("stat-weight").textContent =
                `${(minHealthy / 0.453592).toFixed(1)} - ${(maxHealthy / 0.453592).toFixed(1)} lbs`;
        } else {
            document.getElementById("stat-weight").textContent =
                `${minHealthy.toFixed(1)} - ${maxHealthy.toFixed(1)} kg`;
        }

        document.getElementById("stat-prime").textContent = bmiPrime.toFixed(2);
        document.getElementById("stat-ponderal").textContent =
            ponderal.toFixed(2) + " kg/m³";

        resultSection.classList.remove("hidden");
    }

    updateUsages('bmi-calculator')
});

document.getElementById("reset-btn").addEventListener("click", () => {
    form.reset();
    resultSection.classList.add("hidden");
});
