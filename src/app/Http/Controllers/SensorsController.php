<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

final class SensorsController
{
    public function __construct(private SensorsService $sensorsService){}
    public function store(StoreRequest $request): JsonResponse
    {
        $this->sensorsService->store($request->getData());

        return response()->json();
    }
}
