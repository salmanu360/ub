<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Student;
use common\models\School;
use common\models\Course;
use common\models\AssignUnivCourse;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AssignUnivCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Univ Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-univ-course-index">
<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <label for="">Unique ID</label>
            <input type="text" name="unique_id" class="form-control">
        </div>

        <div class="col-md-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="col-md-3">
            <label for="">Student Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <input style="margin-top:22px" type="submit" value="Search" class="btn btn-success">
        <a style="margin-top:22px" class="btn btn-warning" href="<?php echo Url::to(['assign-univ-course/studentlist'])?>"> Reset</a>
    </div>
    <?php ActiveForm::end(); ?>
    <br>
    <!-- <?php //echo $this->render('_search', ['model' => $searchModel]); ?> -->
    <table class="table table-bordered">
    <thead>
    <tr>
        <td>#</td>
            <td>Unique ID</td>
            <td>Student Name</td>
            <td>Passport</td>
            <td>College</td>
            <td>Course</td>
            <td>Intake</td>
            <td>RM</td>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i=0;
        if($student_query){
        foreach($student_query as $student){
             $i++;
            $AssignUnivCourse=AssignUnivCourse::find()->where(['student_id'=>$student->ID])->all();
            ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><a style="color:blue" href="<?php echo Url::to(['assign-univ-course/viewstudentlist','id'=>$student->ID])?>"><?php echo $student['ID']?></a></td>
            <td><a style="color:blue" href="<?php echo Url::to(['assign-univ-course/viewstudentlist','id'=>$student->ID])?>"><?php echo $student['first_name'] .' '.$student['last_name'] ?></a></td>
            <td><?php echo $student['passport_no'] ?></td>
            <td>
            <?php foreach($AssignUnivCourse as $assignuniv){?>
            <?php 
            if(!empty($assignuniv['college_id'])){
                $School=School::findOne($assignuniv['college_id']);
                 echo $School['name'] .', <br>';
            }else{
                echo "N/A";
            }
            ?>
            <?php }?>  
            </td>
            <td>
            <?php foreach($AssignUnivCourse as $assignuniv){?>
            <?php 
            if(!empty($assignuniv['college_id'])){
                $course=Course::findOne($assignuniv['course_id']);
                 echo $course['name'] .', <br>';
            }else{
                echo "N/A";
            }
            ?>
            <?php }?>
            </td>

            

            <td><?php echo date('M Y',strtotime($student['intake']))?></td>
            <td><?php 
                if(!empty($student['rm_id'])){
                $assign_application_team=\common\models\User::findOne($student['rm_id']);
                
               echo $assign_application_team['username'] .' ('.$assign_application_team['email'].')';
            }else{
                echo "N/A";
            }
            ?></td>
        </tr>
        <?php }}else{?>
            <tr>
                <td colspan="4">No record found</td>
            </tr>
        <?php }?>
    </tbody>
    </table>
    <?php
     /* GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'format' => 'html',
                'attribute' => 'id',
                'label' => 'Unique ID',
                'value' => function($model){
                    return '<a style="color:blue" href='.Url::to(['viewstudentlist','id'=>$model->id]).'>'.$model->id.'</a>';
                }
            ],

            [
                'format' => 'html',
                'label' => 'Student Name',
                'value' => function($model){
                    $Student=Student::findOne($model->student_id);
                    return '<a style="color:blue" href='.Url::to(['viewstudentlist','id'=>$model->id]).'>'.$Student->first_name.' '.$Student->last_name.'</a>';
                }
            ],

            [
                'label'=>'Passport',
                'value'=>function($model){
                    $Student=Student::findOne($model->student_id);
                    return $Student->passport_no; 
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
                    return date('M Y',strtotime($model->intake)); 
                },

            ],

            [
                'format' => 'html',
                'label' => 'RM',
                'value' => function($model){
                    $Student=\common\models\Student::findOne($model->student_id);
                    $assign_application_team=\common\models\User::findOne($Student->rm_id);
                       if($assign_application_team){
                        return $assign_application_team->username .' ('.$assign_application_team->email.')';
                       }else{
                        return "N/A";
                       }
                }
            ],
        ],
    ]); */
    
    ?>


</div>
