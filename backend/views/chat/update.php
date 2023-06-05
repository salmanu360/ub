<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Chat */

$this->title = 'Update Chat: ' . $model->chatid;
$this->params['breadcrumbs'][] = ['label' => 'Chats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->chatid, 'url' => ['view', 'chatid' => $model->chatid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
