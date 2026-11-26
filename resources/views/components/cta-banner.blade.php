@props([
    'title' => 'Konsultasi gratis. Diskusikan kebutuhan, dapatkan estimasi harga.',
    'description' => 'Respons cepat, Senin–Jumat 08.00–17.00 WIB.',
    'message' => 'Halo, saya ingin konsultasi gratis tentang website sekolah.',
    'button' => 'Chat via WhatsApp',
])

<section class="section">
    <div class="container-page">
        <div class="relative overflow-hidden rounded-3xl bg-navy px-6 py-14 sm:px-12 lg:py-16">
            <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-blue/30 blur-3xl" aria-hidden="true"></div>
            <div class="absolute -bottom-32 -left-16 h-72 w-72 rounded-full bg-blue/20 blur-3xl" aria-hidden="true"></div>

            <div class="relative flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
                <div class="max-w-2xl">
                    <h2 class="font-display font-bold text-3xl sm:text-4xl tracking-tight text-white text-balance">{{ $title }}</h2>
                    @if ($description)
                        <p class="mt-3 text-white/70">{{ $description }}</p>
                    @endif
                </div>
                <a href="{{ \App\Support\WhatsApp::url($message) }}" target="_blank" rel="noopener"
                   class="btn btn-lg btn-light shrink-0">
                    <x-icon-whatsapp class="w-5 h-5 text-blue" />
                    {{ $button }}
                </a>
            </div>
        </div>
    </div>
</section>
