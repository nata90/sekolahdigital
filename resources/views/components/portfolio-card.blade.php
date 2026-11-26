@props(['item', 'detailed' => false, 'headingTag' => 'h3'])

<article class="group card overflow-hidden flex flex-col transition duration-200 hover:-translate-y-0.5 hover:shadow-lift">
    <div class="relative aspect-[16/10] overflow-hidden bg-sky">
        @if ($item->thumbnail)
            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->name }}" loading="lazy"
                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.03]">
        @else
            {{-- Placeholder: a mini browser mockup instead of an empty box --}}
            <div class="absolute inset-0 px-5 pt-12 pb-0">
                <div class="h-full rounded-t-lg bg-white shadow-soft ring-1 ring-line overflow-hidden">
                    <div class="flex items-center gap-1 px-3 py-2 border-b border-line">
                        <span class="w-1.5 h-1.5 rounded-full bg-line"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-line"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-line"></span>
                    </div>
                    <div class="bg-navy px-4 py-4">
                        <p class="font-display font-semibold text-xs text-white truncate">{{ $item->name }}</p>
                        <div class="mt-2 h-1.5 w-2/3 rounded bg-white/25"></div>
                    </div>
                    <div class="grid grid-cols-3 gap-2 p-3">
                        <div class="h-8 rounded bg-sky"></div>
                        <div class="h-8 rounded bg-sky"></div>
                        <div class="h-8 rounded bg-sky"></div>
                    </div>
                </div>
            </div>
        @endif
        <span class="chip absolute top-3 left-3">{{ $item->school_type }}</span>
    </div>

    <div class="p-5 flex-1 flex flex-col">
        <{{ $headingTag }} class="font-display font-semibold text-lg text-navy">{{ $item->name }}</{{ $headingTag }}>
        @if ($item->region)
            <p class="mt-1 inline-flex items-center gap-1.5 text-sm text-slate">
                <svg class="w-4 h-4 text-slate/70" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-7-5.75-7-11a7 7 0 1 1 14 0c0 5.25-7 11-7 11Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                {{ $item->region }}
            </p>
        @endif

        @if ($detailed && $item->description)
            <p class="mt-3 text-sm text-slate leading-relaxed line-clamp-2">{{ $item->description }}</p>
        @endif

        @if ($detailed && $item->live_url)
            <a href="{{ $item->live_url }}" target="_blank" rel="noopener"
               class="mt-auto pt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-blue hover:text-blue-deep">
                Kunjungi website
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7 17 17 7M9 7h8v8"/></svg>
            </a>
        @endif
    </div>
</article>
