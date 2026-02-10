<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLatest extends Model
{
    use HasFactory;
    protected $table = 'news_latests';
    protected $fillable = [
        'title_en',
        'description_en',

        'title_kh',
        'description_kh',

        'title_cn',
        'description_cn',
        'images'
    ];
    protected $casts = [
        'images' => 'array', // important for JSON
    ];
}
