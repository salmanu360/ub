<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AssignUnivCourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assign-univ-course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
    <div class="col-md-3"><?= $form->field($model, 'id') ?></div>
    </div>

    <!-- <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'college_id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'created_by') ?> -->

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'intake') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
