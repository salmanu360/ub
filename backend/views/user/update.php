<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\User $model
*/

$this->title = Yii::t('occ', 'User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('occ', 'User'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud user-update">
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
