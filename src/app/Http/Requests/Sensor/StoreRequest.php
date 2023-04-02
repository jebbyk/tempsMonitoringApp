<?php

namespace App\Http\Requests\Sensor;

use Illuminate\Foundation\Http\FormRequest;
final class StoreRequest extends FormRequest
{
    final public function rules(): array
    {
        return [
            'sensor_ip' => ['required', 'exists:sensors,uuid'],
        ];
    }

    final public function getData(): StoreData
    {
        return StoreData::from($this->validated());
    }

}
