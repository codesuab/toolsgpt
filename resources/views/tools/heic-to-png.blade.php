<main class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
    <!-- Left Panel: Configurations, Controls & Real-time Stats -->
    <section class="lg:col-span-4 space-y-4 order-1">

        <!-- Format & Settings Card -->
        <div class="bg-brand-card border border-brand-border p-6 rounded-none-important">
            <h2
                class="text-md font-bold text-brand-text font-space uppercase tracking-wider border-b border-brand-border pb-3 mb-4 flex items-center gap-2">
                <i class="ti ti-adjustments-horizontal text-lg text-brand-primary"></i> Conversion Settings
            </h2>

            <div class="space-y-5">
                <!-- Format Selection -->
                <div>
                    <label for="formatSelect"
                        class="block text-xs font-semibold text-brand-text uppercase tracking-wider mb-2">Output
                        Format</label>
                    <div class="grid grid-cols-2 gap-2">
                        <button type="button" id="btnFormatJpg"
                            class="btn-tab px-4 py-2 text-center text-sm font-medium border border-brand-primary bg-brand-primary text-white rounded-none-important focus:outline-none transition-all">
                            JPEG
                        </button>
                        <button type="button" id="btnFormatPng"
                            class="btn-tab px-4 py-2 text-center text-sm font-medium border border-brand-border bg-white text-brand-muted hover:text-brand-text rounded-none-important focus:outline-none transition-all">
                            PNG
                        </button>
                    </div>
                    <input type="hidden" id="formatSelect" value="image/jpeg">
                </div>

                <!-- Quality Slider -->
                <div id="qualitySettingsContainer">
                    <div class="flex justify-between items-center mb-1">
                        <label for="qualitySlider"
                            class="block text-xs font-semibold text-brand-text uppercase tracking-wider">Image
                            Quality</label>
                        <span id="qualityValue" class="text-xs font-bold text-brand-primary font-space">85%</span>
                    </div>
                    <input type="range" id="qualitySlider" min="10" max="100" value="85"
                        class="w-full h-1 bg-slate-200 accent-brand-primary cursor-pointer appearance-none rounded-none-important">
                    <p class="text-[10px] text-brand-muted mt-1.5 leading-relaxed">
                        Lowering quality reduces file size. Balanced configuration recommended for standard photos.
                    </p>
                </div>

                <!-- Render Settings Flag (Keep/Strip Metadata) -->
                <div class="border-t border-brand-border pt-4">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="stripMetadata" type="checkbox" checked
                                class="focus:ring-brand-primary h-4 w-4 text-brand-primary border-brand-border rounded-none-important">
                        </div>
                        <div class="ml-3 text-xs">
                            <label for="stripMetadata" class="font-semibold text-brand-text">Optimize Assets</label>
                            <p class="text-brand-muted text-[11px] mt-0.5">Strip native HEIC EXIF metadata to
                                maximize compression gains.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Global Action Execution Block -->
        <div class="space-y-3">
            <button id="btnConvertAll" disabled
                class="w-full py-3 bg-brand-primary hover:bg-brand-primary-hover disabled:bg-slate-200 disabled:text-slate-400 disabled:cursor-not-allowed text-white font-space font-semibold text-sm uppercase tracking-wider transition-colors flex items-center justify-center gap-2 rounded-none-important">
                <i class="ti ti-wand text-lg"></i> Run Conversion Queue
            </button>
            <div class="grid grid-cols-2 gap-2">
                <button id="btnDownloadAll" disabled
                    class="py-2 px-3 border border-brand-border hover:bg-slate-50 disabled:bg-slate-100 disabled:text-slate-300 disabled:cursor-not-allowed text-brand-text font-space text-xs uppercase tracking-wider font-semibold transition-colors flex items-center justify-center gap-1.5 rounded-none-important">
                    <i class="ti ti-download text-md"></i> Export ZIP
                </button>
                <button id="btnClearQueue" disabled
                    class="py-2 px-3 border border-brand-border hover:bg-red-50 hover:text-red-700 hover:border-red-200 disabled:bg-slate-100 disabled:text-slate-300 disabled:cursor-not-allowed text-brand-muted font-space text-xs uppercase tracking-wider font-semibold transition-colors flex items-center justify-center gap-1.5 rounded-none-important">
                    <i class="ti ti-trash text-md"></i> Clear List
                </button>
            </div>
        </div>
    </section>

    <!-- Right Panel: Interactive Dropzone & Dynamic Conversion List -->
    <section class="lg:col-span-8 space-y-4 order-0">

        <!-- Interactive Upload / Drop Area -->
        <div id="dropzone"
            class="border-2 border-dashed border-slate-300 bg-brand-card hover:bg-slate-50/50 hover:border-brand-primary transition-colors p-8 flex flex-col items-center justify-center text-center cursor-pointer group rounded-none-important">
            <input type="file" id="fileInput" class="hidden" multiple accept=".heic,.heif">
            <div
                class="w-12 h-12 bg-slate-100 text-brand-muted group-hover:text-brand-primary group-hover:bg-blue-50 transition-colors flex items-center justify-center mb-4 rounded-none-important">
                <i class="ti ti-cloud-upload text-2xl"></i>
            </div>
            <p class="text-sm font-semibold text-brand-text font-space uppercase tracking-wider mb-1">
                Drag and drop your HEIC / HEIF files here
            </p>
            <p class="text-xs text-brand-muted max-w-xs mb-3">
                or click to browse local files (Supports batch processing)
            </p>
            <span
                class="px-2.5 py-1 text-[10px] font-medium bg-slate-100 border border-brand-border text-slate-500 rounded-none uppercase tracking-wide">
                MAX 50MB PER IMAGE
            </span>
        </div>

        <!-- Queue Status Panel -->
        <div class="bg-brand-card border border-brand-border rounded-none-important flex flex-col min-h-87.5">
            <div
                class="px-6 py-4 border-b border-brand-border flex flex-col md:flex-row md:items-center justify-between space-y-2 md:space-y-0">
                <h3 class="text-sm font-bold text-brand-text font-space uppercase tracking-wider">
                    Active Queue <span id="queueCounterBadge"
                        class="ml-1 px-2 py-0.5 text-xs font-semibold bg-slate-100 text-brand-muted rounded-none-important font-space">0</span>
                </h3>
                <div class="flex items-center gap-4 text-xs">
                    <span class="flex items-center gap-1.5 text-slate-500">
                        <span class="w-2.5 h-2.5 bg-slate-200 border border-slate-300 inline-block"></span> Queued
                    </span>
                    <span class="flex items-center gap-1.5 text-brand-primary">
                        <span class="w-2.5 h-2.5 bg-blue-500 inline-block"></span> Converting
                    </span>
                    <span class="flex items-center gap-1.5 text-emerald-600">
                        <span class="w-2.5 h-2.5 bg-emerald-500 inline-block"></span> Done
                    </span>
                </div>
            </div>

            <!-- Dynamic Queue Container -->
            <div id="queueContainer" class="divide-y divide-brand-border overflow-y-auto max-h-[480px] flex-1">
                <!-- Empty Queue State -->
                <div id="emptyQueueState" class="flex flex-col items-center justify-center py-20 text-center">
                    <i class="ti ti-photo-off text-4xl text-slate-300 mb-3"></i>
                    <p class="text-xs font-semibold text-brand-text font-space uppercase tracking-wider">No files
                        selected</p>
                    <p class="text-xs text-brand-muted mt-1 max-w-xs">
                        Upload your Apple HEIC photos using the dropzone above to configure your batch run.
                    </p>
                </div>
            </div>
        </div>

        <!-- Diagnostic Notification Banner -->
        <div id="statusBanner" class="hidden p-4 border text-xs flex items-start gap-2.5 rounded-none-important">
            <i id="statusIcon" class="ti text-lg mt-0.5"></i>
            <div class="flex-1">
                <p id="statusMessage" class="font-semibold"></p>
            </div>
            <button id="btnCloseBanner" class="text-slate-400 hover:text-slate-600"><i
                    class="ti ti-x text-md"></i></button>
        </div>

    </section>
</main>