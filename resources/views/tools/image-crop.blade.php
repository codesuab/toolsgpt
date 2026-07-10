<!-- MAIN WORKSPACE CONTAINER -->
<main class="w-full grow flex flex-col justify-center items-center">

    <!-- Main Application Workspace Card (Zero Border Radius Style) -->
    <div class="bg-brand-card border border-brand-border flex flex-col w-full max-w-7xl">

        <!-- Cropper Application Workspace Grid -->
        <div id="cropper-app-workspace" class="grid grid-cols-1 lg:grid-cols-12 min-h-137.5">

            <!-- LEFT COLUMN / MAIN VIEWER AREA (Col Span 8) -->
            <div
                class="lg:col-span-8 border-b lg:border-b-0 lg:border-r border-brand-border flex flex-col justify-between bg-slate-50 relative min-h-100">

                <!-- Drag & Drop / Image Loader Area (Initial State) -->
                <div id="drop-zone"
                    class="absolute inset-0 flex flex-col items-center justify-center h-fit md:h-full p-8 transition-all duration-200 ease-in-out cursor-pointer group bg-slate-50 z-10">
                    <input type="file" id="file-input" accept="image/*" class="hidden">

                    <!-- Dashed Border Box with pointer-events-none on texts/icons to prevent bubble glitches -->
                    <div
                        class="w-full h-auto md:h-full border-2 border-dashed border-slate-200 group-hover:border-brand-primary/50 flex flex-col items-center justify-center p-6 transition-colors duration-200 pointer-events-none">
                        <div
                            class="min-w-14 min-h-14 bg-white border border-brand-border flex items-center justify-center mb-5 transition-transform duration-200 group-hover:-translate-y-1">
                            <i class="ti ti-upload text-2xl text-brand-muted group-hover:text-brand-primary"></i>
                        </div>
                        <h3 class="font-space text-lg font-semibold text-brand-text mb-2 text-center">
                            Drag and drop your image here
                        </h3>
                        <p class="text-sm text-brand-muted text-center mb-6 max-w-xs leading-relaxed">
                            Supports PNG, JPG, WebP, and SVG up to 50MB. Safe, instant preview.
                        </p>

                        <!-- Reactivate pointer events for interactive buttons inside the drop zone -->
                        <button type="button" id="btn-browse-files"
                            class="pointer-events-auto px-5 py-2.5 bg-brand-primary hover:bg-brand-primary-hover text-white font-space text-sm font-semibold transition-all duration-150 rounded-none flex items-center gap-2">
                            <i class="ti ti-photo-plus text-base"></i> Browse Files
                        </button>

                        <!-- Demo Image Selector for Quick Test -->
                        <div
                            class="mt-8 pt-6 border-t border-slate-200/60 w-full max-w-xs flex flex-col items-center pointer-events-auto">
                            <span class="text-xs font-semibold uppercase text-slate-400 mb-3">Or try a demo image</span>
                            <div class="flex gap-2.5">
                                <button type="button" id="btn-demo-beach"
                                    class="px-3 py-1.5 border border-slate-200 hover:border-brand-primary bg-white text-xs font-medium text-brand-muted hover:text-brand-primary flex items-center gap-1 transition-all">
                                    <i class="ti ti-beach"></i> Beach
                                </button>
                                <button type="button" id="btn-demo-landscape"
                                    class="px-3 py-1.5 border border-slate-200 hover:border-brand-primary bg-white text-xs font-medium text-brand-muted hover:text-brand-primary flex items-center gap-1 transition-all">
                                    <i class="ti ti-mountain"></i> Landscape
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Preview & Cropper Container (Active State) -->
                <div id="editor-stage"
                    class="hidden grow w-full flex items-center justify-center p-4 sm:p-8 bg-brand-footer-border/5 min-h-87.5 relative">
                    <!-- Raw target image loaded by JS -->
                    <div class="w-full max-h-125 flex items-center justify-center relative">
                        <img id="image-target" src="" alt="Source Image to Crop"
                            class="max-w-full max-h-125 opacity-0 transition-opacity duration-300">
                    </div>

                    <!-- Live Dimension Overlay -->
                    <div
                        class="absolute bottom-4 left-4 bg-black/80 backdrop-blur-sm text-white px-2.5 py-1 text-xs font-space font-medium pointer-events-none flex items-center gap-1.5">
                        <i class="ti ti-arrows-maximize text-xs text-slate-300"></i>
                        <span id="crop-dimensions">0 × 0 px</span>
                    </div>
                </div>

                <!-- Bottom Utility Bar (Active State) -->
                <div id="editor-subbar"
                    class="hidden border-t border-brand-border bg-white px-4 py-3 sm:px-6 flex flex-wrap items-center justify-between gap-4">
                    <!-- Basic Navigation / File Details -->
                    <div class="flex items-center gap-3">
                        <span class="p-1.5 bg-slate-100 text-brand-muted text-sm border border-brand-border">
                            <i class="ti ti-photo text-lg leading-none"></i>
                        </span>
                        <div class="leading-tight">
                            <p id="loaded-filename"
                                class="text-xs sm:text-sm font-semibold text-brand-text truncate max-w-35 sm:max-w-50">
                                image.jpg</p>
                            <p id="loaded-filesize" class="text-[10px] sm:text-xs text-brand-muted">0 KB</p>
                        </div>
                    </div>

                    <!-- Fast Adjustments -->
                    <div class="flex items-center gap-1">
                        <button type="button" id="btn-zoom-in" title="Zoom In"
                            class="p-2 text-brand-muted hover:text-brand-primary hover:bg-slate-50 transition-colors border border-transparent hover:border-brand-border">
                            <i class="ti ti-zoom-in text-lg"></i>
                        </button>
                        <button type="button" id="btn-zoom-out" title="Zoom Out"
                            class="p-2 text-brand-muted hover:text-brand-primary hover:bg-slate-50 transition-colors border border-transparent hover:border-brand-border">
                            <i class="ti ti-zoom-out text-lg"></i>
                        </button>
                        <span class="h-4 w-px bg-slate-200 mx-1"></span>
                        <button type="button" id="btn-rotate-left" title="Rotate Left"
                            class="p-2 text-brand-muted hover:text-brand-primary hover:bg-slate-50 transition-colors border border-transparent hover:border-brand-border">
                            <i class="ti ti-rotate-clockwise-2 text-lg"></i>
                        </button>
                        <button type="button" id="btn-rotate-right" title="Rotate Right"
                            class="p-2 text-brand-muted hover:text-brand-primary hover:bg-slate-50 transition-colors border border-transparent hover:border-brand-border">
                            <i class="ti ti-rotate-clockwise text-lg"></i>
                        </button>
                        <span class="h-4 w-px bg-slate-200 mx-1"></span>
                        <button type="button" id="btn-flip-h" title="Flip Horizontal"
                            class="p-2 text-brand-muted hover:text-brand-primary hover:bg-slate-50 transition-colors border border-transparent hover:border-brand-border">
                            <i class="ti ti-flip-horizontal text-lg"></i>
                        </button>
                        <button type="button" id="btn-flip-v" title="Flip Vertical"
                            class="p-2 text-brand-muted hover:text-brand-primary hover:bg-slate-50 transition-colors border border-transparent hover:border-brand-border">
                            <i class="ti ti-flip-vertical text-lg"></i>
                        </button>
                    </div>

                    <!-- Clear Image Action -->
                    <button type="button" id="btn-reset-file"
                        class="text-xs font-semibold text-rose-600 hover:text-rose-700 font-space flex items-center gap-1 transition-colors">
                        <i class="ti ti-trash"></i> Reset File
                    </button>
                </div>
            </div>

            <!-- RIGHT COLUMN / SETTINGS PANEL (Col Span 4) -->
            <div class="lg:col-span-4 flex flex-col bg-white">

                <!-- Panel Header -->
                <div class="p-5 border-b border-brand-border flex items-center justify-between">
                    <h2 class="font-space font-semibold text-base text-brand-text flex items-center gap-2">
                        <i class="ti ti-adjustments-horizontal text-brand-primary text-xl"></i>
                        Crop Parameters
                    </h2>
                    <span
                        class="px-2 py-0.5 bg-slate-100 text-slate-500 font-mono text-[10px] font-bold">CLIENT-SIDE</span>
                </div>

                <!-- Panel Scroll Area -->
                <div class="p-5 grow space-y-6 overflow-y-auto max-h-125 lg:max-h-[unset]">

                    <!-- Section: Aspect Ratio Presets -->
                    <div>
                        <label class="block font-space text-xs font-bold text-slate-500 uppercase mb-3">Aspect
                            Ratio</label>
                        <div class="grid grid-cols-3 gap-2" id="aspect-ratio-selector">
                            <!-- Custom Free Form -->
                            <button type="button" data-ratio="NaN"
                                class="aspect-btn px-3 py-2 border-2 border-brand-primary bg-brand-primary/5 text-brand-primary font-space text-xs font-bold transition-all text-center">
                                Free
                            </button>
                            <!-- 1:1 Square -->
                            <button type="button" data-ratio="1"
                                class="aspect-btn px-3 py-2 border border-slate-200 hover:border-slate-300 text-brand-muted font-space text-xs font-semibold transition-all text-center">
                                1:1 Square
                            </button>
                            <!-- 16:9 Landscape -->
                            <button type="button" data-ratio="1.7777777778"
                                class="aspect-btn px-3 py-2 border border-slate-200 hover:border-slate-300 text-brand-muted font-space text-xs font-semibold transition-all text-center">
                                16:9 Wide
                            </button>
                            <!-- 4:3 Classical -->
                            <button type="button" data-ratio="1.3333333333"
                                class="aspect-btn px-3 py-2 border border-slate-200 hover:border-slate-300 text-brand-muted font-space text-xs font-semibold transition-all text-center">
                                4:3 Photo
                            </button>
                            <!-- 3:2 Standard DSLR -->
                            <button type="button" data-ratio="1.5"
                                class="aspect-btn px-3 py-2 border border-slate-200 hover:border-slate-300 text-brand-muted font-space text-xs font-semibold transition-all text-center">
                                3:2 Classic
                            </button>
                            <!-- 9:16 Story/Reel -->
                            <button type="button" data-ratio="0.5625"
                                class="aspect-btn px-3 py-2 border border-slate-200 hover:border-slate-300 text-brand-muted font-space text-xs font-semibold transition-all text-center">
                                9:16 Story
                            </button>
                        </div>
                    </div>

                    <!-- Section: Advanced Adjustments Fine-Tuner -->
                    <div class="pt-5 border-t border-slate-100">
                        <label class="block font-space text-xs font-bold text-slate-500 uppercase mb-4">Precision
                            Controls</label>

                        <div class="space-y-4">
                            <!-- Zoom Slider -->
                            <div>
                                <div class="flex justify-between text-xs font-medium text-brand-muted mb-1.5">
                                    <span>Zoom Range</span>
                                    <span id="zoom-value" class="font-mono text-slate-500">1.0x</span>
                                </div>
                                <input type="range" id="zoom-range" min="0.1" max="3" step="0.05" value="1.0"
                                    class="w-full">
                            </div>

                            <!-- Rotation Slider -->
                            <div>
                                <div class="flex justify-between text-xs font-medium text-brand-muted mb-1.5">
                                    <span>Rotate Angle</span>
                                    <span id="rotate-value" class="font-mono text-slate-500">0°</span>
                                </div>
                                <input type="range" id="rotate-range" min="-180" max="180" step="1" value="0"
                                    class="w-full">
                            </div>
                        </div>
                    </div>

                    <!-- Section: Export Format & Settings -->
                    <div class="pt-5 border-t border-slate-100 space-y-4">
                        <label class="block font-space text-xs font-bold text-slate-500 uppercase">Export
                            Configuration</label>

                        <!-- Quality Toggle -->
                        <div>
                            <label class="block text-xs font-medium text-brand-muted mb-2">Export Format</label>
                            <div class="grid grid-cols-3 gap-2" id="export-format-selector">
                                <button type="button" data-format="image/png"
                                    class="format-btn px-3 py-2 border-2 border-brand-primary bg-brand-primary/5 text-brand-primary font-space text-xs font-bold transition-all text-center">
                                    PNG
                                </button>
                                <button type="button" data-format="image/jpeg"
                                    class="format-btn px-3 py-2 border border-slate-200 hover:border-slate-300 text-brand-muted font-space text-xs font-semibold transition-all text-center">
                                    JPEG
                                </button>
                                <button type="button" data-format="image/webp"
                                    class="format-btn px-3 py-2 border border-slate-200 hover:border-slate-300 text-brand-muted font-space text-xs font-semibold transition-all text-center">
                                    WEBP
                                </button>
                            </div>
                        </div>

                        <!-- Quality Range (only valid for JPG and WEBP) -->
                        <div id="quality-selector-container" class="hidden">
                            <div class="flex justify-between text-xs font-medium text-brand-muted mb-1.5">
                                <span>Image Quality</span>
                                <span id="quality-value" class="font-mono text-slate-500">90%</span>
                            </div>
                            <input type="range" id="quality-range" min="10" max="100" value="90" class="w-full">
                        </div>
                    </div>
                </div>

                <!-- Panel Bottom CTA Container -->
                <div class="p-5 border-t border-brand-border bg-slate-50">
                    <!-- Non-active state instruction -->
                    <div id="cta-inactive-info" class="text-xs text-brand-muted text-center py-2">
                        <i class="ti ti-info-circle text-brand-primary text-base inline-block align-middle mr-1"></i>
                        Upload an image to start cropping.
                    </div>

                    <!-- Active State CTAs -->
                    <div id="cta-active-actions" class="hidden grid-cols-1 gap-2">
                        <button type="button" id="btn-crop-preview"
                            class="w-full py-3 bg-brand-accent hover:bg-brand-accent/95 text-white font-space text-sm font-bold uppercase shadow transition-all duration-150 flex items-center justify-center gap-2">
                            <i class="ti ti-crop text-base"></i> Crop & Preview
                        </button>
                        <button type="button" id="btn-instant-download"
                            class="w-full py-3 bg-brand-primary hover:bg-brand-primary-hover text-white font-space text-sm font-bold uppercase shadow transition-all duration-150 flex items-center justify-center gap-2">
                            <i class="ti ti-download text-base"></i> Instant Download
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>

