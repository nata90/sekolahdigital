@props(['eyebrow' => null, 'title', 'description' => null])

<section class="relative overflow-hidden border-b border-line bg-cloud">
    <div class="absolute inset-0 bg-grid [mask-image:radial-gradient(ellipse_at_top,black_30%,transparent_75%)]" aria-hidden="true"></div>
    <div class="container-page relative py-16 lg:py-20">
        @if ($eyebrow)
            <p class="eyebrow mb-4">{{ $eyebrow }}</p>
        @endif
        <h1 class="font-display font-bold text-4xl sm:text-5xl tracking-tight text-navy max-w-3xl text-balance">{{ $title }}</h1>
        @if ($description)
            <p class="lead mt-5 max-w-2xl">{{ $description }}</p>
        @endif
        {{ $slot }}
    </div>
</section>
