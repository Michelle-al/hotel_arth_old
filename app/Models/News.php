<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property int id
 * @property string media_url
 * @property string title
 * @property string description
 */
class News extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'description'];
    public $timestamps = true;
    public $guarded = [];
    public $fillable = ['title'];
}
