<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ChatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$UserArray = ArrayHelper::map(\common\models\User::find()->all(),'ID',function($model){return $model->username .' ('.$model->email.')';});

$this->title = 'Chats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-index">

    <h1><?= Html::encode($this->title) ?></h1>

        <!-- <?= Html::a('Create Chat', ['create'], ['class' => 'btn btn-success']) ?> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'chatid',
            // 'to_user_id',
            // 'from_user_id',
            [
                'format' => 'html',
                'attribute' => 'from_user_id',
                //'filter'=>Html::activeDropDownList ($searchModel,'from_user_id',$UserArray,['prompt' => 'Select '.Yii::t('app','User'),'class' => 'form-control']),
                'value' => function($model){
                    $users=\common\models\User::findOne($model->to_user_id);
                    $chat=\common\models\Chat::find()->where(['to_user_id'=>$model->to_user_id])->one();
                    $countchat=yii::$app->db->createCommand("select * from chat where from_user_id=".$chat->from_user_id." and to_user_id=".$model->to_user_id." OR from_user_id=".$model->to_user_id." and to_user_id=".$chat->from_user_id)
                    ->queryAll();
                       if($users){
                        return $users->username .' ('.$users->email.') <span style="color: #000000;
                        background: yellow;
                        border: 1px solid;
                        padding: 5px;">'.count($countchat).'</span>';
                       }else{
                        return "N/A";
                       }
                }
            ],
            // 'message',
            // 'status',
            // 'timestamp',
            [
                'header'=>'Actions',
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' =>['style' => 'width:140px'],
                'template' => "{delete} ",
                'buttons' => [
                'delete' => function ($url, $model,$key) {
                    $chat=\common\models\Chat::find()->where(['to_user_id'=>$model->to_user_id])->one();
                    $urlto=Url::to(['chat/showchat','to'=>$model->to_user_id,'from'=>$chat->from_user_id]);
                    return Html::a('<span class="fa fa-eye" title="view chat"></span>', $urlto, [
                                'title' => Yii::t('app', 'Delete'),
                    ]);
                }
            ],
            ],
            /* [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'chatid' => $model->chatid]);
                 }
            ], */
        ],
    ]); ?>