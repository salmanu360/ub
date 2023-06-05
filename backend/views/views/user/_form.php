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

<div class="user-form box box-primary">

    <?php $form = ActiveForm::begin([
    'id' => 'User',
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

    <div class="box-body ">
        

<!-- attribute username -->
			<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

<!-- attribute email -->
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!-- attribute status -->
<?= 
                            $form->field($model, 'status')->widget(ToggleButtonGroup::classname(), [
                                'type'=>'radio',
                                'items'=> common\models\User::optsstatus(),
                                'labelOptions' => ['class'=>'btn btn-default'],
                                'options'=>['class'=>'btn-group'],
                                //'value'=> $model->status,
                            ]);
                        ?>
            <?= $form->field($model, 'password')->passwordInput() ?> 
            <?= $form->field($model, 'confirm_password')->passwordInput() ?>         

           

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

