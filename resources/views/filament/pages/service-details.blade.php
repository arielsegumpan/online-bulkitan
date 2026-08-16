<div class="fi-in-entry-wrp">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</p>
            <p class="text-sm">{{ $service?->service_name ?? '—' }}</p>
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</p>
            <x-filament::badge color="primary">
                {{ $service?->serviceCategory?->name ?? '—' }}
            </x-filament::badge>
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Duration</p>
            <p class="text-sm">{{ $service?->service_duration_minutes }} hrs</p>
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Price</p>
            <p class="text-sm font-semibold text-success-600 dark:text-success-400">
                ₱{{ number_format($service?->service_price ?? 0, 2) }}
            </p>
        </div>

        <div class="md:col-span-2">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Description</p>
            <div class="prose prose-sm dark:prose-invert max-w-none">
                {!! $service?->service_desc ?: '<p class="text-gray-400">No description provided.</p>' !!}
            </div>
        </div>
    </div>
</div>
