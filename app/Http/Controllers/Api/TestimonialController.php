<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index(Request $request)
    {
        $query = Testimonial::query();

        // Filter by minimum rating if provided
        if ($request->has('min_rating')) {
            $query->where('rating', '>=', $request->min_rating);
        }

        // Order by latest first
        $query->orderBy('created_at', 'desc');

        // Pagination support
        $perPage = $request->input('per_page', 15);

        if ($request->has('paginate') && $request->paginate === 'false') {
            $testimonials = $query->get();
            return response()->json($testimonials);
        } else {
            $testimonials = $query->paginate($perPage);
            return response()->json($testimonials);
        }
    }

    /**
     * Display the specified testimonial.
     */
    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return response()->json($testimonial);
    }
}
