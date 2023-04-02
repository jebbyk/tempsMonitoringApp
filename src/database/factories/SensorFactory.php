<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SensorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->unique()->uuid,
            'can_report' => true,
        ];
    }
}
