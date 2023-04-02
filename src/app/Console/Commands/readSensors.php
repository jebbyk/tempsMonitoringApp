<?php

namespace App\Console\Commands;

use App\DataObjects\Sensor\IndexData;
use App\Services\SensorsService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Contracts\Container\BindingResolutionException;
use Throwable;

class readSensors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:read-sensors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws BindingResolutionException
     */
    public function handle(): void
    {
        /** @var SensorsService $service */
        $service = app()->make(SensorsService::class);

        $sensors = $service->index(IndexData::from(['filtering' => ['can_report' => false]]));

        foreach($sensors as $sensor)
        {
            try{
                $service->readSensor($sensor);

            } catch (Throwable $t) {
                continue;
            }
        }
    }
}
