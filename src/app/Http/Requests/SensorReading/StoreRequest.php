<?php

namespace App\Http\Requests\SensorReading;

use Illuminate\Foundation\Http\FormRequest;
use StoreData;


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
            'temperature' => $this->reading['temperature'],
        ]);
    }

}
