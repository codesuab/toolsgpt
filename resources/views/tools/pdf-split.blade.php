<main class="max-w-4xl mx-auto">
    <!-- Upload Area -->
    <section id="upload-section" class="border border-brand-border bg-white p-8 text-center">
        <div id="drop-zone"
            class="border-2 border-dashed border-brand-border p-16 cursor-pointer hover:border-blue-600 transition-colors">
            <i class="ti ti-file-upload text-5xl text-slate-300 mb-4"></i>
            <h3 class="text-lg font-semibold mb-2">Drop your PDF here</h3>
            <p class="text-slate-500 text-sm mb-6">Support for single documents up to 50MB</p>
            <input type="file" id="file-input" class="hidden" accept=".pdf">
            <button id="browse-btn"
                class="px-8 py-3 bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors">Select
                Document</button>
        </div>
    </section>

    <!-- Workspace Area -->
    <section id="workspace-section" class="hidden space-y-6">
        <div class="bg-white border border-brand-border p-6">
            <div class="flex items-center justify-between mb-8 pb-6 border-b border-brand-border">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-slate-50 border border-brand text-blue-600">
                        <i class="ti ti-file-text text-2xl"></i>
                    </div>
                    <div>
                        <h3 id="file-name" class="font-semibold text-lg">document.pdf</h3>
                        <p id="file-meta" class="text-xs text-brand-muted">Ready to process</p>
                    </div>
                </div>
                <button id="reset-btn"
                    class="text-sm font-medium text-red-600 hover:text-red-700 flex items-center gap-2">
                    <i class="ti ti-trash"></i> Remove
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="col-span-2 space-y-4">
                    <label class="block text-sm font-semibold uppercase text-slate-500">Processing Mode</label>
                    <div class="space-y-3">
                        <label class="flex items-center p-4 border border-brand-border cursor-pointer hover:bg-slate-50">
                            <input type="radio" name="split-method" value="all" checked class="w-4 h-4 text-blue-600">
                            <span class="ml-3 font-medium">Extract all pages individually</span>
                        </label>
                    </div>
                </div>

                <div class="flex flex-col justify-end">
                    <button id="process-btn"
                        class="w-full py-4 bg-blue-600 text-white font-semibold hover:bg-blue-700 flex items-center justify-center gap-2">
                        <i class="ti ti-scissors"></i>
                        Split Document
                    </button>
                </div>
            </div>
        </div>

        <!-- Result Section -->
        <div id="result-section" class="hidden bg-white border border-brand-border p-6">
            <div class="flex items-center justify-between mb-6">
                <h4 class="font-semibold text-lg">Generated Files</h4>
                <button id="download-all-btn"
                    class="px-4 py-2 bg-slate-900 text-white text-sm font-medium hover:bg-slate-800 flex items-center gap-2">
                    <i class="ti ti-download"></i> Download All (ZIP)
                </button>
            </div>
            <div id="output-list" class="divide-y divide-brand-border border-t border-brand-border">
                <!-- Results populated by JS -->
            </div>
        </div>
    </section>
</main>