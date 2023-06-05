<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var frontend\models\ForPaymentHistorySearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="for-payment-history-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'application_id') ?>

		<?= $form->field($model, 'razorpay_payment_id') ?>

		<?= $form->field($model, 'student_id') ?>

		<?= $form->field($model, 'student') ?>

		<?php // echo $form->field($model, 'course_id') ?>

		<?php // echo $form->field($model, 'course') ?>

		<?php // echo $form->field($model, 'college_id') ?>

		<?php // echo $form->field($model, 'college') ?>

		<?php // echo $form->field($model, 'amount') ?>

		<?php // echo $form->field($model, 'currency') ?>

		<?php // echo $form->field($model, 'payment_method') ?>

		<?php // echo $form->field($model, 'payment_type') ?>

		<?php // echo $form->field($model, 'payment_date') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'created_by') ?>

		<?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
