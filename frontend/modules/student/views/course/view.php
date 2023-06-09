<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\Course $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Course');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'Course'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud course-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Html::encode($model->name) ?>
        <small>
            <?= Yii::t('models', 'Course') ?>
        </small>
    </h1>
<?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Back'),['/student/course/index'], ['class' => 'btn btn-danger btn-flat  btn-sm']) ?>
    <hr/>

    <?php $this->beginBlock('common\models\Course'); ?>


    
    <?php 
 echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
[
    'format' => 'html',
    'attribute' => 'college_id',
    'value' => ( "<p style='color:red'><b>".$model->college->name."</p></p>"),
],
        'name',
        'comment:ntext',
        //'discount',
      //  'status',
        'tution_fee',
        'application_fee',
        'tags:ntext',
    ],
    ]);
  ?>

    
    <hr/>

<?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Back'),['/student/course/index'], ['class' => 'btn btn-danger btn-flat  btn-sm']) ?>

    <?php $this->endBlock(); ?>


    
    <?php 
        echo Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [
 [
    'label'   => '<b class=""># '.Html::encode($model->id).'</b>',
    'content' => $this->blocks['common\models\Course'],
    'active'  => true,
],
 ]
                 ]
    );
    ?>
</div>
