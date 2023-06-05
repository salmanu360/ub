<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Student;
use common\models\School;
use common\models\Course;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AssignUnivCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Univ Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-univ-course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Assign Univ Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'student_id',
                'value'=>function($model){
                    $Student=Student::findOne($model->student_id);
                    return $Student->first_name .' '.$Student->last_name; 
                },

            ],

            [
                'attribute'=>'college_id',
                'value'=>function($model){
                    $School=School::findOne($model->college_id);
                    return $School->name; 
                },

            ],

            [
                'attribute'=>'course_id',
                'value'=>function($model){
                    $Course=School::findOne($model->course_id);
                    return $Course->name; 
                },

            ],
            [
                'attribute'=>'intake',
                'value'=>function($model){
                    $Course=School::findOne($model->course_id);
                    return date('d-m-Y',strtotime($model->intake)); 
                },

            ],
            // 'created_by',
            //'created_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
