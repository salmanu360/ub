<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AssignStudentApplicationTeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Students to Application Teams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-student-application-team-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Assign Student Application Team', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'format' => 'html',
                'attribute' => 'student_id',
                'value' => function($model){
                       $User=\common\models\Student::findOne($model->student_id);
                       if($User){
                        return $User->first_name.''.$User->last_name;
                       }else{
                        return "N/A";
                       }
                }
            ],
            // 'application_team_id',
            
            [
                'format' => 'html',
                'attribute' => 'created_by',
                'value' => function($model){
                       $User=\common\models\User::findOne($model->created_by);
                       if($User){
                        return $User->username.'('.$User->email.')';
                       }else{
                        return "N/A";
                       }
                }
            ],
            'date_created',
            /* [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ], */
        ],
    ]); ?>


</div>
