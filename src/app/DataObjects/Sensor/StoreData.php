<?php
namespace App\DataObjects\Sensor;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
#[MapOutputName(SnakeCaseMapper::class)]
#[MapInputName(SnakeCaseMapper::class)]
final class StoreData extends Data
{
    public function __construct(
        public string $sensorUuid,
        public int $temperature,
    ){}
}
