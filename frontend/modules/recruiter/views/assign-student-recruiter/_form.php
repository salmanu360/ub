<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\AssignStudentRecruiter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assign-student-recruiter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $session = ArrayHelper::map(\common\models\Recruiters::find()->all(), 'id', 'owner_first_name');
        echo $form->field($model, 'recruiter_id')->widget(Select2::classname(), [
            'data' => $session,
            'options' => ['placeholder' => 'Select Recruiter ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?> 

     <?php
        $session = ArrayHelper::map(\common\models\Student::find()->all(), 'ID', 'first_name');
        echo $form->field($model, 'student_id')->widget(Select2::classname(), [
            'data' => $session,
            'options' => ['placeholder' => 'Select Student ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?> 

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
