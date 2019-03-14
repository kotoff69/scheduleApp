<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%routes}}`.
 */
class m190314_141215_create_routes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%routes}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)
                ->notNull()
                ->comment('Route name'),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->insertData();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%routes}}');
    }

    /**
     * Insert data
     */
    private function insertData()
    {
        $this->insert('routes', [
            'id' => 1,
            'name' => 'Moscow - Tver',
        ]);

        $this->insert('routes', [
            'id' => 2,
            'name' => 'Moscow - Voronezh',
        ]);
    }
}
