<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\RecruiterStudentComment $model */

$this->title = 'Update Recruiter Student Comment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recruiter Student Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recruiter-student-comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
