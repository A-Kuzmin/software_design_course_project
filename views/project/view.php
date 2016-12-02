<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $taskDataProvider yii\data\ActiveDataProvider */
/* @var $discussionDataProvider yii\data\ActiveDataProvider */
/* @var $taskSearchModel app\models\TaskSearch */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

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
    <p>

        <?= Html::a('Tasks', ['/task/index', 'project_id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Discussions', ['/discussion/index', 'project_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>


    <h2><?= Html::encode("Tasks") ?></h2>
    <?= GridView::widget([
        'dataProvider' => $taskDataProvider,
        'columns' => [
            'id',
            'title',
            'description:ntext',
            'status',
            ['class' => 'yii\grid\ActionColumn', 'controller' => 'task'],
        ],
    ]); ?>

    <h2><?= Html::encode("Discussions") ?></h2>
    <?= GridView::widget([
        'dataProvider' => $discussionDataProvider,
        'columns' => [
            'id',
            'title',
            'status',
            ['class' => 'yii\grid\ActionColumn', 'controller' => 'discussion'],
        ],
    ]); ?>

</div>
