<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int user_id
 * @property int number_of_people
 * @property string checkin
 * @property string checkout
 * @property bool has_options
 * @property float price
 * @property string stay_type
 * @property string status
 */
class Reservation extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['checkin', 'checkout'];
    /**
     * Reservations that belongs to many rooms
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'reservation_rooms');
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'reservations_options');
    }
}
