<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RezervacijesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rezervacijes')->insert(
            [
                ['ime' => 'Pera', 'prezime' => 'Peric', 'broj_osoba' => 2, 'paket_id' => 1]
            ]
        );
    }
}
