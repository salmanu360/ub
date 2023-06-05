<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use dosamigos\ckeditor\CKEditor;

/**
* @var yii\web\View $this
* @var common\models\Setting $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="setting-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Setting',
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
            
<!-- attribute title -->
<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
<!-- attribute description -->
<?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>
<!-- attribute keywords -->
<?= $form->field($model, 'keywords')->textarea(['rows' => 4]) ?>


<!-- attribute logo -->
<!-- <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?> -->

<!-- attribute analytics -->
<?= $form->field($model, 'analytics')->textarea(['rows' => 4]) ?>

<!-- attribute phone -->
<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

<!-- attribute email -->
<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'address')->widget(CKEditor::className(), [
    'options' => ['rows'=>4],
    'preset' => 'full'
]) ?>

<?= $form->field($model, 'copyright')->widget(CKEditor::className(), [
    'options' => ['rows'=>4],
    'preset' => 'basic'
]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'Setting'),
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

