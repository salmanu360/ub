<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use frontend\models\ForStudentApplications;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var backend\models\StudentApplicationsSearch $searchModel
*/

$this->title = Yii::t('models', 'For Student Applications');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {add_fee}";
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud for-student-applications-index">
<?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
    <?php
        // echo $this->render('_search', ['model' =>$searchModel]);
    ?>
    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <h1>
        <?= Yii::t('app', 'Students All Applications') ?>
        <small>
            <?= Yii::t('app', 'List') ?>
        </small>
    </h1>
    <hr />
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'pager' => [
                'class' => yii\widgets\LinkPager::className(),
                'firstPageLabel' => 'First',
                'lastPageLabel' => 'Last',
            ],
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
            'headerRowOptions' => ['class'=>'x'],
            'columns' => [
                [
                'class' => 'yii\grid\ActionColumn',
                'template' => $actionColumnTemplateString,
                'buttons' => [
                    'add_fee' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('cruds', 'Add Fee'),
                            'aria-label' => Yii::t('cruds', 'Add Fee'),
                            'data-target' => '#popup-window',
                            'data-toggle' => 'modal',
                            'class' => ' add-fee-btn btn btn-dark btn-xs',
                            'data-app_id' => $model->id,
                            'data-stud_id' => $model->student_id,
                            'data-course_id' => $model->course_id,
                            'data-application_fee' => $model->application_fee,
                            'data-visa_fee' => $model->visa_fee,
                        ];
                        return Html::a('Add Fee', '', $options);
                    }
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
            [
                'attribute' => 'student_id',
                'value' => function($model){
                    $Student = \common\models\Student::findOne([ 'ID' => $model->student_id]);
                    return !empty($Student->first_name) ? $Student->first_name .' '.$Student->last_name: null;
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
            [
                'attribute' => 'application_fee_status',
                'label' => 'App Fee Status',
                'value' => 'paymentStatus',
                'format' => 'html',
                'filter' => ForStudentApplications::optionStatus(),
                'value' => function($model){                                       
                    if( $model->application_fee_status == ForStudentApplications::STATUS_APP_FEE_PAID ){
                        $label_class = 'success';
                    } else if( $model->application_fee_status == ForStudentApplications::STATUS_APP_FEE_NOTPAID ){
                        $label_class = 'danger'; 
                    } else if( $model->application_fee_status == ForStudentApplications::STATUS_APP_FEE_PENDING ){
                        $label_class = 'warning text-dark"'; 
                    } else {
                        $label_class = 'secondary';
                    }
                    return '<span class="badge bg-'.$label_class.'">'.$model->paymentStatus.'</span>';
                }
            ],
            [
                'attribute' => 'visa_fee_status',
                'value' => 'statusFee',
                'format' => 'html',
                'filter' => ForStudentApplications::optionStatusFee(),
                'value' => function($model){                                       
                    if( $model->visa_fee_status == ForStudentApplications::STATUS_VISA_FEE_PAID ){
                        $label_class = 'success';
                    } else if( $model->visa_fee_status == ForStudentApplications::STATUS_VISA_FEE_NOTPAID ){
                        $label_class = 'danger'; 
                    } else {
                        $label_class = 'danger';
                    }
                    return '<span class="badge bg-'.$label_class.'">'.$model->statusFee.'</span>';
                }
            ],
            [
                'attribute' => 'payment_date',
                'format' => ['datetime', 'php:d.m.Y']
            ], 
            [
                'attribute' => 'pay_status',
                'content' => function($model){                                       
                    if( $model->pay_status == 1 ){
                        $label_class = 'success';
                        $label = 'Paid';
                    } else {
                        $label_class = 'danger';
                        $label = 'Unpaid';
                    }
                    return '<span class="badge bg-'.$label_class.'">'.$label.'</span>';
                }
            ],
			'application_fee',
			'visa_fee',


            // 'created_at',
            [
                  'attribute' => 'Date',
                  'contentOptions' => ['style' => 'max-width:200px;'],
                'format' => 'html',
                'value' => function ($model) {
                    return date('d-m-Y',$model->created_at);
                }   
            ],


                ]
        ]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>

<?php \yii\bootstrap\Modal::begin([
    'id' => 'popup-window',
    'header' => '<h2>Add Fee for applied student</h2>',
    'class' => 'amit' 
]);?>

<?php $form = ActiveForm::begin([
    'id' => 'add-fee-form',
    'action' => ['/applications/save-fee'],
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

 

<?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        'Save',
        [
            'id' => 'save-fee',
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
        console.log(appId);
        console.log(studentId);
        console.log(courseId);
        console.log(applicationFee);
        console.log(visaFee);

        $('#add-fee-form').find("#forstudentapplications-app_id").val(appId);
        $('#add-fee-form').find("#forstudentapplications-student_id").val(studentId);
        $('#add-fee-form').find("#forstudentapplications-course_id").val(courseId);
        $('#add-fee-form').find("#forstudentapplications-application_fee").val(applicationFee);
        $('#add-fee-form').find("#forstudentapplications-visa_fee").val(visaFee);
        
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
    });
JS;
$this->registerJs($script);
?>