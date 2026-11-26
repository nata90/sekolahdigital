@props(['pageTitle' => null])

@php
    $navItems = [
        ['route' => 'home', 'label' => 'Beranda'],
        ['route' => 'packages', 'label' => 'Paket'],
        ['route' => 'about', 'label' => 'Tentang'],
        ['route' => 'contact', 'label' => 'Kontak'],
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ $site->meta_description }}">
        <meta name="theme-color" content="#0B2447">
        <meta property="og:title" content="{{ $site->meta_title }}">
        <meta property="og:description" content="{{ $site->meta_description }}">

        <title>{{ ($pageTitle ?? null) ? $pageTitle . ' — ' . $site->meta_title : $site->meta_title }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex min-h-screen flex-col font-sans antialiased bg-paper text-ink">
        <a href="#konten" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-[60] btn btn-primary">Lewati ke konten</a>

        <header class="sticky top-0 z-40 border-b border-line/80 bg-white/85 backdrop-blur-md" x-data="{ open: false }" @keydown.escape.window="open = false">
            <div class="container-page">
                <div class="flex items-center justify-between h-16">
                    <a href="{{ route('home') }}" class="flex items-center gap-2.5" aria-label="SekolahDigital — Beranda">
                        <span class="grid place-items-center w-9 h-9 rounded-lg bg-navy text-white font-display font-bold text-sm">SD</span>
                        <span class="font-display font-bold text-lg tracking-tight text-navy">Sekolah<span class="text-blue">Digital</span></span>
                    </a>

                    <nav class="hidden md:flex items-center gap-1 text-sm font-medium" aria-label="Navigasi utama">
                        @foreach ($navItems as $item)
                            @php $active = request()->routeIs($item['route']); @endphp
                            <a href="{{ route($item['route']) }}"
                               @if ($active) aria-current="page" @endif
                               class="px-3.5 py-2 rounded-lg transition-colors {{ $active ? 'text-navy bg-sky font-semibold' : 'text-slate hover:text-navy hover:bg-cloud' }}">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </nav>

                    <div class="flex items-center gap-2">
                        <a href="{{ \App\Support\WhatsApp::url() }}" target="_blank" rel="noopener" class="hidden sm:inline-flex btn btn-primary py-2.5">
                            <x-icon-whatsapp class="w-4 h-4" />
                            Hubungi Kami
                        </a>
                        <button @click="open = !open" :aria-expanded="open" aria-controls="mobile-nav" aria-label="Buka menu"
                                class="md:hidden grid place-items-center w-10 h-10 -mr-2 rounded-lg text-navy hover:bg-cloud" type="button">
                            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16"/></svg>
                            <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>

                <nav id="mobile-nav" x-show="open" x-cloak x-transition.opacity class="md:hidden pb-4 pt-1 flex flex-col gap-1 text-sm font-medium" aria-label="Navigasi seluler">
                    @foreach ($navItems as $item)
                        @php $active = request()->routeIs($item['route']); @endphp
                        <a href="{{ route($item['route']) }}"
                           @if ($active) aria-current="page" @endif
                           class="px-3 py-2.5 rounded-lg {{ $active ? 'text-navy bg-sky font-semibold' : 'text-slate hover:text-navy hover:bg-cloud' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                    <a href="{{ \App\Support\WhatsApp::url() }}" target="_blank" rel="noopener" class="btn btn-primary mt-2">
                        <x-icon-whatsapp class="w-4 h-4" />
                        Hubungi Kami
                    </a>
                </nav>
            </div>
        </header>

        <main id="konten" class="flex-1">
            {{ $slot }}
        </main>

        <footer class="bg-navy-deep text-white/70">
            <div class="container-page py-16">
                <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-12">
                    <div class="lg:col-span-5">
                        <div class="flex items-center gap-2.5 mb-4">
                            <span class="grid place-items-center w-9 h-9 rounded-lg bg-white text-navy font-display font-bold text-sm">SD</span>
                            <span class="font-display font-bold text-lg text-white">SekolahDigital</span>
                        </div>
                        <p class="text-sm leading-relaxed max-w-sm">Jasa pembuatan website sekolah profesional. Fokus melayani sekolah Indonesia sejak 2021.</p>
                    </div>

                    <div class="lg:col-span-3">
                        <p class="text-xs font-semibold uppercase tracking-wider text-white mb-4">Menu</p>
                        <ul class="space-y-2.5 text-sm">
                            @foreach ($navItems as $item)
                                <li><a href="{{ route($item['route']) }}" class="hover:text-white transition-colors">{{ $item['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="lg:col-span-4">
                        <p class="text-xs font-semibold uppercase tracking-wider text-white mb-4">Kontak</p>
                        <a href="{{ \App\Support\WhatsApp::url() }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2.5 text-sm hover:text-white transition-colors">
                            <x-icon-whatsapp class="w-4 h-4" />
                            <span>{{ \App\Support\WhatsApp::formatNumber($site->wa_number) }}</span>
                        </a>
                        <p class="mt-2 text-sm text-white/50">Senin–Jumat · 08.00–17.00 WIB</p>
                    </div>
                </div>

                <div class="border-t border-white/10 mt-12 pt-6 flex flex-col sm:flex-row justify-between gap-2 text-xs text-white/40">
                    <p>© {{ date('Y') }} SekolahDigital. Hak cipta dilindungi.</p>
                    <p>SD · SMP · SMA · SMK · Yayasan</p>
                </div>
            </div>
        </footer>

        <a href="{{ \App\Support\WhatsApp::url() }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp"
           class="fixed bottom-5 right-5 z-50 grid place-items-center w-14 h-14 rounded-full bg-[#25D366] text-white shadow-lift hover:brightness-95 transition">
            <x-icon-whatsapp class="w-7 h-7" />
        </a>
    </body>
</html>