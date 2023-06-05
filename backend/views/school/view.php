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
<div class="giiant-crud school-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Html::encode($model->id) ?>
        <small>
            <?= Yii::t('models', 'School') ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?php 
 echo Html::a(
            '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
            [ 'update', 'id' => $model->id],
            ['class' => 'btn btn-info'])
          ?>

            <?php 
 echo Html::a(
            '<span class="glyphicon glyphicon-copy"></span> ' . 'Copy',
            ['create', 'id' => $model->id, 'School'=>$copyParams],
            ['class' => 'btn btn-success'])
          ?>

            <?php 
 echo Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
            ['create'],
            ['class' => 'btn btn-success'])
          ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
            . 'Full list', ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr/>

    <?php $this->beginBlock('common\models\School'); ?>

    
    <?php 
 echo DetailView::widget([
    'model' => $model,
    'attributes' => [
      'name',
			'cont_title',
        'ref_no',
        [
          'format' => 'html',
          'attribute' => 'status',
          'value' => function($model){
              if( $model->status == 0 ){
                  return "<span style='color:green'></b>New</b></span>";
              } else if( $model->status == 1){
                  return "<span style='color:blue'><b>Enable</b></span>";
              } else{
                  return "<span style='color:red'><b>Disable</b></span>";
             }
          }
      ],
      [
        'format' => 'html',
        'attribute' => 'dest_country',
        'value' => function($model){
            $country=\common\models\Country::findOne($model->dest_country);
            return $country->name;
        }
    ],
    [
                'attribute' => 'province',
                'format' => 'html',
                'value' => function($model){
                    $country=\common\models\State::findOne($model->province);
                    if($country){
                        return $country->name;
                    }
                }
            ],
        'cont_fname',
        'cont_last_name',
        'cont_email:email',
        'cont_title',
        'comission',
        'comment:ntext',
        'phone_number',
        'min_price',
        'max_price',
        'avg_price',
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
    <?php $this->endBlock(); ?>


    
    <?php 
        echo Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [
 [
    'label'   => '<b class=""># '.Html::encode($model->id).'</b>',
    'content' => $this->blocks['common\models\School'],
    'active'  => true,
],
 ]
                 ]
    );
    ?>
</div>
