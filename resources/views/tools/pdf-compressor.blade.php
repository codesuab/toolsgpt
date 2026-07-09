<div class="max-w-7xl w-full mx-auto bg-brand-card border border-brand-border rounded-none p-6 sm:p-8 md:p-10">
    <main>
        <section id="upload-zone"
            class="border-2 border-dashed border-brand-border p-8 sm:p-12 text-center transition-colors hover:border-brand-primary cursor-pointer bg-slate-50 flex flex-col items-center justify-center">
            <input type="file" id="pdf-file-input" class="hidden" accept="application/pdf" />
            <div
                class="w-16 h-16 bg-blue-50 text-brand-primary flex items-center justify-center rounded-none mb-4 border border-blue-100">
                <i class="ti ti-file-upload text-3xl"></i>
            </div>
            <h3 class="text-base font-semibold text-brand-text mb-1">Drag and drop your PDF here</h3>
            <p class="text-xs sm:text-sm text-brand-muted mb-4">or click to browse files from your computer</p>
            <span class="text-xs text-brand-muted bg-white border border-brand-border px-2.5 py-1">Supports files up to
                150 MB</span>
        </section>

        <div id="inline-feedback" class="mt-4 hidden-state p-3 border text-sm flex items-center gap-2">
            <i id="feedback-icon" class="ti"></i>
            <span id="feedback-text"></span>
        </div>

        <section id="workspace-section" class="hidden-state mt-8 space-y-6">

            <!-- File Info Card -->
            <div
                class="border border-brand-border p-4 bg-slate-50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-red-50 text-red-600 flex items-center justify-center border border-red-100 shrink-0">
                        <i class="ti ti-file-type-pdf text-xl"></i>
                    </div>
                    <div class="min-w-0">
                        <h4 id="file-name" class="text-sm font-semibold text-brand-text truncate pr-4">document.pdf</h4>
                        <p class="text-xs text-brand-muted mt-0.5">
                            Size: <span id="file-size">0 KB</span> | Pages: <span id="file-pages">Calculating...</span>
                        </p>
                    </div>
                </div>
                <button id="btn-change-file"
                    class="text-xs text-brand-muted hover:text-red-600 flex items-center gap-1 shrink-0 border border-brand-border bg-white px-3 py-1.5 transition-colors">
                    <i class="ti ti-trash"></i> Remove file
                </button>
            </div>

            <!-- Compression Settings Panel -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 pt-2">
                <!-- Left Column: Presets selection -->
                <div class="md:col-span-7 space-y-4">
                    <h3 class="text-sm font-semibold text-brand-text uppercase tracking-wider">Select Compression Level
                    </h3>

                    <div class="grid grid-cols-1 gap-3">
                        <!-- Preset 1 -->
                        <label
                            class="relative flex items-start border border-brand-primary p-4 cursor-pointer bg-blue-50/30 group">
                            <input type="radio" name="compression-level" value="recommended" checked
                                class="mt-1 text-brand-primary focus:ring-brand-primary border-brand-border"
                                id="radio-recommended" />
                            <span class="ml-3 flex flex-col">
                                <span
                                    class="block text-sm font-semibold text-brand-text group-hover:text-brand-primary transition-colors">Recommended
                                    Compression</span>
                                <span class="block text-xs text-brand-muted mt-1">Excellent balance between resolution
                                    quality and optimized file size savings (Ideal for standard distribution &
                                    emails).</span>
                            </span>
                            <span
                                class="absolute top-4 right-4 bg-blue-100 text-brand-primary text-[10px] font-bold px-2 py-0.5">RECOMMENDED</span>
                        </label>

                        <!-- Preset 2 -->
                        <label
                            class="relative flex items-start border border-brand-border p-4 cursor-pointer bg-white group hover:border-brand-primary transition-colors">
                            <input type="radio" name="compression-level" value="extreme"
                                class="mt-1 text-brand-primary focus:ring-brand-primary border-brand-border"
                                id="radio-extreme" />
                            <span class="ml-3 flex flex-col">
                                <span
                                    class="block text-sm font-semibold text-brand-text group-hover:text-brand-primary transition-colors">Extreme
                                    Compression</span>
                                <span class="block text-xs text-brand-muted mt-1">Maximized size reduction.
                                    Colors/Images may be noticeably downscaled (Ideal when working with strict upload
                                    limits).</span>
                            </span>
                        </label>

                        <!-- Preset 3 -->
                        <label
                            class="relative flex items-start border border-brand-border p-4 cursor-pointer bg-white group hover:border-brand-primary transition-colors">
                            <input type="radio" name="compression-level" value="low"
                                class="mt-1 text-brand-primary focus:ring-brand-primary border-brand-border"
                                id="radio-low" />
                            <span class="ml-3 flex flex-col">
                                <span
                                    class="block text-sm font-semibold text-brand-text group-hover:text-brand-primary transition-colors">Low
                                    Compression</span>
                                <span class="block text-xs text-brand-muted mt-1">Highest visual quality maintained.
                                    Minimal optimizations applied directly to internal file structures.</span>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Right Column: Optimization Toggles -->
                <div
                    class="md:col-span-5 space-y-4 border-t border-brand-border pt-6 md:border-t-0 md:pt-0 md:pl-6 md:border-l md:border-brand-border">
                    <h3 class="text-sm font-semibold text-brand-text uppercase tracking-wider">Advanced Enhancements
                    </h3>

                    <div class="space-y-4">
                        <!-- Toggle 1 -->
                        <label class="flex items-start cursor-pointer">
                            <div class="flex items-center h-5">
                                <input id="chk-remove-metadata" type="checkbox" checked
                                    class="h-4 w-4 text-brand-primary focus:ring-brand-primary border-brand-border rounded-none" />
                            </div>
                            <div class="ml-3 text-sm">
                                <span class="font-medium text-brand-text block">Strip Document Metadata</span>
                                <span class="text-xs text-brand-muted">Removes creator, producer, templates and software
                                    history tags to further save space and safeguard privacy.</span>
                            </div>
                        </label>

                        <!-- Toggle 2 -->
                        <label class="flex items-start cursor-pointer">
                            <div class="flex items-center h-5">
                                <input id="chk-compress-streams" type="checkbox" checked
                                    class="h-4 w-4 text-brand-primary focus:ring-brand-primary border-brand-border rounded-none" />
                            </div>
                            <div class="ml-3 text-sm">
                                <span class="font-medium text-brand-text block">Compress Object Streams</span>
                                <span class="text-xs text-brand-muted">Re-encodes all uncompressed document components
                                    using deflate algorithms. Recommended for multi-page documents.</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-end items-center gap-3">
                <button id="btn-cancel"
                    class="w-full sm:w-auto px-5 py-2.5 text-sm font-medium text-brand-muted border border-brand-border bg-white hover:bg-slate-50 hover:text-brand-text transition-colors">
                    Cancel
                </button>
                <button id="btn-compress"
                    class="w-full sm:w-auto px-6 py-2.5 text-sm font-semibold text-white bg-brand-primary hover:bg-brand-primary-hover transition-colors flex items-center justify-center gap-2">
                    <i class="ti ti-settings-automation"></i> Compress PDF
                </button>
            </div>
        </section>

        
        <section id="processing-section"
            class="hidden-state mt-8 border border-brand-border p-8 text-center space-y-6 bg-slate-50">
            <div class="flex flex-col items-center">
                <!-- Elegant loading spinner -->
                <div class="w-10 h-10 border-2 border-brand-border border-t-brand-primary rounded-full animate-spin mb-4 flex items-center justify-center">
                    <div class="w-8 h-8 bg-brand-primary rounded-full"></div>
                </div>
                <h3 id="processing-title" class="text-base font-semibold text-brand-text font-space">Compressing your
                    document...</h3>
                <p id="processing-subtitle" class="text-xs sm:text-sm text-brand-muted mt-1 max-w-sm">Applying optimized
                    layout stream filters and cleaning metadata tags locally.</p>
            </div>

            <!-- Custom Real-time progress bar layout -->
            <div class="max-w-md mx-auto space-y-2">
                <div class="w-full bg-slate-200 h-2 rounded-none overflow-hidden">
                    <div id="progress-bar-fill" class="bg-brand-primary h-full w-0 transition-all duration-300"></div>
                </div>
                <div class="flex justify-between items-center text-xs text-brand-muted">
                    <span id="progress-status-text">Starting Optimizer...</span>
                    <span id="progress-percentage-text">0%</span>
                </div>
            </div>
        </section>

        <section id="result-section" class="hidden-state mt-8 space-y-6">
            <div class="border border-emerald-200 bg-emerald-50/20 p-6 sm:p-8">
                <div class="flex items-start gap-4">
                    <div
                        class="w-12 h-12 bg-emerald-100 text-emerald-600 flex items-center justify-center border border-emerald-200 shrink-0">
                        <i class="ti ti-check text-2xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-base font-semibold text-emerald-900 font-space">Compression Successfully
                            Completed!</h3>
                        <p class="text-sm text-emerald-700 mt-1">Your download is ready. No data has left your computer.
                        </p>

                        <!-- Size comparison details -->
                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="border border-brand-border bg-white p-4">
                                <span class="block text-xs text-brand-muted uppercase">Original Size</span>
                                <span id="result-orig-size"
                                    class="block text-xl font-bold text-brand-text mt-1 font-space">0 MB</span>
                            </div>
                            <div class="border border-brand-border bg-white p-4">
                                <span class="block text-xs text-brand-muted uppercase">Optimized Size</span>
                                <span id="result-comp-size"
                                    class="block text-xl font-bold text-brand-primary mt-1 font-space font-space">0
                                    MB</span>
                            </div>
                            <div class="border border-emerald-200 bg-emerald-50 p-4">
                                <span class="block text-xs text-emerald-700 uppercase">Space Saved</span>
                                <span id="result-saving-pct"
                                    class="block text-xl font-bold text-emerald-600 mt-1 font-space font-space">-
                                    0%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Download & Finish CTA -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-4">
                <button id="btn-restart"
                    class="w-full sm:w-auto px-5 py-2.5 text-sm font-medium text-brand-muted border border-brand-border bg-white hover:bg-slate-50 hover:text-brand-text transition-colors flex items-center justify-center gap-2">
                    <i class="ti ti-refresh"></i> Compress another file
                </button>

                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <button id="btn-download"
                        class="w-full sm:w-auto px-6 py-3 text-sm font-semibold text-white bg-brand-primary hover:bg-brand-primary-hover transition-colors flex items-center justify-center gap-2">
                        <i class="ti ti-download"></i> Download Compressed PDF
                    </button>
                </div>
            </div>
        </section>
    </main>
</div>