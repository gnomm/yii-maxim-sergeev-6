<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181015_114321_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(50)->notNull(),
            'password' => $this->string(128)->notNull(),
            'role_id' => $this->integer()->notNull()
        ]);

//        $this->addForeignKey('fk_users_roles', 'users', 'role_id', 'roles', 'id','CASCADE');

        $this->createIndex("ix_users_login", "users", "login", true);
    }

    /**
     * {@inheritdoc}p
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
