<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\TagCategory $model
*/

$this->title = Yii::t('models', 'Tag Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Tag Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud tag-category-create">

    <h1>
                <?= Html::encode($model->id) ?>
        <small>
            <?= Yii::t('models', 'Tag Category') ?>
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
