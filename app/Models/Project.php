<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'name_en',
        'name_kh',
        'name_ch',
        'slug',
        'pdf',
        'type_en',
        'type_kh',
        'type_ch',
        'category',
        'locate_text_en',
        'locate_text_kh',
        'locate_text_ch',
        'locate_link',
        'banner',
        'image',
        'image_default',
        'description_default_cn',
        'description_default_kh',
        'description_default_en'    
    ];

    protected $casts = [
        'category' => 'array',
        'image_default' => 'array',
    ];

    // Optional accessors
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getDefaultImagesUrlsAttribute()
    {
        return $this->image_default ? collect($this->image_default)->map(fn($img) => asset('storage/' . $img)) : collect();
    }

}
