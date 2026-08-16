<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('code') | {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white dark:bg-black text-black text-foreground">
    <div class="min-h-screen flex flex-col max-w-3xl mx-auto size-full">
        <!-- ========== HEADER ========== -->
        <header class="flex justify-center z-50 w-full py-4">
            <nav class="px-4 sm:px-6 lg:px-8">
                <a class="flex-none text-xl font-semibold sm:text-3xl text-foreground" href="{{ url('/') }}" aria-label="Brand">
                    {{ config('app.name') }}
                </a>
            </nav>
        </header>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" class="flex-1 flex items-center justify-center">
            <div class="text-center py-10 px-4 sm:px-6 lg:px-8">
                <h1 class="block text-7xl font-bold text-foreground sm:text-9xl">@yield('code')</h1>

                <p class="mt-3 text-lg text-muted-foreground-1">
                    @yield('message')
                </p>

                <div class="mt-5 flex flex-col justify-center items-center gap-2 sm:flex-row sm:gap-3">
                    @yield('actions')
                </div>
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
        <footer class="text-center py-5">
            <div class="max-w-340 mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-sm text-muted-foreground-1">© All Rights Reserved. {{ date('Y') }}.</p>
            </div>
        </footer>
        <!-- ========== END FOOTER ========== -->
    </div>
</body>
</html>