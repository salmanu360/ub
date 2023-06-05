<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
$this->title = Yii::t('models', 'Course');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud course-index">

    <?php
//             echo $this->render('_search', ['model' =>$searchModel]);
        ?>

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">
        <div class="row">
        <div class="col-md-12">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><i class="fa fa-check-circle" aria-hidden="true"></i></i></strong> <?= Yii::$app->session->getFlash('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <div class="dashboard-card mb-5">
        <h4 class="common-dashboard-heading mt-3">Courses</h4>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Add New Course', ['createcourse'], ['class' => 'btn btn-success']) ?>
        <div class="table-responsive mt-3">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
        'class' => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ],
                    'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'headerRowOptions' => ['class'=>'x'],
        'columns' => [

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                                        $options = [
                                            'title' => Yii::t('cruds', 'Delete'),
                                            'class' => 'icon-red-btn',
                                            'aria-label' => Yii::t('cruds', 'Delete'),
                                            'data-pjax' => '0',
                                        ];                                           
                                        return Html::a('<i class="fas fa-trash"></i>', $url, $options); 
                                    },

                    'update' => function ($url, $model, $key) {
                                        $options = [
                                            'title' => Yii::t('cruds', 'update'),
                                            'class' => 'icon-red-btn',
                                            'aria-label' => Yii::t('cruds', 'update'),
                                            'data-pjax' => '0',
                                        ];   
                                        $url2= Yii::$app->request->baseUrl.'/recruiter/student/updatecourse?id='.$key;                                        
                                        return Html::a('<i class="fas fa-edit"></i>', $url2, $options); 
                                    },

                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('cruds', 'View'),
                            'aria-label' => Yii::t('cruds', 'View'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="fa fa-eye"></span>', $url, $options);
                    }
                ],
                'urlCreator' => function($action, $model, $key, $index) {
                    // using the column name as key, not mapping to 'id' like the standard generator
                    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                    $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                    return Url::toRoute($params);
                },
                'contentOptions' => ['nowrap'=>'nowrap']
            ],

            [
                'attribute' => 'college_id',
                'value' => function ($model) {
			        if ($rel = $model->college) {
			            return $rel->name;
			        } else {
			            return '';
			        }
			    },
                'format' => 'raw',
            ],
			'name',
			'comment:ntext',
			'discount',
			'status',
			'tution_fee',
			'application_fee',
			/*'tags:ntext',*/
                ]
        ]); ?>
    </div>

</div>
    </div>
    </div>
    </div>
<?php \yii\widgets\Pjax::end() ?>
</main>

