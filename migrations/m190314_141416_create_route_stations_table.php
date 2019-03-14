<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%route_stations}}`.
 */
class m190314_141416_create_route_stations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%route_stations}}', [
            'id' => $this->primaryKey(),
            'route_id' => $this->integer()
                ->notNull()
                ->comment('Route id'),
            'start_station_id' => $this->integer()
                ->notNull()
                ->comment('Start station id in route segment'),
            'end_station_id' => $this->integer()
                ->notNull()
                ->comment('End station id in route segment'),
            'duration' => $this->smallInteger()
                ->unsigned()
                ->notNull()
                ->comment('Route duration in minutes'),
            'length' => $this->smallInteger()
                ->unsigned()
                ->notNull()
                ->comment('Route length in kilometers'),
            'num' => $this->tinyInteger()
                ->defaultValue(0)
                ->notNull()
                ->comment('Segment number in route'),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');


        // Foreign key for routes
        $this->addForeignKey(
            'fk-route_stations-route_id',
            'route_stations',
            'route_id',
            'routes',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // Foreign key for start station
        $this->addForeignKey(
            'fk-route_stations-start_station_id',
            'route_stations',
            'start_station_id',
            'stations',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // Foreign key for end station
        $this->addForeignKey(
            'fk-route_stations-end_station_id',
            'route_stations',
            'end_station_id',
            'stations',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // For searching by route id
        $this->createIndex(
            'idx-route_stations-route_id',
            'route_stations',
            'route_id'
        );

        // Unique for pair of start and end station on route
        $this->createIndex(
            'idx-route_stations-stations_on_route',
            'route_stations',
            ['route_id', 'start_station_id', 'end_station_id']
        );

        $this->insertData();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-route_stations-route_id',
            'route_stations'
        );

        $this->dropIndex(
            'idx-route_stations-stations_on_route',
            'route_stations'
        );

        $this->dropForeignKey(
            'fk-route_stations-route_id',
            'route_stations'
        );

        $this->dropForeignKey(
            'fk-route_stations-start_station_id',
            'route_stations'
        );

        $this->dropForeignKey(
            'fk-route_stations-end_station_id',
            'route_stations'
        );

        $this->dropTable('{{%route_stations}}');
    }

    /**
     * Insert data
     */
    private function insertData()
    {
        // Route Moscow - Tver
        // Moscow - Khimki segment
        $this->insert('route_stations', [
            'id' => 1,
            'route_id' => 1,
            'start_station_id' => 1,
            'end_station_id' => 2,
            'duration' => 20,
            'length' => 15,
            'num' => 0,
        ]);

        // Khimki - Zelenograd segment
        $this->insert('route_stations', [
            'id' => 2,
            'route_id' => 1,
            'start_station_id' => 2,
            'end_station_id' => 3,
            'duration' => 25,
            'length' => 17,
            'num' => 1,
        ]);

        // Zelenograd - Solnechnogorsk segment
        $this->insert('route_stations', [
            'id' => 3,
            'route_id' => 1,
            'start_station_id' => 3,
            'end_station_id' => 4,
            'duration' => 35,
            'length' => 25,
            'num' => 2,
        ]);

        // Solnechnogorsk - Klin segment
        $this->insert('route_stations', [
            'id' => 4,
            'route_id' => 1,
            'start_station_id' => 4,
            'end_station_id' => 5,
            'duration' => 25,
            'length' => 22,
            'num' => 3,
        ]);

        // Klin - Zavidovo segment
        $this->insert('route_stations', [
            'id' => 5,
            'route_id' => 1,
            'start_station_id' => 5,
            'end_station_id' => 6,
            'duration' => 60,
            'length' => 30,
            'num' => 4,
        ]);

        // Zavidovo - Emmaus segment
        $this->insert('route_stations', [
            'id' => 6,
            'route_id' => 1,
            'start_station_id' => 6,
            'end_station_id' => 7,
            'duration' => 40,
            'length' => 36,
            'num' => 5,
        ]);

        // Emmaus - Tver segment
        $this->insert('route_stations', [
            'id' => 7,
            'route_id' => 1,
            'start_station_id' => 7,
            'end_station_id' => 8,
            'duration' => 20,
            'length' => 15,
            'num' => 6,
        ]);

        // Route Moscow - Voronezh
        // Moscow - Stupino segment
        $this->insert('route_stations', [
            'id' => 8,
            'route_id' => 2,
            'start_station_id' => 1,
            'end_station_id' => 9,
            'duration' => 100,
            'length' => 80,
            'num' => 0,
        ]);

        // Stupino - Novomoskovsk segment
        $this->insert('route_stations', [
            'id' => 9,
            'route_id' => 2,
            'start_station_id' => 9,
            'end_station_id' => 10,
            'duration' => 120,
            'length' => 100,
            'num' => 1,
        ]);

        // Novomoskovsk - Elec segment
        $this->insert('route_stations', [
            'id' => 10,
            'route_id' => 2,
            'start_station_id' => 10,
            'end_station_id' => 11,
            'duration' => 180,
            'length' => 150,
            'num' => 2,
        ]);

        // Elec - Voronezh segment
        $this->insert('route_stations', [
            'id' => 11,
            'route_id' => 2,
            'start_station_id' => 11,
            'end_station_id' => 12,
            'duration' => 155,
            'length' => 125,
            'num' => 3,
        ]);
    }
}
