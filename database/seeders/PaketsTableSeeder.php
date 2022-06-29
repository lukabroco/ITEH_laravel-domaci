<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PaketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pakets')->insert(
            [
                ['tip' => 'pun pansion', 'opis' => 'Place Hotel je jedan od luksuznijih hotela u Dubaiu. Sa svojih pet zvezdica, luksuznim spa centrima, unutrasnjim bazenima, predstavlja idealno resenje za sve one koji su spremni da izdvoje novac za putovanje.', 'hotel' => 'Place Hotel Dubai', 'slika' => 'https://cf.bstatic.com/images/hotel/max1024x768/240/240768322.jpg', 'cena' => 16580, 'putovanje_id' => 1],
                ['tip' => 'polupansion', 'opis' => 'Collonial Hotel je jedan od luksuznijih hotela u Barseloni. Sa svojih pet zvezdica, luksuznim spa centrima, unutrasnjim bazenima, predstavlja idealno resenje za sve one koji su spremni da izdvoje novac za putovanje.', 'hotel' => 'Hotel Colonial', 'slika' => 'https://media.costalessgolf.com/2015/05/Hotel-Colon-Entrance.jpg', 'cena' => 16424, 'putovanje_id' => 2]

            ]
        );
    }
}
