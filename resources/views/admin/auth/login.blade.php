<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <!-- Preconnect to Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap"
        rel="stylesheet">

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    @vite('resources/css/app.css');
</head>

<body class="w-full h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8 bg-white border border-slate-200/60 p-8 rounded-brand-card relative z-10">
        <!-- Logo & Header -->
        <div class="text-center">
            <h2 class="text-2xl font-space font-bold text-slate-900">
                Welcome back to <span class="text-brand-text">Tools<span class="text-brand-primary">GPT</span></span>
            </h2>
            <p class="mt-2 text-xs text-brand-muted">
                Only for authorize person
            </p>
        </div>

        <!-- Form -->
        <form class="mt-8 space-y-6" action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="space-y-4">
                @include('partials.alert')
                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase mb-1">
                        Email Address
                    </label>
                    <input id="email" name="email" type="email" required autocomplete="email"
                        value="{{ old('email') }}"
                        class="appearance-none block w-full px-3.5 py-2.5 border border-slate-200 rounded-brand-btn placeholder-slate-400 text-slate-900 text-sm focus:outline-none focus:border-brand-primary focus:ring-1 focus:ring-brand-primary/20 transition-all"
                        placeholder="you@example.com">
                    @error('email')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-xs font-bold text-slate-700 uppercase">
                            Password
                        </label>
                    </div>
                    <div class="relative">
                        <input id="password" name="password" type="password" required autocomplete="current-password"
                            class="appearance-none block w-full px-3.5 py-2.5 border border-slate-200 rounded-brand-btn placeholder-slate-400 text-slate-900 text-sm focus:outline-none focus:border-brand-primary focus:ring-1 focus:ring-brand-primary/20 transition-all pr-10"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePasswordVisibility()"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none">
                            <svg id="eye-icon" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember" type="checkbox"
                        class="h-4 w-4 text-brand-primary focus:ring-brand-primary/20 border-slate-200 rounded transition-all cursor-pointer">
                    <label for="remember-me"
                        class="ml-2 block text-xs font-semibold text-slate-600 select-none cursor-pointer">
                        Remember me on this device
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2.5 px-4 border border-transparent text-xs font-bold rounded-brand-btn text-white bg-brand-primary hover:bg-brand-primary-hover shadow-sm transition-all focus:outline-none">
                    Sign in
                </button>
            </div>
        </form>
    </div>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
            `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
            }
        }
    </script>
</body>

</html>
