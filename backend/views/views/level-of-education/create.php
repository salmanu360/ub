<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LevelOfEducation $model */

$this->title = 'Create Level Of Education';
$this->params['breadcrumbs'][] = ['label' => 'Level Of Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-of-education-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
