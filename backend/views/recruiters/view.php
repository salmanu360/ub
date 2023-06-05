<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\Recruiters $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Recruiters');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'Recruiters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';



      // $country = Country::find()->where(['id'=>$model['country']])->one();

     

?>
<div class="giiant-crud recruiters-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <!--<div class="row">
        <div class="col-md-12">
        <?= Html::a('<i class="fa fa-eye margin-r-5"></i> ' . 'View Student', ['students', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>
        <?= Html::a('<i class="margin-r-5"></i> ' . 'Back', ['/recruiters'], ['class' => 'btn btn-warning pull-right']) ?>
        </div>
    </div>-->

    <?php 
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
           /*  [
                'format' => 'html',
                'attribute' => 'comp_logo',
                'value' => function($model){
                    // $baseUrl =Yii::$app->request->baseUrl;
                   $baseUrl= Yii::getAlias('@app');
                   return strstr($baseUrl, 'E:\xampp\htdocs');
                     if (strstr($baseUrl, 'local')) {
                        return 'local';
                     }else{
                        return 'live';
                     }
                    $url = Url::base(true).'/uploads/'.$model->comp_logo; 
                    if(!empty($url)){
                       return Html::img($url, ['alt' => $model->comp_logo, 'width' => '50px']);
                    }            
                }
            ], */
            
           
            'instagram_handle',
            'twitter_handle',
            'linked_url:url',
            'main_source',
            'owner_first_name',
            'owner_last_name',
            'country',
            'postal_code',
            'recut_form',
            'stu_abroad_year',
            'aver_service_fee',
            'refer_stu_univer',
            'confirmation',
            'company_name',
            'email:email',
            'street_address:ntext',
            'city',
            'phone',
            'client_service:ntext',
            'inst_rep:ntext',
            'edu_org_bl:ntext',
            'add_comment:ntext',
            'state',
            'refer_name',
            'refrence_name',
            'ref_stu_name',
            'ref_business_email:email',
            'bus_certificate',
            'website',
            'sky_id',
            'whatsapp_id',
            'facebook_page',
            'begin_rec_time',
            'cellphone',
            'rep_students',
            'ref_phone',
            'market_methods',
            'ref_website',
        ],
    ]);
  ?>
</div>