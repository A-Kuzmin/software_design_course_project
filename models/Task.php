<?php

namespace app\models;

use yii\db\ActiveRecord;


class Task extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%task}}';
    }

    public static function findById($id)
    {
        return static::findOne(['id' => $id]);
    }
}
