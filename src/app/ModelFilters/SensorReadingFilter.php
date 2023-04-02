<?php

namespace App\ModelFilters;

use Carbon\Carbon;
use EloquentFilter\ModelFilter;

class SensorReadingFilter extends ModelFilter
{
    public function sensorUuid(string $uuid): SensorReadingFilter
    {
        return $this->where('sensor_uuid', $uuid);
    }

    public function createdAtFrom(string $dateTime): SensorReadingFilter
    {
        return $this->where('created_at', '>=', Carbon::parse($dateTime));
    }

    public function createdAtTo(string $dateTime): SensorReadingFilter
    {
        return $this->where('created_at', '<=', Carbon::parse($dateTime));
    }
}
