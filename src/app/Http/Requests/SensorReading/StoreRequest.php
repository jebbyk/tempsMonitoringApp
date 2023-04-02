<?php

namespace App\Http\Requests\SensorReading;

use App\DataObjects\SensorReading\StoreData;
use Illuminate\Foundation\Http\FormRequest;


final class StoreRequest extends FormRequest
{
    final public function rules(): array
    {
        return [
            'sensor_uuid' => ['required', 'exists:sensors,uuid'],
            'temperature' => ['required', 'integer', 'min:-999999', 'max:999999'],
        ];
    }

    final public function getData(): StoreData
    {
        return StoreData::from($this->validated());
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'sensor_uuid' => $this->reading['sensor_uuid'],
            'temperature' => (int) ($this->reading['temperature'] * 1000),//prevent FP errors
        ]);
    }

}
