<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Pagination support
        $perPage = $request->input('per_page', 15);

        if ($request->has('paginate') && $request->paginate === 'false') {
            $products = $query->get();
            return response()->json($products);
        } else {
            $products = $query->paginate($perPage);
            return response()->json($products);
        }
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }
}
