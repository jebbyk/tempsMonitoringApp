<?php

namespace Database\Seeders;

use App\Models\SensorReading;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        SensorReading::factory()->times(config('testing.model_amount', 2))->create();
    }
}
