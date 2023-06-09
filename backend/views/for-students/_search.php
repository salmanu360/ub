<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ForStudentsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="for-students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<div class="row">
    <div class="col-md-3">
    <?= $form->field($model, 'id') ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'first_name') ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'last_name') ?>
    </div>
</div>
    

    <!-- <?//= $form->field($model, 'user_id') ?> -->

    <?php // echo $form->field($model, 'phone_no') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'country_of_citizenship') ?>

    <?php // echo $form->field($model, 'first_language') ?>

    <?php // echo $form->field($model, 'marital_status') ?>

    <?php // echo $form->field($model, 'country_of_interest') ?>

    <?php // echo $form->field($model, 'service_of_interest') ?>

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

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
