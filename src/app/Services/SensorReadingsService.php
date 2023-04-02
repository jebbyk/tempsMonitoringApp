<?php

namespace App\Services;

use App\Http\Requests\SensorReading\IndexRequest;
use App\Models\SensorReading;
use Illuminate\Support\Collection;
use IndexData;
use StoreData;

class SensorReadingsService
{

    public function index(IndexData $data): Collection
    {
        return SensorReading::query()
            ->filter($data->filtering)
            ->get();
    }

    public function getMiddleTemperature(IndexData $data): int
    {
        $readings = $this->index($data);
        $sum = $readings->sum('value');

        return $sum / $readings->count();
    }

    public function Store(StoreData $data): SensorReading
    {
        /** @var SensorReading $reading */
        $reading = SensorReading::query()->create($data->toArray());

        return $reading;
    }
}
