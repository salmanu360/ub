<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\School $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="school-form">

    <?php $form = ActiveForm::begin([
    'id' => 'School',
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
            
<!-- attribute dest_country -->
			<?= $form->field($model, 'dest_country')->textInput() ?>

<!-- attribute cont_fname -->
			<?= $form->field($model, 'cont_fname')->textInput(['maxlength' => true]) ?>

<!-- attribute cont_last_name -->
			<?= $form->field($model, 'cont_last_name')->textInput(['maxlength' => true]) ?>

<!-- attribute cont_email -->
			<?= $form->field($model, 'cont_email')->textInput(['maxlength' => true]) ?>

<!-- attribute cont_title -->
			<?= $form->field($model, 'cont_title')->textInput(['maxlength' => true]) ?>

<!-- attribute comment -->
			<?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

<!-- attribute phone_number -->
			<?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'School'),
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

