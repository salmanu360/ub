<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use yii\helpers\Url;
/**
* @var yii\web\View $this
* @var frontend\models\CourseSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>
<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Program Filters
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">        
            <div class="course-search">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>
                <div class="form-group mb-3">
                <?= $form->field($model, 'country_id')->widget(Select2::classname(), [
                            'data' => common\models\Country::optsCountry(),
                            'options' => ['placeholder' => 'Country','id'=>'college_id_pass','data-url'=>Url::to(['programs-colleges/getstate'])],
                            'pluginOptions' => [
                            'allowClear' => true,
                            'autocomplete' => false
                        ],
                        ])->label('Country') ?>
                </div>
                
                 <div class="form-group mb-3">
                    <?= $form->field($model, 'province')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\common\models\State ::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Province','id'=>'getprovince'],
                        'pluginOptions' => [
                        'allowClear' => true,
                        'autocomplete' => false
                    ],
                    ])->label('Province') ?>
                </div>
                
                <div class="form-group mb-3">
                      <?php echo $form->field($model, 'name');?>
                     </div>
                <div class="form-group mb-3">
                    <?php 
                    echo  $form->field($model, 'course_category')->widget(Select2::classname(), [
                        'data' => common\models\Country::getcoursename(),
                        'options' => ['placeholder' => 'Course'],
                        'pluginOptions' => [
                        'allowClear' => true,
                        'autocomplete' => false
                    ],
                    ])->label('Stream Categories');
                     ?>
                     </div>
                     <div class="form-group mb-3">
                 <?php echo $form->field($model, 'duration');?>
                 </div>
                 <div class="form-group mb-3">
                    
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
                    </div>
                    
                    <div class="form-group mb-3">
                        <?= $form->field($model, 'intake')->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => 'Enter Intake'],
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
                    </div>
                    
                    

                
                
                <!-- <div class="form-group mb-3">
                    <?/*= $form->field($model, 'college_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\common\models\School ::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'College'],
                        'pluginOptions' => [
                        'allowClear' => true,
                        'autocomplete' => false
                    ],
                    ])->label('College')*/ ?>
                </div>   -->

                <div class="row">
                    <div class="col-sm-12">
                        <?= Html::submitButton('<i class="fa fa-filter" aria-hidden="true"></i> '.Yii::t('app', 'Apply Filter'),  ['class' => 'common-circle-blue-btn w-100']) ?>
                    </div>
                    <div class="col-sm-12">
                        <?= Html::a('<i class="fa fa-undo margin-r-5"></i> '.Yii::t('app', 'Reset'),['/recruiter/programs-colleges/index'], ['class' => 'common-dashboard-circle-btn w-100']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div> 
        </div>
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