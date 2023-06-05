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
use kartik\widgets\FileInput;

/**
* @var yii\web\View $this
* @var common\models\Student $model
* @var yii\widgets\ActiveForm $form
*/

?>

<?php $form = ActiveForm::begin([
    'id' => 'banking-info',
    'options' => [
        'class' => 'dashboard-pills'
    ],
    'layout' => 'default',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
]);
?> 
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'bank_address')->textInput(['maxlength' => true]); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'institution_number')->textInput(['maxlength' => true]); ?>        
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'transit_number')->textInput(['maxlength' => true]); ?>       
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'account_number')->textInput(['maxlength' => true]); ?>        
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'swift_code')->textInput(['maxlength' => true]); ?>        
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'account_name')->textInput(['maxlength' => true]); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'comments')->textInput(['maxlength' => true]); ?>
        </div>
    </div>
</div>    
<?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-12 text-end">
                <div class="mb-3">
                    <?= Html::submitButton(
                        '<span class="glyphicon glyphicon-check"></span> ' .
                        ($model->isNewRecord ? 'Create' : 'Save'),
                        [
                        'id' => 'save-' . $model->formName(),
                        'class' => 'common-btn'
                        ]
                        );
                    ?>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
<?php
$script = <<< JS
     
JS;
$this->registerJs($script);
?>