<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::withHeaders([
            'key' => env('RAJA_ONGKIR_KEY'),
        ])->get('https://api.rajaongkir.com/starter/province');

        $rajaOngkirProvinces = $response['rajaongkir']['results'];

        foreach ($rajaOngkirProvinces as $rajaongkirProvince) {
            $provinces[] = [
                'id' => $rajaongkirProvince['province_id'],
                'name' => $rajaongkirProvince['province'],
            ];
        }

        DB::table('provinces')->insert($provinces);
    }
}
