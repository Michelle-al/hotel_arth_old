<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
           ->count(6)
           ->create();


//        DB::table('users') -> insert([
//            [
//                "firstname" => "Kaley",
//                "lastname" => "King",
//                "email" => "k.king@example.net",
//                "phone" => "1-281-295-6068",
//                "avatar" => "storage/avatars/avatar1.png",
//                "password" => "P1vt7%63Hn#LoR'",
//            ],
//            [
//                "firstname" => "Jean",
//                "lastname" => "Glloq",
//                "email" => "J.glloq@example.net",
//                "phone" => "854-862-2256",
//                "avatar" => "storage/avatars/avatar1.png",
//                "password" => "mM:w`,v,?%%%K9'o",
//            ],
//            [
//                "firstname" => "Maryse",
//                "lastname" => "Longueville",
//                "email" => "m.longueville@example.com",
//                "phone" => "+15209556585",
//                "avatar" => "storage/avatars/avatar1.png",
//                "password" => "2wtZ0Q,o1hR",
//            ],
//            [
//                "firstname" => "Elsa",
//                "lastname" => "Patchez",
//                "email" => "e.patchez@example.com",
//                "phone" => "+19542804851",
//                "avatar" => "storage/avatars/avatar1.png",
//                "password" => "CWsA5>80'",
//            ],
//            [
//                "firstname" => "Juanita",
//                "lastname" => "Carter",
//                "email" => "j.carter@example.com",
//                "phone" => "(985) 918-6629",
//                "avatar" => "storage/avatars/avatar1.png",
//                "password" => "Onf3cfxEUi8dmUq3}Uj",
//            ],
//            [
//                "firstname" => "Annie",
//                "lastname" => "Rogahn",
//                "email" => "a.roghan@example.com",
//                "phone" => "+33698011350",
//                "avatar" => "storage/avatars/avatar1.png",
//                "password" => ",*1iAy5KEUK&-`3&0$2",
//            ],
//        ]);
        /* "firstname" => Str::random(8),
            "lastname" => Str::random(8),
            "email" => Str::random(10).'@example.com',
            "phone" => Int::random(10),
            "avatar" => "storage/avatars/avatar1.png",
            "password"=> Hash::make('password'),
        */

    }
}
