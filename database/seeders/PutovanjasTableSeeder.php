<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PutovanjasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('putovanjas')->insert(
            [
                ['destinacija' => 'Dubai', 'trajanje' => '3 nedelje', 'opis' => 'Jedinstveni spoj komfora pomešan sa tradicionalnim običajima i stilom života. Dubai je moderan grad, centar međunarodnog poslovanja sa impresivnim arhitektonskim rešenjima, visokim zgradama, igrajućim fontanama, prelepim plažama, veštačkim ostrvom u obliku palme, najvišom zgradom na svetu - Burj Khalifa, jedinim hotelom na svetu kategorije 7 zvezdica, 70 šoping centara-molova, pokrivenim ski centrom sa 5 skijaških staza.', 'slika' => 'https://bigstar.rs/images/slike/dubai-letovanje.jpg'],
                ['destinacija' => 'Barcelona', 'trajanje' => '3 nedelje', 'opis' => 'Iskoristite jedinstvenu priliku da posetite jedan od najlepših evropskih gradova, Barselonu. Prošetajte ulicama grada u koji je svoj originalni pečat utkao Antoni Gaudi. Divite se samo nekim od njegovih remek-dela gde ćete imati utisak kao da ste zalutali u bajci. Tu je nezaobilazni park Guell, odakle se pruža nezaboravan pogled na Barselonu, Casa Battlo, La Pedrera, Casa Guell i najimpozantnije od svih, Sagrada Familia.', 'slika' => 'https://a.storyblok.com/f/89778/1168x728/664d5715c2/es_00_bar_1.jpeg']

            ]
        );
    }
}
