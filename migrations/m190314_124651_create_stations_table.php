<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stations}}`.
 */
class m190314_124651_create_stations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stations}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string(255)
                ->notNull()
                ->comment('Station name'),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->insertData();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%stations}}');
    }

    /**
     * Insert data
     */
    private function insertData()
    {
        $this->insert('stations', [
            'id' => 1,
            'name' => 'Moscow',
        ]);

        $this->insert('stations', [
            'id' => 2,
            'name' => 'Khimki',
        ]);

        $this->insert('stations', [
            'id' => 3,
            'name' => 'Zelenograd',
        ]);

        $this->insert('stations', [
            'id' => 4,
            'name' => 'Solnechnogorsk',
        ]);

        $this->insert('stations', [
            'id' => 5,
            'name' => 'Klin',
        ]);

        $this->insert('stations', [
            'id' => 6,
            'name' => 'Zavidovo',
        ]);

        $this->insert('stations', [
            'id' => 7,
            'name' => 'Emmaus',
        ]);

        $this->insert('stations', [
            'id' => 8,
            'name' => 'Tver',
        ]);

        $this->insert('stations', [
            'id' => 9,
            'name' => 'Stupino',
        ]);

        $this->insert('stations', [
            'id' => 10,
            'name' => 'Novomoskovsk',
        ]);

        $this->insert('stations', [
            'id' => 11,
            'name' => 'Elec',
        ]);

        $this->insert('stations', [
            'id' => 12,
            'name' => 'Voronezh',
        ]);
    }
}
