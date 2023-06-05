<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\StudentEducationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-education-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'country_of_education') ?>

    <?= $form->field($model, 'highest_level_education') ?>

    <?= $form->field($model, 'grading_scheme') ?>

    <?php // echo $form->field($model, 'grade_scale') ?>

    <?php // echo $form->field($model, 'grade_average') ?>

    <?php // echo $form->field($model, 'graduated_recent_school') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
