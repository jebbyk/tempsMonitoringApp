<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property string $uuid
 *
 * @property SensorReading|Collection $readings
 */
class Sensor extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    public function readings(): HasMany
    {
        return $this->hasMany(SensorReading::class, 'sensor_uuid', 'uuid');
    }
}
