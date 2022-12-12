<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations_option extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'reservation_id',
        'option_id',
    ];

    protected $table = 'reservations_options';
}
