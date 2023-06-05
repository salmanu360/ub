<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Country $model
*/

$this->title = Yii::t('models', 'Country');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud country-create">

   

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
