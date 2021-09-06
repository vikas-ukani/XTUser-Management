<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'name' => 'India',
                'code' => 'IN'
            ],
            [
                'name' => 'USA',
                'code' => 'US'
            ],
            [
                'name' => 'Canada',
                'code' => 'CA'
            ]
        ];
        DB::table('country')->insert($countries);
    }
}
