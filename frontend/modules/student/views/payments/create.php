<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var frontend\models\ForPaymentHistory $model
*/

$this->title = Yii::t('models', 'For Payment History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'For Payment Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud for-payment-history-create">

    <h1>
                <?= Html::encode($model->id) ?>
        <small>
            <?= Yii::t('models', 'For Payment History') ?>
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
