<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AssignRecuiterRmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Recuiter Rms';
$this->params['breadcrumbs'][] = $this->title;
$UserArray = ArrayHelper::map(\common\models\User::find()->where(['type'=>5])->all(),'ID',function($model){return $model->username .' ('.$model->email.')';});
$recruiterArray = ArrayHelper::map(\common\models\Recruiters::find()->all(),'id',function($model){return $model->owner_first_name.' '.$model->owner_last_name;});
?>
<div class="assign-recuiter-rm-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Assign Recuiter Rm', ['create'], ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Url::to(['assign-recuiter-rm/export'])?>" class="btn btn-primary"><i class="fa fa-download"></i> Export Excel</a>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'format' => 'html',
                'label'=>'Unique ID',
                'attribute' => 'recruiter_id',
                'value' => function($model){
                 return $model->recruiter_id;      
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'recruiter_id',
                'filter'=>Html::activeDropDownList ($searchModel,'recruiter_id',$recruiterArray,['prompt' => 'Select '.Yii::t('app','Recruiter'),'class' => 'form-control']),
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
                'label' => 'Recruiter Email',
                'value' => function($model){
                    $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                       if($Recruiters){
                        return $Recruiters->email;
                       }else{
                        return "N/A";
                       }
                }
            ],
            [
                'format' => 'html',
                'label' => 'Recruiter Phone',
                'value' => function($model){
                    $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                       if($Recruiters){
                        return $Recruiters->phone;
                       }else{
                        return "N/A";
                       }
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'rm_id',
                'filter'=>Html::activeDropDownList ($searchModel,'rm_id',$UserArray,['prompt' => 'Select '.Yii::t('app','RM'),'class' => 'form-control']),
                'value' => function($model){
                       $User=\common\models\User::findOne($model->rm_id);
                       if($User){
                        return $User->username.'('.$User->email.')';
                       }else{
                        return "N/A";
                       }
                }
            ],
            [
                'format' => 'html',
                'label' => 'Date',
                'value' => function($model){
                       return date('d-M-Y H:i:s',strtotime($model->date_created));
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
