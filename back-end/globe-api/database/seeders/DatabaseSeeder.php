<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Language;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    private $countries = [
        [1, 'Inglaterra', 'Libra Esterlina', '£'],
        [2, 'Japón', 'Yen Japonés', '¥'],
        [3, 'India', 'Rupia India', '₹'],
        [4, 'Dinamarca', 'Corona Danesa', '']
    ];

    private $cities = [
        [1, 'Mánchester', 1],
        [2, 'Londres', 1],
        [3, 'Hiroshima', 2],
        [4, 'Tokio', 2],
        [5, 'Jaipur', 3],
        [6, 'Bombay', 3],
        [7, 'Odense', 4],
        [8, 'Aarhus', 4],
    ];

    private $languages = [
        [1, 'German'],
        [2, 'Spanish']
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->countries as $country){
            DB::table('countries')->updateOrInsert([
                'id' => $country[0],
                'name' => $country[1],
                'currency_name' => $country[2],
                'currency_symbol' => $country[3],
            ]);
        }

        foreach ($this->cities as $city){
            DB::table('cities')->updateOrInsert([
                'id' => $city[0],
                'name' => $city[1],
                'country_id' => $city[2]
            ]);
        }

        foreach ($this->languages as $lang){
            DB::table('languages')->updateOrInsert([
                'id' => $lang[0],
                'name' => $lang[1]
            ]);
        }
    }
}
