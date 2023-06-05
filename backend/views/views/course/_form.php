<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\date\DatePicker;
/**
* @var yii\web\View $this
* @var common\models\Course $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="course-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Course',
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

        <div class="row">
            <div class="col-md-6">
            <?php echo $form->field($model, 'country_id')->widget(Select2::classname(), [
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

                    <?php echo $form->field($model, 'college_id')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(common\models\School::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select College ...'],
                    'pluginOptions' => [
                    'tags' => true,
                //  'tokenSeparators' => [',', ' '],        
                    ],
                    ]); ?>

<!-- attribute name -->
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'tution_fee')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'application_fee')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'duration')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-md-6">
            

<?php 
                    echo  $form->field($model, 'course_category')->widget(Select2::classname(), [
                        'data' => common\models\Country::getcoursename(),
                        'options' => ['placeholder' => 'Course Category'],
                        'pluginOptions' => [
                        'allowClear' => true,
                        'autocomplete' => false
                    ],
                ]);
                     ?>
                     <?php 
                        echo  $form->field($model, 'program')->widget(Select2::classname(), [
                        'data' => common\models\Country::getprogram(),
                        'options' => ['placeholder' => 'Program'],
                        'pluginOptions' => [
                        'allowClear' => true,
                        'autocomplete' => false
                    ],
                    ]);
                     ?>
            <?= $form->field($model, 'intake')->widget(DatePicker::classname(), [
                'options' => ['readonly'=>'readonly'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                'pluginOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'startView'=>'months',
                    'minViewMode'=> 'months',
                    'format' => 'yyyy-mm'
                ]
            ]);
            ?>
            <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'entry_requirement')->textarea(['rows' => 6]) ?>
            
            </div>
        </div>
            <!-- <?php //$form->field($model, 'status')->dropDownList(['1' => 'Active', '0' => 'Inactive']) ?> -->
            <?= $form->field($model, 'status')->hiddenInput(['value' => '1'])->label(false) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'Course'),
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