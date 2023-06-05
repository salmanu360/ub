 <?php
use common\models\StudentEducation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var frontend\models\StudentSearch $searchModel
*/

$this->title = Yii::t('models', 'Student');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>.help-block{color: red; font-size: 12px;}</style> 

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">

    <p>
          <?= Html::a('Add Student Education', ['create','sid'=>$_GET['sid']], ['class' => 'btn btn-success']) ?> 
          <?= Html::a('Back to Student List', ['student/index','sid'=>$_GET['sid']], ['class' => 'btn btn-warning']) ?> 
    </p>
    <div class="row">
    <div class="col-md-12">
        <div class="dashboard-card mb-5">
        
        <h4 class="common-dashboard-heading mt-3">Students Education</h4>
        <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
            <div class="table-responsive mt-3">
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
            'format' => 'html',
            'attribute' => 'country_of_education',
            'value' => function($model){
                $country=\common\models\Country::findOne($model->country_of_education);
                 if($country){
                    return $country->name;
                   }else{
                    return "N/A";
                   }
            }
        ],
            [
            'format' => 'html',
            'attribute' => 'highest_level_education',
            'value' => function($model){
                $LevelEducation=\common\models\LevelEducation::findOne($model->highest_level_education);
                if($LevelEducation){
                    return $LevelEducation->edu_name;
                   }else{
                    return "N/A";
                   }
                }
             ],

             [
            'format' => 'html',
            'attribute' => 'grading_scheme',
            'value' => function($model){
                $grading_scheme=\common\models\GradingScheme::findOne($model->grading_scheme);
                if($grading_scheme){
                    return $grading_scheme->name;
                   }else{
                    return "N/A";
                   }
                }
             ],
            'grade_scale',
            'grade_average',
            'graduated_recent_school',
            'created_at',
            'updated_at',
            //'created_by',
            //'updated_by',
            /*[
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StudentEducation $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],*/

            [
                'header'=>'Actions',
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' =>['style' => 'width:140px'],
                'template' => "{delete} {update} ",
                'buttons' => [
                'update' => function ($url, $model, $key) {
                    $url1=Url::to(['/recruiter/student-education/update','sid'=>$_GET['sid'],'id'=>$model->id]);
                                $options = [
                                    'title' => Yii::t('cruds', 'update'),
                                    'class' => 'icon-red-btn',
                                    'aria-label' => Yii::t('cruds', 'update'),
                                    'data-pjax' => '0',
                                ];                                           
                                return Html::a('<i class="fas fa-edit"></i>', $url1, $options); 
                            },

                            'delete' => function ($url, $model, $key) {
                                $url1=Url::to(['/recruiter/student-education/delete','sid'=>$_GET['sid'],'id'=>$model->id]);
                                            $options = [
                                                'title' => Yii::t('cruds', 'Delete'),
                                                'class' => 'icon-red-btn',
                                                'aria-label' => Yii::t('cruds', 'Delete'),
                                                'data-pjax' => '0',
                                            ];                                           
                                            return Html::a('<i class="fas fa-trash"></i>', $url1, $options); 
                                        },

            ],
            ],
        ],
    ]); ?>
            </div>
            <?php \yii\widgets\Pjax::end() ?>
            <!-- <div class="row">
                <div class="col-md-12">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> -->
        </div>
    </div>
    </div>
</main>