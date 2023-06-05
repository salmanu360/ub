<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var frontend\models\CourseSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>
<p style="color:green"><b>Course List</b></p>
<hr>
<div class="course-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

     <div class="row">
		   <div class="col-sm-2">
		   		<?= $form->field($model, 'tution_fee') ?>
		   </div>
		   <div class="col-sm-2">
		       <?= $form->field($model, 'application_fee') ?>
		   </div>
		   <div class="col-sm-3">
		       <?= $form->field($model, 'name') ?>
		   </div>
		   <div class="col-sm-5">
				<div class="form-group">
					<label class="control-label hidden-xs">&nbsp;</label> <!-- to fix alignment -->
					<div class="form-group">
							<?= Html::submitButton('<i class="fa fa-filter" aria-hidden="true"></i> '.Yii::t('app', 'Filter'), ['class' => 'btn btn-primary btn-sm']) ?>
							<!-- <?= Html::a('<i class="fa  fa-filter margin-r-5"></i>'.Yii::t('app', 'Filter'),['/school/course/_search'], ['class' => 'btn btn-warning btn-flat  btn-sm']) ?> -->
							<?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Reset'),['/school/course/index'], ['class' => 'btn btn-warning btn-flat  btn-sm']) ?>
							<?= Html::a('<i class="fa fa-plus margin-r-5"></i> ' . 'New', ['create'], ['class' => 'btn btn-success  btn-sm']) ?>
					</div>
				</div>
			</div>
	 </div>
		

		

		

		<?php // echo $form->field($model, 'discount') ?>

		<?php // echo $form->field($model, 'tags') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'comment') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

   

    <?php ActiveForm::end(); ?>

</div>
<br>