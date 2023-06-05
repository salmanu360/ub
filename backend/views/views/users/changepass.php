<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\widgets\Select2; // or kartik\select2\Select2
use kartik\widgets\DepDrop; // or kartik\select2\Select2
use yii\bootstrap\ToggleButtonGroup;
/**
* @var yii\web\View $this
* @var common\models\User $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="user-form">
    <h3>Change Password</h3> <hr>
    <?php $form = ActiveForm::begin([
    'id' => 'User',
    'layout' => 'horizontal',
   // 'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-3',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-9',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="box-body ">
        
            <?= $form->field($model, 'password')->passwordInput(['required'=>'required']) ?> 
            <?= $form->field($model, 'confirm_password')->passwordInput(['required'=>'required']) ?>         

    </div>
    <div class="box-footer">
        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? Yii::t('cruds', 'Create') : Yii::t('cruds', 'Save')),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success btn-flat'
        ]
        );
        ?>
        <?=         Html::a(
        Yii::t('cruds', 'Cancel'),
        \yii\helpers\Url::previous(),
        ['class' => 'btn btn-default btn-flat']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>

