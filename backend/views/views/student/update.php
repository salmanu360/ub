<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var frontend\models\ForStudents $model
*/

$this->title = Yii::t('models', 'For Students');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'For Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud for-students-update">

    <h1>
                <?= Html::encode($model->id) ?>

        <small>
            <?= Yii::t('models', 'For Students') ?>        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form_update', [
    'model' => $model,
    ]); ?>

</div>
