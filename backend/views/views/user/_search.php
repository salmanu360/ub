<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\search\User $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="user-search">
        <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        ]); ?>
        <div class="row">
            <div class="col-sm-3">
                <?= $form->field($model, 'username') ?>
            </div>   
            <div class="col-sm-3">
                <?php echo $form->field($model, 'email') ?>
            </div>
            <div class="col-sm-3 ">
                <label class="control-label hidden-xs">&nbsp;</label> <!-- to fix alignment -->
				<div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-filter" aria-hidden="true"></i> '.Yii::t('aspns', 'Filter'),  ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Reset'),['/user/index'], ['class' => 'btn btn-default btn-flat']) ?>
                 </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
</div>
