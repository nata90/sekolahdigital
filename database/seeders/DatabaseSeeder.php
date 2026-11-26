<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PortfolioItem;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedSettings();
        $this->seedPackages();
        $this->seedPortfolio();
    }

    private function seedSettings(): void
    {
        $defaults = [
            'wa_number' => '6281234567890',
            'wa_message_default' => 'Halo, saya mau tanya jasa website sekolah.',
            'hero_headline' => 'Website Sekolah Profesional Mulai Rp 12 Juta',
            'hero_subheadline' => 'Dibangun khusus untuk sekolah Indonesia. Siap tayang dalam 4–6 minggu dengan dukungan WhatsApp.',
            'hero_badge' => 'Khusus Sekolah · SD, SMP, SMA, SMK, Yayasan',
            'about_intro' => 'Kami membantu sekolah memiliki website profesional: informasi lengkap, mudah dikelola, dan tampil modern.',
            'about_story' => 'Berdiri sejak 2021, kami fokus membangun website sekolah yang informatif dan mudah dikelola oleh staf non-teknis. Lebih dari 50 sekolah telah mempercayakan website mereka kepada kami.',
            'meta_title' => 'SekolahDigital - Jasa Pembuatan Website Sekolah',
            'meta_description' => 'Jasa pembuatan website sekolah profesional. Mulai Rp 12 juta. CMS mudah, desain modern, support WhatsApp.',
            'og_image' => '',
        ];

        foreach ($defaults as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }

    private function seedPackages(): void
    {
        $standard = [
            'name' => 'Paket Standard',
            'slug' => 'standard',
            'price_display' => 'Rp 12.000.000',
            'timeline' => '4–6 minggu',
            'highlight' => 'Pilihan paling populer untuk sekolah',
            'description' => 'Website lengkap dengan fitur standar untuk sekolah.',
            'included' => [
                'Hingga 15 halaman',
                'CMS penuh (berita, agenda, galeri)',
                'Galeri 200 foto',
                'Direktori guru & staff',
                'Portal orang tua',
                'Custom domain',
                'SSL + hosting 1 tahun',
                'Support WhatsApp (jam kerja)',
                'Revisi 3 ronde',
                'Pelatihan 1 jam (online)',
            ],
            'not_included' => [
                'Portal siswa',
                'Integrasi LMS',
                'Modul custom',
                'Revisi tanpa batas',
            ],
            'cta_text' => 'Tanya Paket Standard',
            'is_popular' => true,
            'is_active' => true,
            'sort_order' => 1,
        ];

        $custom = [
            'name' => 'Paket Custom',
            'slug' => 'custom',
            'price_display' => 'Mulai Rp 25.000.000',
            'timeline' => '8–16 minggu',
            'highlight' => 'Solusi disesuaikan dengan kebutuhan sekolah',
            'description' => 'Website sepenuhnya disesuaikan: fitur khusus, integrasi, dan desain unik.',
            'included' => [
                'Halaman tanpa batas',
                'CMS penuh + modul custom',
                'Galeri tanpa batas',
                'Direktori guru & staff',
                'Portal orang tua & siswa',
                'Integrasi LMS (opsional)',
                'Custom domain',
                'SSL + hosting 1 tahun',
                'Support prioritas WhatsApp + panggilan terjadwal',
                'Revisi tanpa batas (dalam lingkup)',
                'Pelatihan 3 jam (online/onsite)',
                'Desain unik sesuai identitas sekolah',
            ],
            'not_included' => [
                'Biaya lisensi software pihak ketiga (jika ada)',
            ],
            'cta_text' => 'Request Custom Quote',
            'is_popular' => false,
            'is_active' => true,
            'sort_order' => 2,
        ];

        Package::updateOrCreate(['slug' => 'standard'], $standard);
        Package::updateOrCreate(['slug' => 'custom'], $custom);
    }

    private function seedPortfolio(): void
    {
        $items = [
            [
                'name' => 'SDN Cendekia Harapan',
                'school_type' => 'SD',
                'region' => 'Jakarta Selatan',
                'description' => 'Website sekolah dasar dengan portal orang tua dan galeri kegiatan.',
                'features' => 'Berita, Agenda, Galeri, Portal Orang Tua',
                'live_url' => null,
                'sort_order' => 1,
            ],
            [
                'name' => 'SMP Islam Al-Falah',
                'school_type' => 'SMP',
                'region' => 'Bekasi',
                'description' => 'SMP Islam dengan direktori guru, PPDB online, dan integrasi pembayaran SPP.',
                'features' => 'PPDB Online, Direktori Guru, Berita, Agenda',
                'live_url' => null,
                'sort_order' => 2,
            ],
            [
                'name' => 'SMK Teknologi Nusantara',
                'school_type' => 'SMK',
                'region' => 'Bandung',
                'description' => 'SMK dengan jurusan industri kreatif. Menampilkan karya siswa dan info industri.',
                'features' => 'Jurusan, Karya Siswa, Berita, Galeri',
                'live_url' => null,
                'sort_order' => 3,
            ],
            [
                'name' => 'SMA Global Prestasi',
                'school_type' => 'SMA',
                'region' => 'Depok',
                'description' => 'Website SMA modern dengan profil alumni dan portal siswa.',
                'features' => 'Profil Alumni, Portal Siswa, Berita, Agenda',
                'live_url' => null,
                'sort_order' => 4,
            ],
            [
                'name' => 'Yayasan Pendidikan Cemara',
                'school_type' => 'Yayasan',
                'region' => 'Tangerang',
                'description' => 'Portal multi-sekolah untuk yayasan yang mengelola 3 unit sekolah.',
                'features' => 'Multi Unit, Profil Yayasan, Berita, Galeri',
                'live_url' => null,
                'sort_order' => 5,
            ],
        ];

        foreach ($items as $item) {
            $item['slug'] = \Illuminate\Support\Str::slug($item['name']);
            PortfolioItem::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}