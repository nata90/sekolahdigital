<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PortfolioItem;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'portfolios' => PortfolioItem::count(),
            'packages' => Package::count(),
            'published' => PortfolioItem::where('is_published', true)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}