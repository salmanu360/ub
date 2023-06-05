<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use frontend\models\ForStudentApplications;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var frontend\models\ForStudentApplicationsSearch $searchModel
*/

$this->title = Yii::t('models', 'For Student Applications');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {delete}";
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud for-student-applications-index">
    <?php
        //echo $this->render('_search', ['model' =>$searchModel]);
    ?>
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>    
    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-card mb-5">
                <h4 class="common-dashboard-heading mt-3">My Applications</h4>
                <div class="table-responsive mt-3">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'pager' => [
                        'class' => yii\widgets\LinkPager::className(),
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                    ],
                    // /'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                    'headerRowOptions' => ['class'=>'x'],
                    'columns' => [
                        [
                            'header' => 'Actions',
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{delete} {view} {pay_app_fee} {pay_visa_fee}',
                            'buttons' => [
                                 
                               'view' => function ($url, $model, $key) {
                                        $options = [
                                            'title' => Yii::t('cruds', 'View'),
                                            'class' => 'icon-red-btn-1',
                                            'aria-label' => Yii::t('cruds', 'View'),
                                            'data-pjax' => '0',
                                        ];
                                        return Html::a('<i class="fa fa-eye"></i>', $url, $options);
                                    },

                        'delete' => function ($url, $model, $key) {
                                            $options = [
                                                'title' => Yii::t('cruds', 'Delete'),
                                                'class' => 'icon-red-btn-1',
                                                'aria-label' => Yii::t('cruds', 'Delete'),
                                                'data-pjax' => '0',
                                            ];                                           
                                            return Html::a('<i class="fas fa-trash"></i>', $url, $options); 
                                        },


                                'pay_app_fee' => function ($url, $model, $key) {
                                    $student = $model->getAppliedStudentDetails($model->id);
                                    $options = [
                                        'title' => Yii::t('cruds', 'Pay Application Fee'),
                                        'class' => 'pay_now icon-red-btn-1',
                                        'aria-label' => Yii::t('cruds', 'Pay Application Fee'),
                                        'data-pjax' => '0',
                                        'data-type' => 'application_fee',
                                        'data-app_id' => $model->id,
                                        'data-amount' => $model->application_fee,
                                        'data-student_id' => $model->student_id,
                                        'data-college_id' => $model->college_id,
                                        'data-student_name' => $student->first_name . ' ' . $student->last_name,
                                        'data-student_email' => Yii::$app->user->identity->email,
                                        'data-student_phone' => $student->phone_no,
                                    ];
                                    if($model->application_fee_status !== ForStudentApplications::STATUS_APP_FEE_PAID && !empty($model->application_fee) ) {
                                        return Html::a('<i class="fas fa-money-check-alt fa-lg"></i>', $url, $options);
                                    }
                                },
                                'pay_visa_fee' => function ($url, $model, $key) {
                                    $student = $model->getAppliedStudentDetails($model->id);
                                    $options = [
                                        'title' => Yii::t('cruds', 'Pay Visa Fee'),
                                        'class' => 'pay_now icon-red-btn-1',
                                        'aria-label' => Yii::t('cruds', 'Pay Visa Fee'),
                                        'data-pjax' => '0',
                                        'data-type' => 'visa_fee',
                                        'data-app_id' => $model->id,
                                        'data-amount' => $model->visa_fee,
                                        'data-student_id' => $model->student_id,
                                        'data-college_id' => $model->college_id,
                                        'data-student_name' => $student->first_name . ' ' . $student->last_name,
                                        'data-student_email' => Yii::$app->user->identity->email,
                                        'data-student_phone' => $student->phone_no,
                                    ];
                                    if($model->visa_fee_status !== ForStudentApplications::STATUS_VISA_FEE_PAID && !empty($model->visa_fee)) {
                                        return Html::a('<i class="fab fa-cc-visa fa-lg"></i>', $url, $options);
                                    }
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
                                return '<span class="badge-1 bg-'.$label_class.'">'.$model->paymentStatus.'</span>';
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
                                return '<span class="badge-1 bg-'.$label_class.'">'.$model->statusFee.'</span>';
                            }
                        ],
                        [
                            'attribute' => 'payment_date',
                            'format' => ['datetime', 'php:d.m.Y']
                        ], 
                        /* [
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
                        ]     */
                        [
                            'attribute' => 'application_fee',
                            'format' => 'html', 
                            'value' => function($model){
                                if(!empty($model->application_fee)){
                                    return '$'. $model->application_fee;
                                } else {
                                    return '-';
                                }
                            }
                        ],
                        [
                            'attribute' => 'visa_fee',
                            'format' => 'html', 
                            'value' => function($model){
                                if(!empty($model->visa_fee)){
                                    return '$'. $model->visa_fee;
                                } else {
                                    return '-';
                                }
                            }
                        ],
                        ]
                    ]); ?>
                </div>                 
            </div>
        </div>
    </div>
    <?php \yii\widgets\Pjax::end() ?>
</div>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php
$script = <<< JS
$('body').on('click', '.pay_now', function(e){
    e.preventDefault();
    
    var type = $(this).attr("data-type");
    var totalAmount = $(this).attr("data-amount");
    var application_id =  $(this).attr("data-app_id");
    var student_name =  $(this).attr("data-student_name");
    var student_email =  $(this).attr("data-student_email");
    var student_phone =  $(this).attr("data-student_phone");

    var payment_type = type.replace("_", " ");
    var payment_type = payment_type.charAt(0).toUpperCase() + payment_type.slice(1);

    var options = {
        "key": "rzp_test_UkVmyXlRNwy30V", // secret key id
        "amount": (totalAmount * 100), // 2000 paise = INR 20
        "currency": "USD",
        "name": "University Bureau",
        "description": payment_type,
        //"order_id": "order_IluGWxBm9U8zJ8",
       // "image": "https://universitybureau.com/images/logo.png",
        "handler": function (response){
            $.ajax({
                url: 'student/applications/payment-success',
                type: 'post',
                dataType: 'json',
                data: {
                    razorpay_payment_id : response.razorpay_payment_id, 
                    totalAmount : totalAmount, 
                    application_id : application_id,
                    type: type
                }, 
                success: function (result) {
                    window.location.href = 'student/applications/index';
                }
            });
        },
        "prefill": {
            "name": student_name,
            "email": student_email,
            "contact": student_phone
        },
       /*  "notes": {
            "address": "Razorpay Corporate Office"
        },
        "theme": {
            "color": "#f0393a"
        } */
    };

    var rzp1 = new Razorpay(options);

    rzp1.on('payment.failed', function (response){
        console.log(response);
        /* alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id); */
    });

    rzp1.open();
    e.preventDefault();
});    
JS;
$this->registerJs($script);
?>