<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Review extends Model
{
    use HasFactory;

    public $timestamps = ["created_at"]; // We only want to use created_at column
    const UPDATED_AT = null; // updated_at column will be set to null by default

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $fillable = [
        'customer_id',
        'rating',
        'title',
        'body',
        'is_displayed',
    ];


    /**
     * Get the content of the table customers where customer_id = customer.id
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

}
