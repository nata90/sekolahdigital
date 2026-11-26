<x-site-layout pageTitle="Kontak">
    <x-page-header
        eyebrow="Kontak"
        title="Hubungi kami lewat WhatsApp."
        description="Cara paling cepat untuk berdiskusi. Pilih topik yang paling sesuai, kami balas di jam kerja." />

    @php
        $topics = [
            [
                'label' => 'Konsultasi & Harga',
                'title' => 'Tanya harga atau jadwalkan konsultasi',
                'message' => 'Halo, saya ingin menanyakan harga pembuatan website sekolah.',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v11H8l-4 4V5Z"/><path stroke-linecap="round" d="M8 9h8M8 12.5h5"/>',
            ],
            [
                'label' => 'Demo & Contoh',
                'title' => 'Minta demo atau preview tampilan website',
                'message' => 'Halo, saya ingin melihat demo atau preview konsep website sekolah.',
                'icon' => '<rect x="3.5" y="4.5" width="17" height="15" rx="2"/><path stroke-linecap="round" d="M3.5 9h17"/>',
            ],
            [
                'label' => 'Perawatan',
                'title' => 'Sudah punya website, butuh perawatan',
                'message' => 'Halo, sekolah kami sudah punya website dan butuh perawatan/perbaruan.',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M14.5 6.5a4 4 0 0 0-5.3 5.3L4 17v3h3l5.2-5.2a4 4 0 0 0 5.3-5.3l-2.5 2.5-2.5-.5-.5-2.5 2.5-2.5Z"/>',
            ],
        ];
    @endphp

    <section class="section pt-14 lg:pt-16">
        <div class="container-page">
            <div class="grid gap-8 lg:grid-cols-5">
                <div class="lg:col-span-3 grid gap-4 content-start">
                    @foreach ($topics as $topic)
                        <a href="{{ \App\Support\WhatsApp::url($topic['message']) }}" target="_blank" rel="noopener"
                           class="group card flex items-center gap-5 p-6 transition hover:border-blue/40 hover:shadow-soft">
                            <span class="icon-box shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">{!! $topic['icon'] !!}</svg>
                            </span>
                            <div class="flex-1">
                                <p class="text-xs font-semibold uppercase tracking-wider text-blue">{{ $topic['label'] }}</p>
                                <p class="mt-1 font-display font-semibold text-lg text-navy">{{ $topic['title'] }}</p>
                            </div>
                            <svg class="w-5 h-5 shrink-0 text-slate/60 transition group-hover:translate-x-1 group-hover:text-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5"/></svg>
                        </a>
                    @endforeach
                </div>

                <aside class="lg:col-span-2">
                    <div class="relative overflow-hidden rounded-2xl bg-navy p-8 text-white">
                        <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-blue/30 blur-3xl" aria-hidden="true"></div>
                        <div class="relative">
                            <span class="grid place-items-center w-12 h-12 rounded-xl bg-white/10">
                                <x-icon-whatsapp class="w-6 h-6" />
                            </span>
                            <p class="mt-6 text-sm text-white/60">Nomor WhatsApp</p>
                            <a href="{{ \App\Support\WhatsApp::url() }}" target="_blank" rel="noopener" class="mt-1 block font-display font-bold text-2xl tracking-tight hover:text-white/90">
                                {{ \App\Support\WhatsApp::formatNumber() }}
                            </a>

                            <div class="mt-6 pt-6 border-t border-white/10">
                                <p class="text-sm text-white/60">Jam layanan</p>
                                <p class="mt-1 font-semibold">Senin–Jumat · 08.00–17.00 WIB</p>
                            </div>

                            <a href="{{ \App\Support\WhatsApp::url() }}" target="_blank" rel="noopener" class="btn btn-light w-full mt-8">
                                Mulai Chat
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</x-site-layout>