<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/**
* @var yii\web\View $this
* @var backend\models\ForStudentsSearch $model
* @var yii\widgets\ActiveForm $form
*/
$leadStatus = ArrayHelper::map(\common\models\LeadStatuses::find()->all(), 'id', 'name');
$rm = ArrayHelper::map(\common\models\User::find()->where(['type'=>5])->all(), 'id', 'username');
$recruiters = ArrayHelper::map(\common\models\Recruiters::find()->all(), 'id',function($model){return $model->owner_first_name .' '.$model->owner_last_name;});
?>

<div class="for-students-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		

		<!-- <?//= $form->field($model, 'user_id') ?> -->

	<div class="col-md-4">
		<?= $form->field($model, 'ID')->label('Unique ID') ?>
		

		<?= $form->field($model, 'last_name') ?>

		<?= $form->field($model, 'email_id') ?>

		

		<?php // echo $form->field($model, 'gender') ?>

		<?php // echo $form->field($model, 'country_of_citizenship') ?>

	</div>
		
	<div class="col-md-4">
		<?= $form->field($model, 'first_name') ?>
		<?php // echo $form->field($model, 'marital_status') ?>

		<?php // echo $form->field($model, 'country_of_interest') ?>

		<?php // echo $form->field($model, 'service_of_interest') ?>

		<?php  echo $form->field($model, 'passport_no') ?>
		<?=$form->field($model, 'lead_status')->widget(Select2::classname(), [
			'data' => $leadStatus,
			'options' => ['placeholder' => 'Status'],
			'pluginOptions' => [
				'allowClear' => true,
				'autocomplete' => false
			],
			]) ?>

			<?php // echo $form->field($model, 'passport_expiry_date') ?>

			<?php // echo $form->field($model, 'address') ?>

			<?php  //echo $form->field($model, 'city') ?>

			<?php  //echo $form->field($model, 'state') ?>
	</div>
	<div class="col-md-4">
		<?=$form->field($model, 'rm_id')->widget(Select2::classname(), [
			'data' => $rm,
			'options' => ['placeholder' => 'RM'],
			'pluginOptions' => [
				'allowClear' => true,
				'autocomplete' => false
			],
			])->label("RM") ?>
	</div>

	<div class="col-md-4">
		<?=$form->field($model, 'recruiter_id')->widget(Select2::classname(), [
			'data' => $recruiters,
			'options' => ['placeholder' => 'Recruiter'],
			'pluginOptions' => [
				'allowClear' => true,
				'autocomplete' => false
			],
			]) ?>
			<?php  echo $form->field($model, 'phone_no') ?>
	</div>

		<?php // echo $form->field($model, 'country') ?>

		<?php // echo $form->field($model, 'zip_code') ?>

		<?php // echo $form->field($model, 'country_of_education') ?>

		<?php // echo $form->field($model, 'highest_level_education') ?>

		<?php // echo $form->field($model, 'grading_scheme') ?>

		<?php // echo $form->field($model, 'grade_scale') ?>

		<?php // echo $form->field($model, 'grade_average') ?>

		<?php // echo $form->field($model, 'graduated_recent_school') ?>

		<?php // echo $form->field($model, 'english_exam_type') ?>

		<?php // echo $form->field($model, 'date_of_exam') ?>

		<?php // echo $form->field($model, 'exact_score_listening') ?>

		<?php // echo $form->field($model, 'exact_score_reading') ?>

		<?php // echo $form->field($model, 'exact_score_writing') ?>

		<?php // echo $form->field($model, 'exact_score_speaking') ?>

		<?php // echo $form->field($model, 'exact_score_overall') ?>

		<?php // echo $form->field($model, 'have_gre_exam') ?>

		<?php // echo $form->field($model, 'gre_exam_date') ?>

		<?php // echo $form->field($model, 'gre_verbal_score') ?>

		<?php // echo $form->field($model, 'gre_verbal_rank') ?>

		<?php // echo $form->field($model, 'gre_quantitative_score') ?>

		<?php // echo $form->field($model, 'gre_quantitative_rank') ?>

		<?php // echo $form->field($model, 'gre_writing_score') ?>

		<?php // echo $form->field($model, 'gre_writing_rank') ?>

		<?php // echo $form->field($model, 'have_gmat_exam') ?>

		<?php // echo $form->field($model, 'gmat_exam_date') ?>

		<?php // echo $form->field($model, 'gmat_verbal_score') ?>

		<?php // echo $form->field($model, 'gmat_verbal_rank') ?>

		<?php // echo $form->field($model, 'gmat_quantitative_score') ?>

		<?php // echo $form->field($model, 'gmat_quantitative_rank') ?>

		<?php // echo $form->field($model, 'gmat_writing_score') ?>

		<?php // echo $form->field($model, 'gmat_writing_rank') ?>

		<?php // echo $form->field($model, 'gmat_total_score') ?>

		<?php // echo $form->field($model, 'gmat_total_rank') ?>

		<?php // echo $form->field($model, 'refused_visa') ?>

		<?php // echo $form->field($model, 'study_permit') ?>

		<?php // echo $form->field($model, 'details') ?>

		<?php // echo $form->field($model, 'upload_document') ?>

		<?php // echo $form->field($model, 'consent') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>
		<div class="clearfix"></div>
			
		<div class="col-md-6">
			<div class="form-group">
				<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
				<a href="<?php echo Url::to(['student/index'])?>" class="btn btn-default">Reset</a>
				
			</div>
		</div>
	

    <?php ActiveForm::end(); ?>

</div>
