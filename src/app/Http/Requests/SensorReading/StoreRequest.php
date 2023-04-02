<?php

namespace App\Http\Requests\SensorReading;

use Illuminate\Foundation\Http\FormRequest;
use StoreData;


class StoreRequest extends FormRequest
{
    final public function rules(): array
    {
        return [
            'sensor_uuid' => ['required', 'exists:sensors,uuid'],
            'value' => ['required', 'integer', 'min:-999999', 'max:999999'],
        ];
    }

    final public function getData(): StoreData
    {
        return StoreData::from($this->validated());
    }
}
