<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ContactSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<div class="row">
<div class="col-md-3">
<?= $form->field($model, 'id') ?>
</div>
<div class="col-md-3">
<?= $form->field($model, 'name') ?>
</div>
<div class="col-md-3">
<?= $form->field($model, 'email') ?>
</div>
<div class="col-md-3">
<?= $form->field($model, 'contact_number') ?>
</div>
<div class="col-md-3">
<?= $form->field($model, 'subject') ?>
</div>
</div>
   
    <?php // echo $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
