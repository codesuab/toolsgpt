<main class="max-w-4xl mx-auto">
    <section id="workspace" class="bg-white border border-brand-border p-6 mb-8">
        <!-- Drop Zone -->
        <div id="drop-zone"
            class="border-2 border-dashed border-brand-border p-12 flex flex-col items-center justify-center text-center cursor-pointer transition-all hover:border-brand-primary mb-8">
            <i class="ti ti-upload text-4xl text-brand-primary mb-4"></i>
            <h3 class="text-lg font-semibold mb-1">Drag & drop files here</h3>
            <p class="text-brand-muted text-sm mb-4">or click to browse from your computer</p>
            <input type="file" id="file-input" multiple accept="image/png" class="hidden">
            <button type="button" id="browse-btn" class="btn-secondary">Browse Files</button>
        </div>

        <!-- File List -->
        <div id="file-list-container" class="hidden">
            <div class="mb-3 flex flex-col md:flex-row md:items-center gap-y-2 md:gap-y-0 justify-between">
                <div class="text-sm text-brand-muted">
                    <span id="file-count">0</span> files selected
                </div>
                <div class="flex flex-col md:flex-row justify-end gap-2 w-full">
                    <div class="flex items-center gap-2 w-full md:w-fit">
                        <button id="clear-all" class="btn-secondary flex items-center gap-2 w-1/2 md:w-fit">
                            <i class="ti ti-x"></i>
                            Clear all
                        </button>
                        <button id="convert-all" class="btn-primary flex items-center gap-2 w-1/2 md:w-fit">
                            <i class="ti ti-refresh"></i>
                            Convert All
                        </button>
                    </div>
                    <div id="result-section" class="hidden">
                        <button id="download-zip" class="btn-primary flex items-center gap-2 w-full">
                            <i class="ti ti-download"></i>
                            Download All (ZIP)
                        </button>
                    </div>
                </div>
            </div>

            <div id="file-list" class="space-y-3">
                <!-- Files injected here -->
            </div>
        </div>

        <!-- Empty State -->
        <div id="empty-state" class="text-center py-12 text-brand-muted">
            <i class="ti ti-photo-off text-5xl mb-4 opacity-50"></i>
            <p>No files uploaded yet.</p>
        </div>
    </section>
</main>