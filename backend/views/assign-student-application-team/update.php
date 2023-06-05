<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AssignStudentApplicationTeam */

$this->title = 'Update Assign Student Application Team: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Student Application Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assign-student-application-team-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
