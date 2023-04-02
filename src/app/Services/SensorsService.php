<?php

namespace App\Services;

use app\DataObjects\Sensor\IndexData;
use app\DataObjects\Sensor\StoreData;
use app\DataObjects\SensorReading\StoreData as  ReadingStoreData;
use App\Models\Sensor;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Ramsey\Collection\Collection;

final class SensorsService
{
    public function __construct(private SensorReadingsService $readingsService){}

    public function index(IndexData $data): Collection
    {
        $sensors = Sensor::query()
            ->filter($data->filtering)
            ->get();

        return $sensors;
    }

    public function store(StoreData $data): Sensor
    {
        $data = $data->toArray();

        $data['can_report'] = false;//assume that a}ll manually created sensors can't report

        /** @var Sensor $sensor */
        $sensor = Sensor::query()->create($data);

        return $sensor;
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function readSensor(Sensor $sensor)
    {
        $data = $this->retrieveSensorData($sensor);

        $value = $this->parseSensorData($data);

        $this->readingsService->store(ReadingStoreData::from([
            'sensor_uuid' => $sensor->uuid,
            'temperature' => $value,
        ]));
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    private function retrieveSensorData(Sensor $sensor)
    {
        $client = new Client();

        $url = 'https://' . $sensor->sensor_ip . '/data';

        $response = $client->request('get', $url);
        if($response->getStatusCode() !== 200){
            throw new Exception("sensor is not responding");
        }

        return $response->getBody();
    }

    /**
     * @throws Exception
     */
    private function parseSensorData($data): int
    {
        $dataArray = explode(',', $data);

        if(!isset($dataArray[1]) || !is_numeric($dataArray[1]))
        {
            throw new Exception('sensor response format is not recognized');
        }

        $value = (float) $dataArray[1];

        return (int)($value * 1000);//prevent floating point problems
    }
}
