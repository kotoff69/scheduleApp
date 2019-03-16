<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%carriers}}`.
 */
class m190314_141316_create_carriers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%carriers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)
                ->notNull()
                ->comment('Carrier name'),
            'price_per_km' => $this->smallInteger()
                ->unsigned()
                ->notNull()
                ->comment('Carrier price per kilometer'),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->insertData();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%carriers}}');
    }

    /**
     * Insert data
     */
    private function insertData()
    {
        $this->insert('carriers', [
            'name' => 'Carrier 1',
            'price_per_km' => 2,
        ]);

        $this->insert('carriers', [
            'name' => 'Carrier 2',
            'price_per_km' => 1,
        ]);
    }
}
