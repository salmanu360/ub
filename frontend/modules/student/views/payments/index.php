<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var frontend\models\ForPaymentHistorySearch $searchModel
*/

$this->title = Yii::t('models', 'For Payment History');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view}";
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud for-payment-history-index">

    <?php
//             echo $this->render('_search', ['model' =>$searchModel]);
        ?>

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-card mb-5">
                <h4 class="common-dashboard-heading mt-3">Payments</h4>
                <div class="table-responsive mt-3">

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
                                'class' => 'yii\grid\ActionColumn',
                                'template' => $actionColumnTemplateString,
                                 'buttons' => [
                                    'view' => function ($url, $model, $key) {
                                        $options = [
                                            'title' => Yii::t('cruds', 'View'),
                                            'class' => 'icon-red-btn-n',
                                            'aria-label' => Yii::t('cruds', 'View'),
                                            'data-pjax' => '0',
                                        ];
                                        return Html::a('<i class="fa fa-eye"></i>', $url, $options);
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
                            'student',
                            //'course_id',
                            'course',
                            //'college_id',
                            'college',
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
                            /*'currency',*/                            
                            [
                                'attribute' => 'payment_type',
                                // 'class' => 'icon-red-btn-n',
                                'content'   => function($model){
                                    return '<span class="badge bg-dark">'.ucfirst(str_replace('_', ' ', $model->payment_type)).'</span>';
                                }
                            ],
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
</div>


<?php \yii\widgets\Pjax::end() ?>


