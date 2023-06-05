<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RmRecruiterCommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rm Recruiter Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rm-recruiter-comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'student_id',
                'value' => function($model){
                    $Student=\common\models\Student::find()->where(['ID'=>$model->student_id])->one();
                        return $Student->first_name;
                }
            ],
            [
                'attribute' => 'recruiter_id',
                'value' => function($model){
                    $Student=\common\models\Recruiters::find()->where(['id'=>$model->recruiter_id])->one();
                        return $Student->owner_first_name;
                    
                }
            ],
            
            'comment:ntext',
            'date_created',
            [
                'attribute' => 'rm_id',
                'value' => function($model){
                    $Student=\common\models\User::find()->where(['id'=>$model->rm_id])->one();
                        return $Student->username;
                    
                }
            ],
            /* [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RmRecruiterComment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ], */
        ],
    ]); ?>


</div>
