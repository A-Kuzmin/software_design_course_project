<?php
namespace app\helper\menu;

use yii\helpers\Html;

class Items
{
    protected static $_items = [
        ['label' => 'Projects', 'url' => ['/project/index']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];

    public static function addItem($item)
    {
        static::$_items[] = $item;
    }

    public static function initUser()
    {
        if (\Yii::$app->user->isGuest) {
            static::addItem(
                [
                    'label' => 'Login',
                    'url' => ['/site/login']
                ]
            );


        } else {
            /** @var \app\models\User $user */
            $user = \Yii::$app->user->identity;
            if ($user->is_admin) {
                static::addItem(
                    [
                        'label' => 'Users',
                        'url' => ['/user/index']
                    ]
                );
            }
            
            static::addItem(
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . $user->username . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
            );
        }
    }

    public static function getItems()
    {
        return static::$_items;
    }
}