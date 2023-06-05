<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RmApplicationTeamCommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rm Application Team Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rm-application-team-comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?//= Html::a('Create Rm Application Team Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

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
                'attribute' => 'application_team_id',
                'value' => function($model){
                    $User=\common\models\User::find()->where(['type'=>$model->application_team_id])->one();
                        return $User->username;
                    
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
                'attribute' => 'created_by',
                'value' => function($model){
                    $User=\common\models\User::find()->where(['id'=>$model->created_by])->one();
                        return $User->username;
                    
                }
            ],
           [
                'attribute' => 'file',
                'format' => 'html',
                'value' => function($model){
                        $url=Url::to(['rm-application-team-comment/downloaddocument','id'=>$model->id]);
                        if(!empty($model->file)){
                        return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                        }else{
                            return 'N/A';
                        }
                    
                }
            ],
           /*  [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ], */
        ],
    ]); ?>


</div>
