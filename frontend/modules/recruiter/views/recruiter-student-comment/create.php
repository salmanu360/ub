<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\RecruiterStudentComment $model */

$this->title = 'Create Recruiter Student Comment';
$this->params['breadcrumbs'][] = ['label' => 'Recruiter Student Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruiter-student-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
