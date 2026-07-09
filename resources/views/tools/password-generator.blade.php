<main class="max-w-4xl px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="bg-white border border-brand-border rounded-brand-card p-6">
        <!-- Output Area -->
        <div class="mb-6">
            <div class="relative flex items-center border border-brand-border bg-gray-50 p-3">
                <input type="text" id="password-output" readonly placeholder="Click Generate to begin"
                    class="w-full bg-transparent outline-none font-mono text-lg truncate pr-10">
                <button id="copy-btn" class="absolute right-2 p-1.5 hover:bg-gray-200 transition-colors"
                    title="Copy to clipboard">
                    <i class="ti ti-copy text-xl"></i>
                </button>
            </div>

            <!-- Strength Indicator (Only updates on generate) -->
            <div class="flex items-center gap-2 mt-3">
                <span class="text-xs font-medium text-brand-muted">Security Level:</span>
                <div class="flex-1 h-1 bg-gray-200">
                    <div id="strength-bar" class="h-full w-0 transition-all duration-300"></div>
                </div>
                <span id="strength-text" class="text-xs font-bold text-brand-muted w-16 text-right">None</span>
            </div>
        </div>

        <!-- Controls -->
        <div class="space-y-6">
            <div>
                <label for="length-slider" class="block text-sm font-medium mb-3">Password Length: <span id="length-val"
                        class="font-bold">16</span></label>
                <input type="range" id="length-slider" min="6" max="64" value="16"
                    class="w-full h-2 bg-gray-200 appearance-none cursor-pointer accent-blue-600">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" id="upper" checked class="w-4 h-4 accent-blue-600 border-gray-300">
                    <span class="text-sm text-gray-700">Uppercase</span>
                </label>
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" id="lower" checked class="w-4 h-4 accent-blue-600 border-gray-300">
                    <span class="text-sm text-gray-700">Lowercase</span>
                </label>
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" id="numbers" checked class="w-4 h-4 accent-blue-600 border-gray-300">
                    <span class="text-sm text-gray-700">Numbers</span>
                </label>
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" id="symbols" checked class="w-4 h-4 accent-blue-600 border-gray-300">
                    <span class="text-sm text-gray-700">Symbols</span>
                </label>
                <label class="flex items-center space-x-3 cursor-pointer col-span-2">
                    <input type="checkbox" id="exclude" class="w-4 h-4 accent-blue-600 border-gray-300">
                    <span class="text-sm text-gray-700">Exclude Ambiguous <span class="text-gray-400">(l, I, 1, O,
                            0)</span></span>
                </label>
            </div>

            <div class="pt-4 border-t border-brand-border flex flex-col md:flex-row gap-3">
                <button id="generate-btn" class="btn-primary w-full flex justify-center items-center gap-2">
                    <i class="ti ti-refresh"></i> Generate Secure Password
                </button>
                <button id="save-manager-btn" class="btn-secondary w-full flex justify-center items-center gap-2">
                    <i class="ti ti-browser-check"></i> Copy for Password Manager
                </button>
            </div>
        </div>
    </section>
</main>