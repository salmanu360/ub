<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\models\UsersSearch $searchModel
*/


if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{telecmi} {view} {update} {chat} {delete}";
}
?>
<div class="users-index">

    <?php             echo $this->render('_search', ['model' =>$searchModel]);
        ?>

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <div class="card-body table-responsive">
        <?= GridView::widget([
        'layout' => '{summary}{pager}{items}{pager}',
        'dataProvider' => $dataProvider,
        'pager' => [
        'class' => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last'        ],
                  //  'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'headerRowOptions' => ['class'=>'x'],
        'columns' => [
                 [
                'attribute'=>'ID',
                'label'=>'Unique ID',
                'value'=>function($model){
                    return $model->ID;
                }

            ],
            [
                'attribute'=>'created_date',
                'value'=>function($model){
                    return date('d-m-Y H:i:s',strtotime($model->created_date));
                }

            ],
            
            'username',
			'email:email',
			
			[
                'attribute' => 'type',
                'format' => 'html',
                'content' => function($model){
                    if( $model->type == 3 ){ //superadmin
                        return "<span style='background-color: red;color: white;border-radius: 5px;padding: 5px;'></b>Super admin</b></span>";
                    } else if( $model->type == 5){
                        return "<span style='background-color: blue;color: white;border-radius: 5px;padding: 5px;'><b>RM</b></span>";
                    } else if($model->type == 4){
                        return "<span style='background-color: black;color: white;border-radius: 5px;padding: 5px;'><b>Moderate Admin</b></span>";
                   }else if($model->type == 6){
                    return "<span style='background-color: black;color: white;border-radius: 5px;padding: 5px;'><b>Application Team</b></span>";
                   }else if($model->type == 7){
                    return "<span style='background-color: black;color: white;border-radius: 5px;padding: 5px;'><b>SEO Team</b></span>";
                   }else{
                        return "<span  style='background-color: green;color: white;border-radius: 5px;padding: 5px;'><b>Not Defined</b></span>";
                   }
                }
            ],
            
            
                [
            'class' => 'yii\grid\ActionColumn',
            'template' => $actionColumnTemplateString,
            'buttons' => [
                'telecmi' => function ($url, $model, $key) {
                   // if (Yii::$app->user->can('view-recruiter')) {
                    return Html::a(''."Call", $url, ['class'=>'btn btn-danger btn-xs','title'=>"View"]);
                    //}
                },
                'view' => function ($url, $model, $key) {
        
                    return Html::a('<i class="fa fa-eye margin-r-5"></i>'." View", $url, ['class'=>'btn btn-info btn-xs','title'=>"View"]);
                },
                'update' => function ($url, $model, $key) {
               
                    return Html::a('<i class="fa fa-edit"></i>'." Edit",['/users/update', 'id' =>$model->id], ['class'=>'btn btn-primary btn-xs','title'=>"Edit"]);
                },
                'chat' => function ($url, $model, $key) {
               
                    return Html::a('<span class="glyphicon glyphicon-comment"></span>'." Chat",['/chat/create', 'id' =>$model->id], ['class'=>'btn btn-success btn-xs','title'=>"Edit"]);
                },
                'delete' => function ($url, $model, $key) {
            
                    return Html::a('<i class="fa fa-trash margin-r-5"></i>'." Delete", ['/users/delete', 'id' =>$model->id], ['class' => 'btn btn-danger btn-xs','title'=>"Delete",
                    'data' => [
                            'confirm' => 'Are you sure you want to delete this?',
                            'method' => 'post',
                        ],

                    ]);
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

        ],
        ]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>


