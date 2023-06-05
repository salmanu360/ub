<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StudentEducation $model */

$this->title = 'Create Student Education';
$this->params['breadcrumbs'][] = ['label' => 'Student Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-education-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
