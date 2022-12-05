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
                'rating' => random_int(4,5),
                'title' => "Un séjour merveilleux",
                'body' => "Excellent séjour à l'hôtel Arth lors de notre venue en ce mois de novembre 2022. De l'accueil en passant par la restauration, tout a été parfait. Le personnel est aux petits soins, disponible, très souriant et avenant. Nous le recommandons chaudement.",
                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
            ],
            [
                'customer_id' => 2,
                'rating' => random_int(4,5),
                'title' => "Ambiance et accueil impeccable !",
                'body' => "Les chambres de luxe sont très bien. Nous étions 5 dont des \"enfants\" de 20,20 et 16 ans. Les
        hôtesses de la réception sont géniales (nous avons eu besoin d'assistance médicale et elles se sont occupées de tout) . Le restaurant est un ravissement avec une ambiance d'équipe incroyable ! De la bonne humeur à volonté !",

                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
            ],
            [
                'customer_id' => 3,
                'rating' => random_int(4,5),
                'title' => "J'ai adoré le rooftop !",
                'body' => "L'atmosphère et la décoration du rooftop invitent à la détente. La vue sur le lac est magnifique. Parfait pour une séance de méditation le matin ou pour admirer les étoiles en fin de soirée.",
                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
            ],
            [
                'customer_id' => 4,
                'rating' => random_int(4,5),
                'title' => "Propreté irréprochable",
                'body' => "Séjour parfait. Chambre et espaces communs calmes, d'une propreté irréprochable.
                            Petit déjeuner parfait. Dîner au top, sincèrement très bon.
                            Hall de l hôtel joliment décoré, cheminée superbe.
                            Personnellement agréable et souriant.
                            Tout était parfait !",
                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
            ],
            [
                'customer_id' => 5,
                'rating' => random_int(4,5),
                'title' => "Une suite très confortable",
                'body' => "L’accueil, l’âme et la décoration de cet endroit sont exceptionnels. Si vous aimez tout ce qui touche à la décoration (intérieur et extérieur)! Vous adorerez cet endroit! Notre suite était si agréable et spacieuse que j'aurais volontier prolongé mon séjour.",
                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
            ],[
                'customer_id' => 6,
                'rating' => random_int(4,5),
                'title' => "Un dîner en amoureux inoubliable",
                'body' => "Un menu orgasmique à un prix plus que raisonnable. Les qualités organoleptiques sont là. Très bon accueil, serveurs et serveuses agréables. Difficile de choisir tant la carte est alléchante. Très bonne carte des vins. Atmosphère délicieuse en amoureux. Je recommande.",
                'is_displayed' => 1,
                "created_at" => date("Y-m-d H:i:s"),
            ],
        /*
         * TODO - Mettre is_displayed à false (0) par défaut pour les nouveaux avis clients ( là ou dans la fonction
         * create du controller).
        */
        ]);


    }
}
