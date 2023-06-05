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
* @var frontend\models\ForPaymentHistory $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'For Payment History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'For Payment History'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud for-payment-history-view">
  <div class="row">
      <div class="col-md-12">
        <div class="dashboard-card mb-5">
          <h4 class="common-dashboard-heading mt-3"><?= Yii::t('models', 'Payemnt') . ' <b class=""># '.Html::encode($model->id).'</b>' ?></h4>
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
                  'attribute' => 'payment_date',
                  'format' => ['datetime', 'php:d.m.Y']
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