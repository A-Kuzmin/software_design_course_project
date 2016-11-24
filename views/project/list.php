<?php

use yii\bootstrap\Nav;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $collection array|ActiveRecord[] */

$this->title = 'Projects';

?>
<div class="row">
    <div class="col-sm-12">
        <a class="pull-right btn btn-warning" href="<?php echo Url::toRoute(['project/new']); ?>">
            Create Project
        </a>
    </div>
</div>
<div class="row project-list">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                <?php foreach ($collection as $project): ?>
                    <tr>
                        <td>
                            <a href="<?php echo Url::toRoute(['project/view', 'id' => $project->id]); ?>">
                                <?php echo $project->id; ?>. <?php echo $project->title; ?>
                            </a>
                        </td>
                        <td class="text-right actions">
                            <a class="col-xs-12"
                               href="<?php echo Url::toRoute(['project/edit', 'id' => $project->id]); ?>">
                                Edit
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
