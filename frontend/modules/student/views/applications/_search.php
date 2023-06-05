<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var frontend\models\ForStudentApplicationsSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="for-student-applications-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'student_id') ?>

		<?= $form->field($model, 'college_id') ?>

		<?= $form->field($model, 'course_id') ?>

		<?= $form->field($model, 'application_fee') ?>

		<?php // echo $form->field($model, 'application_fee_status') ?>

		<?php // echo $form->field($model, 'visa_fee') ?>

		<?php // echo $form->field($model, 'visa_fee_status') ?>

		<?php // echo $form->field($model, 'payment_date') ?>

		<?php // echo $form->field($model, 'pay_status') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
