<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\select2\Select2;

/**
* @var yii\web\View $this
* @var common\models\LevelEducation $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="level-education-form">

    <?php $form = ActiveForm::begin([
        'id' => 'LevelEducation',
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
    ]); ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>
        <p>
        <!-- attribute country_id -->
        <?=$form->field($model, 'country_id')->widget(Select2::classname(), [
            'data' => common\models\Country::optsCountry(),
            'options' => ['placeholder' => 'Country...'],
            'pluginOptions' => [
                'allowClear' => true,
                'autocomplete' => false
            ],
        ])->label("Country") ?>

        <!-- attribute edu_name -->
        <?= $form->field($model, 'edu_name')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
        Tabs::widget(
        [
            'encodeLabels' => false,
            'items' => [ 
                [
                    'label'   => Yii::t('models', 'LevelEducation'),
                    'content' => $this->blocks['main'],
                    'active'  => true,
                ],
            ]
        ]);
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

