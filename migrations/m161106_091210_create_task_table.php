<?php

use yii\db\Migration;

/**
 * Handles the creation for table `task`.
 */
class m161106_091210_create_task_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'title' => $this->string(64)->notNull(),
            'description' => $this->text(),
            'status'    => $this->smallInteger()->notNull()->defaultValue(0)
        ]);

        $this->addForeignKey('fk_task_project_id', '{{%task}}', 'project_id',
            '{{%project}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%task}}');
    }
}
