<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property int id
 * @property string title
 * @property string video_url
 * @property string description
 * @property string slug
 */
class PresentationVideo extends Model
{
    use HasFactory, HasTranslations;

    //    To stop Laravel from creating updated_at and created_at fields while populating the db with a seeder
    public $timestamps = false;

    public $translatable = ['title', 'description'];

    public $fillable = ['title', 'video_url', 'description', 'slug'];

}
