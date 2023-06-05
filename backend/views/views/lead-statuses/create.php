<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LeadStatuses $model */

$this->title = 'Create Lead Statuses';
$this->params['breadcrumbs'][] = ['label' => 'Lead Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-statuses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
