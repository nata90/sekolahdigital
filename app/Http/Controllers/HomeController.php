<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PortfolioItem;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = $this->publicSettings();

        return view('home', $settings + [
            'packages' => Package::where('is_active', true)->orderBy('sort_order')->get(),
            'portfolioItems' => PortfolioItem::where('is_published', true)->orderBy('sort_order')->take(3)->get(),
        ]);
    }

    public function portfolio(Request $request)
    {
        $query = PortfolioItem::where('is_published', true);

        if ($type = $request->query('type')) {
            $query->where('school_type', $type);
        }

        $items = $query->orderBy('sort_order')->get();

        return view('portfolio', [
            'settings' => $this->publicSettings(),
            'items' => $items,
            'schoolTypes' => PortfolioItem::query()->distinct()->pluck('school_type'),
        ]);
    }

    public function packages()
    {
        $packages = Package::where('is_active', true)->orderBy('sort_order')->get();

        return view('packages', [
            'settings' => $this->publicSettings(),
            'packages' => $packages,
        ]);
    }

    public function about()
    {
        return view('about', $this->publicSettings());
    }

    public function contact()
    {
        return view('contact', $this->publicSettings());
    }

    private function publicSettings(): array
    {
        $keys = [
            'wa_number', 'wa_message_default', 'hero_headline', 'hero_subheadline',
            'hero_badge', 'about_intro', 'about_story', 'meta_title', 'meta_description',
        ];

        $settings = [];
        foreach ($keys as $key) {
            $settings[$key] = Setting::get($key);
        }

        return $settings;
    }
}