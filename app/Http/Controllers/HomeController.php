<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->active()
            ->ordered()
            ->with(['images' => fn ($q) => $q->orderBy('sort_order')])
            ->get();

        $featured = Product::query()
            ->active()
            ->where('is_featured', true)
            ->ordered()
            ->with(['images' => fn ($q) => $q->orderBy('sort_order')])
            ->take(4)
            ->get();

        $categories = Category::query()
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('home', compact('products', 'featured', 'categories'));
    }

    public function show(string $slug)
    {
        $product = Product::query()
            ->active()
            ->where('slug', $slug)
            ->with(['images' => fn ($q) => $q->orderBy('sort_order')])
            ->firstOrFail();

        return view('product', compact('product'));
    }
}
