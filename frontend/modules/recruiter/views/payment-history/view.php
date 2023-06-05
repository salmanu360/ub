<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\PaymentHistory $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Payment History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'Payment History'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>

<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body"> 
  <div class="row">
    <div class="col-md-12">
      <div class="dashboard-card top-red-border mb-5">
        <div class="giiant-crud payment-history-view">
          <!-- flash message -->
          <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
            <span class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <?= \Yii::$app->session->getFlash('deleteError') ?>
            </span>
          <?php endif; ?>

          <h2 class="common-dashboard-heading">
            <?= Yii::t('models', 'Payment History') ?>
          </h2>

          <div class="clearfix crud-navigation">
            <div class="pull-right">
              <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
              . 'Full list', ['index'], ['class'=>'btn btn-secondary']) ?>
            </div>
          </div>
          <hr/>
          <?php $this->beginBlock('common\models\PaymentHistory'); ?>   
          <?php 
            echo DetailView::widget([
              'model' => $model,
              'attributes' => [
                'id',
                'application_id',
                'razorpay_payment_id',
                'student_id',
                'student',
                'course_id',
                'course',
                'college_id',
                'college',
                'recruiter_id',
                'recruiter',
                [
                  'attribute' => 'amount',
                  'format' => 'html', 
                  'value' => function($model){
                      if(!empty($model->amount)){
                          return '$'. $model->amount;
                      } else {
                          return '-';
                      }
                  }
                ],
                'currency',
                'payment_date:date',
                //'status',
                'payment_method',
                ],
              ]);
            ?>          
          <?php $this->endBlock(); ?>
          <?php 
            echo Tabs::widget(
              [
                'id' => 'relation-tabs',
                'encodeLabels' => false,
                'items' => [
                  [
                    'label'   => '<b class=""> Order Id # '.Html::encode($model->id).'</b>',
                    'content' => $this->blocks['common\models\PaymentHistory'],
                    'active'  => true,
                  ],
                ]
              ]
            );
          ?>
        </div>
      </div>
    </div>
  </div>
</main>
