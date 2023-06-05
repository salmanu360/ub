<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
$stu_id=$_GET['id'];
$Student=\common\models\Student::find()->where(['ID'=>$stu_id])->one();
?>

<div class="rm-application-team-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->hiddenInput(['value'=>$stu_id])->label(false) ?>

    <?= $form->field($model, 'recruiter_id')->hiddenInput(['value'=>$Student->recruiter_id])->label(false) ?>

    <?= $form->field($model, 'application_team_id')->hiddenInput(['value'=>6])->label(false) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_by')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>
    <?php
            $file_preview2 = (!empty($model->file))?Yii::$app->request->baseUrl.'/uploads/'.$model->file:'';
                echo $form->field($model, 'file')->widget(FileInput::classname(), [
                'options' => [
                'multiple'=>false
                ],
                'value'=>$file_preview2,
                'pluginOptions' =>[
                'showRemove' => true,
                'showUpload' => true,
                'previewFileType' => 'any',
                'initialPreview'=>[
                $file_preview2
                ],
                'initialPreviewAsData'=>true,
                'overwriteInitial'=>true,
                ]
                ]);  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
