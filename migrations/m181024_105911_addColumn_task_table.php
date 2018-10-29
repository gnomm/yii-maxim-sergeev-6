<?php

use yii\db\Migration;

/**
 * Class m181024_105911_addColumn_task_table
 */
class m181024_105911_addColumn_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks',"created_at", $this->dateTime());
        $this->addColumn('tasks',"updated_at", $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181024_105911_addColumn_task_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181024_105911_addColumn_task_table cannot be reverted.\n";

        return false;
    }
    */
}
