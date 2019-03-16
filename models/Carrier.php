<?php

namespace app\models;

use yii\db\ActiveRecord;

class Carrier extends ActiveRecord
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{carriers}}';
    }

    /**
     * Get schedule by carrier
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasMany(Schedule::class, ['carrier_id' => 'id']);
    }
}
