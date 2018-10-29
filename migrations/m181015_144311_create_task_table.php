<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 */
class m181015_144311_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'description' => $this->text()->notNull(),
            'date' => $this->dateTime(),
            'user_id' => $this->integer()
        ]);

        $this ->addForeignKey('fk_task_users_id', "tasks", 'user_id', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
    }
}
