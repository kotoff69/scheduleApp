<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schedule}}`.
 */
class m190314_165012_create_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule}}', [
            'id' => $this->primaryKey(),
            'carrier_id' => $this->integer()
                ->notNull()
                ->comment('Carrier id'),
            'route_id' => $this->integer()
                ->notNull()
                ->comment('Route id'),
            'name' => $this->string(255)
                ->notNull()
                ->comment('Schedule name'),
            'start_date' => $this->dateTime()
                ->notNull()
                ->comment('Start date time segment'),
            'end_date' => $this->dateTime()
                ->notNull()
                ->comment('End date time segment'),
            'total_price' => $this->smallInteger()
                ->unsigned()
                ->notNull()
                ->comment('Price for all route'),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex(
            'idx-schedule-route_id',
            'schedule',
            'route_id'
        );

        $this->addForeignKey(
            'fk-schedule-route_id',
            'schedule',
            'route_id',
            'routes',
            'id'
        );

        $this->addForeignKey(
            'fk-schedule-carrier_id',
            'schedule',
            'carrier_id',
            'carriers',
            'id'
        );
    }
}
