<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AssignUnivCourse */

$this->title = 'Create Assign Univ Course';
$this->params['breadcrumbs'][] = ['label' => 'Assign Univ Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-univ-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
