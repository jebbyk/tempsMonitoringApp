<?php

namespace App\Services;

use app\DataObjects\Sensor\StoreData;
use App\Models\Sensor;

final class SensorsService
{
    public function store(StoreData $data): Sensor
    {
        $data = $data->toArray();

        $data['can_report'] = false;//assume that all manually created sensors can't report

        /** @var Sensor $reading */
        $reading = Sensor::query()->create($data);

        return $reading;
    }
}
