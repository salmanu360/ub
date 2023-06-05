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
<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">
<div class="recruiter-student-comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recruiter Student Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'student_id',
            'recruiter_id',
            'comment:ntext',
            'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RecruiterStudentComment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>
</main>
