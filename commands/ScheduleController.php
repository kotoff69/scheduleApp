<?php

namespace app\commands;

use app\models\Carrier;
use app\models\Route;
use app\models\Schedule;
use app\models\ScheduleStation;
use yii\console\Controller;
use yii\console\ExitCode;

class ScheduleController extends Controller
{
    /**
     * @var array
     */
    private $startTime = [
        '08:30',
        '09:10',
        '10:50',
        '13:10',
        '15:00',
        '17:15',
        '19:35',
        '20:45',
    ];

    /**
     * Generate schedule
     *
     * @return int
     */
    public function actionGenerate()
    {
        $startDate = new \DateTime();
        $endDate = clone $startDate;
        $endDate->modify('+30 day');

        $carriers = Carrier::find()->all();
        $routes = Route::find()->all();

        while ($startDate->format('Ymd') <= $endDate->format('Ymd')) {
            $currentDate = clone $startDate;
            // If day of week exists in route days list
            $route = $routes[array_rand($routes, 1)];
            $carrier = $carriers[array_rand($carriers, 1)];

            if (in_array($currentDate->format('N'), $route->daysArray)) {
                foreach ($this->getRandomTime(2) as $time) {
                    list($hour, $min) = explode(':', $time);
                    $currentDate->setTime($hour, $min);

                    $schedule = new Schedule();
                    $schedule->setAttributes([
                        'name' => $route->name,
                        'route_id' => $route->id,
                        'carrier_id' => $carrier->id,
                        'total_price' => 0,
                        'start_date' => $currentDate->format('Y-m-d H:i:00'),
                        'end_date' => $currentDate->format('Y-m-d H:i:00'),
                    ], false);
                    $schedule->save();

                    $totalPrice = 0;

                    foreach ($route->stations as $point) {
                        $stationAttributes = [
                            'schedule_id' => $schedule->id,
                            'start_station_id' => $point->start_station_id,
                            'end_station_id' => $point->end_station_id,
                            'start_date' => $currentDate->format('Y-m-d H:i:00'),
                            'price' => intval($point->length * $carrier->price_per_km),
                        ];

                        $currentDate->modify('+' . $point->duration . ' minutes');
                        $stationAttributes['end_date'] = $currentDate->format('Y-m-d H:i:00');

                        $scheduleRoute = new ScheduleStation();
                        $scheduleRoute->setAttributes($stationAttributes, false);
                        $scheduleRoute->save();

                        $totalPrice += $scheduleRoute->price;
                    }

                    $schedule->end_date = $scheduleRoute->end_date;
                    $schedule->total_price = $totalPrice;
                    $schedule->save();
                }
            }
            $startDate->modify('+1 day');
        }

        return ExitCode::OK;
    }

    /**
     * Get random time
     *
     * @param int $count Count of random elements
     * @return array
     */
    private function getRandomTime($count)
    {
        $time = [];

        $indexes = array_rand($this->startTime, $count);
        if (!is_array($indexes)) {
            $indexes = [$indexes];
        }

        foreach ($indexes as $index) {
            $time[] = $this->startTime[$index];
        }

        return $time;
    }
}
