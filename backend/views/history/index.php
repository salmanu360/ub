<?php

use common\models\History;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\HistorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'History';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?//= Html::a('Create History', ['create'], ['class' => 'btn btn-success']) ?>
    </p -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'module',
            'action',
            [
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
            ],
            [
                'attribute'=>'created_at',
                // 'label'=>'Created At',
                'value' => function($model){
                    return date('d/m/Y',strtotime($model->created_at));
                }
            ],
            
            [
                'header'=>'Actions',
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' =>['style' => 'width:140px'],
                'template' => "{delete} ",

            ],
        ],
    ]); ?>


</div>
