<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\RecruiterComment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recruiter-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 12]) ?>

    <?= $form->field($model, 'recruiter_id')->hiddenInput(['value'=>Yii::$app->user->identity->recruiter->id])->label(false) ?>

    <?= $form->field($model, 'created_by')->hiddenInput(['value'=>Yii::$app->user->identity->recruiter->id])->label(false) ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['value'=>date('Y-m-d')])->label(false) ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
