<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\State $model
*/

$this->title = Yii::t('models', 'State');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud state-create">


    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
