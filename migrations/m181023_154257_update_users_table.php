<?php

use yii\db\Migration;

/**
 * Class m181023_154257_update_users_table
 */
class m181023_154257_update_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users',"email", $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        echo "m181023_154257_update_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181023_154257_update_users_table cannot be reverted.\n";

        return false;
    }
    */
}
