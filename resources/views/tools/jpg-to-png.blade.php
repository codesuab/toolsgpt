<main class="max-w-4xl mx-auto">

    <!-- Main Workspace -->
    <div class="border border-brand-border bg-white">

        <!-- Input Area -->
        <div class="p-5">
            <div id="drop-zone"
                class="p-12 border border-dashed border-brand-primary text-center cursor-pointer hover:bg-slate-50 transition-colors">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                        class="text-brand-primary mb-3">
                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                        <path d="M12 8l0 8" />
                        <path d="M9 11l3 3l3 -3" />
                    </svg>
                    <p class="text-sm font-medium">Click to upload or drag and drop</p>
                    <p class="text-xs text-brand-muted mt-1">JPEG/JPG files</p>
                    <input type="file" id="file-input" multiple accept="image/jpeg,image/jpg" class="hidden">
                </div>
            </div>
        </div>

        <!-- Queue Area -->
        <div class="hidden" id="queue-container">
            <div class="flex flex-col md:flex-row gap-y-3 md:gap-y-0 md:items-center md:justify-between p-4 pt-0 border-b border-brand-border bg-slate-50/50">
                <h2 class="text-xs font-bold uppercase tracking-wider">Queue</h2>
                <div class="flex gap-2">
                    <button id="clear-all" class="btn-secondary text-xs">Clear</button>
                    <button id="convert-all" class="btn-primary text-xs">Convert All</button>
                    <button id="download-zip"
                        class="hidden btn-primary bg-brand-secondary hover:bg-brand-secondary/90 text-xs text-white">Download
                        All (ZIP)</button>
                </div>
            </div>

            <div id="file-list" class="divide-y divide-brand-border">
                <!-- Files injected dynamically -->
            </div>
        </div>

    </div>
</main>