<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AssignStudentRecruiter */

$this->title = 'Create Assign Student Recruiter';
$this->params['breadcrumbs'][] = ['label' => 'Assign Student Recruiters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-student-recruiter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
