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
                        <div class="flex flex-col md:flex-row md:justify-end md:items-center gap-0.5 md:gap-1">
                            <a class="p-2 px-3 flex items-center text-sm bg-navbar-nav-active text-navbar-nav-foreground hover:bg-navbar-nav-hover rounded-lg focus:outline-hidden focus:bg-navbar-nav-focus"
                                href="#" aria-current="page">
                                <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                    <path
                                        d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                </svg>
                                Home
                            </a>

                            <a class="p-2 px-3 flex items-center text-sm text-navbar-nav-foreground hover:bg-navbar-nav-hover rounded-lg focus:outline-hidden focus:bg-navbar-nav-focus"
                                href="#">
                                <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                Shop
                            </a>

                            <a class="p-2 px-3 flex items-center text-sm text-navbar-nav-foreground hover:bg-navbar-nav-hover rounded-lg focus:outline-hidden focus:bg-navbar-nav-focus"
                                href="#">
                                <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M12 12h.01" />
                                    <path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                                    <path d="M22 13a18.15 18.15 0 0 1-20 0" />
                                    <rect width="20" height="14" x="2" y="6" rx="2" />
                                </svg>
                                About
                            </a>

                            <a class="p-2 px-3 flex items-center text-sm text-navbar-nav-foreground hover:bg-navbar-nav-hover rounded-lg focus:outline-hidden focus:bg-navbar-nav-focus"
                                href="#">
                                <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                    <path d="M18 14h-8" />
                                    <path d="M15 18h-5" />
                                    <path d="M10 6h8v4h-8V6Z" />
                                </svg>
                                Blog
                            </a>
                        </div>
                    </div>

                    <div class="my-2 md:my-0 md:mx-2">
                        <div class="w-full h-px md:h-4 md:border-s border-navbar-divider"></div>
                    </div>

                    <!-- Button Group -->
                    <div class=" flex flex-wrap items-center gap-x-1.5">
                        <button type="button"
                            class="hs-dark-mode-active:hidden block hs-dark-mode font-medium text-foreground rounded-full hover:bg-surface-hover focus:outline-hidden focus:bg-surface-focus"
                            data-hs-theme-click-value="dark">
                            <span class="group inline-flex shrink-0 justify-center items-center size-9">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                                </svg>
                            </span>
                        </button>
                        <button type="button"
                            class="hs-dark-mode-active:block hidden hs-dark-mode font-medium text-foreground rounded-full hover:bg-surface-hover focus:outline-hidden focus:bg-surface-focus"
                            data-hs-theme-click-value="light">
                            <span class="group inline-flex shrink-0 justify-center items-center size-9">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="4" />
                                    <path d="M12 2v2" />
                                    <path d="M12 20v2" />
                                    <path d="m4.93 4.93 1.41 1.41" />
                                    <path d="m17.66 17.66 1.41 1.41" />
                                    <path d="M2 12h2" />
                                    <path d="M20 12h2" />
                                    <path d="m6.34 17.66-1.41 1.41" />
                                    <path d="m19.07 4.93-1.41 1.41" />
                                </svg>
                            </span>
                        </button>

                        <a class="py-2 px-2.5 inline-flex items-center font-medium text-sm rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-layer-focus"
                            href="{{ route('filament.shop.auth.login') }}">
                            Sign in
                        </a>
                        <a class="py-2 px-2.5 inline-flex items-center font-medium text-sm rounded-lg bg-primary text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                            href="{{ route('filament.shop.auth.register') }}">

                            <svg class="size-4 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline points="48 139.59 48 216 208 216 208 139.59" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/><path d="M54,40H202a8,8,0,0,1,7.69,5.8L224,96H32L46.34,45.8A8,8,0,0,1,54,40Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/><path d="M96,96v16a32,32,0,0,1-64,0V96" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/><path d="M160,96v16a32,32,0,0,1-64,0V96" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/><path d="M224,96v16a32,32,0,0,1-64,0V96" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/></svg>
                            Register shop
                        </a>
                    </div>
                    <!-- End Button Group -->
                </div>
            </div>
        </div>
        <!-- End Collapse -->
    </nav>
</header>
<!-- ========== END HEADER ========== -->
