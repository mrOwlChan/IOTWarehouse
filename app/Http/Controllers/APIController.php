<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class APIController extends Controller
{
    // Ambil data Kode Pos dari table cities di database
    public function checkpostal($province){

        $cities = City::where('province_code', $province)->get();
        $cities = collect($cities);
        
        return $cities;
    }

    // Ambil data Kode Pos dari API 
    public function getpostal($param1, $param2)
    {
        // Raja Ongkir
        if ($param1 == 'rajaongkir'){
            $cities = file_get_contents('https://api.rajaongkir.com/starter/city?key=3a7e4a265b81e070c068be8d112a6295&province=' . $param2);
            
            $results = json_decode($cities, true);
            $results = collect($results['rajaongkir']['results']);

            // Dumping Data Kota ke table cities
            foreach ($results as $result) {
                City::create([
                    'city_id'       => $result['city_id'],
                    'name'          => $result['city_name'],
                    'type'          => $result['type'],
                    'postal_code'   => $result['postal_code'],
                    'province_code' => $result['province_id'],
                    'province_id'   => ($result['province_id'] + 1),
                    'enable_status' => true
                ]);
            }

            // Ambil data dari Database iowarehouse table cities
            // Data diambil dari database agar seluruh atribut row dapat diambil seluruhnya(termasuk id data)
            $results = City::where('province_code', $results[0]['province_id'])
                        ->where('enable_status', 1)
                        ->get();

            return $results;
        }
    }
}
