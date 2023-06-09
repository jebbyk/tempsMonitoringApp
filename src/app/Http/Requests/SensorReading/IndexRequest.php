<?php

namespace App\Http\Requests\SensorReading;

use App\DataObjects\SensorReading\IndexData;
use Illuminate\Foundation\Http\FormRequest;


final class IndexRequest extends FormRequest
{
    final public function rules(): array
    {
        return [
//            'filtering' => ['required'],
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
