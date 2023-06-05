<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\StudentCollegeApplied $model
*/

$this->title = Yii::t('models', 'Student College Applied');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Student College Applieds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud student-college-applied-create">

    <h1>
                <?= Html::encode($model->id) ?>
        <small>
            <?= Yii::t('models', 'Student College Applied') ?>
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
