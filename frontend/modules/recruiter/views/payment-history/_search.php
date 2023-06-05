<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var frontend\models\PaymentHistorySearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="payment-history-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

	<div class="row">
		<div class="col-md-3">
			<?= $form->field($model, 'id')->label('Order Id') ?>
		</div>
		<div class="col-md-3">
			<?= $form->field($model, 'student') ?>
		</div>
		<div class="col-md-3">
			<?= $form->field($model, 'course') ?>
		</div>
		<div class="col-md-3">
			<?= $form->field($model, 'college') ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<?= $form->field($model, 'recruiter') ?>
		</div>
		<div class="col-md-3">
			<?= $form->field($model, 'payment_method')
			 ->dropDownList(
				['card' => 'Card', 'wallet' => 'Wallet'],           // Flat array ('id'=>'label')
				['prompt' => 'Select...']    // options
			 ); ?>
		</div>
		<!-- <div class="col-md-3">
			<?= $form->field($model, 'payment_date') ?>
		</div> -->
		<div class="col-md-6">
			<div class="form-group filter-buttons">
				<?= Html::submitButton('Filter', ['class' => 'btn btn-success']) ?>
				<?= Html::a('Reset', ['index'], ['class' => 'btn btn-danger']) ?>
			</div>
		</div>
	</div>




		<?php // echo  $form->field($model, 'application_id') ?>

		<?php // echo  $form->field($model, 'razorpay_payment_id') ?>

		<?php // echo  $form->field($model, 'student_id') ?>

		<?php // echo  $form->field($model, 'student') ?>

		<?php // echo $form->field($model, 'course_id') ?>

		<?php // echo $form->field($model, 'course') ?>

		<?php // echo $form->field($model, 'college_id') ?>

		<?php // echo $form->field($model, 'college') ?>

		<?php // echo $form->field($model, 'recruiter_id') ?>

		<?php // echo $form->field($model, 'recruiter') ?>

		<?php // echo $form->field($model, 'amount') ?>

		<?php // echo $form->field($model, 'currency') ?>

		<?php // echo $form->field($model, 'payment_method') ?>

		<?php // echo $form->field($model, 'payment_date') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'created_by') ?>

		<?php // echo $form->field($model, 'created_at') ?>

   

    <?php ActiveForm::end(); ?>

</div>
