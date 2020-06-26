<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            
            [
                'name' => "Côte d'Ivoire",
                'code' => 'ci',
            ],
            [
                'name' => "France",
                'code' => 'fr',
            ],
            [
                'name' => "USA",
                'code' => 'us',
            ],
            
        ]);
    }
}
