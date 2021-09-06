<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => 'Surat',
                'code' => 'SUT',
                'state_id' => 1
            ],
            [
                'name' => 'Channai',
                'code' => 'CNI',
                'state_id' => 2
            ],
            [
                'name' => 'Mexico',
                'code' => 'MX',
                'state_id' => 3
            ],
        ];
        DB::table('cities')->insert($cities);
    }
}
