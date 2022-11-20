<?php

namespace Database\Seeders;

use App\Models\Review;
use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Review::factory()
            ->count(6)
            ->create();

        // TODO - Faire corriger le code suivant après intégration des vraies données.
        /*DB::table('reviews')->insert([
            'customer_id' => random_int(1, 100),
            'rating' => random_int(1,5),
            'title' => Str::random(20),
            'body' => Str::words(Str::random(10), 50),
            'is_displayed' => random_int(0, 1),
        //TODO - Après les tests remettre is_displayed à false (0) par défaut pour les vrais avis clients.
        ]);*/


    }
}
