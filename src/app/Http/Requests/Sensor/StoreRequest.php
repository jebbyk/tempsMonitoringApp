<?php

namespace App\Http\Requests\Sensor;

use app\DataObjects\Sensor\StoreData;
use Illuminate\Foundation\Http\FormRequest;
final class StoreRequest extends FormRequest
{
    final public function rules(): array
    {
        return [
            'sensor_ip' => ['required', 'string'],
        ];
    }

    final public function getData(): StoreData
    {
        return StoreData::from($this->validated());
    }

}
