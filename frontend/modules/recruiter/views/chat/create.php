<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Chat */

$this->title = 'Create Chat';
$this->params['breadcrumbs'][] = ['label' => 'Chats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">


    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</main>
