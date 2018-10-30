<?php

use yii\db\Migration;

/**
 * Class m181030_115218_addColumn_image_task_table
 */
class m181030_115218_addColumn_image_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks',"image", $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181030_115218_addColumn_image_task_table cannot be reverted.\n";

        $this->dropColumn('tasks', 'image');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181030_115218_addColumn_image_task_table cannot be reverted.\n";

        return false;
    }
    */
}
