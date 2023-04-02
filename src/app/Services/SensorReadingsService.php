<?php

namespace App\Services;

use app\DataObjects\SensorReading\StoreData;
use App\DataObjects\SensorReading\IndexData;
use App\Models\SensorReading;
use Illuminate\Support\Collection;

final class SensorReadingsService
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
        $readingsCount = $readings->count();

        if($readingsCount == 0)
        {
            return 0;
        }

        $sum = $readings->sum('temperature');

        return $sum / $readingsCount;
    }

    public function Store(StoreData $data): SensorReading
    {
        /** @var SensorReading $reading */
        $reading = SensorReading::query()->create($data->toArray());

        return $reading;
    }
}
