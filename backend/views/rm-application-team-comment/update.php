<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RmApplicationTeamComment */

$this->title = 'Update Rm Application Team Comment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rm Application Team Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rm-application-team-comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
