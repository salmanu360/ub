<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use dmstr\bootstrap\Tabs;
use common\models\StudentCollegeApplied;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\models\RecruitersSearch $searchModel
*/

$this->title = Yii::t('models', 'Recruiters');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    if(\Yii::$app->user->identity->type==3){
        \Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
        $actionColumnTemplateString = "{add-fee}";
    }else{
        $is_action= \Yii::$app->userAccess->getAccessModule(\Yii::$app->user->identity->type,'recruiters');
        $is_add=  \Yii::$app->userAccess->isShowAdd(\Yii::$app->user->identity->type,'recruiters');
        if($is_add){
            \Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
        }
        $actionColumnTemplateString =  $is_action;
    }
}

$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud recruiters-index x_panel">
    <div class="x_title">
        <h2>Students <small>Lists</small></h2>         
        <div class="clearfix"></div>
    </div>

    <?php
//             echo $this->render('_search', ['model' =>$searchModel]);
        ?>

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
 

    <div class="x_content">
        <ul class="stats-overview mb-4" style="margin-bottom: 30px;">
            <li>
                <span class="name"> Recruiter ID </span>
                <span class="value text-success"> <?=$model->id?> </span>
            </li>
            <li>
                <span class="name"> Recruiter Name </span>
                <span class="value text-success"> <?=$model->owner_first_name . ' ' . $model->owner_last_name?> </span>
            </li>
                <li class="hidden-phone">
                <span class="name"> Recruiter Email </span>
                <span class="value text-success"> <?=$model->email?> </span>
            </li>
        </ul>        
        <?php $allstudents = GridView::widget([
            'id' => 'all-students',
            'layout'=>"{pager}\n{items}\n{summary}",
            'dataProvider' => $studentDataProvider,
            'tableOptions' => ['class' => 'table table-hover'],
            'columns' => [
                [
                    'header' => 'Action',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view-docs}',
                    'buttons' => [
                       /*  'view' => function ($url, $model, $key) {
                
                            return Html::a('<i class="fa fa-eye margin-r-5"></i>', $url, ['class'=>' ','title'=>"View"]);
                        }, */
                        'view-docs' => function ($url, $model, $key) {
                            if (!empty($model->upload_document)) {
                                return Html::a('<i class="fa fa-eye"></i> View Docs',$url, [
                                    'class'=>'btn btn-dark btn-xs view-doc',
                                    'title'=>"Edit",
                                    'data-id' => $model->ID
                                ]);
                            }                            
                        },
                        
                    ],
                    'urlCreator' => function($action, $model, $key, $index) {
                        // using the column name as key, not mapping to 'id' like the standard generator
                        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                        $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                        return Url::toRoute($params);
                    },
                    'contentOptions' => ['nowrap'=>'nowrap']
                ],
                // Simple columns defined by the data contained in $dataProvider.
                // Data from the model's column will be used.
                [
                    'attribute' => 'ID',
                    'label' => 'Student ID'
                ],
                [
                    'attribute' => 'fullname',
                    'label' => 'Student Name',
                    'content' => function($model){
                        return $model->first_name . ' ' . $model->middle_name . ' ' . $model->last_name;
                    }
                ],
                'email_id',
                'phone_no',
                [
                    'attribute' => 'recruiter_id',
                    'label' => 'Recruiter',
                    'content' => function($model){
                        $recruiter = \common\models\Recruiters::findOne(['id' => $model->recruiter_id]);
                        return $recruiter->owner_first_name . ' ' . $recruiter->owner_last_name;
                    }
                ]
            ],
        ]); 
        
        
        $appliedstudents = GridView::widget([
            'dataProvider' => $ApplicationDataProvider,
            'rowOptions'=>function($model){
                if($model->pay_status == StudentCollegeApplied::STATUS_RECRUITER_PAY_DONE){
                    return ['class' => 'danger'];
                }
            },
            'layout'=>"{pager}\n{items}\n{summary}",
            'tableOptions' => ['class' => 'table'],
            'columns' => [
                [
                    'header' => 'Action',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => $actionColumnTemplateString,
                    'buttons' => [
                        'add-fee' => function ($url, $model, $key) {                
                            return \yii\bootstrap\Button::widget([
                                //'label' => '<img src="'.Yii::getAlias('@web/images/money-24-white.png').'">',
                                'label' => '<i class="fa fa-plus" aria-hidden="true"></i> Add Fee',
                                'encodeLabel' => false,
                                'options' => [
                                    'title' => "Add Application and Visa Fee",
                                    'data-target' => '#popup-window',
                                    'data-toggle' => 'modal',
                                    'class' => ' add-fee-btn btn btn-dark btn-xs',
                                    'data-app_id' => $model->id,
                                    'data-stud_id' => $model->student_id,
                                    'data-course_id' => $model->course_id,
                                    'data-application_fee' => $model->application_fee,
                                    'data-visa_fee' => $model->visa_fee,
                                    'data-commission_amount' => $model->commission_amount,
                                ]
                            ]);
                        },
                    ],
                    'urlCreator' => function($action, $model, $key, $index) {
                        // using the column name as key, not mapping to 'id' like the standard generator
                        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                        $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                        return Url::toRoute($params);
                    },
                    'contentOptions' => ['nowrap'=>'nowrap']
                ],
                [
                    'attribute' => 'id',
                    'label' => 'App ID' 
                ],
                'student_id',
                [
                    'attribute' => 'student_id',
                    'label' => 'Student Name',
                    'value' => function($model){
                        $student = \common\models\Student::findOne([ 'ID' => $model->student_id]);
                        return $student->first_name . ' ' . $student->last_name;
                    } 
                ],
                [
                    'attribute' => 'student_email',
                    'label' => 'Student Email',
                    'value' => function($model){
                        $student = \common\models\Student::findOne([ 'ID' => $model->student_id]);
                        return $student->email_id;
                    } 
                ],
                [
                    'attribute' => 'student_phone',
                    'label' => 'Student Phone',
                    'value' => function($model){
                        $student = \common\models\Student::findOne([ 'ID' => $model->student_id]);
                        return !empty($student->phone_no) ? $student->phone_no : null;
                    } 
                ],
                [
                    'attribute' => 'college_id',
                    'label' => 'School',
                    'value' => function($model){
                        $school = \common\models\School::findOne([ 'id' => $model->college_id]);
                        return !empty($school->name) ? $school->name : null;
                    } 
                ],
                [
                    'attribute' => 'course_id',
                    'label' => 'Course',
                    'value' => function($model){                                   
                        $course = \common\models\Course::findOne([ 'id' => $model->course_id]);
                        return !empty($course->name) ? $course->name : null;
                    } 
                ],
                /* [
                    'attribute' => 'recruiter_id',
                    'label' => 'Recruiter',
                    'value' => function($model){
                        $recruiter = \common\models\Recruiters::findOne([ 'id' => $model->recruiter_id]);
                        $fname = !empty($recruiter->owner_first_name) ? $recruiter->owner_first_name : 'Not Set';
                        $lname = !empty($recruiter->owner_last_name) ? $recruiter->owner_last_name : '';
                        return $fname . ' ' . $lname;
                    } 
                ], */
                [
                    'attribute' => 'application_fee_status',
                    'value' => 'paymentStatus',
                    'format' => 'html',
                    'filter' => StudentCollegeApplied::optionStatus(),
                    'value' => function($model){                                       
                        if( $model->application_fee_status == StudentCollegeApplied::STATUS_APP_FEE_PAID ){
                            $label_class = 'green';
                        } else if( $model->application_fee_status == StudentCollegeApplied::STATUS_APP_FEE_NOTPAID ){
                            $label_class = 'red'; 
                        } else if( $model->application_fee_status == StudentCollegeApplied::STATUS_APP_FEE_PENDING ){
                            $label_class = 'orange text-dark"'; 
                        } else {
                            $label_class = 'blue';
                        }
                        return '<span class="badge bg-'.$label_class.'">'.$model->paymentStatus.'</span>';
                    }
                ],
                [
                    'attribute' => 'visa_fee_status',
                    'value' => 'statusFee',
                    'format' => 'html',
                    'filter' => StudentCollegeApplied::optionStatusFee(),
                    'value' => function($model){                                       
                        if( $model->visa_fee_status == StudentCollegeApplied::STATUS_VISA_FEE_PAID ){
                            $label_class = 'green';
                        } else if( $model->visa_fee_status == StudentCollegeApplied::STATUS_VISA_FEE_NOTPAID ){
                            $label_class = 'red'; 
                        } else {
                            $label_class = 'danger';
                        }
                        return '<span class="badge bg-'.$label_class.'">'.$model->statusFee.'</span>';
                    }
                ],                
                [
                    'attribute' => 'application_fee',
                    'value' => function($model){
                        if(!empty($model->application_fee)){
                            $fee = '$'. $model->application_fee; 
                        } else {
                            $fee = '-';
                        }
                        return $fee;
                    }
                ],
                [
                    'attribute' => 'visa_fee',
                    'value' => function($model){
                        if(!empty($model->visa_fee)){
                            $fee = '$'. $model->visa_fee; 
                        } else {
                            $fee = '-';
                        }
                        return $fee;
                    }
                ],
                [
                    'attribute' => 'commission_amount',
                    'value' => function($model){
                        if(!empty($model->commission_amount)){
                            $fee = '$'. $model->commission_amount; 
                        } else {
                            $fee = '-';
                        }
                        return $fee;
                    }
                ],
                [
                    'attribute' => 'pay_status',
                    'value' => 'statusRecruiterPayment',
                    'format' => 'html',
                    'filter' => StudentCollegeApplied::optionRecruiterPayment(),
                    'value' => function($model){                                       
                        if( $model->pay_status == StudentCollegeApplied::STATUS_RECRUITER_PAY_DONE ){
                            $label_class = 'green';
                        } elseif($model->pay_status == StudentCollegeApplied::STATUS_RECRUITER_PAY_PROCESSING){
                            $label_class = 'orange';
                        } elseif($model->pay_status == StudentCollegeApplied::STATUS_RECRUITER_PAY_CANCELLED){
                            $label_class = 'red';
                        } else {
                            $label_class = 'blue';
                        }
                        return '<span class="badge bg-'.$label_class.'">'.$model->statusRecruiterPayment.'</span>';
                    }
                ],
            ],
        ]);
        
        ?>

        <?php
            $flag = false;
            foreach($ApplicationDataProvider->getModels() as $studentApplied){
               if($studentApplied->application_fee_status == StudentCollegeApplied::STATUS_APP_FEE_PAID
                    && $studentApplied->visa_fee_status == StudentCollegeApplied::STATUS_VISA_FEE_PAID
                    && $studentApplied->pay_status == StudentCollegeApplied::STATUS_RECRUITER_PAY_NEW) {
                   $flag = true;
               }
            }
            $paid_button = '';
            if($flag){
                $paid_button = '<a href="'.Url::to(['/recruiters/pay-commission', 'id' => $model->id]).'" class="btn btn-dark pull-right">Mark Paid</a>';
            }
            
            echo Tabs::widget([
                'navType' => 'nav-pills',
                'options' => ['class' => 'recruiter-studs'],
                'encodeLabels' => false,
                'items' => [
                    [
                      'label' => 'Students <span class="badge bg-secondary">'.$studentDataProvider->getTotalCount().'</span>',
                      'content' => $allstudents,
                      'active' => true
                    ],
                    [
                      'label' => 'Applications <span class="badge bg-secondary">'.$ApplicationDataProvider->getTotalCount().'</span>',
                      'content' => $paid_button.''.$appliedstudents,
                    ]
                ]
              ]);
        ?>
    </div>

