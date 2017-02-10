<?php

use yii\db\Migration;

class m170128_163949_change_user_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn(
            '{{%user}}',
            'is_admin',
            $this->boolean()->defaultValue(false)->notNull()
            );

        $this->update('{{%user}}', ['is_admin' => true]);
    }

    public function safeDown()
    {
        $this->dropColumn(
            '{{%user}}',
            'is_admin'
        );
    }

}
