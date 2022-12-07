<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //    To stop Laravel from creating updated_at and created_at fields while populating the db with a seeder
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token', // TODO - Enable ?
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /* TODO - Enable ?
     * protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/


    // TODO - Créer la fonction si nécessaire pour récupérer le/les commentaires d'un utilisateur
    /**
     * Get the review(s) send by a customer.
     */
    /*public function reviews()
    {
        return $this->hasMany(Review::class);
    }*/

}
