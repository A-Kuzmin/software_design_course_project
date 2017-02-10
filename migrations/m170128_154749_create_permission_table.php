<?php

use yii\db\Migration;

/**
 * Handles the creation of table `permission`.
 */
class m170128_154749_create_permission_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('permission', [
            'user_id' => $this->integer()->notNull(),
            'project_id' => $this->integer()->notNull(),
            'section'   => $this->string(32)->notNull(),
        ]);
        
        $this->addPrimaryKey(
            'pk_permission',
            'permission',
            ['user_id', 'project_id']
        );

        $this->addForeignKey('fk_permission_user_id', 'permission', 'user_id',
            '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_permission_project_id', 'permission', 'project_id',
            '{{%project}}', 'id', 'CASCADE', 'CASCADE');

        parent::safeUp();
    }

    public function safeDown()
    {
        $this->dropTable('permission');
        parent::safeDown();
    }


}
