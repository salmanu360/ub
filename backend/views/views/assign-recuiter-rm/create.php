<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AssignRecuiterRm */

$this->title = 'Create Assign Recuiter Rm';
$this->params['breadcrumbs'][] = ['label' => 'Assign Recuiter Rms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-recuiter-rm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
