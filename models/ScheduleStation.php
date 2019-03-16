<?php

namespace app\models;

use yii\db\ActiveRecord;

class ScheduleStation extends ActiveRecord
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{schedule_stations}}';
    }
}
