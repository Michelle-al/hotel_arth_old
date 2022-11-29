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
class RoomCategory extends Model
{
    use HasFactory, HasTranslations;

//    To stop Laravel from creating updated_at and created_at fields while populating the db with a seeder
    public $timestamps = false;

    public $translatable = ['title', 'description'];

    public $fillable = ['media_url', 'title', 'description'];
}
