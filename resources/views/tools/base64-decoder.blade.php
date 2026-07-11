<main class="max-w-4xl mx-auto">
    <section class="bg-brand-card border border-brand-border">
        <div class="flex border-b border-brand-border">
            <button id="tab-encode"
                class="px-6 py-4 border-b-2 border-transparent hover:border-slate-300 font-medium tab-trigger text-xs md:text-base"
                data-tab="encode">Encode Text</button>
            <button id="tab-decode"
                class="px-6 py-4 border-b-2 border-brand-primary font-medium text-brand-primary tab-trigger text-xs md:text-base"
                data-tab="decode">Decode Text</button>
            <button id="tab-file"
                class="px-6 py-4 border-b-2 border-transparent hover:border-slate-300 font-medium tab-trigger text-xs md:text-base"
                data-tab="file">File to Base64</button>
        </div>

        <div class="p-6">
            <div id="content-encode" class="tab-content hidden">
                <label class="block text-sm font-semibold mb-2">Input Text</label>
                <textarea id="input-encode"
                    class="w-full h-40 p-4 border border-brand-border focus:ring-1 focus:ring-brand-primary focus:outline-none mb-4"
                    placeholder="Enter text to encode..."></textarea>
            </div>

            <div id="content-decode" class="tab-content ">
                <label class="block text-sm font-semibold mb-2">Base64 String</label>
                <textarea id="input-decode"
                    class="w-full h-40 p-4 border border-brand-border focus:ring-1 focus:ring-brand-primary focus:outline-none mb-4"
                    placeholder="Enter Base64 string to decode..."></textarea>
            </div>

            <div id="content-file" class="tab-content hidden">
                <div id="drop-zone"
                    class="w-full h-40 border-2 border-dashed border-brand-border flex flex-col items-center justify-center text-center cursor-pointer hover:bg-slate-50 mb-4 transition">
                    <i class="ti ti-upload text-3xl mb-2 text-brand-muted"></i>
                    <span class="text-sm">Click to upload or drag & drop files</span>
                    <input type="file" id="file-input" class="hidden">
                </div>
            </div>

            <div class="flex gap-3">
                <button id="action-btn"
                    class="bg-brand-primary text-white px-6 py-2 hover:bg-brand-primaryHover transition">Process</button>
                <button id="clear-btn"
                    class="border border-brand-border px-6 py-2 hover:bg-slate-100 transition">Clear</button>
            </div>
        </div>

        <div class="p-6 border-t border-brand-border bg-slate-50">
            <div class="flex justify-between items-center mb-2">
                <label class="block text-sm font-semibold">Result</label>
                <button id="copy-btn"
                    class="text-sm flex items-center gap-1 text-brand-muted hover:text-brand-primary transition">
                    <i class="ti ti-copy"></i> Copy
                </button>
            </div>
            <textarea id="output-area" readonly class="w-full h-40 p-4 border border-brand-border bg-white cursor-text"
                placeholder="Result will appear here..."></textarea>
            <p id="status-text" class="mt-2 text-xs text-brand-muted h-4"></p>
        </div>
    </section>
</main>