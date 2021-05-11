<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leagues')->insert([
        	'name' => 'Bundes Liga',
        	'country' => 'Jerman',
        	'image' => 'bundesliga.png',
        ]);

        DB::table('leagues')->insert([
        	'name' => 'Premier League',
        	'country' => 'Inggris',
        	'image' => 'premierleague.png',
        ]);

        DB::table('leagues')->insert([
        	'name' => 'La Liga',
        	'country' => 'Spanyol',
        	'image' => 'laliga.png',
        ]);

        DB::table('leagues')->insert([
        	'name' => 'Serie A',
        	'country' => 'Italia',
        	'image' => 'seriea.png',
        ]);
    }
}
