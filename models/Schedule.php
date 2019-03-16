<?php

namespace app\models;

use yii\db\ActiveRecord;

class Schedule extends ActiveRecord
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{schedule}}';
    }

    /**
     * Get route
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Route::class, ['id' => 'route_id']);
    }

    /**
     * Get carrier
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrier()
    {
        return $this->hasOne(Carrier::class, ['id' => 'carrier_id']);
    }

    /**
     * Get start station
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStartStation()
    {
        return $this->hasOne(Station::class, ['id' => 'start_station_id']);
    }

    /**
     * Get end station
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEndStation()
    {
        return $this->hasOne(Station::class, ['id' => 'end_station_id']);
    }

    /**
     * Get route point
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoint()
    {
        return $this->hasOne(RouteStation::class, [
            'route_id' => 'route_id',
            'start_station_id' => 'start_station_id',
            'end_station_id' => 'end_station_id',
        ]);
    }
}
