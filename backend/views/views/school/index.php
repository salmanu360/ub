<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\models\SchoolSearch $searchModel
*/

$this->title = Yii::t('models', 'School');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    if(\Yii::$app->user->identity->type==3){
        \Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
        
        $actionColumnTemplateString = "{view} {update} {uploadimage} {approve} {disapprove} {delete}";
    }else{
        $is_action= \Yii::$app->userAccess->getAccessModule(\Yii::$app->user->identity->type,'school');
        $is_add=  \Yii::$app->userAccess->isShowAdd(\Yii::$app->user->identity->type,'school');
        if($is_add){
            \Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
        }
        $actionColumnTemplateString =  $is_action;
    }
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>

<div class="giiant-crud school-index">
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
    <?php  echo $this->render('_search', ['model' =>$searchModel]);  ?>

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <h1>
        <?= Yii::t('models.plural', 'School') ?>
        <small>
            <?= Yii::t('cruds', 'List') ?>
        </small>
    </h1>
    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Upload Excel', ['uploadexcel'], ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="pull-right">

                        
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
    </div>

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
                'view' => function ($url, $model, $key) {
        
                    return Html::a('<i class="fa fa-eye margin-r-5"></i>'." View", $url, ['class'=>'btn btn-info btn-xs','title'=>"View"]);
                },
                'update' => function ($url, $model, $key) {
               
                    return Html::a('<i class="fa fa-pencil"></i>'." Edit",['/school/update', 'id' =>$model->id], ['class'=>'btn btn-primary btn-xs','title'=>"Edit"]);
                },
                'uploadimage' => function ($url, $model, $key) {
               
                    return Html::a('<i class="fa fa-pencil"></i>'." Upload Image",['/school/updateimage', 'id' =>$model->id], ['class'=>'btn btn-primary btn-xs','title'=>"Edit"]);
                },
                'disapprove' => function ($url, $model, $key) {
            
                    return Html::a('<i class="fa fa-thumbs-down margin-r-5"></i>'." Disapprove", ['/school/disapprove', 'id' =>$model->id], ['class' => 'btn btn-danger btn-xs','title'=>"Disapprove",
                    'data' => [
                            'confirm' => 'Are you sure you want to Disapprove this?',
                            'method' => 'post',
                        ],

                    ]);
                },
                'approve' => function ($url, $model, $key) {

                    if($model->status==0 || $model->status==2){
                        return Html::a('<i class="fa fa-thumbs-up margin-r-5"></i>'." Approve", ['/school/approve', 'id' =>$model->id], ['class' => 'btn btn-success btn-xs','title'=>"Approve",
                        'data' => [
                                'confirm' => 'Are you sure you want to Approve this?',
                                'method' => 'post',
                            ],

                        ]);
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
			'id',
			// 'user_id',
			'name',
			'cont_title',
			[
                'attribute' => 'dest_country',
                'format' => 'html',
                'content' => function($model){
                    $country=\common\models\Country::findOne($model->dest_country);
                    if($country){
                        return $country->name;
                    }
                }
            ],
            [
                'attribute' => 'province',
                'format' => 'html',
                'content' => function($model){
                    $country=\common\models\State::findOne($model->province);
                    if($country){
                        return $country->name;
                    }
                }
            ],
			'cont_fname',
			'cont_last_name',
            'ref_no',
            'comission',
            [
                'attribute' => 'status',
                'format' => 'html',
                'content' => function($model){
                    if( $model->status == 0 ){
                        return "<span style='color:green'></b>New</b></span>";
                    } else if( $model->status == 1){
                        return "<span style='color:blue'><b>Enable</b></span>";
                    } else{
                        return "<span style='color:red'><b>Disable</b></span>";
                   }
                }
            ],
			/*'cont_email:email',*/
			/*'cont_title',*/
			/*'comment:ntext',*/
			/*'phone_number',*/

             // 'created_at',
            [
                  'attribute' => 'Date',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->created_at;
                    // return date('d-m-Y',$model->created_at);
                }   
            ],

                ]
        ]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>


