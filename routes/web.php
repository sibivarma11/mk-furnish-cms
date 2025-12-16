<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/submit', function () {
    return response()->json(['message' => 'Form submitted successfully']);
});

Route::get('/products/{product}/image', function (\App\Models\Product $product) {
    if (!$product->image) {
        abort(404);
    }
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->buffer($product->image);

    return response($product->image)->header('Content-Type', $mime);
})->name('products.image');

Route::get('/testimonials/{testimonial}/image', function (\App\Models\Testimonial $testimonial) {
    if (!$testimonial->image) {
        abort(404);
    }
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->buffer($testimonial->image);

    return response($testimonial->image)->header('Content-Type', $mime);
})->name('testimonials.image');
