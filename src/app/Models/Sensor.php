<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property string $uuid
 * @property string $sensor_ip
 * @property bool $can_report
 *
 * @property SensorReading|Collection $readings
 */
final class Sensor extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'sensor_ip',
        'can_report',
    ];

    public function readings(): HasMany
    {
        return $this->hasMany(SensorReading::class, 'sensor_uuid', 'uuid');
    }
}
