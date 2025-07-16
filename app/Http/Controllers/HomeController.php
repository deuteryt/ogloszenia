<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Advertisement;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()
            ->main()
            ->with('children')
            ->orderBy('sort_order')
            ->get();

        $recentAds = Advertisement::active()
            ->recent()
            ->with('category')
            ->limit(12)
            ->get();

        $featuredAds = Advertisement::active()
            ->featured()
            ->with('category')
            ->limit(6)
            ->get();

        $sidebarBanners = Banner::active()
            ->position('sidebar')
            ->orderBy('sort_order')
            ->get();

        return view('home', compact(
            'categories',
            'recentAds',
            'featuredAds',
            'sidebarBanners'
        ));
    }
}