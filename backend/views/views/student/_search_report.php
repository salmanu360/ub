<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use \yii\helpers\Url;
/**
* @var yii\web\View $this
* @var backend\models\ForStudentsSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="for-students-search">
      <?php
    if(isset($_GET['id'])){
        $form = ActiveForm::begin([
            'action' => ['report','id'=>$_GET['id']],
            'method' => 'get',
            ]);
    }else{
    $form = ActiveForm::begin([
    'action' => ['report'],
    'method' => 'get',
    ]);
    } ?>

		<!-- <?//= $form->field($model, 'user_id') ?> -->

		

        <div class="col-md-3">
            <?= $form->field($model, 'created_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => '','readonly'=>'readonly'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                'pluginOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])->label('From Date');
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'intake')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => '','readonly'=>'readonly'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                'pluginOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])->label('To Date');
            ?>
        </div>

		<div class="clearfix"></div>
		<div class="col-md-6">
			<div class="form-group">
				<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <a href="<?php echo Url::to(['report'])?>" class="btn btn-default">Reset</a>
			</div>
		</div>
	

    <?php ActiveForm::end(); ?>

</div>
