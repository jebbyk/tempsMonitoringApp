<?php

namespace App\ModelFilters;

use Carbon\Carbon;
use EloquentFilter\ModelFilter;

final class SensorFilter extends ModelFilter
{
    public function canReport(bool $canReport): SensorFilter
    {
        return $this->where('can_report', $canReport);
    }
}
