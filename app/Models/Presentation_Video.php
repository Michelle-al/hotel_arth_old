<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation_Video extends Model
{
    use HasFactory;

    //    To stop Laravel from creating updated_at and created_at fields while populating the db with a seeder
    public $timestamps = false;
}
