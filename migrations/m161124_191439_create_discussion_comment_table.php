<?php

use yii\db\Migration;

/**
 * Handles the creation for table `discussion_comment`.
 */
class m161124_191439_create_discussion_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('discussion_comment', [
            'id' => $this->primaryKey(),
            'discussion_id' => $this->integer(),
            'text' => $this->text(),
            'user_id' => $this->integer(),
            'created_at' => $this->dateTime(),
        ]);

        $this->addForeignKey('fk_discussion_comment_discussion_id', 'discussion_comment', 'discussion_id',
            'discussion', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_discussion_comment_user_id', 'discussion_comment', 'user_id',
            '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('discussion_comment');
    }
}
