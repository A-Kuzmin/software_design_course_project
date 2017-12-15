<?php

namespace app\models\project;

use Yii;

/**
 * This is the model class for table "{{%permission}}".
 *
 * @property integer $user_id
 * @property integer $project_id
 * @property string $section
 *
 * @property Project $project
 * @property User $user
 */
class Permission extends \yii\db\ActiveRecord
{
    protected static $_sections = [
        'task',
        'task_create',
        'discussion',
        'discussion_create',
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%permission}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'project_id', 'section'], 'required'],
            [['user_id', 'project_id'], 'integer'],
            [['section'], 'string', 'max' => 32],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public static function checkPermission(\yii\base\Action $action)
    {

        if (\Yii::$app->user->isGuest) {
            return false;
        }
        /** @var \app\models\User $user */
        $user = \Yii::$app->user->identity;
        if ($user->is_admin) {
            return true;
        }

        $controller = $action->id;
        $method = $action->actionMethod;
        
        \Yii::getLogger()->log(print_r($action,1), \yii\log\Logger::LEVEL_WARNING);
        die(print_r($action,1));
//        $rules = self::find()->where(['user_id' => $user->getId()])->all();
//        $user->checkPermission()

        return true;
    }
}
