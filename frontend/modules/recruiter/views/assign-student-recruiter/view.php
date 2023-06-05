<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AssignStudentRecruiter */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Student Recruiters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="assign-student-recruiter-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
         //Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) 
         echo Html::a('Back to list', ['index'], ['class' => 'btn btn-primary']) 

        ?>
        <?php Html::a('Delete', ['delete', 'id' => $model->id], [
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
                    $Student=\common\models\Student::findOne($model->recruiter_id);
                       if($Student){
                        return $Student->first_name;
                       }else{
                        return "N/A";
                       }
                }
            ],
            // 'user_id',   
            'date_created',
        ],
    ]) ?>

</div>
