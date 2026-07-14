<div class="fixed inset-0 bg-black/50 z-990 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="relative w-full max-w-120 bg-white border border-brand-border flex flex-col">

        <!-- Header -->
        <div class="px-8 py-6 border-b border-brand-border flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-bg-brand-accent flex items-center justify-center">
                    <img src="/media/favicon/favicon-32x32.png">
                </div>
                <span class="font-display font-bold text-brand-text text-lg tracking-tight">Toolgpt</span>
            </div>
            <button class="text-brand-muted hover:text-brand-text transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Body -->
        <div class="p-8 space-y-6">
            <div class="space-y-1">
                <h1 class="font-display text-2xl font-bold text-brand-text">Welcome Back</h1>
                <p class="text-brand-muted">Sign in to access your workspace</p>
            </div>

            <!-- Form -->
            <form class="space-y-4">
                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-brand-text">Email Address</label>
                    <input type="email"
                        class="w-full px-4 py-2.5 border border-brand-border focus:border-brand-primary focus:ring-1 focus:ring-brand-primary outline-none transition-all"
                        placeholder="name@company.com">
                </div>

                <div class="space-y-1.5">
                    <div class="flex justify-between items-center">
                        <label class="text-sm font-medium text-brand-text">Password</label>
                        <a href="#" class="text-xs text-brand-secondary hover:underline">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <input type="password"
                            class="w-full px-4 py-2.5 border border-brand-border focus:border-brand-primary focus:ring-1 focus:ring-brand-primary outline-none transition-all"
                            placeholder="Enter your password">
                        <button type="button"
                            class="absolute right-3 top-3 text-brand-muted hover:text-brand-text text-xs font-medium">Show</button>
                    </div>
                </div>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" class="accent-brand-primary w-4 h-4">
                    <span class="text-sm text-brand-muted">Remember me</span>
                </label>

                <button class="w-full bg-brand-primary hover:bg-brand-primary-hover text-white py-3 font-medium transition-colors">
                    Sign in to workspace
                </button>
            </form>

            <!-- Divider -->
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-brand-border"></div>
                </div>
                <div class="relative flex justify-center text-xs">
                    <span class="bg-white px-2 text-brand-muted">OR CONTINUE WITH</span>
                </div>
            </div>

            <!-- Social Auth -->
            <div class="grid grid-cols-2 gap-4">
                <button
                    class="flex items-center justify-center gap-2 py-2.5 border border-brand-border hover:bg-slate-50 transition-colors">
                    <svg class="w-4 h-4" viewBox="0 0 24 24">
                        <path
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                            fill="#4285F4" />
                        <path
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                            fill="#34A853" />
                        <path
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                            fill="#FBBC05" />
                        <path
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                            fill="#EA4335" />
                    </svg>
                    <span class="text-sm font-medium text-brand-text">Google</span>
                </button>
                <button
                    class="flex items-center justify-center gap-2 py-2.5 border border-brand-border hover:bg-slate-50 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                    </svg>
                    <span class="text-sm font-medium text-brand-text">GitHub</span>
                </button>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-8 py-4 bg-slate-50 border-t border-brand-border text-center">
            <p class="text-sm text-brand-muted">
                Don't have an account? <a href="#" class="text-brand-primary font-medium hover:underline">Create account</a>
            </p>
        </div>
    </div>
</div>