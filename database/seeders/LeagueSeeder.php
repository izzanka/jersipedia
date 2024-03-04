<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('leagues')->insert([
            'name' => 'Bundesliga',
            'name_slug' => 'bundesliga',
            'country' => 'Germany',
            'image' => 'bundesliga.png',
        ]);

        DB::table('leagues')->insert([
            'name' => 'Premier League',
            'name_slug' => 'premier-league',
            'country' => 'England',
            'image' => 'premier-league.png',
        ]);

        DB::table('leagues')->insert([
            'name' => 'La Liga',
            'name_slug' => 'la-liga',
            'country' => 'Spain',
            'image' => 'la-liga.png',
        ]);

        DB::table('leagues')->insert([
            'name' => 'Serie A',
            'name_slug' => 'serie-a',
            'country' => 'Italy',
            'image' => 'serie-a.png',
        ]);
    }
}
