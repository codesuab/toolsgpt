<main class="max-w-5xl mx-auto">
    <div class="flex flex-col md:flex-row gap-4 justify-center">
        <!-- Input Area -->
        <section class="card p-8 h-fit md:min-w-110">
            <div class="flex mb-8 gap-0">
                <button id="tab-us" class="btn-tab active flex-1 py-3 text-sm">US Units</button>
                <button id="tab-metric" class="btn-tab flex-1 py-3 text-sm">Metric Units</button>
            </div>

            <form id="bmi-form" class="space-y-6">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Age</label>
                        <input type="number" id="age" value="25" min="2" max="120" class="w-full">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Gender</label>
                        <select id="gender" class="w-full">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

                <div id="fields-us" class="grid grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Height (ft)</label>
                        <input type="number" id="height-ft" value="5" class="w-full">
                    </div>
                    <div class="col-span-1">
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Height (in)</label>
                        <input type="number" id="height-in" value="10" class="w-full">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Weight (lbs)</label>
                        <input type="number" id="weight-lbs" value="160" class="w-full">
                    </div>
                </div>

                <div id="fields-metric" class="hidden space-y-6">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Height (cm)</label>
                        <input type="number" id="height-cm" value="178" class="w-full">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Weight (kg)</label>
                        <input type="number" id="weight-kg" value="72" class="w-full">
                    </div>
                </div>

                <div class="flex gap-3 pt-6 border-t border-slate-100">
                    <button type="submit" id="calculate-btn"
                        class="btn-primary flex-2 font-semibold py-3 flex items-center justify-center gap-2">
                        <i class="ti ti-calculator"></i> Calculate Results
                    </button>
                    <button type="button" id="reset-btn" class="btn-secondary flex-1 font-semibold py-3">
                        Clear
                    </button>
                </div>
            </form>
        </section>

        <!-- Result Section -->
        <section id="result-section" class="card p-8 hidden h-fit md:min-w-110">
            <div class="flex justify-between items-center mb-8 pb-4 border-b border-slate-100">
                <h2 class="text-xl font-bold uppercase tracking-wide">Analysis</h2>
                <i class="ti ti-chart-bar text-slate-400"></i>
            </div>

            <div class="mb-10 flex justify-center">
                <svg viewBox="0 0 200 110" class="w-full max-w-75 h-auto">
                    <!-- Background arc -->
                    <path d="M 20 100 A 80 80 0 0 1 180 100" fill="none" stroke="#f1f5f9" stroke-width="24" />
                    <!-- Gauge Sections -->
                    <path d="M 20 100 A 80 80 0 0 1 54 44" fill="#ef4444" stroke="#ef4444" stroke-width="24" />
                    <path d="M 54 44 A 80 80 0 0 1 116 35" fill="#22c55e" stroke="#22c55e" stroke-width="24" />
                    <path d="M 116 35 A 80 80 0 0 1 158 58" fill="#eab308" stroke="#eab308" stroke-width="24" />
                    <path d="M 158 58 A 80 80 0 0 1 180 100" fill="#991b1b" stroke="#991b1b" stroke-width="24" />

                    <!-- Needle -->
                    <g id="gauge-needle" transform="rotate(-90, 100, 100)">
                        <line x1="100" y1="100" x2="100" y2="30" stroke="#0f172a" stroke-width="3" />
                        <circle cx="100" cy="100" r="5" fill="#0f172a" />
                    </g>
                </svg>
            </div>

            <div class="flex flex-col items-center mb-8">
                <div class="text-5xl font-bold text-slate-900 mb-2" id="bmi-value">0.0</div>
                <div id="bmi-category" class="px-4 py-1 text-sm font-bold uppercase text-slate-500 bg-slate-100">---
                </div>
            </div>

            <div class="space-y-4 text-sm text-slate-700">
                <div class="flex justify-between py-2 border-b border-slate-100">
                    <span class="text-slate-500">Healthy BMI Range</span>
                    <span id="stat-range" class="font-semibold text-slate-900">18.5 - 25.0</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-100">
                    <span class="text-slate-500">Healthy Weight</span>
                    <span id="stat-weight" class="font-semibold text-slate-900">--</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-100">
                    <span class="text-slate-500">BMI Prime</span>
                    <span id="stat-prime" class="font-semibold text-slate-900">--</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-slate-500">Ponderal Index</span>
                    <span id="stat-ponderal" class="font-semibold text-slate-900">--</span>
                </div>
            </div>
        </section>
    </div>
</main>