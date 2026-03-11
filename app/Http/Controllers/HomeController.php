<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $categorySlug = $request->query('category');
        $sort = $request->query('sort', 'newest');

        $productsQuery = Product::query()
            ->active()
            ->with(['images' => fn ($q) => $q->orderBy('sort_order')]);

        if ($categorySlug) {
            $productsQuery->where(function ($q) use ($categorySlug) {
                $q->whereHas('category', fn ($c) => $c->where('slug', $categorySlug))
                    ->orWhereHas('categories', fn ($c) => $c->where('slug', $categorySlug));
            });
        }

        match ($sort) {
            'price_asc' => $productsQuery->orderByRaw('COALESCE(sale_price, price) ASC'),
            'price_desc' => $productsQuery->orderByRaw('COALESCE(sale_price, price) DESC'),
            'newest' => $productsQuery->ordered()->orderByDesc('created_at'),
            'oldest' => $productsQuery->ordered()->orderBy('created_at'),
            default => $productsQuery->ordered(),
        };

        $products = $productsQuery->get();

        $featured = Product::query()
            ->active()
            ->where('is_featured', true)
            ->ordered()
            ->with(['images' => fn ($q) => $q->orderBy('sort_order')])
            ->take(4)
            ->get();

        return view('home', compact('products', 'featured', 'categories', 'categorySlug', 'sort'));
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
