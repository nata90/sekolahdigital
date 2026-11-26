@props(['package', 'detailed' => false, 'headingTag' => 'h3'])

@php
    $popular = (bool) $package->is_popular;
    $features = collect($package->included ?? []);
    if (! $detailed) {
        $features = $features->take(6);
    }
@endphp

<div @class([
    'relative flex flex-col rounded-2xl p-8 transition',
    'bg-white border-2 border-blue shadow-lift' => $popular,
    'bg-white border border-line' => ! $popular,
])>
    @if ($popular)
        <span class="absolute -top-3 left-8 inline-flex items-center gap-1.5 rounded-full bg-blue px-3 py-1 text-xs font-semibold text-white">
            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M10 1.5l2.6 5.3 5.9.9-4.3 4.1 1 5.8L10 14.9l-5.2 2.7 1-5.8L1.5 7.7l5.9-.9L10 1.5z"/></svg>
            Paling Populer
        </span>
    @endif

    <{{ $headingTag }} class="font-display font-semibold text-xl text-navy">{{ $package->name }}</{{ $headingTag }}>
    @if ($detailed && $package->highlight)
        <p class="mt-1 text-sm text-slate">{{ $package->highlight }}</p>
    @endif

    <p class="mt-5 font-display font-bold text-4xl tracking-tight text-navy">{{ $package->price_display }}</p>
    @if ($package->timeline)
        <p class="mt-2 inline-flex items-center gap-1.5 text-sm text-slate">
            <svg class="w-4 h-4 text-slate/70" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" d="M12 7v5l3 2"/></svg>
            Estimasi selesai {{ $package->timeline }}
        </p>
    @endif

    @if ($detailed && $package->description)
        <p class="mt-6 text-sm leading-relaxed text-slate">{{ $package->description }}</p>
    @endif

    <div class="mt-6 pt-6 border-t border-line flex-1">
        @if ($detailed)
            <p class="text-xs font-semibold uppercase tracking-wider text-navy mb-4">Termasuk</p>
        @endif
        <ul class="space-y-3 text-sm text-ink/80">
            @forelse ($features as $feature)
                <li class="flex gap-3">
                    <svg class="w-5 h-5 shrink-0 text-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m5 12.5 4.5 4.5L19 7.5"/></svg>
                    <span>{{ $feature }}</span>
                </li>
            @empty
                <li class="text-slate">Detail disesuaikan dengan kebutuhan.</li>
            @endforelse
        </ul>

        @if ($detailed && ! empty($package->not_included))
            <p class="text-xs font-semibold uppercase tracking-wider text-slate mt-7 mb-4">Tidak termasuk</p>
            <ul class="space-y-3 text-sm text-slate">
                @foreach ($package->not_included as $feature)
                    <li class="flex gap-3">
                        <svg class="w-5 h-5 shrink-0 text-slate/50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7l10 10M17 7 7 17"/></svg>
                        <span>{{ $feature }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <a href="{{ \App\Support\WhatsApp::url('Halo, saya tertarik dengan ' . $package->name . ' (' . $package->price_display . '). Boleh minta rinciannya?') }}"
       target="_blank" rel="noopener"
       class="btn btn-lg w-full mt-8 {{ $popular ? 'btn-primary' : 'btn-dark' }}">
        {{ $package->cta_text ?? 'Tanya Paket Ini' }}
    </a>
</div>
