<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RmApplicationTeamComment */

$this->title = 'Create Rm Application Team Comment';
$this->params['breadcrumbs'][] = ['label' => 'Rm Application Team Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rm-application-team-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
