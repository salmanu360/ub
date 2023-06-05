<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\RecruiterStudentComment $model */

$this->title = 'Admin Comments';
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

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <td>#</td>
                <td>Student</td>
                <td>Comment</td>
                <td>Date</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=0;
             foreach($model as $value){
                 $student=\common\models\Student::findOne($value->student_id);
                $i++;
                ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $student->first_name.' '.$student->last_name;?></td>
                <td><?php echo $value->comment;?></td>
                <td><?php echo $value->created_date;?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>

</div>
</main>
