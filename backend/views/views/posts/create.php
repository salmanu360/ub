<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Posts $model
*/

$this->title = Yii::t('models', 'Posts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud posts-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
