<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\RecruiterComment $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recruiter Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recruiter-comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
        <?= Html::a('Add Comment', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'comment:ntext',
            [
                'format' => 'html',
                'attribute' => 'recruiter_id',
                'label' => 'Recruiter',
                'value' => function($model){
                    $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                    return $Recruiters->owner_first_name;
                }
            ],
            // 'created_by',
            'created_at',
        ],
    ]) ?>

</div>
