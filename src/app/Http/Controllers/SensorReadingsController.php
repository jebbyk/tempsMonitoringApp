<?php

namespace App\Http\Controllers;

use App\Http\Requests\SensorReading\IndexRequest;
use App\Http\Requests\SensorReading\StoreRequest;
use Illuminate\Http\JsonResponse;

class SensorReadingsController
{
    public function __construct(private SensorReadingsService $readingsService){}

    public function getMiddleTemperature(IndexRequest $request): JsonResponse
    {
        $middleTemperature = $this->readingsService->getMiddleTemperature($request->getData());

        return response()->json(['middle_temperature' => $middleTemperature]);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $this->readingsService->store($request->getData());

        return response()->json();
    }
}
