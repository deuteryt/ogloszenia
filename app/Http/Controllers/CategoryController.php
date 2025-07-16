<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Advertisement;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $advertisements = Advertisement::active()
            ->where('category_id', $category->id)
            ->with('category')
            ->recent()
            ->paginate(12);

        $categories = Category::active()
            ->main()
            ->with('children')
            ->orderBy('sort_order')
            ->get();

        return view('category.show', compact(
            'category',
            'advertisements',
            'categories'
        ));
    }
}