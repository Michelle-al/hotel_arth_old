<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /*Customer::factory()
            ->count(6)
            ->create();
        */

        DB::table('customers') -> insert([
            [
                "firstname" => "Kaley",
                "lastname" => "King",
                "email" => "fbechtelar@example.net",
                "phone" => "1-281-295-6068",
                "avatar" => "storage/avatar/avatar1.png",
                "password" => "P1vt7%63Hn#LoR'",
            ],
            [
                "firstname" => "Jammie",
                "lastname" => "Moen",
                "email" => "queenie54@example.net",
                "phone" => "854-862-2256",
                "avatar" => "storage/avatar/avatar1.png",
                "password" => "mM:w`,v,?%%%K9'o",
            ],
            [
                "firstname" => "Maryse",
                "lastname" => "Veum",
                "email" => "whudson@example.com",
                "phone" => "+15209556585",
                "avatar" => "storage/avatar/avatar1.png",
                "password" => "2wtZ0Q,o1hR",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "firstname" => "Javier",
                "lastname" => "Crist",
                "email" => "j.crist@example.com",
                "phone" => "+19542804851",
                "avatar" => "storage/avatar/avatar1.png",
                "password" => "CWsA5>80'",
            ],
            [
                "firstname" => "Santina",
                "lastname" => "Carter",
                "email" => "s.carter@example.com",
                "phone" => "(985) 918-6629",
                "avatar" => "storage/avatar/avatar1.png",
                "password" => "Onf3cfxEUi8dmUq3}Uj",
            ],
            [
                "firstname" => "Annie",
                "lastname" => "Rogahn",
                "email" => "a.roghan@example.com",
                "phone" => "+33698011350",
                "avatar" => "storage/avatar/avatar1.png",
                "password" => ",*1iAy5KEUK&-`3&0$2",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],

        /* "firstname" => Str::random(8),
            "lastname" => Str::random(8),
            "email" => Str::random(10).'@example.com',
            "phone" => Int::random(10),
            "avatar" => "storage/avatar/avatar1.png",
            "password"=> Hash::make('password'),
        */
        ]);
    }
}
