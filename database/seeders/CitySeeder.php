<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::withHeaders([
            'key' => env('RAJA_ONGKIR_KEY'),
        ])->get('https://api.rajaongkir.com/starter/city');

        $rajaOngkirCities = $response['rajaongkir']['results'];

        foreach ($rajaOngkirCities as $rajaOngkirCity) {
            $cities[] = [
                'id' => $rajaOngkirCity['city_id'],
                'province_id' => $rajaOngkirCity['province_id'],
                'type' => $rajaOngkirCity['type'],
                'name' => $rajaOngkirCity['city_name'],
                'postal_code' => $rajaOngkirCity['postal_code'],
            ];
        }

        DB::table('cities')->insert($cities);
    }
}
