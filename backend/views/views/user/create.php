<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\User $model
*/

$this->title = Yii::t('cruds', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('occ', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud user-create">
    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
