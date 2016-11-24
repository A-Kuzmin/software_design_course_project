<?php

use yii\db\Migration;

/**
 * Handles the creation for table `task_comment`.
 */
class m161124_191454_create_task_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('task_comment', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer(),
            'text' => $this->text(),
            'user_id' => $this->integer(),
            'created_at' => $this->dateTime(),
        ]);

        $this->addForeignKey('fk_task_comment_task_id', 'task_comment', 'task_id',
            'discussion', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_task_comment_user_id', 'task_comment', 'user_id',
            '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('task_comment');
    }
}
