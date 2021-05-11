<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JerseySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jerseys')->insert([
            'league_id' => 2,
        	'name' => 'CHELSEA 3RD 2018-2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'chelsea.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 2,
        	'name' => 'LEICESTER CITY HOME 2018-2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'leicester.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 2,
        	'name' => 'MAN. UNITED AWAY 2018-2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'mu.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 2,
        	'name' => 'LIVERPOOL AWAY 2018-2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'liverpool.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 2,
        	'name' => 'TOTTENHAM 3RD 2018-2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'tottenham.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 1,
        	'name' => 'DORTMUND AWAY 2018-2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'dortmund.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 1,
        	'name' => 'BAYERN MUNCHEN 3RD 2018 2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'munchen.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 4,
        	'name' => 'JUVENTUS AWAY 2018-2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'juve.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 4,
        	'name' => 'AS ROMA HOME 2018-2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'asroma.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 4,
        	'name' => 'AC MILAN HOME 2018 2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'acmilan.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 4,
        	'name' => 'LAZIO HOME 2018-2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'lazio.png'
        ]);

        DB::table('jerseys')->insert([
            'league_id' => 3,
        	'name' => 'REAL MADRID 3RD 2018-2019',
            'description' => 'Original',
            'price' => 400000,
            'stock' => 40,
            'image' => 'madrid.png'
        ]);
    }
}
