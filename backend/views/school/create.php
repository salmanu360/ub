<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\School $model
*/

$this->title = Yii::t('models', 'School');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Schools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud school-create">

    <h1>
                <?= Html::encode($model->id) ?>
        <small>
            <?= Yii::t('models', 'School') ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?= Html::a(
            'Cancel',
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
            <?= Html::a(
            'Cancel',
            \yii\helpers\Url::to(['index']),
            ['class' => 'btn btn-warning']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
