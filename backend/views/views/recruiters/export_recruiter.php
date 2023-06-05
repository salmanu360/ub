<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
?>
<style>
table {
  width: 100%;
}
table, th, td {
  border: 1px solid;
}
</style>
<div class="giiant-crud recruiters-index">
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
    <?php $form = ActiveForm::begin(['action' => ['recruiters/bulkdelete'],'options' => ['id'=>'sowContractList','method' => 'post']]) ?>
    <div class="table-responsive">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
        'class' => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ],
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'headerRowOptions' => ['class'=>'x'],
        'columns' => [
        'id',
            'owner_first_name',
            'owner_last_name',
            'phone',
            'email:email',
            [
                'attribute' => 'ref_no',
                'format' => 'html',
                'value' => function ($model) {
                    return "<b><p style='color:red'>".$model->ref_no."</p></b>";
                }   
            ],
            [
                'attribute' => 'status',
                'value' => 'recruiterStatus',
                'format' => 'html',
                'filter' => common\models\Recruiters::optionStatus(),
                'content' => function($model){
                    if( $model->status == common\models\Recruiters::STATUS_RECRUITERS_NEW ){
                        $label_class = 'primary';
                    } else if( $model->status == common\models\Recruiters::STATUS_RECRUITERS_ACTIVE ){
                        $label_class = 'success'; 
                    } else if( $model->status == common\models\Recruiters::STATUS_RECRUITERS_INACTIVE ){
                        $label_class = 'danger'; 
                    } else {
                        $label_class = 'default';
                    }
                    return '<span class="label label-'.$label_class.'">'.$model->recruiterStatus.'</span>';
                }
            ],
            [
                  'attribute' => 'Date',
                  'contentOptions' => ['style' => 'width:5000%;'],
                'format' => 'html',
                'value' => function ($model) {
                    return date('d-m-Y',$model->created_at);
                }   
            ],
            
                ]
        ]); ?>
    </div>



</div>

