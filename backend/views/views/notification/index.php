<?php

use common\models\Notification;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\NotificationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Notifications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?//= Html::a('Create Notification', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'module',
                'format' => 'html',
                'content' => function($model){
                    if($model->module =='chat'){
                        return '<a style="color:green;font-weight:bold" href="'.Url::to(['chat/create','id'=>$model->receiver_id]).'">'.$model->module.'</a>';
                    }else{
                        return $model->module;
                    }
                        
                }
            ],
            [
                'attribute'=>'name',
                // 'label'=>'Module',
                'value' => function($model){
                    return $model->name;
                }
            ],
            [
                'attribute'=>'created_by',
                'value' => function($model){
                    return $model->created_by;
                }
            ],
            [
                'attribute'=>'created_at',
                // 'label'=>'Created At',
                'value' => function($model){
                    return date('d/m/Y',strtotime($model->created_at));
                }
            ],
            /* [
                'attribute'=>'created_by',
                // 'label'=>'Created By',
                'value' => function($model){
                    $user=\common\models\Users::findOne($model->created_by);
                    if(!empty($user->username)){
                        return $user->username;
                    }else{
                        return "N/A";
                    }
                }
            ], */

            [
                'header'=>'Actions',
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' =>['style' => 'width:140px'],
                'template' => "{delete} ",

            ],
            /* [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Notification $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ], */
        ],
    ]); ?>


</div>
