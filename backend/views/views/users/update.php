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

$this->title = Yii::t('cruds', 'Users') . $model->id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => Yii::t('cruds', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="users-update">



    <?php echo $this->render('_form_update', [
        'model' => $model,
        'relAttributes' => $relAttributes,
    ]); ?>

</div>
