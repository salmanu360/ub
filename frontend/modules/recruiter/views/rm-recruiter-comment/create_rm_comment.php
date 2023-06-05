<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$stu_id=$_GET['id'];
$Student=\common\models\Student::find()->where(['ID'=>$stu_id])->one();
/* @var $this yii\web\View */
/* @var $model common\models\RmRecruiterComment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rm-recruiter-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->hiddenInput(['value'=>$stu_id])->label(false) ?>

    <?= $form->field($model, 'recruiter_id')->hiddenInput(['value'=>Yii::$app->user->identity->recruiter->id])->label(false) ?>

    <?= $form->field($model, 'rm_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
