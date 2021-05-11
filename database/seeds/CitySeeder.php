<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => 'adb1703464d17d38db117620f6ebc68c'
        ])->get('https://api.rajaongkir.com/starter/city');
        
        $cities =  $response['rajaongkir']['results'];

        foreach($cities as $city){
            $data_city[] = [
               'id' => $city['city_id'],
               'province_id' => $city['province_id'],
               'type' => $city['type'],
               'city_name' => $city['city_name'],
               'postal_code' => $city['postal_code'],
            ];
        }

       DB::table('table_cities')->insert($data_city);
    }
}
