<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Setting $model
*/

$this->title = Yii::t('models', 'Setting');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Setting'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud setting-update">

    <h1>
        <?= Html::encode($this->title) ?>
        <small><?= Yii::t('models', 'Update') ?></small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
