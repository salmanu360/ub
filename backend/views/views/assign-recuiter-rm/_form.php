<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\AssignRecuiterRm */
/* @var $form yii\widgets\ActiveForm */
?>
<?php if(isset($_GET['exist'])){?>
    <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         This recruiter already assigned
    </div>
    <?php }?>
<div class="assign-recuiter-rm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $Recruiters = ArrayHelper::map(\common\models\Recruiters::find()->all(), 'id',function($model){return $model->owner_first_name." ".$model->owner_last_name ;});
        echo $form->field($model, 'recruiter_id')->widget(Select2::classname(), [
            'data' => $Recruiters,
            'options' => ['placeholder' => 'Select Recruiter ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?> 

    <?php 
        $rm_id = ArrayHelper::map(\common\models\Users::find()->where(['type'=>5])->all(), 'id',function($model){return $model->username."(".$model->email.")";});
        echo $form->field($model, 'rm_id')->widget(Select2::classname(), [
            'data' => $rm_id,
            'options' => ['placeholder' => 'Select RM ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?> 

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
