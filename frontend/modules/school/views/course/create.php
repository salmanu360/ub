<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Course $model
*/

$this->title = Yii::t('models', 'Course');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud course-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
