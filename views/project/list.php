<?php

use yii\bootstrap\Nav;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $collection array|ActiveRecord[] */

$this->title = 'Projects';

?>
<div class="row">
    <div class="col-sm-12">
        <?php
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Create Project', 'url' => ['/project/new']],
            ],
        ]);
        ?>
    </div>
</div>
<div class="project-list">
    <div class="body-content">
            <?php foreach ($collection as $project): ?>
                <?php if ($project): ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-9">
                            <a href="<?php echo Url::toRoute(['project/view', 'id' => $project->id]); ?>">
                                <?php echo $project->id; ?>. <?php echo $project->title; ?>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3 actions">
                            <a class="col-xs-12" href="<?php echo Url::toRoute(['project/edit', 'id' => $project->id]); ?>">Edit</a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
    </div>
</div>
