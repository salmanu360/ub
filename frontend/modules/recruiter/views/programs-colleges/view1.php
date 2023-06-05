<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\School $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'School');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'School'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>

<main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">
    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-card mb-5">
                <h4 class="common-dashboard-heading mt-3">Programs | Colleges</h4>

                    <div class="giiant-crud school-view">

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
                            'ref_no',
                            [
                                'attribute' => 'status',
                                'format' => 'html',
                                'content' => function($model){
                                    if( $model->status == 0 ){
                                        return '<span class="badge bg-primary">New</span>';
                                    } else if( $model->status == 1){
                                        return '<span class="badge bg-success">Enable</span>';
                                    } else{
                                        return '<span class="badge bg-danger">Disable</span>';
                                   }
                                }
                            ],
                            [
                                'attribute' => 'dest_country',
                                'label' => 'Country',
                                'value' => function($model){
                                    $country_name = \common\models\Country::getCountry($model->dest_country);
                                    return $country_name;
                                }
                            ],
                            'cont_fname',
                            'cont_last_name',
                            'cont_email:email',
                            'cont_title',
                            'comment:ntext',
                            'phone_number',
                        ],
                        ]);
                      ?>
                       
                    </div>

            </div>
        </div>
    </div>
</main>