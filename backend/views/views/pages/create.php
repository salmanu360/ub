<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Pages $model
*/

$this->title = Yii::t('models', 'Pages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud pages-create">

  

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
