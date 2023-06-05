<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Users $model
* @var string $relAttributes relation fields names for disabling
*/
if(!isset($relAttributes)){
    $relAttributes = false;
}

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('cruds', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">


    <?= $this->render('_form', [
        'model' => $model,
        'relAttributes' => $relAttributes,
    ]); ?>

</div>
