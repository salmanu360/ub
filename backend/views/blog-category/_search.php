<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\BlogCategorySearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="blog-category-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>


<div class="row">
    <div class="col-sm-6">
    <?= $form->field($model, 'name') ?>
    </div>
    <div class="col-sm-6">
    <label class="control-label hidden-xs">&nbsp;</label> <!-- to fix alignment -->
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Reset'),['/blog-category/index'], ['class' => 'btn btn-default btn-flat']) ?>
       
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
     
    </div>
    </div>
</div>
	


   

    <?php ActiveForm::end(); ?>

</div>
