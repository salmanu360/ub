<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
/**
* @var yii\web\View $this
* @var common\models\School $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="school-form">

    <?php $form = ActiveForm::begin([
    'id' => 'School',
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
            <?php echo $form->field($model, 'dest_country')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(common\models\Country::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select Country ...','id'=>'college_id_pass','data-url'=>Url::to(['course/getstate'])],
                    'pluginOptions' => [
                    'tags' => true,
                //  'tokenSeparators' => [',', ' '],        
                    ],
                    ]);?>
                    
            <?php 
                    if($model->isNewRecord ==1){
                    echo $form->field($model, 'province')->widget(Select2::classname(), [
                    //'data' => \yii\helpers\ArrayHelper::map(common\models\State::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select Province ...','id'=>'getprovince'],
                    'pluginOptions' => [
                    'tags' => true,
                //  'tokenSeparators' => [',', ' '],        
                    ],
                    ]);
                    }else{
                        echo $form->field($model, 'province')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(common\models\State::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select Province ...','id'=>'getprovince'],
                    'pluginOptions' => [
                    'tags' => true,
                //  'tokenSeparators' => [',', ' '],        
                    ],
                    ]);
                    }
                    
                    ?>

			<?= $form->field($model, 'cont_fname')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'cont_last_name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'cont_email')->textInput(['type' => 'email']) ?>

			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'cont_title')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'campus')->textInput(['maxlength' => true]) ?>
			
			<?= $form->field($model, 'ref_no')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'comission')->textInput(['maxlength' => true]) ?>
			
			<?= $form->field($model, 'min_price')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'max_price')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'avg_price')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'avg_price')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'intake')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'entry_requirment')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'level_of_education')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'accomodation_fee')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'cash_deposit')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'los_deposit')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'minimum_deposit')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'visa_fee')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'servis_fee')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'agree')->hiddenInput(['value' => '1'])->label(false) ?>

			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

			<?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'School'),
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
<?php
    $this->registerJs(
    '$("document").ready(function(){
        $(document).on("change", "#college_id_pass", function(){
                    var id = $(this).val();
                    var url=$(this).data("url");
                        $.ajax({
                            type: "POST",
                             
                            url: url,
                            data: {
                                id: id,
                            },
                            success: function(data){
                                $("#getprovince").html(data);
                            }
                        });
                });
            });
        '
    );
  ?>
