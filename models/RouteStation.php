<?php

namespace app\models;

use yii\db\ActiveRecord;

class RouteStation extends ActiveRecord
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{route_stations}}';
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
}
