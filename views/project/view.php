<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $project app\models\Project */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $project->title;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-sm-12">
        <a class="pull-right btn btn-default" href="<?php echo Url::toRoute(['project/index']); ?>">
            Back
        </a>

        <a class="pull-right btn btn-warning"
           href="<?php echo Url::toRoute(['/project/edit', ['id' => $project->id]]); ?>">
            Edit
        </a>

        <a class="pull-right btn btn-primary"
           href="<?php echo Url::toRoute(['/task/new', 'project_id' => $project->id]); ?>">
            Create Task
        </a>
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

        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                <?php foreach ($taskCollection as $task): ?>
                    <tr>
                        <td>
                            <a href="<?php echo Url::toRoute(['task/view', 'id' => $task->id, 'project_id' => $project->id]); ?>">
                                <?php echo $task->title; ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
