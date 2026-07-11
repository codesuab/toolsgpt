<main class="max-w-4xl mx-auto">
    <section id="workspace" class="bg-white border border-brand-border p-8">
        <!-- Drop Zone -->
        <div id="drop-zone"
            class="border-2 border-dashed border-brand-border p-12 flex flex-col items-center justify-center text-center cursor-pointer transition-colors duration-200">
            <i class="ti ti-file-upload text-4xl text-brand-muted mb-4"></i>
            <h3 class="text-lg font-semibold mb-1">Select or drop PDF files</h3>
            <p class="text-sm text-brand-muted mb-6">Support for multiple files. Drag to reorder.</p>
            <input type="file" id="file-input" multiple accept="application/pdf" class="hidden">
            <button id="browse-btn"
                class="px-6 py-2 bg-brand-primary text-white hover:bg-brand-primary/90 transition-colors">Browse Files</button>
        </div>

        <!-- File List -->
        <div id="file-list-container" class="mt-8 hidden">
            <div class="flex justify-between items-center mb-4">
                <h4 class="font-semibold">Files to merge</h4>
                <button id="clear-all-btn" class="text-sm text-red-600 hover:underline">Clear all</button>
            </div>
            <ul id="file-list" class="space-y-2 border border-brand-border"></ul>

            <div class="mt-8 pt-6 border-t border-brand-border flex gap-4">
                <button id="merge-btn"
                    class="px-8 py-2 bg-brand-primary text-white hover:bg-brand-primary/80 transition-colors flex items-center gap-2">
                    <i class="ti ti-arrows-merge"></i> Merge PDF
                </button>
            </div>
        </div>
    </section>

    <section id="result-section" class="mt-8 bg-white border border-brand-border p-8 hidden">
        <div class="flex items-start gap-4">
            <div class="p-3 bg-green-50 text-green-600">
                <i class="ti ti-check text-2xl"></i>
            </div>
            <div class="flex-1">
                <h3 class="font-semibold">Merge successful</h3>
                <p class="text-sm text-brand-muted mb-4">Your combined PDF is ready for download.</p>
                <div class="flex gap-3">
                    <a id="download-link"
                        class="inline-block px-6 py-2 bg-brand-primary text-white hover:bg-brand-primary/90 transition-colors">Download
                        Merged PDF</a>
                    <button id="start-new-btn"
                        class="px-6 py-2 border border-brand-border hover:bg-[#afb4b9] transition-colors">Start New
                        Merge</button>
                </div>
            </div>
        </div>
    </section>
</main>