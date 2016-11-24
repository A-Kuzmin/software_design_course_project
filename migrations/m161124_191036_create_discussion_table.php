<?php

use yii\db\Migration;

/**
 * Handles the creation for table `discussion`.
 */
class m161124_191036_create_discussion_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('discussion', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'title' => $this->string(64)->notNull(),
            'status'    => $this->smallInteger()->notNull()->defaultValue(0)
        ]);

        $this->addForeignKey('fk_discussion_project_id', 'discussion', 'project_id',
            '{{%project}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('discussion');
    }
}
