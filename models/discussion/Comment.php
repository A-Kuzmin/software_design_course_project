<?php

namespace app\models\discussion;

use Yii;
use app\models\Discussion;
use app\models\User;

/**
 * This is the model class for table "discussion_comment".
 *
 * @property integer $id
 * @property integer $discussion_id
 * @property string $text
 * @property integer $user_id
 * @property string $created_at
 *
 * @property Discussion $discussion
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discussion_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discussion_id', 'user_id'], 'integer'],
            [['text'], 'string'],
            [['created_at'], 'safe'],
            [['discussion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Discussion::className(), 'targetAttribute' => ['discussion_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discussion_id' => 'Discussion ID',
            'text' => 'Text',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscussion()
    {
        return $this->hasOne(Discussion::className(), ['id' => 'discussion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function beforeSave($insert)
    {
        if (!$this->created_at) {
            $time = new \DateTime();
            $this->created_at = $time->format('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }
}
