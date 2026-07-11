<main class="max-w-4xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Left: Input Area -->
        <div class="lg:col-span-2">
            <div class="bg-brand-card border border-brand-border p-6">
                <div class="flex justify-between items-center mb-4">
                    <label for="textInput" class="font-semibold">Text Input</label>
                    <div class="space-x-2">
                        <button id="clearBtn"
                            class="px-4 py-2 border border-brand-border text-sm hover:bg-gray-50 transition-colors">Clear</button>
                        <button id="copyBtn"
                            class="px-4 py-2 bg-brand-primary text-white text-sm hover:bg-brand-primaryHover transition-colors">Copy
                            Text</button>
                    </div>
                </div>
                <textarea id="textInput" rows="12"
                    class="w-full p-4 border border-brand-border focus:ring-1 focus:ring-brand-primary outline-none transition-all resize-none"
                    placeholder="Start typing or paste your text here..."></textarea>

                <!-- Quick Actions -->
                <div class="mt-6 flex gap-2 flex-wrap">
                    <button data-action="upper"
                        class="btn-tool px-3 py-1.5 border border-brand-border text-xs hover:bg-gray-50">UPPERCASE</button>
                    <button data-action="lower"
                        class="btn-tool px-3 py-1.5 border border-brand-border text-xs hover:bg-gray-50">lowercase</button>
                    <button data-action="title"
                        class="btn-tool px-3 py-1.5 border border-brand-border text-xs hover:bg-gray-50">Title
                        Case</button>
                </div>
            </div>
        </div>

        <!-- Right: Result/Stats Area -->
        <div class="space-y-6">
            <div class="bg-brand-card border border-brand-border p-6">
                <h2 class="font-semibold mb-6">Statistics</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-brand-muted">Characters</span>
                        <span id="statChars" class="font-mono font-bold">0</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-brand-muted">Characters (no space)</span>
                        <span id="statCharsNoSpace" class="font-mono font-bold">0</span>
                    </div>
                    <hr class="border-brand-border">
                    <div class="flex justify-between items-center">
                        <span class="text-brand-muted">Words</span>
                        <span id="statWords" class="font-mono font-bold">0</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-brand-muted">Sentences</span>
                        <span id="statSentences" class="font-mono font-bold">0</span>
                    </div>
                    <hr class="border-brand-border">
                    <div class="flex justify-between items-center">
                        <span class="text-brand-muted">Reading Time</span>
                        <span id="statReadTime" class="font-mono font-bold">0 min</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>