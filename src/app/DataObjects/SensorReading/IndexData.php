<?php

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
#[MapInputName(SnakeCaseMapper::class)]
class IndexData extends Data
{
    public function __construct(
        public array $filtering,
    ){}
}
