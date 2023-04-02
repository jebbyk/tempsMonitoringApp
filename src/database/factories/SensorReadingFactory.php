<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class SensorReadingFactory extends Factory
{

    public function definition(): array
    {
        return [
            'sensor_id' => Sensor::factory(),
            'value' => $this->faker->numberBetween(-999999, 999999),
        ];
    }
}
