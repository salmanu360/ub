<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AssignRecuiterRm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Recuiter Rms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="assign-recuiter-rm-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php 
        echo Html::a('Back to Listing', ['index'], ['class' => 'btn btn-primary']); 
        Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']); 
        ?>
        <?php Html::a('Delete', ['delete', 'id' => $model->id], [
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
            [
                'format' => 'html',
                'attribute' => 'recruiter_id',
                'value' => function($model){
                    $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                       if($Recruiters){
                        return $Recruiters->owner_first_name.' '.$Recruiters->owner_last_name;
                       }else{
                        return "N/A";
                       }
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'rm_id',
                'value' => function($model){
                       $User=\common\models\User::findOne($model->rm_id);
                       if($User){
                        return $User->username.'('.$User->email.')';
                       }else{
                        return "N/A";
                       }
                }
            ],
            // 'user_id',
            'date_created',
        ],
    ]) ?>

</div>
