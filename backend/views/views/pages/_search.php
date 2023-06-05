<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\PagesSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="pages-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>


<div class="row">
		<div class="col-sm-6">
				<?= $form->field($model, 'title') ?>
		</div>		


		<?php // echo $form->field($model, 'image') ?>

		<?php // echo $form->field($model, 'slug') ?>

		<?php // echo $form->field($model, 'meta_description') ?>

		<?php // echo $form->field($model, 'meta_keywords') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<div class="col-sm-6">
                        <label class="control-label hidden-xs">&nbsp;</label> <!-- to fix alignment -->
                        <div class="form-group">
                        <?= Html::submitButton('<i class="fa fa-filter" aria-hidden="true"></i> '.Yii::t('app', 'Filter'),  ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Reset'),['/pages/index'], ['class' => 'btn btn-default btn-flat']) ?>
                            <?= Html::a('<i class="fa fa-plus margin-r-5"></i> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
            </div> 
</div>			

    <?php ActiveForm::end(); ?>

</div>
