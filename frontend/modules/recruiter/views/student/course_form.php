<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
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
                 'label' => 'col-sm-2',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-12',
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
         <?php $college_array = ArrayHelper::map(\common\models\School::find()->all(), 'id', 'name');
                echo $form->field($model, 'college_id')->widget(Select2::classname(), [
                    'data' => $college_array,
                    'options' => ['prompt' => 'Select College ...','class'=>'form-control'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'recruiter_id')->hiddenInput(['value' => Yii::$app->user->identity->recruiter->id])->label(false) ?>

			<?= $form->field($model, 'comment')->textarea(['rows' => 12]) ?>

			<?= $form->field($model, 'discount')->textInput(['type' => 'number']) ?>

			<?= $form->field($model, 'tution_fee')->textInput(['type' => 'number','maxlength' => true]) ?>

			<?= $form->field($model, 'application_fee')->textInput(['type' => 'number','maxlength' => true]) ?>

			<?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'status')->dropDownList(['1' => 'Active', '0' => 'Inactive']) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
        Tabs::widget(
                    [
                        'encodeLabels' => false,
                        'items' => [ 
                            [
        'label'   => Yii::t('models', 'Course'),
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

