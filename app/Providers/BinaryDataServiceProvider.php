<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;

class BinaryDataServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Set proper encoding for database connections
        if (config('database.default') === 'mysql') {
            DB::statement("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
        }
    }
}