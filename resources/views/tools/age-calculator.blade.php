<main class="max-w-7xl mx-auto bg-white border border-brand-border p-6 md:p-8">
    <section class="space-y-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
            <div class="flex flex-col gap-2">
                <label for="birthDate" class="text-sm font-semibold text-brand-text">Date of Birth</label>
                <input type="date" id="birthDate"
                    class="w-full p-3 border border-brand-border focus:ring-2 focus:ring-brand-primary focus:outline-none transition-all">
            </div>

            <div class="flex flex-col gap-2">
                <label for="targetDate" class="text-sm font-semibold text-brand-text">Target Date</label>
                <input type="date" id="targetDate"
                    class="w-full p-3 border border-brand-border focus:ring-2 focus:ring-brand-primary focus:outline-none transition-all">
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex gap-3 mt-1 w-full md:w-fit">
            <button id="calculateBtn"
                class="flex-1 px-6 py-3 bg-brand-primary text-white font-semibold hover:bg-brand-primary-hover transition-colors flex items-center justify-center gap-2">
                <i class="ti ti-calendar-stats"></i>
                Calculate
            </button>
            <button id="resetBtn"
                class="px-6 py-3 border border-brand-border text-brand-muted font-semibold hover:bg-slate-50 transition-colors">
                <i class="ti ti-refresh"></i>
            </button>
        </div>
    </section>

    <section id="resultSection" class="mt-8 border-t border-brand-border pt-8 hidden">
        <div class="mb-6">
            <h2 class="text-lg font-bold text-brand-text mb-4">Age Breakdown</h2>

            <!-- Main Summary -->
            <div class="grid grid-cols-3 gap-2 mb-6">
                <div class="p-4 border border-brand-border text-center">
                    <span id="resYears" class="block text-xl md:text-2xl font-bold text-brand-text">0</span>
                    <span class="text-[10px] uppercase text-brand-muted tracking-wide">Years</span>
                </div>
                <div class="p-4 border border-brand-border text-center">
                    <span id="resMonths" class="block text-xl md:text-2xl font-bold text-brand-text">0</span>
                    <span class="text-[10px] uppercase text-brand-muted tracking-wide">Months</span>
                </div>
                <div class="p-4 border border-brand-border text-center">
                    <span id="resDays" class="block text-xl md:text-2xl font-bold text-brand-text">0</span>
                    <span class="text-[10px] uppercase text-brand-muted tracking-wide">Days</span>
                </div>
            </div>

            <!-- Detailed Breakdown List -->
            <div class="space-y-2 text-sm text-brand-text">
                <div class="flex justify-between py-2 border-b border-brand-border">
                    <span class="text-brand-muted">Total Months & Days</span>
                    <span id="detTotalMonths" class="font-mono font-semibold">-</span>
                </div>
                <div class="flex justify-between py-2 border-b border-brand-border">
                    <span class="text-brand-muted">Total Weeks & Days</span>
                    <span id="detTotalWeeks" class="font-mono font-semibold">-</span>
                </div>
                <div class="flex justify-between py-2 border-b border-brand-border">
                    <span class="text-brand-muted">Total Days</span>
                    <span id="detTotalDays" class="font-mono font-semibold">-</span>
                </div>
                <div class="flex justify-between py-2 border-b border-brand-border">
                    <span class="text-brand-muted">Total Hours</span>
                    <span id="detTotalHours" class="font-mono font-semibold">-</span>
                </div>
                <div class="flex justify-between py-2 border-b border-brand-border">
                    <span class="text-brand-muted">Total Minutes</span>
                    <span id="detTotalMinutes" class="font-mono font-semibold">-</span>
                </div>
                <div class="flex justify-between py-2 border-b border-brand-border">
                    <span class="text-brand-muted">Total Seconds</span>
                    <span id="detTotalSeconds" class="font-mono font-semibold">-</span>
                </div>
            </div>
        </div>
    </section>
</main>