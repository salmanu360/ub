<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\RecruiterComment $model */

$this->title = 'Update Recruiter Comment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recruiter Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recruiter-comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
