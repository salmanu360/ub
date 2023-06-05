<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\RecruiterStudentComment $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recruiter Student Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">
<div class="recruiter-student-comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back', ['/recruiter/student/index'], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
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
        ],
    ]) ?>

</div>
</main>
