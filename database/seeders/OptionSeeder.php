<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            [
                'option_name' => json_encode([
                    'fr' => 'Petit-déjeuner 9€ /personne/jour',
                    'en' => 'Breakfast 9€ /person/day']),
                'option_price' => 9,
            ],
            [
                'option_name' => json_encode([
                    'fr' => 'Formule du midi 20€ /personne/jour',
                    'en' => 'Lunch formula 20€ /person/day']),
                'option_price' => 20,
            ],
            [
                'option_name' => json_encode([
                    'fr' => 'Formule du soir 20€ /personne/jour',
                    'en' => 'Evening formula 20€ /person/day']),
                'option_price' => 20,
            ],
            [
                'option_name' => json_encode([
                    'fr' => 'Formule midi et soir 35€ /personne/jour',
                    'en' => 'Lunch and Evening formula 35€ /person/day']),
                'option_price' => 35,
            ],
            [
                'option_name' => json_encode([
                    'fr' => 'Service de pressing tout compris 30€ /personne/jour',
                    'en' => 'All-inclusive pressing service €30 /person/day']),
                'option_price' => 30,
            ],
            [
                'option_name' => json_encode([
                    'fr' => 'Accès illimité à la chaîne Canal+ 10€ / semaine',
                    'en' => 'Unlimited access to the Canal+ channel €10 /week']),
                'option_price' => 10,
            ],
            [
                'option_name' => json_encode([
                    'fr' => 'Accès à la piscine 25€ en une fois',
                    'en' => 'Access to the swimming pool 25€ per stay']),
                'option_price' => 25,
            ],
        ]);
    }
}
