<div class="max-w-4xl mx-auto">
    <main class="grow flex flex-col gap-4">
        <!-- Upload Card matching image_2b92e2.png layout -->
        <div class="w-full bg-white border border-slate-200 rounded-brand-card p-4">
            <div id="dropZone"
                class="group relative border-2 border-dashed border-brand-accent hover:border-brand-primary bg-indigo-50/50 hover:bg-indigo-50 rounded-brand-card p-8 text-center cursor-pointer transition-all duration-200 overflow-hidden">
                <input type="file" id="fileInput" multiple accept="image/*" class="hidden">

                <div class="max-w-md mx-auto relative z-10 pointer-events-none">
                    <div
                        class="w-16 h-16 mx-auto bg-white/80 border border-indigo-200 rounded-brand-card flex items-center justify-center text-brand-primary">
                        <i class="ti ti-photo text-3xl"></i>
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <div class="inline-flex rounded-br-brand-card shadow-sm">
                            <button id="fakeSelectBtn"
                                class="bg-slate-800 hover:bg-slate-900 text-white px-5 py-2.5 text-xs font-semibold flex items-center gap-2 transition-all">
                                <i class="ti ti-file-import text-sm"></i>
                                <span>Select Images</span>
                            </button>
                            <span class="w-px bg-slate-700"></span>
                            <div
                                class="bg-slate-800 hover:bg-slate-900 text-white px-3 py-2.5 text-xs flex items-center justify-center transition-all">
                                <i class="ti ti-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-1 mt-2">
                        <p class="text-xs sm:text-sm font-medium text-brand-text">
                            or, drag and drop images here
                        </p>
                        <p class="text-[10px] text-brand-accent">
                            Max file size: 50 MB. Secure browser sandbox.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compression Settings collapsible wrapper -->
        <div class="w-full bg-white border border-slate-200 rounded-brand-card overflow-hidden">
            <!-- Accordion Header matching layout -->
            <button id="accordionToggle"
                class="w-full bg-brand-primary text-white px-4 py-3 flex items-center justify-between text-left transition-colors focus:outline-none">
                <span class="text-xs font-bold uppercase tracking-wider flex items-center gap-1.5">
                    <i class="ti ti-settings-automation text-sm"></i>
                    Compression Settings (optional)
                </span>
                <i id="accordionChevron" class="ti ti-chevron-up text-sm transition-transform duration-200"></i>
            </button>

            <!-- Accordion Content Box -->
            <div id="accordionContent"
                class="block border-t border-slate-100 p-5 py-8 bg-white transition-all duration-300 hidden">
                <div class="lg:col-span-5 space-y-4">
                    <div class="flex flex-col md:flex-row items-start justify-between">
                        <div class="space-y-3">
                            <label class="flex items-center space-x-3 cursor-pointer group min-w-75 mt-2">
                                <div class="relative flex items-center justify-center">
                                    <input type="radio" name="compressionMode" id="modeMaxSize" value="maxS
                                   ize" class="sr-only">
                                    <div id="radioCircleSize"
                                        class="w-5 h-5 border-2 border-slate-300 rounded-full flex items-center justify-center group-hover:border-brand-accent transition-all">
                                        <div
                                            class="w-2.5 h-2.5 rounded-full bg-brand-primary scale-0 transition-transform duration-150">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-1.5">
                                    <span class="text-xs font-bold text-slate-700">Max File Size (KB)</span>
                                </div>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <div class="relative flex items-center justify-center">
                                    <input type="radio" name="compressionMode" id="modeQuality" value="quality" checked
                                        class="sr-only">
                                    <div id="radioCircleQuality"
                                        class="w-5 h-5 border-2 border-slate-300 rounded-full flex items-center justify-center group-hover:border-brand-accent transition-all">
                                        <div
                                            class="w-2.5 h-2.5 rounded-full bg-brand-primary scale-0 transition-transform duration-150">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-1.5">
                                    <span class="text-xs font-bold text-slate-700">Quality</span>
                                    <i class="ti ti-help-circle text-slate-400 text-xs cursor-help"
                                        title="Standard quality scale coefficient (10% to 100%)."></i>
                                </div>
                            </label>
                        </div>
                        <div class="relative w-full pb-4">
                            <!-- Floating Tooltip Bubble -->
                            <div id="sliderTooltip"
                                class="absolute bottom-13 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] font-bold px-2 py-1 rounded-brand-card pointer-events-none transition-all flex flex-col items-center">
                                <span id="tooltipVal" class="z-2">75%</span>
                            </div>

                            <!-- Native Custom Range Slider -->
                            <input type="range" id="globalSlider" min="5" max="100" value="75"
                                class="custom-range w-full h-2 bg-slate-200 rounded-brand-card appearance-none cursor-pointer outline-none">

                            <!-- Range Min/Max Labels -->
                            <div class="flex justify-between text-[10px] text-brand-accent font-semibold px-1">
                                <span id="sliderMinLabel">10%</span>
                                <span id="sliderMaxLabel">100%</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-end mt-2 gap-3">
                        <select id="formatSelector"
                            class="bg-slate-50 border border-slate-200 rounded-brand-card py-2 px-2.5 text-xs font-semibold text-slate-600 focus:outline-none focus:ring-1 focus:ring-brand-primary transition-all">
                            <option value="original">Original Format</option>
                            <option value="image/jpeg">JPEG</option>
                            <option value="image/webp">WebP</option>
                            <option value="image/png">PNG</option>
                        </select>
                        <button id="reapplyBtn"
                            class="bg-brand-primary text-white text-sm flex items-center gap-2 py-2 px-3">
                            <i class="ti ti-refresh-dot"></i>
                            <span>Re-compress Queue</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Queue & Summary Dashboard Container (Hidden until files uploaded) -->
        <section id="queueContainer" class="hidden space-y-4 w-full">
            <!-- Batch Stats Overview Bar -->
            <div
                class="bg-white border border-slate-200 rounded-brand-card p-3.5 flex flex-col md:flex-row gap-3 items-center justify-between">
                <div class="flex items-center space-x-2.5">
                    <div
                        class="p-2 bg-indigo-50 rounded-brand-card text-brand-primary border border-indigo-100/50 flex items-center justify-center">
                        <i class="ti ti-chart-bar text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-xs">Batch Process Queue</h4>
                        <p class="text-[10px] text-slate-500 mt-0.5 flex items-center gap-1">
                            <span id="batchCountText" class="font-medium text-slate-600">0 loaded</span>
                            <span class="inline-block w-1 h-1 rounded-full bg-slate-300"></span>
                            <span id="totalSavingsPercent" class="font-bold text-brand-primary">Saved: 0%</span>
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 text-center sm:text-right w-full md:w-auto">
                    <div class="bg-slate-50 px-3 py-1.5 rounded-brand-card border border-slate-100">
                        <p class="text-[8px] uppercase font-bold tracking-wider text-brand-accent">Before Size</p>
                        <p id="totalOriginalSize" class="text-xs font-bold text-slate-700">0 KB</p>
                    </div>
                    <div class="bg-slate-50 px-3 py-1.5 rounded-brand-card border border-slate-100">
                        <p class="text-[8px] uppercase font-bold tracking-wider text-brand-accent">Optimized Size</p>
                        <p id="totalCompressedSize" class="text-xs font-bold text-emerald-600">0 KB</p>
                    </div>
                    <div class="bg-slate-50 px-3 py-1.5 rounded-brand-card border border-slate-100">
                        <p class="text-[8px] uppercase font-bold tracking-wider text-brand-accent">Total Saved</p>
                        <p id="totalSavedAmount" class="text-xs font-bold text-brand-primary">0 KB</p>
                    </div>
                </div>
            </div>

            <!-- Batch Action Handles -->
            <div class="flex items-center justify-between gap-2 flex-wrap">
                <h4 class="font-bold text-sm text-slate-800 tracking-tight flex items-center gap-1.5">
                    <span>Processed Files</span>
                    <span id="queueBadge"
                        class="text-[10px] font-bold text-brand-primary bg-indigo-50 px-1.5 py-0.5 rounded-brand-card border border-indigo-100">0</span>
                </h4>
                <div class="flex items-center space-x-2">
                    <button id="clearAllBtn"
                        class="py-1.5 px-3 bg-white hover:bg-slate-50 text-slate-600 hover:text-slate-800 font-bold text-[11px] rounded-brand-card border border-slate-200 transition-all flex items-center justify-center gap-1">
                        <i class="ti ti-trash"></i>
                        <span>Clear All</span>
                    </button>
                    <button id="downloadZipBtn"
                        class="py-1.5 px-3.5 bg-brand-primary text-white font-bold text-[11px] rounded-brand-card transition-all flex items-center justify-center gap-1">
                        <i class="ti ti-download"></i>
                        <span>Download ZIP</span>
                    </button>
                </div>
            </div>

            <!-- Queue Container Stack -->
            <div id="fileQueue" class="space-y-2 w-full">
                <!-- Queue entries dynamically injected -->
            </div>
        </section>
    </main>
</div>