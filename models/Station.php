<?php

namespace app\models;

use yii\db\ActiveRecord;

class Station extends ActiveRecord
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{stations}}';
    }
}
