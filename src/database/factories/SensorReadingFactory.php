<?php

namespace Database\Factories;

use App\Models\Sensor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SensorReadingFactory extends Factory
{
    public function definition(): array
    {

        return [
            'sensor_uuid' => Sensor::factory(),
            'temperature' => $this->faker->numberBetween(-999999, 999999),
        ];
    }
}
