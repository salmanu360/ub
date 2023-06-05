<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper; 
use kartik\date\DatePicker;
use kartik\select2\Select2;
use borales\extensions\phoneInput\PhoneInput;
use kartik\switchinput\SwitchInput;
use buttflattery\formwizard\FormWizard;

/**
* @var yii\web\View $this
* @var common\models\Student $model
* @var yii\widgets\ActiveForm $form
*/

?>
<h4 class="common-sub-heading">Student ID: <?=$model->id?></h4>
<div class="dashboard-pills">
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fa fa-check-circle" aria-hidden="true"></i></i></strong> <?= Yii::$app->session->getFlash('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fa fa-ban" aria-hidden="true"></i></strong> <?= Yii::$app->session->getFlash('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
    <?php $form = ActiveForm::begin([
        'id' => 'for-students',
        'options' => [
            'class' => 'studentform'
        ],
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
        'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    #'offset' => 'col-sm-offset-4',
                    'wrapper' => 'col-sm-8',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]
        );
        ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mt-4">
                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="form-group mt-4">
                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
            </div>                   
            <div class="form-group mt-4">
                <?php echo $form->field($user, 'email')->textInput(['maxlength' => true]) ?>
            </div>                
            <div class="form-group mt-4">
                <?= $form->field($model, 'phone_no')->textInput() ?>
            </div>
             
              
              <div class="job-apply-button">
                <!-- <button class="common-btn" type="submit" >Apply Now</button> -->
                <?= Html::submitButton(
                    '<span class="fa fa-pencil"></span> ' .
                    'Update',
                    [
                    'id' => 'save-student',
                    'class' => 'common-btn'
                    ]
                    );
                  ?>
              </div>
          </div>

          </div>   

          <?php echo $form->errorSummary($model); ?>

       

        <?php ActiveForm::end(); ?>
       
        
    
</div> 