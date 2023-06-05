<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LeadStatuses $model */

$this->title = 'Update Lead Statuses: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lead Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lead-statuses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
