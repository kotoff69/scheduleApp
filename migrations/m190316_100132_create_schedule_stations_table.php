<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schedule_stations}}`.
 */
class m190316_100132_create_schedule_stations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule_stations}}', [
            'id' => $this->primaryKey(),
            'schedule_id' => $this->integer()
                ->notNull()
                ->comment('Schedule id'),
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

        $this->addForeignKey(
            'fk-schedule_stations-schedule_id',
            'schedule_stations',
            'schedule_id',
            'schedule',
            'id'
        );

        $this->addForeignKey(
            'fk-schedule_stations-start_station_id',
            'schedule_stations',
            'start_station_id',
            'stations',
            'id'
        );

        $this->addForeignKey(
            'fk-schedule_stations-end_station_id',
            'schedule_stations',
            'end_station_id',
            'stations',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%schedule_stations}}');
    }
}
