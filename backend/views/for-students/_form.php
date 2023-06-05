<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ForStudents $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="for-students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->textInput() ?>

    <?= $form->field($model, 'phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_of_citizenship')->textInput() ?>

    <?= $form->field($model, 'first_language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marital_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_of_interest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_of_interest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_expiry_date')->textInput() ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput() ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_of_education')->textInput() ?>

    <?= $form->field($model, 'highest_level_education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grading_scheme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grade_scale')->textInput() ?>

    <?= $form->field($model, 'grade_average')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'graduated_recent_school')->textInput() ?>

    <?= $form->field($model, 'english_exam_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_exam')->textInput() ?>

    <?= $form->field($model, 'exact_score_listening')->textInput() ?>

    <?= $form->field($model, 'exact_score_reading')->textInput() ?>

    <?= $form->field($model, 'exact_score_writing')->textInput() ?>

    <?= $form->field($model, 'exact_score_speaking')->textInput() ?>

    <?= $form->field($model, 'exact_score_overall')->textInput() ?>

    <?= $form->field($model, 'have_gre_exam')->textInput() ?>

    <?= $form->field($model, 'gre_exam_date')->textInput() ?>

    <?= $form->field($model, 'gre_verbal_score')->textInput() ?>

    <?= $form->field($model, 'gre_verbal_rank')->textInput() ?>

    <?= $form->field($model, 'gre_quantitative_score')->textInput() ?>

    <?= $form->field($model, 'gre_quantitative_rank')->textInput() ?>

    <?= $form->field($model, 'gre_writing_score')->textInput() ?>

    <?= $form->field($model, 'gre_writing_rank')->textInput() ?>

    <?= $form->field($model, 'have_gmat_exam')->textInput() ?>

    <?= $form->field($model, 'gmat_exam_date')->textInput() ?>

    <?= $form->field($model, 'gmat_verbal_score')->textInput() ?>

    <?= $form->field($model, 'gmat_verbal_rank')->textInput() ?>

    <?= $form->field($model, 'gmat_quantitative_score')->textInput() ?>

    <?= $form->field($model, 'gmat_quantitative_rank')->textInput() ?>

    <?= $form->field($model, 'gmat_writing_score')->textInput() ?>

    <?= $form->field($model, 'gmat_writing_rank')->textInput() ?>

    <?= $form->field($model, 'gmat_total_score')->textInput() ?>

    <?= $form->field($model, 'gmat_total_rank')->textInput() ?>

    <?= $form->field($model, 'refused_visa')->textInput() ?>

    <?= $form->field($model, 'study_permit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'upload_document')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'consent')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
