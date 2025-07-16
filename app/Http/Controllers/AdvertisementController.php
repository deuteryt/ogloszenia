<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    public function show(Advertisement $advertisement)
    {
        $relatedAds = Advertisement::active()
            ->where('category_id', $advertisement->category_id)
            ->where('id', '!=', $advertisement->id)
            ->limit(6)
            ->get();

        return view('advertisement.show', compact(
            'advertisement',
            'relatedAds'
        ));
    }
}