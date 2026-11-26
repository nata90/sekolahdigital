<x-site-layout pageTitle="Paket Harga">
    <x-page-header
        eyebrow="Paket Harga"
        title="Pilih paket yang sesuai kebutuhan sekolah."
        description="Dua paket sederhana dengan harga transparan. Harga final disesuaikan kebutuhan — konsultasikan untuk rincian lengkap." />

    <section class="section pt-14 lg:pt-16">
        <div class="container-page">
            <div class="grid gap-8 lg:grid-cols-2 max-w-4xl mx-auto items-start">
                @foreach ($packages as $package)
                    <x-package-card :package="$package" :detailed="true" heading-tag="h2" />
                @endforeach
            </div>
        </div>
    </section>

    @php
        $steps = [
            ['title' => 'Konsultasi', 'text' => 'Diskusikan kebutuhan lewat WhatsApp. Dapatkan estimasi harga dan timeline.'],
            ['title' => 'Konfirmasi Pesanan', 'text' => 'Kamu setujui proposal, kami proses. Pembayaran dimulai dengan DP 50%.'],
            ['title' => 'Pengerjaan & Launch', 'text' => 'Kami bangun, kamu review, kami revisi hingga selesai dan siap tayang.'],
        ];
    @endphp

    <section class="section bg-cloud border-y border-line">
        <div class="container-page">
            <div class="max-w-2xl">
                <p class="eyebrow mb-3">Alur Kerja</p>
                <h2 class="h-section">Cara kami bekerja</h2>
            </div>

            <ol class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ($steps as $i => $step)
                    <li class="card p-7">
                        <span class="grid place-items-center w-10 h-10 rounded-full bg-navy text-white font-display font-bold text-sm">{{ $i + 1 }}</span>
                        <h3 class="mt-5 font-display font-semibold text-lg text-navy">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-sm text-slate leading-relaxed">{{ $step['text'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    <x-cta-banner
        title="Masih bingung pilih paket?"
        description="Ceritakan kebutuhanmu, kami bantu pilihkan yang paling sesuai dan hemat."
        message="Halo, saya masih bingung memilih paket. Boleh dibantu?"
        button="Konsultasi Gratis" />
</x-site-layout>