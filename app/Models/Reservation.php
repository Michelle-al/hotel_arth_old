<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public $fillable = ['checkin', 'checkout', 'user_id', 'number_of_people', 'price', 'stay_type'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rooms() : BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'reservation_rooms');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function options() : BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'reservations_options');
    }
}
