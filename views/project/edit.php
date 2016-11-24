<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;

if ($model->id) {

    $this->title = "Edit Project \"{$model->title}\"";
} else {
    $this->title = 'New Project';
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-sm-12">
        <a class="pull-right btn btn-default" href="<?php echo Url::toRoute(['project/index']); ?>">
            Back
        </a>
    </div>
</div>
<div class="project-edit">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('projectFormSaved')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

    <?php else: ?>
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'project-form']); ?>

                    <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'description')->textArea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
