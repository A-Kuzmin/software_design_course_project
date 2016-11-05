<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\User;

class UserController extends Controller
{
    public $defaultAction = 'create';

    /**
     * Create admin user.
     * @param string $username username.
     * @param string $password password.
     * @param string $email email.
     */
    public function actionCreate($username, $password, $email)
    {
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();

        if ($user->validate()) {
            $user->save();
        } else {
            foreach ($user->getErrors() as $error) {
                echo "Error " . $error;
                echo "/n";
            }
        }
    }
}
