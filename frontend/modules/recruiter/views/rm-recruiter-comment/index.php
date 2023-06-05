<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RmRecruiterCommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'RM Comments';
$this->params['breadcrumbs'][] = $this->title;
$AssignRecuiterRm=\common\models\AssignRecuiterRm::find()->where(['recruiter_id'=>Yii::$app->user->identity->recruiter->id])->one();
// $User=\common\models\User::findOne($AssignRecuiterRm->rm_id);
?>
<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">
<div class="rm-recruiter-comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!-- <p>
        <?//= Html::a('Add Comment To RM', ['create','id'=>$AssignRecuiterRm->rm_id], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'recruiter_id',
                'value' => function($model){
                    $Student=\common\models\Recruiters::find()->where(['id'=>$model->recruiter_id])->one();
                        return $Student->owner_first_name;
                    
                }
            ],
            // 'rm_id',
            'comment:ntext',
            [
                'attribute' => 'rm_id',
                'label' => 'RM',
                'value' => function($model){
                    $Student=\common\models\User::find()->where(['id'=>$model->rm_id])->one();
                        return $Student->username;
                    
                }
            ],
            'date_created',
            /*[
                'class' => ActionColumn::className(),
                'template' => '{createcomment}',
                'buttons' => [
                    'createcomment' => function ($url, $model, $key) {
                        $url1=Url::to(['createcomment','sid'=>$model->student_id,'rm_id'=>$model->rm_id]);
                        $options = [
                            'title' => Yii::t('cruds', 'Applications'),
                            'aria-label' => Yii::t('cruds', 'Applications'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<i class="fa fa-plus"></span>', $url1, $options);
                    },
                ],
            ],*/
        ],
    ]); ?>


</div>
</main>
