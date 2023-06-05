<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var frontend\models\ForStudents $model
*/

$this->title = Yii::t('models', 'For Students');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'For Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud for-students-create">

    <h1>
                <?= Html::encode($model->ID) ?>
        <small>
            <?= Yii::t('models', 'For Students') ?>
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
