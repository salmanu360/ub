<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\ModulesPermission;
use common\components\ActionPermission as ActionPermissionComponent;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\models\search\User $searchModel
*/

$this->title = Yii::t('occ', 'Users');
$this->params['breadcrumbs'][] = $this->title;

$template = ActionPermissionComponent::getModuleActionTemplate(ModulesPermission::MODULE_USERS);
$buttons = ActionPermissionComponent::getModuleButtons(ModulesPermission::MODULE_USERS);
if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('cruds', 'New'), ['create'], ['class' => 'btn btn-success']);
   // $actionColumnTemplateString = "{view} {update} {delete}";
    $actionColumnTemplateString = $template;
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud user-index box box-primary">

        <?php
             echo $this->render('_search', ['model' =>$searchModel]);
        ?>  
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
    <div class="box-header with-border">
        <div class="clearfix crud-navigation">
        <div class="pull-right">
            <?php if(isset($buttons['new'])){echo $buttons['new'];}?>
        </div>
        </div>
    </div>
    <div class="box-body  no-padding">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
        'class' => yii\widgets\LinkPager::className(),
        'firstPageLabel' => Yii::t('cruds', 'First'),
        'lastPageLabel' => Yii::t('cruds', 'Last'),
        ],
                   // 'filterModel' => $searchModel,
                //'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        //'headerRowOptions' => ['class'=>'x'],
        'columns' => [
                [
            'class' => 'yii\grid\ActionColumn',
            'template' => $actionColumnTemplateString,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('cruds', 'View'),
                        'aria-label' => Yii::t('cruds', 'View'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<i class="fa fa-eye margin-r-5"></i>', ['/user/view', 'id' =>$model->id], ['class' => 'btn btn-info btn-xs','title'=>'View']);
                },
                'update' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('cruds', 'Edit'),
                        'aria-label' => Yii::t('cruds', 'Edit'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<i class="fa fa-pencil margin-r-5"></i>', ['/user/update', 'id' =>$model->id], ['class' => 'btn btn-primary btn-xs','title'=>'Edit']);
                },
            ],
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
			'username',
			'email:email',
            'fname',
            'lname',
			[
                'attribute'=>'status',
                'value' => function ($model) {
                                return $model->pageStatus;
                            }  
            ],
        ],
        ]); ?>
    </div>

</div>

<?php \yii\widgets\Pjax::end() ?>


