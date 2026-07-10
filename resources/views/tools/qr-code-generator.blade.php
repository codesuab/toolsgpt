<main class="max-w-4xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <section class="bg-brand-card border border-brand-border p-8">
            <div class="space-y-4">
                <div>
                    <label for="qr-data" class="block text-sm font-semibold mb-2">Content</label>
                    <textarea id="qr-data" rows="3"
                        class="w-full border border-brand-border p-3 focus:outline-none focus:ring-1 focus:ring-brand-primary transition-all"
                        placeholder="Enter URL or text here..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2">QR Color</label>
                        <input type="color" id="qr-color" value="#0f172a"
                            class="w-full h-10 border border-brand-border cursor-pointer">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Background</label>
                        <input type="color" id="qr-bg" value="#ffffff"
                            class="w-full h-10 border border-brand-border cursor-pointer">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Insert Logo</label>
                    <div class="flex gap-2">
                        <input type="file" id="qr-logo-input" accept="image/*" class="hidden">
                        <button id="btn-upload-logo"
                            class="flex-1 border border-brand-border py-2 text-sm text-brand-muted hover:border-brand-primary hover:text-brand-primary transition-colors flex items-center justify-center gap-2">
                            <i class="ti ti-upload"></i> Upload Logo
                        </button>
                        <button id="btn-remove-logo"
                            class="border border-brand-border px-3 py-2 text-brand-muted hover:border-red-500 hover:text-red-500 transition-colors">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2">Dot Style</label>
                        <select id="qr-dots-type"
                            class="w-full border border-brand-border p-3 focus:outline-none bg-white">
                            <option value="square">Square</option>
                            <option value="dots">Dots</option>
                            <option value="rounded">Rounded</option>
                            <option value="extra-rounded">Extra Rounded</option>
                            <option value="classy">Classy</option>
                            <option value="classy-rounded">Classy Rounded</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Margin</label>
                        <input type="number" id="qr-margin" value="0" min="0" max="50"
                            class="w-full border border-brand-border p-3 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2">Corner Square</label>
                        <select id="qr-corner-sq"
                            class="w-full border border-brand-border p-3 focus:outline-none bg-white">
                            <option value="square">Square</option>
                            <option value="dot">Dot</option>
                            <option value="extra-rounded">Extra Rounded</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Corner Dot</label>
                        <select id="qr-corner-dot"
                            class="w-full border border-brand-border p-3 focus:outline-none bg-white">
                            <option value="square">Square</option>
                            <option value="dot">Dot</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Error Correction</label>
                    <select id="qr-ecc" class="w-full border border-brand-border p-3 focus:outline-none bg-white">
                        <option value="L">Low (7%)</option>
                        <option value="M" selected>Medium (15%)</option>
                        <option value="Q">Quartile (25%)</option>
                        <option value="H">High (30%)</option>
                    </select>
                </div>
            </div>
        </section>

        <section class="flex flex-col gap-4">
            <div class="bg-white border border-brand-border p-8 flex items-center justify-center min-h-[300px]">
                <div id="qr-canvas" class="transition-opacity duration-300"></div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <button id="btn-download-png"
                    class="flex items-center justify-center gap-2 bg-brand-primary hover:bg-brand-hover text-white py-3 font-medium transition-colors">
                    <i class="ti ti-download"></i> Download PNG
                </button>
                <button id="btn-download-svg"
                    class="flex items-center justify-center gap-2 border border-brand-border hover:bg-brand-bg py-3 font-medium transition-colors">
                    <i class="ti ti-file-type-svg"></i> Download SVG
                </button>
            </div>
        </section>
    </div>
</main>