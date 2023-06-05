<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\models\SchoolSearch $searchModel
*/

$this->title = Yii::t('models', 'School');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
	$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
	Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view}";
}
	$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">
    <div class="row">
	    <div class="col-md-12">
	        <div class="dashboard-card mb-5">
	        	<h4 class="common-dashboard-heading mt-3">Programs | Colleges</h4>
	        	<div class="giiant-crud school-index">
				    <?php
						// echo $this->render('_search', ['model' =>$searchModel]);
				    ?>
    				<?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
				    <div class="table-responsive mt-3">
				        <?= GridView::widget([
					        'dataProvider' => $dataProvider,
					        'pager' => [
						        'class' => yii\widgets\LinkPager::className(),
						        'firstPageLabel' => 'First',
						        'lastPageLabel' => 'Last',
					        ],
				         	//'filterModel' => $searchModel,
				            'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
				        	'headerRowOptions' => ['class'=>'x'],
				        	'columns' => [
				                [
				            		'class' => 'yii\grid\ActionColumn',
				            		'template' => $actionColumnTemplateString,
					            	/*'buttons' => [
					                	'view' => function ($url, $model, $key) {
					        
					                    	return Html::a('<i class="fa fa-eye margin-r-5"></i>'." View", $url, ['class'=>'btn btn-info btn-xs','title'=>"View"]);
					                	}
					            	],*/
					            	'contentOptions' => ['nowrap'=>'nowrap']
				        		],
								//'id',
								//'user_id',
								'ref_no',
								'name',				            	
								//'dest_country',
								 [
			                        'attribute' => 'dest_country',
			                        'label' => 'Country',
			                        'value' => function($model){
			                            $country_name = \common\models\Country::getCountry($model->dest_country);
			                            return $country_name;
			                        }
			                    ],
								'cont_fname',
								'cont_last_name',
								[
					                'attribute' => 'status',
					                'format' => 'html',
					                'content' => function($model){
					                    if( $model->status == 0 ){
					                        return '<span class="badge bg-primary">New</span>';
					                    } else if( $model->status == 1){
					                        return '<span class="badge bg-success">Enable</span>';
					                    } else{
					                        return '<span class="badge bg-danger">Disable</span>';
					                   }
					                }
					            ],
								/*'cont_email:email',*/
								/*'cont_title',*/
								/*'comment:ntext',*/
								/*'phone_number',*/
				            ]
				        ]); ?>
				    </div>
				</div>
			</div>
	    </div>
    </div>
</main>
<?php \yii\widgets\Pjax::end() ?>