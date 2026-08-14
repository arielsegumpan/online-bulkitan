<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<!-- Hero -->
<div class="relative overflow-hidden">
    <div class="max-w-340 mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="max-w-2xl text-center mx-auto">
            <h1 class="block text-3xl font-bold text-foreground sm:text-4xl md:text-5xl">Digitalize your vulcanizing shop to get more
                <span class="text-primary">reliable</span>
            </h1>
            </h1>
            <p class="mt-3 text-lg text-foreground">Connect motorists with reliable tire repair services, streamline multi-shop operations, and manage bookings effortlessly.</p>
        </div>

        <div class="mt-10 relative max-w-5xl mx-auto">
            <div x-data="{
                viewport: {
                    lat: 10.904,
                    lng: 123.0750,
                    zoom: 15,
                    bearing: 0,
                    pitch: 0
                }
            }">
            <x-map :center="[123.0750, 10.904]" :zoom="15" provider="carto-positron"
                @map:move="viewport.lat = $event.detail.lat;viewport.lng = $event.detail.lng"
                @map:zoom="viewport.zoom = $event.detail.zoom"
                @map:bearing-changed="viewport.bearing = $event.detail.bearing"
                @map:pitch-changed="viewport.pitch = $event.detail.pitch"
                class="rounded-xl shadow-2xl h-[350px] lg:h-[450px]"
                >

                <x-map-controls :locate="true" :fullscreen="true" position="top-right" />

                <x-map-marker :lat="10.904" :lng="123.0750">
                    <x-marker-content>
                        <div class="p-2 bg-blue-500 rounded-full">
                            <svg class="size-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <circle cx="128" cy="104" r="32" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M208,104c0,72-80,128-80,128S48,176,48,104a80,80,0,0,1,160,0Z" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="16" />
                            </svg>
                        </div>
                    </x-marker-content>
                </x-map-marker>
            </x-map>

             <!-- Reactive viewport display -->
                <div class="overlay">
                    <span x-text="viewport.lng.toFixed(3)"></span>
                    <span x-text="viewport.lat.toFixed(3)"></span>
                    <span x-text="viewport.zoom.toFixed(1)"></span>
                </div>
        </div>
    </div>
    
    <livewire:pages::home.partials.featuredsection />
</div>
<!-- End Hero -->



