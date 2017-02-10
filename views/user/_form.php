<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (!$model->isNewRecord): ?>
        <div class="form-group field-user-created_at">
            <label class="control-label"><?php echo Yii::t('app', 'Created At'); ?>:
                <span><?php echo Yii::$app->formatter->asDatetime($model->created_at);?></span>
            </label>
        </div>
        <div class="form-group field-user-updated_at">
            <label class="control-label"><?php echo Yii::t('app', 'Updated At'); ?>:
                <span><?php echo Yii::$app->formatter->asDatetime($model->updated_at);?></span>
            </label>
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['type' => 'password']) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'is_admin')->dropDownList(\app\helper\YesNo::getOptions()) ?>
    
    <div class="permissions">
        <?php foreach (\app\models\Project::find()->all() as $project): ?>
        <div class="permission">
            <h1>
                <?= $form->field($model, '')->checkbox() ?>
            </h1>
        </div>
        <?php endforeach; ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
