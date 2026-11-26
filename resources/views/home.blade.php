<x-site-layout pageTitle="Beranda">
    {{-- Hero --}}
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-grid [mask-image:radial-gradient(ellipse_at_top_right,black_20%,transparent_70%)]" aria-hidden="true"></div>

        <div class="container-page relative py-16 lg:py-24">
            <div class="grid items-center gap-14 lg:grid-cols-2">
                <div>
                    <p class="inline-flex items-center gap-2 rounded-full border border-line bg-white px-3 py-1.5 text-xs font-semibold text-navy shadow-soft">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue"></span>
                        {{ $hero_badge ?? 'Jasa Pembuatan Website Sekolah' }}
                    </p>
                    <h1 class="mt-6 font-display font-extrabold text-4xl sm:text-5xl lg:text-[3.4rem] tracking-tight text-navy leading-[1.1] text-balance">
                        {{ $hero_headline ?? 'Website Sekolah Profesional Mulai Rp 12 Juta' }}
                    </h1>
                    <p class="lead mt-6 max-w-xl">
                        {{ $hero_subheadline ?? 'Dibangun khusus untuk sekolah Indonesia. Rapi, cepat, dan mudah dikelola sendiri oleh staf sekolah.' }}
                    </p>

                    <div class="mt-9 flex flex-col sm:flex-row gap-3">
                        <a href="{{ \App\Support\WhatsApp::url('Halo, saya ingin konsultasi website sekolah terlebih dahulu.') }}"
                           target="_blank" rel="noopener" class="btn btn-lg btn-primary">
                            <x-icon-whatsapp class="w-5 h-5" />
                            Konsultasi Gratis
                        </a>
                        <a href="{{ route('packages') }}" class="btn btn-lg btn-secondary">
                            Lihat Paket Harga
                        </a>
                    </div>

                    <ul class="mt-8 flex flex-wrap gap-x-6 gap-y-2 text-sm text-slate">
                        @foreach (['Tanpa biaya tersembunyi', 'Hosting & domain 1 tahun', 'Dukungan via WhatsApp'] as $point)
                            <li class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m5 12.5 4.5 4.5L19 7.5"/></svg>
                                {{ $point }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Illustrative browser mockup of a school website --}}
                <div class="relative hidden lg:block" aria-hidden="true">
                    <div class="absolute -inset-6 rounded-[2rem] bg-gradient-to-br from-sky to-white"></div>
                    <div class="relative rounded-2xl bg-white shadow-lift ring-1 ring-line overflow-hidden">
                        <div class="flex items-center gap-3 border-b border-line bg-cloud px-4 py-3">
                            <div class="flex gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#FF5F57]"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-[#FEBC2E]"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-[#28C840]"></span>
                            </div>
                            <div class="flex-1 rounded-md bg-white border border-line px-3 py-1 text-[11px] text-slate">sekolahanda.sch.id</div>
                        </div>
                        <div class="flex items-center justify-between px-6 py-3 border-b border-line">
                            <div class="flex items-center gap-2">
                                <span class="w-6 h-6 rounded-md bg-blue"></span>
                                <span class="h-2 w-20 rounded bg-navy/80"></span>
                            </div>
                            <div class="flex gap-3">
                                <span class="h-1.5 w-8 rounded bg-line"></span>
                                <span class="h-1.5 w-8 rounded bg-line"></span>
                                <span class="h-1.5 w-8 rounded bg-line"></span>
                                <span class="h-1.5 w-10 rounded bg-blue/60"></span>
                            </div>
                        </div>
                        <div class="bg-navy px-6 py-9">
                            <span class="inline-block rounded-full bg-white/15 px-2.5 py-1 text-[10px] font-semibold text-white">PPDB 2026/2027 Dibuka</span>
                            <p class="mt-3 font-display font-bold text-xl text-white leading-snug">Selamat Datang di<br>Sekolah Unggulan Kami</p>
                            <div class="mt-4 flex gap-2">
                                <span class="h-7 w-24 rounded-md bg-blue"></span>
                                <span class="h-7 w-20 rounded-md border border-white/30"></span>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3 p-6">
                            @foreach (['Berita', 'Agenda', 'Galeri'] as $label)
                                <div class="rounded-lg border border-line p-3">
                                    <div class="h-12 rounded bg-sky"></div>
                                    <p class="mt-2 text-[11px] font-semibold text-navy">{{ $label }}</p>
                                    <div class="mt-1.5 h-1.5 w-4/5 rounded bg-line"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="absolute -bottom-6 -left-6 flex items-center gap-3 rounded-xl bg-white px-4 py-3 shadow-lift ring-1 ring-line">
                        <span class="icon-box w-9 h-9">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m5 12.5 4.5 4.5L19 7.5"/></svg>
                        </span>
                        <div>
                            <p class="text-sm font-semibold text-navy">Mudah dikelola</p>
                            <p class="text-xs text-slate">Staf TU bisa update sendiri</p>
                        </div>
                    </div>
                </div>
            </div>

            <dl class="mt-16 lg:mt-20 grid grid-cols-2 lg:grid-cols-3 gap-px overflow-hidden rounded-2xl border border-line bg-line shadow-soft">
                @foreach ([['4–6 minggu', 'Waktu pengerjaan'], ['100%', 'CMS mudah dikelola'], ['1 tahun', 'Hosting + domain']] as [$value, $label])
                    <div class="bg-white p-5 sm:p-6 text-center">
                        <dt class="text-sm text-slate">{{ $label }}</dt>
                        <dd class="mt-1 font-display font-bold text-xl sm:text-3xl tracking-tight text-navy whitespace-nowrap">{{ $value }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    {{-- Why --}}
    <section class="section bg-cloud border-y border-line">
        <div class="container-page">
            <div class="max-w-2xl">
                <p class="eyebrow mb-3">Kenapa Website Penting</p>
                <h2 class="h-section">Sekolah hari ini dinilai dari Google, bukan hanya dari papan nama.</h2>
            </div>

            @php
                $reasons = [
                    [
                        'title' => 'Calon siswa mencari sekolahmu dulu',
                        'text' => 'Sebelum mendaftar, orang tua menelusuri informasi secara online. Tanpa website, sekolahmu sulit ditemukan saat dibutuhkan.',
                        'icon' => '<circle cx="11" cy="11" r="6.5"/><path stroke-linecap="round" d="m20 20-4.2-4.2"/>',
                    ],
                    [
                        'title' => 'Informasi satu pintu',
                        'text' => 'Berita, agenda, dan pengumuman dalam satu tempat. Orang tua mencari informasi sendiri, staf fokus pada pekerjaan.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v11H8l-4 4V5Z"/><path stroke-linecap="round" d="M8 9h8M8 12.5h5"/>',
                    ],
                    [
                        'title' => 'Kesan profesional',
                        'text' => 'Website yang rapi, cepat, dan aman membangun kepercayaan orang tua, mitra, dan yayasan.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3 4.5 6v5.5c0 4.5 3.2 8.2 7.5 9.5 4.3-1.3 7.5-5 7.5-9.5V6L12 3Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4"/>',
                    ],
                ];
            @endphp

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ($reasons as $reason)
                    <div class="card p-7 transition hover:shadow-soft">
                        <span class="icon-box">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">{!! $reason['icon'] !!}</svg>
                        </span>
                        <h3 class="mt-5 font-display font-semibold text-lg text-navy">{{ $reason['title'] }}</h3>
                        <p class="mt-2 text-sm text-slate leading-relaxed">{{ $reason['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    {{-- Pricing --}}
    <section class="section bg-cloud border-y border-line">
        <div class="container-page">
            <div class="max-w-2xl mx-auto text-center">
                <p class="eyebrow mb-3">Paket Harga</p>
                <h2 class="h-section">Harga transparan, tanpa kerumitan.</h2>
                <p class="lead mt-4">Semua paket sudah termasuk CMS, hosting, dan dukungan WhatsApp.</p>
            </div>

            <div class="mt-12 grid gap-8 lg:grid-cols-2 max-w-4xl mx-auto items-start">
                @foreach ($packages as $package)
                    <x-package-card :package="$package" />
                @endforeach
            </div>

            <p class="mt-10 text-center text-sm text-slate">
                Butuh rincian lengkap? <a href="{{ route('packages') }}" class="font-semibold text-blue hover:text-blue-deep">Bandingkan paket →</a>
            </p>
        </div>
    </section>

    <x-cta-banner />
</x-site-layout>