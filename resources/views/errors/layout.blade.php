<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased bg-white dark:bg-black text-black text-foreground">
    <div class="min-h-screen flex flex-col max-w-3xl mx-auto size-full">
        <!-- ========== HEADER ========== -->
        <header class="flex justify-center z-50 w-full py-4">
            <nav class="px-4 sm:px-6 lg:px-8">
                <a class="flex-none text-xl font-semibold sm:text-3xl text-foreground" href="{{ url('/') }}"
                    aria-label="{{ config('app.name') }}">
                    <img class="size-32" src="{{ asset('imgs/bulkit_logo.png') }}" />
                </a>
            </nav>
        </header>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" class="flex-1 flex items-center justify-center">
            <div class="text-center py-10 px-4 sm:px-6 lg:px-8">
                <h1 class="block text-7xl font-bold text-foreground sm:text-9xl">@yield('code', '404')</h1>
                <p class="mt-3 text-muted-foreground-2">@yield('title', 'Oops, something went wrong.')</p>
                <p class="text-muted-foreground-2">@yield('message', "Sorry, we couldn't find your page.")</p>

                <div class="mt-5 flex flex-col justify-center items-center gap-2 sm:flex-row sm:gap-3">
                    @hasSection('actions')
                        @yield('actions')
                    @else
                        <a class="w-full sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                            href="{{ url('/') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                            Back to home
                        </a>
                    @endif
                </div>
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
        <footer class="mt-auto text-center py-5">
            <div class="max-w-340 mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-sm text-muted-foreground-1">© All Rights Reserved. {{ date('Y') }}.</p>
            </div>
        </footer>
        <!-- ========== END FOOTER ========== -->
    </div>
</body>

</html>
