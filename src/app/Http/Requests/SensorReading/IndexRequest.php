<?php

namespace App\Http\Requests\SensorReading;

use Illuminate\Foundation\Http\FormRequest;


class IndexRequest extends FormRequest
{
    final public function rules(): array
    {
        return [
            'filtering.sensor_uuid' => ['nullable', 'exists:sensors,uuid'],
            'filtering.created_at_from' => ['nullable',  'regex:' . config('validation.datetime_regex')],
            'filtering.created_at_to' => ['nullable',  'regex:' . config('validation.datetime_regex')],
        ];
    }

    final public function getData(): IndexData
    {
        return IndexData::from($this->validated());
    }
}
