<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $project app\models\Project */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;

$this->title = $project->title;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-sm-12">
        <?php
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Back', 'url' => ['/project/index']],
                ['label' => 'Edit', 'url' => ['/project/edit', ['id' => $project->id]]],
                ['label' => 'Create Task', 'url' => ['/task/new', 'project_id' => $project->id]],
            ],
        ]);
        ?>
    </div>
</div>

<div class="project-view">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">
                Title: <?php echo $project->title; ?><br>
                Description: <?php echo $project->description; ?>
            </div>
        </div>
    <div class="row">
        <h3>Tasks</h3>
        <?php foreach ($taskCollection as $task): ?>
            <div class="col-sm-12">
                <a href="<?php echo Url::toRoute(['task/view', 'id' => $task->id, 'project_id' => $project->id]); ?>"><?php echo $task->title; ?></a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
