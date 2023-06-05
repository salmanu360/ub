<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Setting $model
*/

$this->title = Yii::t('models', 'Setting');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud setting-create">

    <h1>
                <?= Html::encode($model->title) ?>
        <small>
            <?= Yii::t('models', 'Setting') ?>
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
