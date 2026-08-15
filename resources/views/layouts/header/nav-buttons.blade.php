<!-- Button Group -->
<div class=" flex flex-wrap items-center gap-x-1.5">
    <button type="button"
        class="hs-dark-mode-active:hidden block hs-dark-mode font-medium text-foreground rounded-full hover:bg-surface-hover focus:outline-hidden focus:bg-surface-focus"
        data-hs-theme-click-value="dark">
        <span class="group inline-flex shrink-0 justify-center items-center size-9">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
            </svg>
        </span>
    </button>
    <button type="button"
        class="hs-dark-mode-active:block hidden hs-dark-mode font-medium text-foreground rounded-full hover:bg-surface-hover focus:outline-hidden focus:bg-surface-focus"
        data-hs-theme-click-value="light">
        <span class="group inline-flex shrink-0 justify-center items-center size-9">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
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

        <svg class="size-4 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
            <rect width="256" height="256" fill="none" />
            <polyline points="48 139.59 48 216 208 216 208 139.59" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="12" />
            <path d="M54,40H202a8,8,0,0,1,7.69,5.8L224,96H32L46.34,45.8A8,8,0,0,1,54,40Z" fill="none"
                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" />
            <path d="M96,96v16a32,32,0,0,1-64,0V96" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="12" />
            <path d="M160,96v16a32,32,0,0,1-64,0V96" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="12" />
            <path d="M224,96v16a32,32,0,0,1-64,0V96" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="12" />
        </svg>
        Register shop
    </a>
</div>
<!-- End Button Group -->
