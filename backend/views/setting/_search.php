<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\SettingSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="setting-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'title') ?>

		<?= $form->field($model, 'description') ?>

		<?= $form->field($model, 'keywords') ?>

		<?= $form->field($model, 'logo') ?>

		<?php // echo $form->field($model, 'analytics') ?>

		<?php // echo $form->field($model, 'phone') ?>

		<?php // echo $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'address') ?>

		<?php // echo $form->field($model, 'copyright') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
