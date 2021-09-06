<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [
                'name' => 'Gujarat',
                'code' => 'GUJ',
                'country_id' => 1
            ],
            [
                'name' => 'Kolkata',
                'code' => 'KAL',
                'country_id' => 2
            ],
            [
                'name' => 'Mexico',
                'code' => 'MX',
                'country_id' => 3
            ],
        ];
        DB::table('states')->insert($states);
    }
}
