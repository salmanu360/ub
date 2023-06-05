<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RmRecruiterComment */

$this->title = 'Create Rm Recruiter Comment';
$this->params['breadcrumbs'][] = ['label' => 'Rm Recruiter Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rm-recruiter-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</div>
