<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var frontend\models\StudentApplication $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="student-college-applied-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'student_id') ?>

		<?= $form->field($model, 'school_id') ?>

		<?= $form->field($model, 'recruiter_id') ?>

		<?= $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
