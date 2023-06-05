<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Student Recruiters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-student-recruiter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Assign Student Recruiter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'format' => 'html',
                'attribute' => 'recruiter_id',
                'value' => function($model){
                    $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                       if($Recruiters){
                        return $Recruiters->owner_first_name;
                       }else{
                        return "N/A";
                       }
                }
            ],

            [
                'format' => 'html',
                'attribute' => 'student_id',
                'value' => function($model){
                    $Student=\common\models\Student::findOne($model->student_id);
                       if($Student){
                        return $Student->first_name;
                       }else{
                        return "N/A";
                       }
                }
            ],
            // 'user_id',
            'date_created',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
