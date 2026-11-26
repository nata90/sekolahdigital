<x-site-layout pageTitle="Tentang">
    <x-page-header
        eyebrow="Tentang Kami"
        title="Kami membantu sekolah tampil profesional di dunia digital." />

    <section class="section">
        <div class="container-page">
            <div class="grid gap-12 lg:grid-cols-5 lg:gap-16">
                <div class="lg:col-span-3">
                    <p class="eyebrow mb-3">Cerita Kami</p>
                    <h2 class="h-section text-2xl sm:text-3xl">Berawal dari kebutuhan sekolah, bukan template.</h2>
                    <div class="mt-6 space-y-5 text-slate leading-relaxed">
                        <p>{{ $about_intro ?? 'Kami membantu sekolah memiliki website profesional: informasi lengkap, mudah dikelola, dan tampil modern.' }}</p>
                        <p>{{ $about_story ?? 'Berdiri sejak 2021, kami fokus membangun website sekolah yang informatif dan mudah dikelola oleh staf non-teknis. Lebih dari 50 sekolah telah mempercayakan website mereka kepada kami.' }}</p>
                        <p>Kami percaya sekolah tidak butuh website yang rumit. Mereka butuh website yang cepat, jelas, dan bisa dikelola sendiri oleh guru atau staf TU — tanpa jasa developer setiap kali ingin mengubah berita.</p>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <dl class="card shadow-soft divide-y divide-line">
                        @foreach ([['100%', 'CMS dikelola sendiri'], ['4-6 Mgg', 'Estimasi pengerjaan'], ['1 Tahun', 'Hosting & domain gratis']] as [$value, $label])
                            <div class="px-8 py-6">
                                <dt class="text-sm text-slate">{{ $label }}</dt>
                                <dd class="mt-1 font-display font-bold text-3xl tracking-tight text-navy">{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>
    </section>

    @php
        $values = [
            [
                'title' => 'Tanpa biaya tersembunyi',
                'text' => 'Harga final disepakati di awal. Tidak ada biaya tambahan di tengah jalan.',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 7.5h16v11H4z"/><path stroke-linecap="round" d="M4 11h16M8 15h3"/>',
            ],
            [
                'title' => 'Fokus pada sekolah',
                'text' => 'Kami paham kebutuhan sekolah Indonesia: PPDB, berita, agenda, galeri, dan kemudahan staf.',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="m3 9 9-5 9 5-9 5-9-5Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M7 11.2V16c0 1.1 2.2 2.5 5 2.5s5-1.4 5-2.5v-4.8"/>',
            ],
            [
                'title' => 'Dukungan WhatsApp',
                'text' => 'Langsung chat — respons cepat di jam kerja, tanpa tiket, tanpa membuka email.',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v11H8l-4 4V5Z"/><path stroke-linecap="round" d="M8 9h8M8 12.5h5"/>',
            ],
        ];
    @endphp

    <section class="section bg-cloud border-y border-line">
        <div class="container-page">
            <div class="max-w-2xl">
                <p class="eyebrow mb-3">Komitmen</p>
                <h2 class="h-section">Kenapa sekolah memilih kami</h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ($values as $value)
                    <div class="card p-7">
                        <span class="icon-box">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">{!! $value['icon'] !!}</svg>
                        </span>
                        <h3 class="mt-5 font-display font-semibold text-lg text-navy">{{ $value['title'] }}</h3>
                        <p class="mt-2 text-sm text-slate leading-relaxed">{{ $value['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-cta-banner
        title="Siap memulai?"
        description="Yuk diskusikan website sekolahmu bersama kami."
        message="Halo, saya ingin mulai membuat website sekolah." />
</x-site-layout>