import "../domain";
import updateUsages from "../count";

const birthDateInput = document.getElementById("birthDate");
const targetDateInput = document.getElementById("targetDate");
const calculateBtn = document.getElementById("calculateBtn");
const resetBtn = document.getElementById("resetBtn");
const resultSection = document.getElementById("resultSection");

// Set current date as default for target date
targetDateInput.valueAsDate = new Date();

const formatNumber = (num) => new Intl.NumberFormat().format(num);

const calculateAge = (birthDateValue, targetDateValue) => {
    let d1 = new Date(birthDateValue);
    let d2 = targetDateValue ? new Date(targetDateValue) : new Date();

    if (isNaN(d1.getTime()) || isNaN(d2.getTime())) return null;

    // Ensure we always calculate the difference from the earlier date to the later date
    const birthDate = new Date(Math.min(d1.getTime(), d2.getTime()));
    const targetDate = new Date(Math.max(d1.getTime(), d2.getTime()));

    // Calendar Age Calculation
    let years = targetDate.getFullYear() - birthDate.getFullYear();
    let months = targetDate.getMonth() - birthDate.getMonth();
    let days = targetDate.getDate() - birthDate.getDate();

    if (days < 0) {
        months--;
        const lastMonth = new Date(
            targetDate.getFullYear(),
            targetDate.getMonth(),
            0,
        );
        days += lastMonth.getDate();
    }
    if (months < 0) {
        years--;
        months += 12;
    }

    // Total Milliseconds for other calculations
    const diffMs = targetDate - birthDate;
    const totalDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
    const totalHours = Math.floor(diffMs / (1000 * 60 * 60));
    const totalMinutes = Math.floor(diffMs / (1000 * 60));
    const totalSeconds = Math.floor(diffMs / 1000);

    const weeks = Math.floor(totalDays / 7);
    const remainingDays = totalDays % 7;

    const totalMonths = years * 12 + months;

    return {
        years,
        months,
        days,
        totalMonths,
        weeks,
        remainingDays,
        totalDays,
        totalHours,
        totalMinutes,
        totalSeconds,
    };
};

calculateBtn.addEventListener("click", () => {
    const bValue = birthDateInput.value;
    const tValue = targetDateInput.value;
    if (!bValue) return;

    const age = calculateAge(bValue, tValue);
    if (age) {
        document.getElementById("resYears").textContent = age.years;
        document.getElementById("resMonths").textContent = age.months;
        document.getElementById("resDays").textContent = age.days;

        document.getElementById("detTotalMonths").textContent =
            `${age.totalMonths} months ${age.days} days`;
        document.getElementById("detTotalWeeks").textContent =
            `${age.weeks} weeks ${age.remainingDays} days`;
        document.getElementById("detTotalDays").textContent =
            formatNumber(age.totalDays) + " days";
        document.getElementById("detTotalHours").textContent =
            formatNumber(age.totalHours) + " hours";
        document.getElementById("detTotalMinutes").textContent =
            formatNumber(age.totalMinutes) + " minutes";
        document.getElementById("detTotalSeconds").textContent =
            formatNumber(age.totalSeconds) + " seconds";

        resultSection.classList.remove("hidden");

        updateUsages('age-calculator')
    }
});

resetBtn.addEventListener("click", () => {
    birthDateInput.value = "";
    targetDateInput.valueAsDate = new Date();
    resultSection.classList.add("hidden");
});
