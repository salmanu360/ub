<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$stu_id=$_GET['id'];
$Student=\common\models\Student::find()->where(['ID'=>$stu_id])->one();
/** @var yii\web\View $this */
/** @var common\models\RecruiterStudentComment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recruiter-student-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->hiddenInput(['value'=>$stu_id])->label(false) ?>

    <?= $form->field($model, 'recruiter_id')->hiddenInput(['value'=>$Student->recruiter_id])->label(false) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
