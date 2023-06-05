<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var backend\models\ForStudentsSearch $searchModel
*/

$this->title = Yii::t('models', 'Report');
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
         echo $this->render('_search_report', ['model' =>$searchModel]);
    ?>
    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <h1>
        <?= Yii::t('app', 'Report') ?>
        <small>
            <?= Yii::t('app', 'List') ?>
        </small>
    </h1>
    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?php 
            if (Yii::$app->user->can('create-allstudent')) {
            Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);} ?>
            <?php if(isset($_GET['StudentSearch']['created_date']) && empty($_GET['id'])){?>
            <a href="<?php echo Url::to(['student/export','start'=>$_GET['StudentSearch']['created_date'],'end'=>$_GET['StudentSearch']['intake']])?>" class="btn btn-success">
                <i class="fa fa-download"></i> Export Excel</a>
            <?php }else if(isset($_GET['StudentSearch']['created_date']) && isset($_GET['id'])){?>
               <a href="<?php echo Url::to(['student/export','id'=>$_GET['id'],'start'=>$_GET['StudentSearch']['created_date'],'end'=>$_GET['StudentSearch']['intake']])?>" class="btn btn-success">
                   <i class="fa fa-download"></i> Export Excel</a>
            <?php }else{
                if(isset($_GET['id'])){?>
                    <a href="<?php echo Url::to(['student/export','id'=>$_GET['id']])?>" class="btn btn-success"><i class="fa fa-download"></i> Export Excel</a>
                <?php }else{?>
                    <a href="<?php echo Url::to(['student/export'])?>" class="btn btn-success"><i class="fa fa-download"></i> Export Excel</a>
                <?php }?>
            <?php }?>
        </div>

        <!-- <div class="pull-right">

                        
            <?= 
            \yii\bootstrap\ButtonDropdown::widget(
            [
            'id' => 'giiant-relations',
            'encodeLabel' => false,
            'label' => '<span class="glyphicon glyphicon-paperclip"></span> ' . 'Relations',
            'dropdown' => [
            'options' => [
            'class' => 'dropdown-menu-right'
            ],
            'encodeLabels' => false,
            'items' => [

]
            ],
            'options' => [
            'class' => 'btn-default'
            ]
            ]
            );
            ?>
        </div>
    </div> -->
    <hr />

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
                        return $model->ID;
                    }
                ],
            [
                'format' => 'html',
                'attribute' => 'first_name',
                'value' => function($model){
                    return $model->first_name.' '.$model->last_name;
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'rm_id',
                'label' => 'RM Name',
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
                'attribute' => 'country_of_interest',
                'label' => 'Country',
                'value' => function($model){
                    $country=\common\models\Country::findOne($model->country_of_interest);
                       if($country){
                        return $country->name;
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

            [
                'format' => 'html',
                'label' => 'Level',
                'value' => function($model){
                    $LevelEducation=\common\models\LevelEducation::find()->where(['country_id' => $model->country_of_education])->one();
                    if($LevelEducation){
                        return $LevelEducation->edu_name;
                    }else{
                        return 'N/A';
                    }
                        
                }
            ],

            [
                'format' => 'html',
                'attribute' => 'lead_status',
                'label' => 'Application Status',
                'value' => function($model){
                    $LeadStatuses=\common\models\LeadStatuses::findOne($model->lead_status);
                    $url=Url::to(['changelead','id'=>$model->ID]);
                       if($LeadStatuses){
                        if($LeadStatuses->name == 'New'){
                            $color="btn btn-dark";
                        }else if($LeadStatuses->name == 'In Process'){
                            $color="btn btn-primary";
                        }else if($LeadStatuses->name == 'Pending Document'){
                            $color="btn btn-warning";
                        }else if($LeadStatuses->name == 'Submitted'){
                            $color="btn btn-success";
                        }else if($LeadStatuses->name == 'Rejected'){
                            $color="btn btn-danger";
                        }else{
                            $color="btn btn-default";
                        }
                        
                            return '<a href="'.$url.'"  class="'.$color.'">'.$LeadStatuses->name.'</a>';
                       }else{
                            return '<a href="'.$url.'"  class="btn btn-dark">New</a>';
                       }
                }
            ],
            
            [
                'format' => 'html',
                'attribute' => 'created_date',
                'value' => function($model){
                        return date('d-m-Y',strtotime($model->created_date));
                }
            ],

            /*[
                'format' => 'html',
                'label' => 'Status',
                'value' => function($model){
                        return "N/A";
                }
            ],*/


                ]



        ]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>


