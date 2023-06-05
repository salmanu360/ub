<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\select2\Select2;

/**
* @var yii\web\View $this
* @var common\models\GradingScheme $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="grading-scheme-form">

    <?php $form = ActiveForm::begin([
    'id' => 'GradingScheme',
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
            <!-- attribute edu_id --> 
            <?=$form->field($model, 'edu_id')->widget(Select2::classname(), [
                'data' => common\models\LevelEducation::getLevelOfEducation(),
                'options' => ['placeholder' => 'Highest Level of Education'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'autocomplete' => false
                ],
            ])->label("Highest Level of Education") ?>

            <!-- attribute name -->
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
    [
        'encodeLabels' => false,
        'items' => [ 
            [
                'label'   => Yii::t('models', 'GradingScheme'),
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

