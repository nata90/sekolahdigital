<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.public-layout', function ($view) {
            $view->with('site', (object) [
                'wa_number' => Setting::get('wa_number', '6281234567890'),
                'wa_default' => Setting::get('wa_message_default', 'Halo, saya mau tanya jasa website sekolah.'),
                'meta_title' => Setting::get('meta_title', config('app.name', 'SekolahDigital')),
                'meta_description' => Setting::get('meta_description', ''),
            ]);
        });
    }
}
