<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $collection array|\yii\db\ActiveRecord[] */

$this->title = 'Projects';

?>
<p>
    <?= Html::a('Create Project', ['new'], ['class' => 'btn btn-success']) ?>
</p>
<div class="row project-list">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                <?php foreach ($collection as $project): ?>
                    <tr>
                        <td>
                            <?= Html::a("{$project->id}. {$project->title}", ['view', 'id' => $project->id]) ?>
                        </td>
                        <td class="text-right actions">
                            <?= Html::a("Edit", ['edit', 'id' => $project->id]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
