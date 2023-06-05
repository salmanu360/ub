<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\StateSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="state-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

<div class="row">
            <div class="col-sm-4">
                <?= $form->field($model, 'country_id') ?>
            </div>   
            <div class="col-sm-4">
                <?= $form->field($model, 'name') ?>
            </div> 
            <div class="col-sm-4">
                                <label class="control-label hidden-xs">&nbsp;</label> <!-- to fix alignment -->
                        <div class="form-group">
                        <?= Html::submitButton('<i class="fa fa-filter" aria-hidden="true"></i> '.Yii::t('app', 'Filter'),  ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Reset'),['/country/index'], ['class' => 'btn btn-default btn-flat']) ?>
                            <?= Html::a('<i class="fa fa-plus margin-r-5"></i> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
            </div> 
</div>               
    <?php ActiveForm::end(); ?>

</div>
