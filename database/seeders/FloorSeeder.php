<?php

namespace Database\Seeders;

use App\Models\Floor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('floors')->insert([
            [
                'name' => 'Lantai 1'
            ],
            [
                'name' => 'Lantai 2'
            ],
            [
                'name' => 'Lantai 3'
            ],
            [
                'name' => 'Lantai 4'
            ]
        ]);
    }
}
