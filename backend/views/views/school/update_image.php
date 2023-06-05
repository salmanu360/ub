<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\School $model
*/

$this->title = Yii::t('models', 'College');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'College'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud school-update">

    <h1>
                <?= Html::encode($model->id) ?>

        <small>
            <?= Yii::t('models', 'College') ?>        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form_image_upload', [
    'model' => $model,
    ]); ?>

</div>
