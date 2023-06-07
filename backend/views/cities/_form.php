<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\Cities $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="cities-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Cities',
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
            

<!-- attribute country_id -->
			<?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'country_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(common\models\Country::find()->all(), 'id', 'name'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['country_id'])),
    ]
); ?>

<!-- attribute state_id -->
			<?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'state_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(common\models\State::find()->all(), 'id', 'name'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['state_id'])),
    ]
); ?>

<!-- attribute name -->
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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
