<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;
use common\models\StudentCollegeApplied;

/**
* @var yii\web\View $this
* @var common\models\StudentCollegeApplied $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Student College Applied');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'Student College Applied'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body"> 
  <div class="row">
    <div class="col-md-12">
      <div class="dashboard-card top-red-border mb-5">
        <div class="giiant-crud student-college-applied-view">
            <!-- flash message -->
            <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
                <span class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <?= \Yii::$app->session->getFlash('deleteError') ?>
                </span>
            <?php endif; ?>

            <h1 class="common-dashboard-heading mt-3"> 
                <small>
                    <?= Yii::t('models', 'View Student Application') ?>
                </small>
            </h1>

            <div class="clearfix crud-navigation">
                <!-- menu buttons -->
                <div class='pull-left'>
                  <?php 
                   /*  echo Html::a(
                    '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
                    [ 'update', 'id' => $model->id],
                    ['class' => 'btn btn-info']) */
                  ?>
                </div>
            </div>

            <?php 
              echo DetailView::widget([
              'model' => $model,
                'attributes' => [
                    'student_id',
                    [
                      'attribute' => 'student_id',
                      'label' => 'Student Name',
                      'value' => function($model){
                          $student = \common\models\Student::findOne([ 'ID' => $model->student_id]);
                          return $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
                      } 
                    ],
                    [
                      'attribute' => 'student_email',
                      'label' => 'Student Email',
                      'value' => function($model){
                          $student = \common\models\Student::findOne([ 'ID' => $model->student_id]);
                          return $student->email_id;
                      } 
                  ],
                  [
                      'attribute' => 'student_phone',
                      'label' => 'Student Phone',
                      'value' => function($model){
                          $student = \common\models\Student::findOne([ 'ID' => $model->student_id]);
                          return $student->phone_no;
                      } 
                  ],
                  [
                    'attribute' => 'first_language',
                    'label' => 'First Language',
                    'value' => function($model){
                        $student = \common\models\Student::findOne([ 'ID' => $model->student_id]);
                        return $student->first_language;
                    } 
                ],
                [
                    'attribute' => 'college_id',
                    'label' => 'School',
                    'value' => function($model){
                        $school = \common\models\School::findOne([ 'id' => $model->college_id]);
                        return $school->name;
                    } 
                ],
                [
                  'attribute' => 'course_id',
                  'label' => 'Course',
                  'value' => function($model){                                   
                      $course = \common\models\Course::findOne([ 'id' => $model->course_id]);
                      return !empty($course->name) ? $course->name : null;
                  } 
                ],
                [
                  'attribute' => 'recruiter_id',
                  'label' => 'Recruiter',
                  'value' => function($model){
                      $recruiter = \common\models\Recruiters::findOne([ 'id' => $model->recruiter_id]);
                      $fname = !empty($recruiter->owner_first_name) ? $recruiter->owner_first_name : 'Not Set';
                      $lname = !empty($recruiter->owner_last_name) ? $recruiter->owner_last_name : '';
                      return $fname . ' ' . $lname;
                  } 
                ],
                [
                  'attribute' => 'application_fee',
                  'format' => 'html', 
                  'value' => function($model){
                      if(!empty($model->application_fee)){
                          return '$'. $model->application_fee;
                      } else {
                          return '-';
                      }
                  }
              ],
              [
                  'attribute' => 'visa_fee',
                  'format' => 'html', 
                  'value' => function($model){
                      if(!empty($model->visa_fee)){
                          return '$'. $model->visa_fee;
                      } else {
                          return '-';
                      }
                  }
              ],
              [
                'attribute' => 'application_fee_status',
                'label' => 'App Fee Status',
                'value' => 'paymentStatus',
                'format' => 'html',
                'filter' => StudentCollegeApplied::optionStatus(),
                'value' => function($model){                                       
                    if( $model->application_fee_status == StudentCollegeApplied::STATUS_APP_FEE_PAID ){
                        $label_class = 'success';
                    } else if( $model->application_fee_status == StudentCollegeApplied::STATUS_APP_FEE_NOTPAID ){
                        $label_class = 'danger'; 
                    } else if( $model->application_fee_status == StudentCollegeApplied::STATUS_APP_FEE_PENDING ){
                        $label_class = 'warning text-dark"'; 
                    } else {
                        $label_class = 'secondary';
                    }
                    return '<span class="badge bg-'.$label_class.'">'.$model->paymentStatus.'</span>';
                }
            ],
            [
                'attribute' => 'visa_fee_status',
                'value' => 'statusFee',
                'format' => 'html',
                'filter' => StudentCollegeApplied::optionStatusFee(),
                'value' => function($model){                                       
                    if( $model->visa_fee_status == StudentCollegeApplied::STATUS_VISA_FEE_PAID ){
                        $label_class = 'success';
                    } else if( $model->visa_fee_status == StudentCollegeApplied::STATUS_VISA_FEE_NOTPAID ){
                        $label_class = 'secondary'; 
                    } else {
                        $label_class = 'danger';
                    }
                    return '<span class="badge bg-'.$label_class.'">'.$model->statusFee.'</span>';
                }
            ],
             //'payment_date:datetime',
              [
                  'attribute' => 'payment_date',
                  'format' => ['datetime', 'php:d.m.Y H:i:s']
              ], 
              ],
            ]);
            ?>
            
            <hr/>

            <?php 
              echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
                [
                'class' => 'btn btn-danger',
                'data-confirm' => '' . 'Are you sure to delete this item?' . '',
                'data-method' => 'post',
                ]);
              ?>                  
        </div>
      </div>
    </div>
  </div>
</main>
