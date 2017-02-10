<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\task\Comment;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $comentsDataProvider app\models\task\CommentSearch */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

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
            'description:ntext',
            'status',
        ],
    ]) ?>


    <?php
    $comment = new Comment();
    $form = ActiveForm::begin([
        'action' => ['task/send_comment', 'task_id' => $model->id],
    ]); ?>

    <?= $form->field($comment, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="row">
        <?php /** @var Comment $taskComment */ ?>
        <?php foreach ($comentsDataProvider->getModels() as $taskComment): ?>
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <strong> <?php echo ($taskComment->user_id)? $taskComment->getUser() : 'not find user'; ?> </strong>
                    <?php echo $taskComment->created_at; ?>
                </div>
                <?php echo $taskComment->text; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
