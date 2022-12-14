<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'description', 'media_alt'];
    public $timestamps = true;
    public $guarded = [];
    public $fillable = ['title'];
}
