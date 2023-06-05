<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\HighestLevelEducation $model */

$this->title = 'Create Highest Level Education';
$this->params['breadcrumbs'][] = ['label' => 'Highest Level Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="highest-level-education-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
