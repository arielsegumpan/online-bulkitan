<!-- ========== HEADER ========== -->
<header class="flex flex-wrap  md:justify-start md:flex-nowrap z-50 w-full bg-navbar border-b border-navbar-line">
    <nav
        class="relative max-w-340 w-full mx-auto md:flex md:items-center md:justify-between md:gap-3 py-2 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center gap-x-1">
            <a class="flex-none font-semibold text-xl text-foreground focus:outline-hidden focus:opacity-80" href="
            {{ route('home') }}"
                aria-label="Brand">
                <img src="{{ asset('imgs/bulkit_logo.png') }}" class="size-18" alt="Bulkit Logo" />
            </a>

            <!-- Collapse Button -->
            <button type="button"
                class="hs-collapse-toggle md:hidden relative size-9 flex justify-center items-center font-medium text-sm rounded-lg bg-layer border border-layer-line text-layer-foreground hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus disabled:opacity-50 disabled:pointer-events-none"
                id="hs-header-base-collapse" aria-expanded="false" aria-controls="hs-header-base"
                aria-label="Toggle navigation" data-hs-collapse="#hs-header-base">
                <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <line x1="3" x2="21" y1="12" y2="12" />
                    <line x1="3" x2="21" y1="18" y2="18" />
                </svg>
                <svg class="hs-collapse-open:block shrink-0 hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
                <span class="sr-only">Toggle navigation</span>
            </button>
            <!-- End Collapse Button -->
        </div>

        <!-- Collapse -->
        <div id="hs-header-base"
            class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block "
            role="region" aria-labelledby="hs-header-base-collapse">
            <div
                class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb">
                <div class="py-2 md:py-0  flex flex-col md:flex-row md:items-center gap-0.5 md:gap-1">
                    <div class="grow">
                        @include('layouts.header.nav-items')
                    </div>

                    <div class="my-2 md:my-0 md:mx-2">
                        <div class="w-full h-px md:h-4 md:border-s border-navbar-divider"></div>
                    </div>
                    
                    @include('layouts.header.nav-buttons')
                    
                </div>
            </div>
        </div>
        <!-- End Collapse -->
    </nav>
</header>
<!-- ========== END HEADER ========== -->
