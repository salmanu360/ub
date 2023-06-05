<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MoreServices */

$this->title = 'Create More Services';
$this->params['breadcrumbs'][] = ['label' => 'More Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="more-services-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
