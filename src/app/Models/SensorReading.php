<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $sensor_uuid
 * @property int $value
 */
final class SensorReading extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'sensor_uuid',
        'temperature'
    ];

    public function sensor(): BelongsTo
    {
        return $this->belongsTo(Sensor::class, 'sensor_uuid', 'uuid');
    }
}
