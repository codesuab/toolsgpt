<section class="flex flex-col gap-4">

    <!-- Toolbar -->
    <div
        class="flex flex-wrap items-center justify-between gap-4 p-2 bg-[var(--color-brand-card)] border border-[var(--color-brand-border)]">

        <!-- Left actions -->
        <div class="flex flex-wrap items-center gap-2">
            <button type="button" id="btn-format" class="btn-primary" aria-label="Format JSON">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6l16 0"></path>
                    <path d="M4 12l10 0"></path>
                    <path d="M4 18l14 0"></path>
                </svg>
                Format
            </button>

            <button type="button" id="btn-minify" class="btn-secondary" aria-label="Minify JSON">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6l16 0"></path>
                    <path d="M8 12l8 0"></path>
                    <path d="M6 18l12 0"></path>
                </svg>
                Minify
            </button>

            <div class="w-px h-6 bg-[var(--color-brand-border)] mx-2 hidden sm:block"></div>

            <select id="indent-select" class="input-control" aria-label="Indentation spaces">
                <option value="2">2 Spaces</option>
                <option value="3">3 Spaces</option>
                <option value="4">4 Spaces</option>
                <option value="tab">Tabs</option>
            </select>
        </div>

        <!-- Right actions -->
        <div class="flex flex-wrap items-center gap-2">
            <input type="file" id="file-upload" class="hidden" accept=".json,application/json">
            <button type="button" id="btn-upload" class="btn-secondary" aria-label="Upload File">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                    <path d="M12 11v6"></path>
                    <path d="M9.5 13.5l2.5 -2.5l2.5 2.5"></path>
                </svg>
                Upload
            </button>

            <button type="button" id="btn-download" class="btn-secondary" aria-label="Download File">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                    <path d="M12 17v-6"></path>
                    <path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path>
                </svg>
                Download
            </button>

            <div class="w-px h-6 bg-[var(--color-brand-border)] mx-2 hidden sm:block"></div>

            <button type="button" id="btn-copy" class="btn-icon" aria-label="Copy to Clipboard" title="Copy Output">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z">
                    </path>
                    <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                </svg>
            </button>

            <button type="button" id="btn-clear"
                class="btn-icon hover:!text-[var(--color-error)] hover:!border-[var(--color-error)]"
                aria-label="Clear Workspaces" title="Clear All">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 7l16 0"></path>
                    <path d="M10 11l0 6"></path>
                    <path d="M14 11l0 6"></path>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Workspaces Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

        <!-- Input Section -->
        <div class="flex flex-col gap-2">
            <label for="json-input" class="text-sm font-semibold text-[var(--color-brand-muted)]">Raw
                JSON</label>
            <textarea id="json-input" class="workspace-area" placeholder="Paste your JSON here or upload a file..."
                spellcheck="false"></textarea>
        </div>

        <!-- Output Section -->
        <div class="flex flex-col gap-2">
            <div class="flex items-center justify-between">
                <label for="json-output" class="text-sm font-semibold text-[var(--color-brand-muted)]">Result</label>
                <!-- Inline Feedback Container -->
                <div id="inline-feedback"
                    class="text-sm font-medium transition-opacity opacity-0 flex items-center gap-1">
                    <span id="feedback-icon"></span>
                    <span id="feedback-text"></span>
                </div>
            </div>
            <div class="relative h-full">
                <textarea id="json-output" class="workspace-area" readonly spellcheck="false"
                    placeholder="Formatted or minified output will appear here..."></textarea>
            </div>
        </div>

    </div>
</section>