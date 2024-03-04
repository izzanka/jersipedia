<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'league_id' => 2,
            'name' => 'CHELSEA 3RD',
            'name_slug' => 'chelsea-3rd',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 400000,
            'stock' => 40,
            'sold' => 40,
            'image' => 'chelsea.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 2,
            'name' => 'LEICESTER CITY HOME',
            'name_slug' => 'leicester-city-home',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 350000,
            'stock' => 40,
            'sold' => 30,
            'image' => 'leicester.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 2,
            'name' => 'MAN UNITED AWAY',
            'name_slug' => 'man-united-away',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 300000,
            'stock' => 40,
            'sold' => 20,
            'image' => 'mu.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 2,
            'name' => 'LIVERPOOL AWAY',
            'name_slug' => 'liverpool-away',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 250000,
            'stock' => 40,
            'sold' => 10,
            'image' => 'liverpool.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 2,
            'name' => 'TOTTENHAM 3RD',
            'name_slug' => 'tottenham-3rd',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 200000,
            'stock' => 40,
            'image' => 'tottenham.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 1,
            'name' => 'DORTMUND AWAY',
            'name_slug' => 'dortmund-away',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 150000,
            'stock' => 40,
            'image' => 'dortmund.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 1,
            'name' => 'BAYERN MUNCHEN 3RD',
            'name_slug' => 'bayern-munchen-3rd',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 100000,
            'stock' => 40,
            'image' => 'munchen.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 4,
            'name' => 'JUVENTUS AWAY',
            'name_slug' => 'juventus-away',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 50000,
            'stock' => 40,
            'image' => 'juve.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 4,
            'name' => 'AS ROMA HOME',
            'name_slug' => 'as-roma-home',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 400000,
            'stock' => 40,
            'image' => 'asroma.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 4,
            'name' => 'AC MILAN HOME',
            'name_slug' => 'ac-milan-home',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 300000,
            'stock' => 40,
            'image' => 'acmilan.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 4,
            'name' => 'LAZIO HOME',
            'name_slug' => 'lazio-home',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 200000,
            'stock' => 40,
            'image' => 'lazio.png',
            'created_at' => now(),
        ]);

        DB::table('products')->insert([
            'league_id' => 3,
            'name' => 'REAL MADRID 3RD',
            'name_slug' => 'read-madrid-3rd',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 100000,
            'stock' => 40,
            'image' => 'madrid.png',
            'created_at' => now(),
        ]);
    }
}
