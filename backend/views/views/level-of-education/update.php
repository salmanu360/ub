<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LevelOfEducation $model */

$this->title = 'Update Level Of Education: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Level Of Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="level-of-education-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
