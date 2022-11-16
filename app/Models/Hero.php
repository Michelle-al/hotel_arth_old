<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

//    To stop Laravel from creating updated_at and created_at fields while populating the db with a seeder
    public $timestamps = false;

    public $fillable = ['title', 'title_english', 'media_url', 'subtitle', 'subtitle_english'];
}
