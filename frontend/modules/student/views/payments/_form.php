<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var frontend\models\ForPaymentHistory $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="for-payment-history-form">

    <?php $form = ActiveForm::begin([
    'id' => 'ForPaymentHistory',
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
            

<!-- attribute application_id -->
			<?= $form->field($model, 'application_id')->textInput() ?>

<!-- attribute razorpay_payment_id -->
			<?= $form->field($model, 'razorpay_payment_id')->textInput(['maxlength' => true]) ?>

<!-- attribute student_id -->
			<?= $form->field($model, 'student_id')->textInput() ?>

<!-- attribute student -->
			<?= $form->field($model, 'student')->textInput(['maxlength' => true]) ?>

<!-- attribute course_id -->
			<?= $form->field($model, 'course_id')->textInput() ?>

<!-- attribute course -->
			<?= $form->field($model, 'course')->textInput(['maxlength' => true]) ?>

<!-- attribute college_id -->
			<?= $form->field($model, 'college_id')->textInput() ?>

<!-- attribute college -->
			<?= $form->field($model, 'college')->textInput(['maxlength' => true]) ?>

<!-- attribute amount -->
			<?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

<!-- attribute currency -->
			<?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

<!-- attribute payment_type -->
			<?= $form->field($model, 'payment_type')->textInput(['maxlength' => true]) ?>

<!-- attribute payment_date -->
			<?= $form->field($model, 'payment_date')->textInput() ?>

<!-- attribute status -->
			<?= $form->field($model, 'status')->textInput() ?>

<!-- attribute payment_method -->
			<?= $form->field($model, 'payment_method')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'ForPaymentHistory'),
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

