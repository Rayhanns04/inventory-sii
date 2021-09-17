<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condition::insert([
            [
                'name' => 'Bagus',
            ],
            [
                'name' => 'Diperbaiki',
            ],
            [
                'name' => 'Rusak',
            ],
        ]);
    }
}
