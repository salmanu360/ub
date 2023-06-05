<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AssignUnivCourse */

$this->title = 'Update Assign Univ Course: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Univ Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assign-univ-course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
