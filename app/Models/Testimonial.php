<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'role',
        'rating',
        'content',
        'image',
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
