<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var frontend\models\StudentSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'ID') ?>

		<?= $form->field($model, 'recruiter_id') ?>

		<?= $form->field($model, 'first_name') ?>

		<?= $form->field($model, 'middle_name') ?>

		<?= $form->field($model, 'last_name') ?>

		<?php // echo $form->field($model, 'birth_date') ?>

		<?php // echo $form->field($model, 'email_id') ?>

		<?php // echo $form->field($model, 'phone_no') ?>

		<?php // echo $form->field($model, 'gender') ?>

		<?php // echo $form->field($model, 'country_of_citizenship') ?>

		<?php // echo $form->field($model, 'first_language') ?>

		<?php // echo $form->field($model, 'marital_status') ?>

		<?php // echo $form->field($model, 'lead_status') ?>

		<?php // echo $form->field($model, 'referral_source') ?>

		<?php // echo $form->field($model, 'passport_no') ?>

		<?php // echo $form->field($model, 'passport_expiry_date') ?>

		<?php // echo $form->field($model, 'address') ?>

		<?php // echo $form->field($model, 'city') ?>

		<?php // echo $form->field($model, 'state') ?>

		<?php // echo $form->field($model, 'country') ?>

		<?php // echo $form->field($model, 'zip_code') ?>

		<?php // echo $form->field($model, 'country_of_education') ?>

		<?php // echo $form->field($model, 'highest_level_education') ?>

		<?php // echo $form->field($model, 'grading_scheme') ?>

		<?php // echo $form->field($model, 'graduated_recent_school') ?>

		<?php // echo $form->field($model, 'english_exam_type') ?>

		<?php // echo $form->field($model, 'date_of_exam') ?>

		<?php // echo $form->field($model, 'exact_score_listening') ?>

		<?php // echo $form->field($model, 'exact_score_reading') ?>

		<?php // echo $form->field($model, 'exact_score_writing') ?>

		<?php // echo $form->field($model, 'exact_score_speaking') ?>

		<?php // echo $form->field($model, 'exact_score_overall') ?>

		<?php // echo $form->field($model, 'refused_visa') ?>

		<?php // echo $form->field($model, 'study_permit') ?>

		<?php // echo $form->field($model, 'details') ?>

		<?php // echo $form->field($model, 'upload_document') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
