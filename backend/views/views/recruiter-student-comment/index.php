<?php

use common\models\RecruiterStudentComment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\RecruiterStudentCommentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Recruiter Student Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruiter-student-comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?//= Html::a('Create Recruiter Student Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'format' => 'html',
                'attribute' => 'student_id',
                'label' => 'Student',
                'value' => function($model){
                    $student=\common\models\Student::findOne($model->student_id);
                    return $student->first_name .' '.$student->last_name;
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'recruiter_id',
                'label' => 'Recruiter',
                'value' => function($model){
                    $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                    return $Recruiters->owner_first_name;
                }
            ],
            'comment:ntext',
            'created_date',
            /* [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RecruiterStudentComment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ], */

            [
                'header'=>'Actions',
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' =>['style' => 'width:140px'],
                'template' => "{view} {delete} ",

            ],
        ],
    ]); ?>


</div>
