<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Ruang Makan',
                'floor_id' => 1
            ],
            [
                'name' => 'Ruang Meeting 1',
                'floor_id' => 1
            ],
            [
                'name' => 'Ruang Resepsionis',
                'floor_id' => 1
            ],
            [
                'name' => 'Ruang Makan',
                'floor_id' => 1
            ],
            [
                'name' => 'Ruang Meeting 2',
                'floor_id' => 2
            ],
            [
                'name' => 'Ruang Perkantoran',
                'floor_id' => 2
            ],
        ]);
    }
}
