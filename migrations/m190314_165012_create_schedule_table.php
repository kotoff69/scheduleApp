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
                ->unsigned()
                ->notNull()
                ->comment('Carrier id'),
            'route_id' => $this->integer()
                ->notNull()
                ->comment('Route id'),
            'start_station_id' => $this->integer()
                ->notNull()
                ->comment('Start station id in route segment'),
            'end_station_id' => $this->integer()
                ->notNull()
                ->comment('End station id in route segment'),
            'start_date' => $this->dateTime()
                ->notNull()
                ->comment('Start date time segment'),
            'end_date' => $this->dateTime()
                ->notNull()
                ->comment('End date time segment'),
            'price' => $this->smallInteger()
                ->unsigned()
                ->notNull()
                ->comment('Price for segment'),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex(
            'idx-schedule-route_id',
            'schedule',
            'route_id'
        );

        // Foreign key for route_stations table
        $this->addForeignKey(
            'fk-schedule-stations_on_route',
            'schedule',
            ['route_id', 'start_station_id', 'end_station_id'],
            'route_stations',
            ['route_id', 'start_station_id', 'end_station_id']
        );
    }
}
