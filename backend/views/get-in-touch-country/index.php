<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GetInTouchCountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Get In Touch Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="get-in-touch-country-index">

    <h1><?= Html::encode($this->title) ?></h1>

   <!--  <p>
        <?//= Html::a('Create Get In Touch Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'phone',
            'study_country',
            //'date_created',
            [
                'class' => ActionColumn::className(),
                'template' => "{delete}",
                /* 'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 } */
            ],
        ],
    ]); ?>


</div>
