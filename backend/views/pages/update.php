<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Pages $model
*/

$this->title = Yii::t('models', 'Pages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud pages-update">
    
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
