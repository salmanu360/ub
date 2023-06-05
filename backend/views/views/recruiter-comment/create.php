<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\RecruiterComment $model */

$this->title = 'Create Recruiter Comment';
$this->params['breadcrumbs'][] = ['label' => 'Recruiter Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruiter-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        // 'rid' => $rid,
    ]) ?>

</div>
