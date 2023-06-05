<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper; 
use kartik\date\DatePicker;
use kartik\select2\Select2;

/**
* @var yii\web\View $this
* @var common\models\Student $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="student-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Student',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 //'label' => 'col-sm-2',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-12',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="form-wrapper">
        <?php $this->beginBlock('main'); ?>

        <p>
            

<!-- attribute recruiter_id -->
<?php //$form->field($model, 'recruiter_id')->textInput() ?>
<strong>CONTACT INFORMATION</strong>
<!-- attribute email_id -->

<?php $unique_id='BU_'.uniqid();?>
<?php $form->field($model, 'portalId')->hiddenInput(['value' => $unique_id, 'class' => 'form-control'])->label(false); ?>
<?=$form->field($model, 'country_of_interest')->widget(Select2::classname(), [
    'data' => common\models\Country::optsCountry(),
    'options' => ['placeholder' => 'Country of Interest'],
    'pluginOptions' => [
        'allowClear' => true,
        'autocomplete' => false,
        //'multiple' => true
    ],
])->label(false) ?>

<?= $form->field($model, 'email_id')->textInput(['maxlength' => true, 'placeholder' => 'Email'])->label(false); ?>

<!-- attribute phone_no -->
<?= $form->field($model, 'phone_no')->textInput(['maxlength' => true, 'placeholder' => 'Phone Number'])->label(false); ?>
<br><br>

<strong>PERSONAL INFORMATION</strong>
<!-- attribute first_name -->
<?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'First Name'])->label(false); ?>
<?= $form->field($model, 'middle_name')->textInput(['maxlength' => true, 'placeholder' => 'Middle Name'])->label(false); ?>
<?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => 'Last Name'])->label(false); ?>
<?= $form->field($model, 'intake')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter Preferred Intake'],
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
    'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
    'pluginOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
        'format' => 'yyyy-mm-dd'
    ]
])->label(false);
?>

<!-- attribute birth_date -->
<?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
    'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]
])->label(false);?>
 
<!-- attribute country_of_citizenship -->
<?=$form->field($model, 'country_of_citizenship')->widget(Select2::classname(), [
    'data' => common\models\Country::optsCountry(),
    'options' => ['placeholder' => 'Country of Citizenship'],
    'pluginOptions' => [
        'allowClear' => true,
        'autocomplete' => false
    ],
])->label(false) ?>
<!-- attribute gender -->
<?= $form->field($model, 'gender')->inline(true)->radioList(['male'=>'Male', 'female' => 'Female'])  ?>

<?= $form->field($model, 'comment')->textArea() ?>
<br><br>

<!--<strong>LEAD MANAGEMENT</strong>
 <?=$form->field($model, 'lead_status')->widget(Select2::classname(), [
    'data' => common\models\Student::leadStatus(),
    'options' => ['placeholder' => 'Status'],
    'pluginOptions' => [
        'allowClear' => true,
        'autocomplete' => false
    ],
])->label(false) ?>

<?=$form->field($model, 'referral_source')->widget(Select2::classname(), [
    'data' => common\models\Student::referralSource(),
    'options' => ['placeholder' => 'Referral Source'],
    'pluginOptions' => [
        'allowClear' => true,
        'autocomplete' => false
    ],
])->label(false) ?>

<?=$form->field($model, 'country_of_interest')->widget(Select2::classname(), [
    'data' => common\models\Student::countryInterest(),
    'options' => ['placeholder' => 'Country of Interest'],
    'pluginOptions' => [
        'allowClear' => true,
        'autocomplete' => false,
        'multiple' => true
    ],
])->label(false) ?>

<?=$form->field($model, 'service_of_interest')->widget(Select2::classname(), [
    'data' => common\models\Student::servicesInterest(),
    'options' => ['placeholder' => 'Service of Interest'],
    'pluginOptions' => [
        'allowClear' => true,
        'autocomplete' => false,
        'multiple' => true
    ],
])->label(false) ?> -->

<!-- document upload -->

                <?= $form->field($model, 'ten_certificate[]')->fileInput(['multiple' => true, 'class' => 'form-control']); ?>
               
                <?= $form->field($model, 'twelve_certificate[]')->fileInput(['multiple' => true, 'class' => 'form-control']); ?>

                <?= $form->field($model, 'passport[]')->fileInput(['multiple' => true, 'class' => 'form-control']) ?>
                
                <?= $form->field($model, 'ielts[]')->fileInput(['multiple' => true, 'class' => 'form-control'])->label('IELTS/PTE/TOEFL'); ?>


                <?= $form->field($model, 'graduation_certificate[]')->fileInput(['multiple' => true, 'class' => 'form-control']);?>

                <?= $form->field($model, 'lor[]')->fileInput(['multiple' => true, 'class' => 'form-control'])->label('LOR'); ?>


                <?= $form->field($model, 'moi[]')->fileInput(['multiple' => true, 'class' => 'form-control'])->label('MOI'); ?>

                
                <?= $form->field($model, 'sop[]')->fileInput(['multiple' => true, 'class' => 'form-control'])->label('SOP') ?>


                <?= $form->field($model, 'diploma_certificate[]')->fileInput(['multiple' => true, 'class' => 'form-control']) ?>


                <?= $form->field($model, 'master_certificate[]')->fileInput(['multiple' => true, 'class' => 'form-control']) ?>


                <?= $form->field($model, 'updated_cv[]')->fileInput(['multiple' => true, 'class' => 'form-control']) ?>

                <?= $form->field($model, 'work_experiance[]')->fileInput(['multiple' => true, 'class' => 'form-control'])?>

               
                <?= $form->field($model, 'other_certificate[]')->fileInput(['multiple' => true, 'class' => 'form-control']) ?>
<!-- document upload end -->

<?= $form->field($model, 'consent')->checkboxList([1=>'I confirm that I have received express written consent from the student whom I am creating this profile for and I can provide proof of their consent upon request. To learn more please refer to the Personal Data Consent article.'])->label(false) ?>
       

</p>
        <?php $this->endBlock(); ?>
        
        <?=
        Tabs::widget(
            [
            'encodeLabels' => false,
            'items' => [ 
                [
                    'label'   => Yii::t('models', ''),
                    'content' => $this->blocks['main'],
                    'active'  => true,
                ],
            ]
            ]
        );
        ?>
       

        <?php echo $form->errorSummary($model); ?>

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

