<main class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

        <!-- Left: Inputs -->
        <div class="space-y-4">
            <div class="bg-white border border-slate-200 p-6">
                <h2 class="text-lg font-semibold mb-6 flex items-center gap-2">
                    <i class="ti ti-settings"></i> Configuration
                </h2>

                <form id="metaForm" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Page Title</label>
                        <input type="text" name="title" id="input-title"
                            class="w-full border border-slate-300 p-2 focus:ring-1 focus:ring-blue-500 outline-none"
                            placeholder="ToolsGpt">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Description</label>
                        <textarea name="description" id="input-desc" rows="3"
                            class="w-full border border-slate-300 p-2 focus:ring-1 focus:ring-blue-500 outline-none"
                            placeholder="Description of your page"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Canonical URL</label>
                            <input type="url" name="canonical" id="input-canonical"
                                class="w-full border border-slate-300 p-2 focus:ring-1 focus:ring-blue-500 outline-none"
                                placeholder="https://toolsgpt.net">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Keywords</label>
                            <input type="text" name="keywords" id="input-keywords"
                                class="w-full border border-slate-300 p-2 focus:ring-1 focus:ring-blue-500 outline-none"
                                placeholder="seo, meta, tags">
                        </div>
                    </div>
                </form>
            </div>

            <!-- OG/Twitter Section -->
            <div class="bg-white border border-slate-200 p-6">
                <h2 class="text-lg font-semibold mb-6 flex items-center gap-2">
                    <i class="ti ti-share"></i> Social Media (OpenGraph)
                </h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">OG Image URL</label>
                        <input type="url" id="input-og-img"
                            class="w-full border border-slate-300 p-2 focus:ring-1 focus:ring-blue-500 outline-none"
                            placeholder="https://toolsgpt.net/tool/meta-tag-generator">
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Output -->
        <div class="space-y-6">
            <div class="bg-slate-900 text-slate-200 border border-slate-800 h-full flex flex-col relative">
                <div class="flex items-center justify-between p-4 border-b border-slate-800">
                    <h2 class="font-medium">Output Snippet</h2>
                    <button id="btn-copy"
                        class="text-xs bg-slate-800 hover:bg-slate-700 px-3 py-1 flex items-center gap-1">
                        <i class="ti ti-clipboard"></i> Copy
                    </button>
                </div>
                <pre id="output-code" class="p-6 font-mono text-sm overflow-x-auto min-h-100"></pre>
                <div id="copy-feedback" class="hidden text-xs text-emerald-400 p-2 bg-slate-800 text-center absolute left-0 bottom-0 w-full">Copied to
                    clipboard!</div>
            </div>
        </div>
    </div>
</main>