<?php
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\LeadStatuses $model */
/** @var yii\widgets\ActiveForm $form */
$leadStatus = ArrayHelper::map(\common\models\LeadStatuses::find()->all(), 'id', 'name');
?>

<div class="lead-statuses-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-md-6">
    <?=$form->field($model, 'lead_status')->widget(Select2::classname(), [
    'data' => $leadStatus,
    'options' => ['placeholder' => 'Status'],
    'pluginOptions' => [
        'allowClear' => true,
        'autocomplete' => false
    ],
    ]) ?>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
