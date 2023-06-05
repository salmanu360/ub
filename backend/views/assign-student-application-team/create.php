<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AssignStudentApplicationTeam */

$this->title = 'Create Assign Student Application Team';
$this->params['breadcrumbs'][] = ['label' => 'Assign Student Application Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-student-application-team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
