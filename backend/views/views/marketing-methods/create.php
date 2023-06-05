<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\MarketingMethods $model
* @var string $relAttributes relation fields names for disabling
*/
if(!isset($relAttributes)){
    $relAttributes = false;
}

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('cruds', 'MarketingMethods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = "Marketing Methods";
?>
<div class="giiant-crud marketing-methods-create">

 

    <?= $this->render('_form', [
        'model' => $model,
        'relAttributes' => $relAttributes,
    ]); ?>

</div>
