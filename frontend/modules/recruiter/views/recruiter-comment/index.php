<?php

use common\models\RecruiterComment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\RecruiterCommentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Recruiter Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'comment:ntext',
            // 'recruiter_id',
            // 'created_by',
            /*[
                'attribute' => 'created_by',
                'value' => function($model){
                        return "Admin";
                }
            ],*/
            'created_at',

            [
                'header'=>'Actions',
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' =>['style' => 'width:140px'],
                'template' => "{view} ",

            ],
           /* [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RecruiterComment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],*/
        ],
    ]); ?>


</main>
