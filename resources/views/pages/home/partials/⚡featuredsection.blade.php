<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<!-- Features -->
<div class="max-w-340 px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="mx-auto max-w-2xl mb-8 lg:mb-14 text-center">
        <h2 class="text-3xl lg:text-4xl text-foreground font-bold">
            Platform Features
        </h2>
        <p class="mt-3 text-foreground">
            Everything you need to run multi-tenant vulcanizing shops and book tire repairs online.
        </p>
    </div>
    <!-- End Title -->

    <!-- Grid -->
    <div class="mx-auto max-w-3xl grid grid-cols-3 gap-6 lg:gap-8">
        <!-- Icon Block -->
        <div class="text-center">

            <svg class="shrink-0 size-7 md:size-9 mx-auto text-foreground" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 256 256">
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
            <div class="mt-2 sm:mt-6">
                <h3 class="sm:text-lg font-semibold text-foreground">
                    Multi-Tenant
                </h3>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center">

            <svg class="shrink-0 size-7 md:size-9 mx-auto text-foreground" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 256 256">
                <rect width="256" height="256" fill="none" />
                <line x1="96" y1="56" x2="96" y2="200" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="12" />
                <path
                    d="M24,160a32,32,0,0,0,0-64V64a8,8,0,0,1,8-8H224a8,8,0,0,1,8,8V96a32,32,0,0,0,0,64v32a8,8,0,0,1-8,8H32a8,8,0,0,1-8-8Z"
                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="12" />
            </svg>
            <div class="mt-2 sm:mt-6">
                <h3 class="sm:text-lg font-semibold text-foreground">
                    Online Booking
                </h3>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center">

            <svg class="shrink-0 size-7 md:size-9 mx-auto text-foreground" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 256 256">
                <rect width="256" height="256" fill="none" />
                <circle cx="200" cy="200" r="24" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="12" />
                <path d="M72,56h96a32,32,0,0,1,0,64H72a40,40,0,0,0,0,80H176" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="12" />
            </svg>
            <div class="mt-2 sm:mt-6">
                <h3 class="sm:text-lg font-semibold text-foreground">
                    Real-Time Tracking
                </h3>
            </div>
        </div>
        <!-- End Icon Block -->
    </div>
    <!-- End Grid -->

    <!-- Grid -->
    <div class="mt-10 sm:mt-20 grid grid-cols-2 md:grid-cols-4 items-center gap-2 sm:gap-6 lg:gap-8">
        <div class="w-full h-32">
            <img class="size-full object-cover object-center rounded-xl"
                src="https://images.unsplash.com/photo-1578844251758-2f71da64c96f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80"
                alt="Tire Repair Services">
        </div>
        <!-- End Col -->

        <div class="w-full h-32">
            <img class="size-full object-cover object-center rounded-xl"
                src="https://images.unsplash.com/photo-1645445522156-9ac06bc7a767?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Vulcanizing Shop Management">
        </div>
        <!-- End Col -->

        <div class="w-full h-32">
            <img class="size-full object-cover object-center rounded-xl"
                src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80"
                alt="Shop Locator Map">
        </div>
        <!-- End Col -->

        <div class="w-full h-32">
            <img class="size-full object-cover object-center rounded-xl"
                src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80"
                alt="Service Status Updates">
        </div>
        <!-- End Col -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Features -->
