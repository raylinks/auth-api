<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $country = [
            [
                'name' => 'Nigeria',
                'code' => 'NG',
                'currency_code' => 'NGN',
                'dialling_code' => '+234',
                'type' => 'user_only',

            ],
            [
                'name' => 'Ghana',
                'code' => 'GH',
                'currency_code' => 'GHS',
                'dialling_code' => '+233',
                'type' => 'user_only',

            ],
        ];
        foreach ($country as $cty) {
            Country::firstOrCreate($cty);
        }
    }
}
