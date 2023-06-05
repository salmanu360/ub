<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var backend\models\ForStudentsSearch $searchModel
*/

$this->title = Yii::t('models', 'Student list');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete} "; //{applications}
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';



?>
<div class="giiant-crud for-students-index">

    <?php
        // echo $this->render('_search_report', ['model' =>$searchModel]);
    ?>
    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <h1>
        <?= Yii::t('app', 'Student List') ?>
        <small>
            <?= Yii::t('app', 'List') ?>
        </small>
    </h1>


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
                    'format' => 'html',
                    'attribute' => 'ID',
                    'label' => 'Unique ID',
                    'value' => function($model){
                        return '<a style="color:blue" href='.Url::to(['viewstudentlist','id'=>$model->ID]).'>'.$model->ID.'</a>';
                    }
                ],
            [
                'format' => 'html',
                'label' => 'Student Name',
                'value' => function($model){
                    return '<a style="color:blue" href='.Url::to(['viewstudentlist','id'=>$model->ID]).'>'.$model->first_name.' '.$model->last_name.'</a>';
                }
            ],
            'passport_no',
            [
                'format' => 'html',
                'attribute' => 'rm_id',
                'label' => 'RM',
                'value' => function($model){
                    $assign_application_team=\common\models\User::findOne($model->rm_id);
                       if($assign_application_team){
                        return $assign_application_team->username .' ('.$assign_application_team->email.')';
                       }else{
                        return "N/A";
                       }
                }
            ],
            

             [
                'format' => 'html',
                'label' => 'Intake',
                'value' => function($model){
                        return ($model->intake)?date('d-m-Y',strtotime($model->intake)):'N/A';
                }
            ],

            /* [
                'format' => 'html',
                'label' => 'University',
                'value' => function($model){
                    return 'n/a';
                }
            ],

            [
                'format' => 'html',
                'label' => 'Course',
                'value' => function($model){
                    return 'n/a';
                }
            ], */

           /*  [
                'header' => 'Actions',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{viewlist}',
                'buttons' => [
                'viewlist' => function ($url, $model) {
                 //return '<a data-toggle="modal" href="#modal-id-'.$model->ID.'" class=" tooltips" data-original-title="">Show Assign university & Courses</a>';
                },
            ],
            ], */

        ],]); ?>
    </div>

</div>

              <!--   <div class="modal fade" id="modal-id-96">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                            <p>Some text in the modal.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </di -->v>
                </div>
<?php \yii\widgets\Pjax::end() ?>
<!-- Modal -->
