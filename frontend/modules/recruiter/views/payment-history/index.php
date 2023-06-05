<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\PaymentHistory;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var frontend\models\PaymentHistorySearch $searchModel
*/

$this->title = Yii::t('models', 'Payment History');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view}";
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
/* var_dump((double) PaymentHistory::getCommision());
die(); */
?>

<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">
    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-card top-red-border mb-5">
                <h2 class="common-dashboard-heading">
                    <?= Yii::t('app', 'Commisions') ?>                        
                </h2>                 
                <div class="row">
                    <div class="col-md-4">
                        <div class="report-tiels">
                            <div class="row">
                                <div class="col">
                                    <div class="row align-items-center payment-comm">
                                        <div class="col-md-3">
                                            <a href="#" class="report-icon blue-circle"><i class="fas fa-solid fa-dollar-sign"></i></a>
                                        </div>                                    
                                        <div class="col-md-9">
                                            <div class="report-text report-content">
                                            <label class="report-progress"> 
                                                <ul class="common-list">
                                                    <li>USD <span>$<?= number_format(PaymentHistory::getCommision(), 2)?></span></li>
                                                </ul>
                                            </label>                                               
                                            <span class="report-title">United States Dollar</span>
                                            </div>
                                        </div>
                                    </div>                   
                                </div>

                                <!-- <div class="col line">
                                    <div class="row align-items-center payment-comm">
                                        <div class="col-md-2">
                                            <a href="#" class="report-icon blue-circle"><i class="fas fa-solid fa-dollar-sign"></i></a>
                                        </div>                                    
                                        <div class="col-md-10">
                                            <div class="report-text report-content">
                                            <label class="report-progress"> 
                                                <ul class="common-list">
                                                    <li>CAD <span>$0.00</span></li>
                                                </ul>
                                            </label>                                               
                                            <span class="report-title">Canadian Dollar</span>
                                            </div>
                                        </div>
                                    </div>                   
                                </div> -->

                                <!-- <div class="col line">
                                    <div class="row align-items-center payment-comm">
                                        <div class="col-md-2">
                                            <a href="#" class="report-icon blue-circle"><i class="fas fa-solid fa-pound-sign"></i></a>
                                        </div>                                    
                                        <div class="col-md-10">
                                            <div class="report-text report-content">
                                            <label class="report-progress"> 
                                                <ul class="common-list">
                                                    <li>GBP <span>£0.00</span></li>
                                                </ul>
                                            </label>                                               
                                            <span class="report-title">Pound Sterling</span>
                                            </div>
                                        </div>
                                    </div>                 
                                </div> -->

                               <!--  <div class="col line">
                                    <div class="row align-items-center payment-comm">
                                        <div class="col-md-2">
                                            <a href="#" class="report-icon blue-circle"><i class="fas fa-solid fa-dollar-sign"></i></a>
                                        </div>                                    
                                        <div class="col-md-10">
                                            <div class="report-text report-content">
                                            <label class="report-progress"> 
                                                <ul class="common-list">
                                                    <li>AUD <span>$0.00</span></li>
                                                </ul>
                                            </label>                                               
                                            <span class="report-title">Australian Dollar</span>
                                            </div>
                                        </div>
                                    </div>                   
                                </div> -->

                               <!--  <div class="col line">
                                    <div class="row align-items-center payment-comm">
                                        <div class="col-md-2">
                                            <a href="#" class="report-icon blue-circle"><i class="fas fa-solid fa-euro-sign"></i></a>
                                        </div>                                    
                                        <div class="col-md-10">
                                            <div class="report-text report-content">
                                            <label class="report-progress"> 
                                                <ul class="common-list">
                                                    <li>EUR <span>€0.00</span></li>
                                                </ul>
                                            </label>                                               
                                            <span class="report-title">Euro</span>
                                            </div>
                                        </div>
                                    </div>                   
                                </div> -->

                            </div>                               
                        </div>
                    </div>
                </div>
            </div>     
        </div>     
    </div>     
    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-card top-red-border mb-5">
                <div class="giiant-crud payment-history-index">
                    
                    <h2 class="common-dashboard-heading">
                        <?= Yii::t('models.plural', 'Payment History') ?>
                        <small>
                            <?= Yii::t('cruds', 'List') ?>
                        </small>
                        <i class="fa fa-filter" aria-hidden="true"></i>
                    </h2>
                    <div class="payment-filter" id="paymentFilter" <?php if(!empty($_GET['PaymentHistorySearch']) ) { echo 'style="display:block;"'; } else { echo 'style="display:none;"'; } ?>>
                        <?php
                            echo $this->render('_search', ['model' =>$searchModel]);
                        ?>
                    </div>
                    
                    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

                    <div class="table-responsive">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'pager' => [
                                'class' => yii\widgets\LinkPager::className(),
                                'firstPageLabel' => 'First',
                                'lastPageLabel' => 'Last',
                            ],
                            //'filterModel' => $searchModel,
                            'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                            'headerRowOptions' => ['class'=>'x'],
                            'columns' => [
                                [
                                    'header' => 'Actions',
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => $actionColumnTemplateString,
                                    'buttons' => [
                                        'view' => function ($url, $model, $key) {
                                            $options = [
                                                'title' => Yii::t('cruds', 'View Detail'),
                                                 'class' => 'icon-red-btn',
                                                'aria-label' => Yii::t('cruds', 'View Detail'),
                                                'data-pjax' => '0',
                                            ];
                                            return Html::a('<i class="fa fa-eye" aria-hidden="true"></i>', $url, $options);
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
                                'id',
                                'application_id',
                                'razorpay_payment_id',
                                //'student_id',
                                [
                                    'attribute' => 'student',
                                    'format' => 'html',
                                    'content' => function($model){                                        
                                        return Html::a($model->student, ['/recruiter/student/update', 'ID' => $model->student_id], ['class' => 'stud-link']);
                                    }
                                ],
                                //'course_id',
                                'course',
                                //'college_id',
                                'college',
                                /*'recruiter_id',*/
                                'recruiter',
                                //'amount',
                                [
                                    'attribute' => 'amount',
                                    'format' => 'html', 
                                    'value' => function($model){
                                        if(!empty($model->amount)){
                                            return '$'. ($model->amount/100);
                                        } else {
                                            return '-';
                                        }
                                    }
                                ],
                                'payment_type',
                                /*'currency',*/
                                'payment_date:date',
                                /*'status',*/
                                'payment_method',                                
                            ]
                        ]); ?>
                    </div>
                </div>
            </div>            
        </div>            
    </div>            
</main>
<?php \yii\widgets\Pjax::end() ?>

<?php
$script = <<< JS
    //$('.payment-filter').hide();
    $('.common-dashboard-heading').on('click', '.fa-filter', function(e){        
        $('.payment-filter').slideToggle('slow', 'linear');
        if(window.location.search !== ''){
            $('.payment-filter').show();
        } 
    });    
JS;
$this->registerJs($script);
?>