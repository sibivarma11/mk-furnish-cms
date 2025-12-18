<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'category',
        'image',
        'description',
    ];

    protected $hidden = [
        'image',
    ];

    protected $appends = [
        'image_url',
    ];

    /**
     * Get the base64 encoded image URL.
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return 'data:image/jpeg;base64,' . base64_encode($this->image);
        }
        return null;
    }
}
