<?php

namespace app\models;

use yii\db\ActiveRecord;


class Project extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    public static function findById($id)
    {
        return static::findOne(['id' => $id]);
    }


}
