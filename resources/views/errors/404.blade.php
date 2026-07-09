<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool Not Found - 404 Error</title>
    @vite(['resources/css/app.css'])
</head>

<body class="antialiased min-h-screen flex items-center justify-center">
    <section class="w-full px-6 py-12 md:py-24 flex flex-col items-center justify-center">
        <div class="max-w-5xl w-full flex flex-col items-center text-center">
            <div
                class="text-brand-primary font-space text-[6rem] md:text-[8rem] font-bold leading-none mb-4 select-none">
                404
            </div>
            <h1 class="text-3xl md:text-4xl font-space font-bold mb-4 text-brand-text">
                Tool Not Found
            </h1>
            <p class="text-brand-muted text-base md:text-lg max-w-lg mx-auto mb-10">
                The tool you are looking for may have been removed, renamed, or is currently unavailable.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 mb-8 w-full sm:w-auto">
                <a href="{{ route('all.tool') }}"
                    class="px-8 py-3.5 bg-brand-primary text-white font-medium hover:bg-brand-primary-hover transition-colors duration-200 rounded-none w-full sm:w-auto outline-none focus:ring-2 focus:ring-brand-primary focus:ring-offset-2">
                    Back to All Tools
                </a>
                <a href="{{ route('home') }}"
                    class="px-8 py-3.5 bg-transparent border border-brand-border text-brand-text font-medium hover:bg-gray-50 transition-colors duration-200 rounded-none w-full sm:w-auto outline-none focus:ring-2 focus:ring-brand-primary focus:ring-offset-2">
                    Go Home
                </a>
            </div>

            <!-- Popular Tools Section -->
            <div class="w-full pt-4 border-t border-brand-border text-left">
                <h2 class="text-xl md:text-2xl font-space font-semibold mb-8 text-brand-text">
                    Try Our Popular Tools
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($tools as $t)
                        <x-tool-card :tool="$t" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</body>

</html>