<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Models\Province;
use App\Models\CompSector;
use App\Models\JobPosition;
use App\Models\JobTask;
use App\Models\Subdistrict;
use App\Models\UrbanVillage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Province
        // Ambil data dari Raja Ongkir ketika seeder pertama kali dijalankan
        $provinces = file_get_contents('https://api.rajaongkir.com/starter/province?key=3a7e4a265b81e070c068be8d112a6295');
        $provinces = json_decode($provinces, true);

        // Merubah Array Associative $province menjadi bentuk collection
        $provinces = collect($provinces['rajaongkir']['results']);

        // Data dengan isi none untuk mengisi foreign key table lain
        Province::create([
            'enable_status' => true,
            'province_code' => 0,
            'name'          => "none"
        ]);

        // Simpan data $province ke table provinces
        foreach ($provinces as $province) {
            Province::create([
                'enable_status' => true,
                'province_code' => $province["province_id"],
                'name'          => $province["province"]
            ]);
        }// /.province
        
        // City
        City::create([
            'enable_status' => true,
            'name'          => 'none',
            'type'          => 'kota',
            'postal_code'   => null,
            'province_code' => 0,
            'province_id'   => 1
        ]);// /.city

        // Subdistrict
        Subdistrict::create([
            'enable_status'     => true,
            'name'              => "none",
            'city_id'           => 1
        ]);

        // Urban Village
        UrbanVillage::create([
            'enable_status'         => true,
            'name'                  => "none",
            'urban_village_code'    => "none",
            'subdistrict_id'        => 1
        ]);

        // Comp_Sector
        CompSector::create([
            'enable_status' => true,
            'name'          => "none",
            'desc'          => 'none'
        ]);

        CompSector::create([
            'enable_status' => true,
            'name'          => 'Supplier',
            'desc'          => 'Supplier adalah pihak perorangan atau bisnis yang memasok atau menyuplai produk barang atau jasa kepada bisnis lain baik itu ke perorangan atau perusahaan'
        ]);

        CompSector::create([
            'enable_status' => true,
            'name'          => 'Producer',
            'desc'          => 'Produsen adalah individu atau badan usaha yang melakukan kegiatan produksi barang atau jasa'
        ]);

        CompSector::create([
            'enable_status' => true,
            'name'          => 'Dealer',
            'desc'          => 'Dealer dalam bisnis adalah orang atau perusahaan yang membeli barang dari produsen atau distributor untuk dijual kembali secara grosir dan / atau eceran'
        ]);

        CompSector::create([
            'enable_status' => true,
            'name'          => 'Warehouse',
            'desc'          => 'Warehouse dapat berupa individu maupun badan usaha yang menyediakan jasa penyimpanan barang'
        ]);// /.comp_sector

        // Company
        Company::create([
            'enable_status'     => true,
            'name'              => "You not registered in any Company",
            'phone'             => 'none',
            'email'             => 'none',
            'address_street'    => null,
            'desc'              => null,
            'city_id'           => 1,
            'comp_sector_id'    => 1,
            'subdistrict_id'    => 1,
            'urban_village_id'  => 1
        ]); // /.company

        // Job Position
        JobPosition::create([
            'enable_status' => true,
            'name'          => "You don't have position yet in Your company",
            'desc'          => null
        ]); // /.job position

        // Job Task
        JobTask::create([
            'enable_status'     => true,
            'name'              => "You don't have task",
            'desc'              => null,
            'job_position_id'   => 1
        ]); // /.job task


        // User
        User::create([
            'name'              => 'Teguh Wijoseno',
            'email'             => 'mr.wijoseno@gmail.com',
            'password'          => Hash::make('12345'),

            // Attribute yang ditambahkan
            'enable_status'     => true,
            'phone'             => null,
            'photo'             => null,
            'birth_date'        => '1988-12-23',
            'birth_city'        => null,
            'address_street'    => null,
            'city_id'           => 1,
            'subdistrict_id'    => 1,
            'urban_village_id'  => 1,
            'job_position_id'   => 1,
            'company_id'        => 1
        ]);// /.user
    }
}
