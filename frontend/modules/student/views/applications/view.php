<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;
use frontend\models\ForStudentApplications;

/**
* @var yii\web\View $this
* @var frontend\models\ForStudentApplications $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'For Student Applications');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'For Student Applications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud for-student-applications-view">
  <div class="row">
    <div class="col-md-12">
      <div class="dashboard-card mb-5">
        <h4 class="common-dashboard-heading mt-3"><?= Yii::t('models', 'Application') . ' <b class=""># '.Html::encode($model->id).'</b>' ?></h4>
        <div class="table-responsive mt-3">

          <!-- flash message -->
          <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
              <span class="alert alert-info alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <?= \Yii::$app->session->getFlash('deleteError') ?>
              </span>
          <?php endif; ?>
    
          <?php 
            echo DetailView::widget([
              'model' => $model,
              'attributes' => [
                [
                  'attribute' => 'id',
                  'label' => 'App ID' 
              ],
              'student_id',                        
              [
                  'attribute' => 'college_id',
                  'label' => 'School',
                  'value' => function($model){
                      $school = \common\models\School::findOne([ 'id' => $model->college_id]);
                      return !empty($school->name) ? $school->name : null;
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
                  'attribute' => 'application_fee_status',
                  'label' => 'App Fee Status',
                  'value' => 'paymentStatus',
                  'format' => 'html',
                  'filter' => ForStudentApplications::optionStatus(),
                  'value' => function($model){                                       
                      if( $model->application_fee_status == ForStudentApplications::STATUS_APP_FEE_PAID ){
                          $label_class = 'success';
                      } else if( $model->application_fee_status == ForStudentApplications::STATUS_APP_FEE_NOTPAID ){
                          $label_class = 'danger'; 
                      } else if( $model->application_fee_status == ForStudentApplications::STATUS_APP_FEE_PENDING ){
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
                  'filter' => ForStudentApplications::optionStatusFee(),
                  'value' => function($model){                                       
                      if( $model->visa_fee_status == ForStudentApplications::STATUS_VISA_FEE_PAID ){
                          $label_class = 'success';
                      } else if( $model->visa_fee_status == ForStudentApplications::STATUS_VISA_FEE_NOTPAID ){
                          $label_class = 'danger'; 
                      } else {
                          $label_class = 'danger';
                      }
                      return '<span class="badge bg-'.$label_class.'">'.$model->statusFee.'</span>';
                  }
              ],
              [
                  'attribute' => 'payment_date',
                  'format' => ['datetime', 'php:d.m.Y']
              ], 
              [
                  'attribute' => 'pay_status',
                  'content' => function($model){                                       
                      if( $model->pay_status == 1 ){
                          $label_class = 'success';
                          $label = 'Paid';
                      } else {
                          $label_class = 'danger';
                          $label = 'Unpaid';
                      }
                      return '<span class="badge bg-'.$label_class.'">'.$label.'</span>';
                  }
                ], 
                'application_fee',
                'visa_fee',
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
</div>
