<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var frontend\models\ForStudentApplications $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="for-student-applications-form">

    <?php $form = ActiveForm::begin([
    'id' => 'ForStudentApplications',
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

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            

<!-- attribute student_id -->
			<?= $form->field($model, 'student_id')->textInput() ?>

<!-- attribute college_id -->
			<?= $form->field($model, 'college_id')->textInput() ?>

<!-- attribute course_id -->
			<?= $form->field($model, 'course_id')->textInput() ?>

<!-- attribute application_fee_status -->
			<?= $form->field($model, 'application_fee_status')->textInput() ?>

<!-- attribute visa_fee_status -->
			<?= $form->field($model, 'visa_fee_status')->textInput() ?>

<!-- attribute payment_date -->
			<?= $form->field($model, 'payment_date')->textInput() ?>

<!-- attribute pay_status -->
			<?= $form->field($model, 'pay_status')->textInput() ?>

<!-- attribute application_fee -->
			<?= $form->field($model, 'application_fee')->textInput(['maxlength' => true]) ?>

<!-- attribute visa_fee -->
			<?= $form->field($model, 'visa_fee')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'ForStudentApplications'),
    'content' => $this->blocks['main'],
    'active'  => true,
],
                    ]
                 ]
    );
    ?>
        <hr/>

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