<!-- PREVIEW MODAL -->
<div id="preview-modal"
    class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300">
    <div class="bg-white border border-brand-border max-w-2xl w-full flex flex-col max-h-[90vh] shadow-xl">
        <!-- Modal Header -->
        <div class="p-5 border-b border-brand-border flex items-center justify-between">
            <h3 class="font-space font-bold text-lg text-brand-text flex items-center gap-2">
                <i class="ti ti-photo-check text-green-600 text-xl"></i>
                Cropped Output Preview
            </h3>
            <button type="button" id="btn-modal-close"
                class="text-slate-400 hover:text-slate-600 p-1.5 border border-transparent hover:border-slate-200">
                <i class="ti ti-x text-lg leading-none"></i>
            </button>
        </div>

        <!-- Modal Content (Preview Image Scroll Area) -->
        <div class="p-6 grow overflow-y-auto bg-slate-50 flex flex-col items-center justify-center min-h-75">
            <div
                class="border border-slate-200/80 bg-white p-2 max-w-full max-h-[50vh] flex items-center justify-center overflow-hidden relative">
                <!-- High checkerboard backdrop grid -->
                <div class="absolute inset-0 opacity-10 cropper-bg z-0 pointer-events-none"></div>
                <img id="preview-img-result" class="max-w-full max-h-[45vh] object-contain z-10 relative" src=""
                    alt="Cropped Preview">
            </div>

            <!-- Export stats summary badge -->
            <div class="mt-4 flex flex-wrap justify-center gap-3 text-xs font-semibold text-brand-muted">
                <span class="px-3 py-1 bg-white border border-brand-border" id="preview-dimensions">0 × 0 px</span>
                <span class="px-3 py-1 bg-white border border-brand-border" id="preview-size">0 KB</span>
                <span class="px-3 py-1 bg-white border border-brand-border" id="preview-format">PNG</span>
            </div>
        </div>

        <!-- Modal Footer Controls -->
        <div class="p-5 border-t border-brand-border bg-slate-50 flex items-center justify-end gap-3">
            <button type="button" id="btn-modal-back"
                class="px-4 py-2.5 border border-slate-200 hover:border-slate-300 bg-white text-brand-muted font-space text-sm font-semibold transition-all">
                Back to Edit
            </button>
            <button type="button" id="btn-modal-download"
                class="px-5 py-2.5 bg-brand-primary hover:bg-brand-primary-hover text-white font-space text-sm font-bold flex items-center gap-2 transition-all">
                <i class="ti ti-download"></i> Download Image
            </button>
        </div>
    </div>
</div>