<?php

namespace Database\Seeders;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\Review;
use Faker\Core\Number;
use Faker\Provider\fr_FR\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    private $customer;
    private $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /*Review::factory()
            ->count(6)
            ->create();*/

        // TODO - Faire corriger le code suivant après intégration des vraies données (customer_id =>).
        DB::table('reviews')->insert([
            [
                'customer_id' => 1,
                'rating' => random_int(3,5),
                'title' => "Un séjour merveilleux",
                'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                'customer_id' => 2,
                'rating' => random_int(3,5),
                'title' => "Ambiance et accueil impeccable !",
                'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ",

                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                'customer_id' => 3,
                'rating' => random_int(3,5),
                'title' => "J'ai adoré le rooftop !",
                'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                'customer_id' => 4,
                'rating' => random_int(3,5),
                'title' => "Propreté irréprochable",
                'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ",
                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                'customer_id' => 5,
                'rating' => random_int(3,5),
                'title' => "Une suite très confortable",
                'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ",
                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],[
                'customer_id' => 6,
                'rating' => random_int(3,5),
                'title' => "Un dîner en amoureux inoubliable",
                'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ",
                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
        //TODO - Après les tests remettre is_displayed à false (0) par défaut pour les vrais avis clients.
        ]);


    }
}
