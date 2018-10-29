<?php

use yii\db\Migration;

/**
 * Class m181026_202231_addColumn_users_and_roles_table
 */
class m181026_202231_addColumn_users_and_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('roles',"created_at", $this->dateTime());
        $this->addColumn('roles',"updated_at", $this->dateTime());

        $this->addColumn('users',"created_at", $this->dateTime());
        $this->addColumn('users',"updated_at", $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181026_202231_addColumn_users_and_roles_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181026_202231_addColumn_users_and_roles_table cannot be reverted.\n";

        return false;
    }
    */
}
