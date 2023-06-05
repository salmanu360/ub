<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use dosamigos\ckeditor\CKEditor;
use kartik\widgets\FileInput;
use kartik\select2\Select2;


/**
* @var yii\web\View $this
* @var common\models\Pages $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="pages-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Pages',
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

  

<!-- attribute author_id -->
			<?= $form->field($model, 'author_id')->textInput() ?>

<!-- attribute title -->
			<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<!-- attribute slug -->
			<?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

<!-- attribute excerpt -->
			<?= $form->field($model, 'excerpt')->textarea(['rows' => 6]) ?>

<!-- attribute body -->
		  <?= $form->field($model, 'body')->widget(CKEditor::className(), [
                              'options' => ['cols'=>50],
                              'preset' => 'basic'
                         ]) ?>

<!-- attribute meta_description -->
			<?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>

<!-- attribute meta_keywords -->
			<?= $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) ?>

<!-- attribute status -->
			<?=                         $form->field($model, 'status')->dropDownList(
                            common\models\Pages::optsstatus()
                        ); ?>
 <!-- attribute blog_search -->
			<?=                         $form->field($model, 'id')->dropDownList(
                            common\models\Pages::optsstatus()
                        ); ?>

<!-- attribute image -->
			<?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
        

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

