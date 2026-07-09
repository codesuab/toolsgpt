<section class="bg-white border border-brand-border p-6 rounded-brand-card">

    <!-- Text Input Area -->
    <div class="mb-6">
        <label for="text-input" class="sr-only">Enter your text here</label>
        <textarea id="text-input" rows="10"
            class="w-full p-4 border border-brand-border rounded-brand-card focus:outline-none focus:ring-1 focus:ring-brand-primary focus:border-brand-primary transition-all resize-none text-base"
            placeholder="Paste or type your text here..."></textarea>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="p-4 border border-brand-border rounded-sm">
            <p class="text-xs text-brand-text uppercase font-semibold mb-1">Words</p>
            <div id="word-count" class="text-2xl font-bold text-brand-primary">0</div>
        </div>
        <div class="p-4 border border-brand-border rounded-sm">
            <p class="text-xs text-brand-text uppercase font-semibold mb-1">Characters</p>
            <div id="char-count" class="text-2xl font-bold text-brand-primary">0</div>
        </div>
        <div class="p-4 border border-brand-border rounded-sm">
            <p class="text-xs text-brand-text uppercase font-semibold mb-1">Reading Time</p>
            <div id="reading-time" class="text-2xl font-bold text-brand-primary">0m</div>
        </div>
        <div class="p-4 border border-brand-border rounded-sm">
            <p class="text-xs text-brand-text uppercase font-semibold mb-1">Sentences</p>
            <div id="sentence-count" class="text-2xl font-bold text-brand-primary">0</div>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button id="copy-btn" class="btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
                <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
            </svg>
            Copy Text
        </button>
        <button id="clear-btn" class="btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 7l16 0"></path>
                <path d="M10 11l0 6"></path>
                <path d="M14 11l0 6"></path>
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
            </svg>
            Clear
        </button>
    </div>
</section>