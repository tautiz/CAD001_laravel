<div class="py-12">

    <div class="max-w-7xl mx-auto lg:px-7 space-y-6 mockup-window bg-base-300 drop-shadow-xl py-7">
        @if ($attributes->has('title'))
            <h1 class="font-semibold text-xl dark:text-gray-200 leading-tight">
                {{ $attributes->get('title') }}
            </h1>
        @endif
        <div class="grid justify-center">
            {{$slot}}
        </div>
    </div>
</div>
