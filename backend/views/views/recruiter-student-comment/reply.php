<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\RecruiterStudentComment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recruiter-student-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->hiddenInput(['value'=>$_GET['id']])->label(false)  ?>

    <?= $form->field($model, 'recruiter_id')->hiddenInput(['value'=>$_GET['rid']])->label(false)  ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_date')->hiddenInput(['value'=>date('Y-m-d')])->label(false)  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
