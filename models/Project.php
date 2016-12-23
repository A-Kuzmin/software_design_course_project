<?php

namespace app\models;

use Yii;
use DateTime;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Discussion[] $discussions
 * @property ProjectPermission[] $projectPermissions
 * @property User[] $users
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscussions()
    {
        return $this->hasMany(Discussion::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPermissions()
    {
        return $this->hasMany(ProjectPermission::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('project_permission', ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['project_id' => 'id']);
    }

    public static function findById($id)
    {
        return static::findOne(['id' => $id]);
    }

    public function beforeSave($insert)
    {
        $time = new DateTime();
        if (!$this->created_at) {
            $this->created_at = $time->format('Y-m-d H:i:s');
        }
        $this->updated_at = $time->format('Y-m-d H:i:s');
        return parent::beforeSave($insert);
    }

}
