<?php

use App\Http\Controllers\Api\FormSubmissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/form-submissions', [FormSubmissionController::class, 'store']);

