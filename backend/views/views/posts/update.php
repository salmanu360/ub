<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Posts $model
*/

$this->title = Yii::t('models', 'Posts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud posts-update">
    
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
