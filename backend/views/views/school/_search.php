<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/**
* @var yii\web\View $this
* @var backend\models\SchoolSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="school-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>
<div class="row">
       <div class="col-sm-3">	
		<?php echo $form->field($model, 'name') ?>
		</div>
		<div class="col-sm-3">	
		<?php echo $form->field($model, 'cont_title') ?>
		</div>
		<div class="col-sm-3">	
		<?php echo $form->field($model, 'cont_fname') ?>
		</div>
		<div class="col-sm-3">	
		<?php  echo $form->field($model, 'cont_last_name') ?>
		</div>

		<div class="col-sm-3">	
		<?php  echo $form->field($model, 'cont_email') ?>
		</div>

		<div class="col-sm-3">	
		<?php  echo $form->field($model, 'phone_number') ?>
		</div>
		<div class="col-sm-3">	
		<?php echo $form->field($model, 'dest_country')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(common\models\Country::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select Country ...'],
                    'pluginOptions' => [
                    'tags' => true,
                //  'tokenSeparators' => [',', ' '],        
                    ],
                    ]);?>
		</div>
		

		<div class="col-sm-3">	
		<?= $form->field($model, 'ref_no') ?>
		</div>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
		<?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Reset'),['/school/index'], ['class' => 'btn btn-default btn-flat']) ?>

    </div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
