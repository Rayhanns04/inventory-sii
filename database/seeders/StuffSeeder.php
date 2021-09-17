<?php

namespace Database\Seeders;

use App\Models\Stuff;
use Illuminate\Database\Seeder;

class StuffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stuff::insert([
            [
                'name' => 'Sendok',
                'room_id' => 1
            ],
            [
                'name' => 'Piring',
                'room_id' => 1
            ],
        ]);
    }
}
