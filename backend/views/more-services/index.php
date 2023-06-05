<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\models\MarketingMethodsSearch $searchModel
*/


if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    if(\Yii::$app->user->identity->type==3){
        Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
        $actionColumnTemplateString = "{view} {update} {delete}";
    }else{
        $is_action= \Yii::$app->userAccess->getAccessModule(\Yii::$app->user->identity->type,'marketing_method');
        $is_add=  \Yii::$app->userAccess->isShowAdd(\Yii::$app->user->identity->type,'marketing_method');
        if($is_add){
            Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
        }
        $actionColumnTemplateString =  $is_action;
    }
}
?>
<div class="giiant-crud marketing-methods-index">
<h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create More Services', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <!-- <?php  // echo $this->render('_search', ['model' =>$searchModel]); ?> -->

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>



    <div class="table-responsive">
        <?= GridView::widget([
        'layout' => '{summary}{pager}{items}{pager}',
        'dataProvider' => $dataProvider,
        'pager' => [
        'class' => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last'        ],
                    'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'headerRowOptions' => ['class'=>'x'],
        'columns' => [

                [
            'class' => 'yii\grid\ActionColumn',
            'template' => $actionColumnTemplateString,
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
			'id',
			'name',
			'link',
			'created_date',
        ],
        ]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>


