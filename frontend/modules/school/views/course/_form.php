<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\Course $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="course-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Course',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-12',
                 #'offset' => 'col-sm-offset-0',
                 'wrapper' => 'col-sm-12 mb-4',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="">
         <div class="row">
             <div class="col-sm-12">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            
                    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
             </div>
                  
         </div>
         <div class="row mb-4">
             <div class="col-sm-6">
                    <?= $form->field($model, 'discount')->textInput() ?>
             </div>
             <div class="col-sm-6">
                    <?= $form->field($model, 'status')->textInput() ?>
             </div>          
         </div>

         <div class="row">
             <div class="col-sm-6">
                    <?= $form->field($model, 'tution_fee')->textInput(['maxlength' => true]) ?>
             </div>
             <div class="col-sm-6">
                    <?= $form->field($model, 'application_fee')->textInput(['maxlength' => true]) ?>
             </div>          
         </div>
			
			


			<?php //$form->field($model, 'tags')->textarea(['rows' => 6]) ?>


        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Create' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

