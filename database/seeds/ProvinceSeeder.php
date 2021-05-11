<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
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
        ])->get('https://api.rajaongkir.com/starter/province');
        $provinces = $response['rajaongkir']['results'];

        foreach($provinces as $province){
             $data_province[] = [
                'id' => $province['province_id'],
                'province' => $province['province'],
             ];
        }

        DB::table('table_provinces')->insert($data_province);
    }
}
