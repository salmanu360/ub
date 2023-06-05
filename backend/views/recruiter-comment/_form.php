<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/** @var yii\web\View $this */
/** @var common\models\RecruiterComment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recruiter-comment-form">

    <?php $form = ActiveForm::begin(); ?>

     <?php echo $form->field($model, 'recruiter_id')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(common\models\Recruiters::find()->all(), 'id', 'owner_first_name'),
                    'options' => ['placeholder' => 'Select Recruiter ...'],
                    'pluginOptions' => [
                    'tags' => true,
                //  'tokenSeparators' => [',', ' '],        
                    ],
                    ])->label('Recruiters'); ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_by')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['value'=>date('Y-m-d')])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
