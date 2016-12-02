<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use app\models\discussion\Comment;

/* @var $this yii\web\View */
/* @var $model app\models\Discussion */
/* @var $comentsDataProvider app\models\discussion\CommentSearch */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Discussions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discussion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_id',
            'title',
            'status',
        ],
    ]) ?>


    <?php
    $comment = new \app\models\discussion\Comment();
    $comment->discussion_id = $model->id;
    $form = ActiveForm::begin(); ?>

    <?= $form->field($comment, 'discussion_id')->hiddenInput() ?>

    <?= $form->field($comment, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php foreach ($comentsDataProvider->getModels() as $coment): ?>
        <?php echo $coment->text; ?>
    <?php endforeach; ?>
</div>

