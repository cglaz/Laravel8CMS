<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'page_image',
        'body',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPageImageAttribute($value)
    {
        if (strpos($value, 'https://') !== false || strpos($value, 'http://') !== false) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
