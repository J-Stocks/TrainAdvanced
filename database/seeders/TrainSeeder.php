<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Seeder;

class TrainSeeder extends Seeder
{
    public function run()
    {
        Train::factory()->times(50)->create();
    }
}
