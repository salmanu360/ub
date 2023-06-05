<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var frontend\models\CourseSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'college_id') ?>

		<?= $form->field($model, 'tution_fee') ?>

		<?= $form->field($model, 'application_fee') ?>

		<?= $form->field($model, 'name') ?>

		<?php // echo $form->field($model, 'discount') ?>

		<?php // echo $form->field($model, 'tags') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'comment') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
