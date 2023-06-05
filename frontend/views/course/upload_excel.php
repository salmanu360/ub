<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
$this->title = Yii::t('models', 'UPload Excel');
$this->params['breadcrumbs'][] = $this->title;?>

<div class="giiant-crud course-index">
    <h1>
        <?= Yii::t('models.plural', 'Upload Course Excel') ?>
    </h1>
    <div class="clearfix crud-navigation">
    </div>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('success') ?>
    </div>
    <?php endif; ?>
    <hr />
    <?php 
    // for hs code
    $form = ActiveForm::begin([
        'action' => ['courseuploadexcel'],
        'options' => ['enctype' => 'multipart/form-data']]);
        ?>

        <div class="form-group">
            <label for="email">Upload Excel:</label>
            <input type="file" name="file[]" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        
        <?php ActiveForm::end(); ?>
    
    </div>

</div>



