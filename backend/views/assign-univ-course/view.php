<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Student;
use common\models\School;
use common\models\Course;
/* @var $this yii\web\View */
/* @var $model common\models\AssignUnivCourse */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Univ Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="assign-univ-course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
