<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/submit', function () {
    return response()->json(['message' => 'Form submitted successfully']);
});