</div>
<?php \yii\widgets\Pjax::end() ?>
<div id="modal-document" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" id="show_model_document">
                
            </div>
        </div>
    </div>
</div>


<?php \yii\bootstrap\Modal::begin([
    'id' => 'popup-window',
    'header' => '<h2>Add Fee for applied student</h2>',
    'class' => 'amit' 
]);?>

<?php $form = ActiveForm::begin([
    'id' => 'add-fee-form',
    'action' => ['/recruiters/save-fee'],
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-3',
                    //'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-9',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
?>
<?= $form->field($studentAppliedModel, 'app_id')->hiddenInput(['value' => ''])->label(false); ?>
<?= $form->field($studentAppliedModel, 'student_id')->hiddenInput(['value' => ''])->label(false); ?>
<?= $form->field($studentAppliedModel, 'course_id')->hiddenInput(['value' => ''])->label(false); ?>

<?= $form->field($studentAppliedModel, 'application_fee', [
    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">$</span>{input}</div>',
])->textInput(['maxlength' => true, 'value' => $studentAppliedModel->application_fee]) ?>

<?= $form->field($studentAppliedModel, 'visa_fee', [
    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">$</span>{input}</div>',
])->textInput(['maxlength' => true]) ?>

<?= $form->field($studentAppliedModel, 'commission_amount', [
    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">$</span>{input}</div>',
])->textInput(['maxlength' => true]) ?>

<?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        'Save',
        [
            'id' => 'save-' . $model->formName(),
            'class' => 'btn btn-success pull-right'
        ]
    );
?>
<?php ActiveForm::end(); ?>

<?php \yii\bootstrap\Modal::end();?>

<?php
$script = <<< JS
    $('.action-buttons').on('click', '.add-fee-btn', function(e){
        e.preventDefault();

        var appId = $(this).data("app_id");
        var studentId = $(this).data("stud_id");
        var courseId = $(this).data("course_id");
        var applicationFee = $(this).data("application_fee");
        var visaFee = $(this).data("visa_fee");
        var commissionAmount = $(this).data("commission_amount");

        $('#add-fee-form').find("#studentcollegeapplied-app_id").val(appId);
        $('#add-fee-form').find("#studentcollegeapplied-student_id").val(studentId);
        $('#add-fee-form').find("#studentcollegeapplied-course_id").val(courseId);
        $('#add-fee-form').find("#studentcollegeapplied-application_fee").val(applicationFee);
        $('#add-fee-form').find("#studentcollegeapplied-visa_fee").val(visaFee);
        $('#add-fee-form').find("#studentcollegeapplied-commission_amount").val(commissionAmount);
        
    });
    
    $(document).ready(function() {
      $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href");
        localStorage.setItem('selectedTab', id)
      });

      var selectedTab = localStorage.getItem('selectedTab');
      if (selectedTab != null) {
        $('a[data-toggle="tab"][href="' + selectedTab + '"]').tab('show');
        $('a[data-toggle="tab"][href="' + selectedTab + '"]').closest('li').addClass('active');
        $('a[data-toggle="tab"][href="' + selectedTab + '"]').closest('li').siblings().removeClass('active');
      }


      $('#all-students').on('click', '.view-doc', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        openDocumentModal(url);
      });


        function openDocumentModal(url){
            $('#modal-document').modal('show');
            $('#show_model_document').html('<i class=\"fa fa-spinner fa-spin\"></i>');

            $.ajax({
                url: url, 
                type: "POST",
                data:{
                    type:1
                },
                success: function(data){
                    $('#show_model_document').html(data);
                },
                error: function(error){
                    console.log(error.message);
                }
            });
        }
    });
JS;
$this->registerJs($script);
?>