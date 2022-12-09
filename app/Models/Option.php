<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Option extends Model
{
    use HasFactory, HasTranslations;

    public $timestamps = false;

    public array $translatable = ['option_name'];
    public $fillable = [
        'option_name',
        'option_price',
    ];
}
