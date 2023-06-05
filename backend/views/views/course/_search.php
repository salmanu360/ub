<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

		
    	<div class="col-sm-3">
		<?= $form->field($model, 'name') ?>
		</div>

		<div class="col-sm-3">	
			<?php echo $form->field($model, 'college_id')->widget(Select2::classname(), [
						'data' => \yii\helpers\ArrayHelper::map(common\models\School::find()->all(), 'id', 'name'),
						'options' => ['placeholder' => 'Select College ...'],
						'pluginOptions' => [
						'tags' => true,
					//  'tokenSeparators' => [',', ' '],        
						],
			]);?>
		</div>

		<div class="col-sm-3">
			<?= $form->field($model, 'tution_fee') ?>
		</div>

		<div class="col-sm-3">
		<?= $form->field($model, 'application_fee') ?>
		</div>
		
			<div class="clearfix"></div>
	<div class="col-sm-12">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Reset', ['index'], ['class' => 'btn btn-default']) ?>
		<?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Add New Course', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Upload Excel', ['uploadexcel'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
