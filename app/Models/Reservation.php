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

    /**
     * Get rooms for reservations.
     */
    public function rooms()
    {
        return $this->hasMany(ReservationRoom::class, 'room_id');
    }
}
