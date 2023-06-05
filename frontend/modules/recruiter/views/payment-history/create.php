<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\PaymentHistory $model
*/

$this->title = Yii::t('models', 'Payment History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Payment Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud payment-history-create">

    <h1>
                <?= Html::encode($model->id) ?>
        <small>
            <?= Yii::t('models', 'Payment History') ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            'Cancel',
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
