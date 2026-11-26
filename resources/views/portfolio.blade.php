<x-site-layout pageTitle="Portfolio">
    <x-page-header
        eyebrow="Portfolio"
        title="Sekolah yang sudah kami bangun"
        description="Beragam jenis sekolah dan yayasan telah mempercayakan website mereka kepada kami. Setiap desain dibuat khusus dan dikelola sendiri oleh staf sekolah." />

    <section class="section pt-12 lg:pt-14">
        <div class="container-page">
            @if ($schoolTypes->count() > 1)
                <nav class="flex flex-wrap gap-2 mb-10" aria-label="Filter jenis sekolah">
                    @php $current = request('type'); @endphp
                    <a href="{{ route('portfolio') }}"
                       class="rounded-full px-4 py-2 text-sm font-medium transition-colors {{ ! $current ? 'bg-navy text-white' : 'bg-white border border-line text-slate hover:text-navy hover:border-slate/40' }}">
                        Semua
                    </a>
                    @foreach ($schoolTypes as $type)
                        <a href="{{ route('portfolio', ['type' => $type]) }}"
                           class="rounded-full px-4 py-2 text-sm font-medium transition-colors {{ $current === $type ? 'bg-navy text-white' : 'bg-white border border-line text-slate hover:text-navy hover:border-slate/40' }}">
                            {{ $type }}
                        </a>
                    @endforeach
                </nav>
            @endif

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($items as $item)
                    <x-portfolio-card :item="$item" :detailed="true" heading-tag="h2" />
                @empty
                    <div class="col-span-full card px-6 py-16 text-center">
                        <span class="icon-box mx-auto">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="4.5" width="17" height="15" rx="2"/><path stroke-linecap="round" d="M3.5 9h17"/></svg>
                        </span>
                        <p class="mt-5 font-display font-semibold text-xl text-navy">Belum ada portfolio untuk kategori ini.</p>
                        <p class="mt-2 text-slate">Coba kategori lain atau minta contoh langsung ke kami.</p>
                        <a href="{{ \App\Support\WhatsApp::url('Halo, saya ingin lihat contoh website sekolah.') }}" target="_blank" rel="noopener" class="btn btn-primary mt-6">
                            <x-icon-whatsapp class="w-4 h-4" />
                            Minta contoh via WhatsApp
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <x-cta-banner
        title="Ingin website sekolah seperti ini?"
        description="Ceritakan kebutuhan sekolahmu, kami siapkan konsep dan estimasi harganya."
        message="Halo, saya tertarik membuat website sekolah seperti di portfolio." />
</x-site-layout>