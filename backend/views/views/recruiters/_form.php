<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\widgets\FileInput;
use kartik\select2\Select2;
use yii\helpers\Url;
$mainpath = Yii::getAlias('@webroot/');
$convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
?>
<style>
    .downloadMargin{
        margin-left:99px
    }
</style>

<?php $form = ActiveForm::begin([
    'id' => 'Recruiters',
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
<div class="row">
  <div class="col-md-12">
    <?= $form->field($model, 'owner_first_name')->textInput() ?>
    <?= $form->field($model, 'owner_last_name')->textInput() ?>
    <?php echo $form->field($model, 'country')->widget(Select2::classname(), [
                         'data' => \yii\helpers\ArrayHelper::map(common\models\Country::find()->all(), 'id', 'name'),
                         'options' => ['placeholder' => 'Select Country ...'],
                         'pluginOptions' => [
                         'tags' => true,
                       //  'tokenSeparators' => [',', ' '],        
                         ],
                         ]);
                         
                    ?>
    <?= $form->field($model, 'postal_code')->textInput() ?>
			<?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>

			<?= $form->field($model, 'instagram_handle')->textInput() ?>

			<?= $form->field($model, 'twitter_handle')->textInput() ?>

			<?= $form->field($model, 'linked_url')->textInput() ?>
			<?= $form->field($model, 'main_source')->textInput() ?>



			<?= $form->field($model, 'recut_form')->textInput() ?>

			<?= $form->field($model, 'stu_abroad_year')->textInput() ?>

			<?= $form->field($model, 'aver_service_fee')->textInput() ?>

			<?= $form->field($model, 'refer_stu_univer')->textInput() ?>

			<?= $form->field($model, 'confirmation')->textInput() ?>

			<?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'street_address')->textarea(['rows' => 6]) ?>

			<?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'client_service')->textarea(['rows' => 6]) ?>

			<?= $form->field($model, 'inst_rep')->textarea(['rows' => 6]) ?>

			<?= $form->field($model, 'edu_org_bl')->textarea(['rows' => 6]) ?>

			<?= $form->field($model, 'add_comment')->textarea(['rows' => 6]) ?>

			<?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'refer_name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'refrence_name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'ref_stu_name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'ref_business_email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'sky_id')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'whatsapp_id')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'facebook_page')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'begin_rec_time')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'rep_students')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'ref_phone')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'market_methods')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'ref_website')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'ref_no')->textInput(['maxlength' => true]) ?>
            <?php
            $file_preview2 = (!empty($model->comp_logo))?Yii::$app->request->baseUrl.'/uploads/'.$model->comp_logo:'';
                echo $form->field($model, 'comp_logo')->widget(FileInput::classname(), [
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

                <?= $form->field($model, 'acceptance')->hiddenInput(['value' => '1'])->label(false) ?>

                <?php if($model->isNewRecord ==1){
                    echo $form->field($model, 'status')->dropDownList(['1' => 'Active', '0' => 'Inactive']);
                }?>

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



    </div>
</div>



<?php ActiveForm::end(); ?>