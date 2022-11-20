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
        Customer::factory()
            ->count(6)
            ->create();

        /* DB::table('customers') -> insert([
            "firstname" => Str::random(8),
            "lastname" => Str::random(8),
            "email" => Str::random(10).'@example.com',
            "phone" => Int::random(10),
            "avatar" => "storage/avatar/avatar1.png",
            "password"=> Hash::make('password'),
        ]);*/

    }
}
