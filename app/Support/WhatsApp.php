<?php

namespace App\Support;

use App\Models\Setting;

class WhatsApp
{
    public static function url(?string $message = null, ?string $number = null): string
    {
        $number = $number ?? Setting::get('wa_number', '6281234567890');
        $message = $message ?? Setting::get('wa_message_default', 'Halo, saya mau tanya jasa website sekolah.');

        $number = preg_replace('/[^0-9]/', '', $number);

        return 'https://wa.me/' . $number . '?text=' . rawurlencode($message);
    }

    public static function formatNumber(?string $number = null): string
    {
        $number = $number ?? Setting::get('wa_number', '6281234567890');
        $number = preg_replace('/[^0-9]/', '', $number);

        if ($number === '') {
            return '';
        }

        if (str_starts_with($number, '0')) {
            $number = '62' . substr($number, 1);
        }

        $prefix = str_starts_with($number, '62') ? '+62 ' : '+';
        $digits = str_starts_with($number, '62') ? substr($number, 2) : $number;

        $groups = [];
        $remaining = $digits;
        while (strlen($remaining) > 3) {
            $groups[] = substr($remaining, 0, 4);
            $remaining = substr($remaining, 4);
        }
        if ($remaining !== '') {
            $groups[] = $remaining;
        }

        return $prefix . implode('-', $groups);
    }
}