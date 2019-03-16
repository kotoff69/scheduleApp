<?php

namespace app\models;

use yii\db\ActiveRecord;

class Route extends ActiveRecord
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{routes}}';
    }

    /**
     * Get stations on route
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStations()
    {
        return $this->hasMany(RouteStation::class, ['route_id' => 'id'])->orderBy('num');
    }

    /**
     * Get schedule on route
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasMany(Schedule::class, ['route_id' => 'id'])->orderBy('num');
    }

    /**
     * @return false|string
     */
    public function getDaysArray()
    {
        return explode(',', $this->days);
    }
}
