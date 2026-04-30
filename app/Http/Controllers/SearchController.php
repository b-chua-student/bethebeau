<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class SearchController extends Controller
{
    public function searchProductListing(Request $request)
    {
        $query = $request->input('query');
        $blockedTerms = ['active', 'inactive'];

        if (in_array(strtolower($query), $blockedTerms)) {
            return view('app.product-listing', ['products' => collect()]);
        }

        $products = Product::search($query)
            ->query(fn($q) => $q->where('is_active', true))
            ->get();
        return view('app.product-listing', compact('products'));
    }
}
