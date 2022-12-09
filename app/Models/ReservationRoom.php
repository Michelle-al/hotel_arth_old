<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationRoom extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['reservation_id', 'room_number'];
    protected $table= "reservations_rooms";
}
