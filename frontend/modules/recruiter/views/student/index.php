<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var frontend\models\StudentSearch $searchModel
*/

$this->title = Yii::t('models', 'Student');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{rmcomment} {view} {viewcomment} {addcomment}  {update} {education} {delete}";
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">
    <div class="row">
    <div class="col-md-12">
        <div class="dashboard-card mb-5">
        <h4 class="common-dashboard-heading mt-3">Students</h4>
        <!-- <div class="row align-items-center">
            <div class="col-md-6">
            <div class="simple-search">
                <input type="text" class="form-control" placeholder="Search with any parameter e.g. id, email, name, etc" name="">
                <a href="#"><i class="fas fa-search"></i></a>
                <?php
                    // echo $this->render('_search', ['model' =>$searchModel]);
                ?>
            </div>
            </div>
            <div class="col-md-6 text-end">
            <div class="filter-btns">
                <label class="dropdown">
                <a href="#" class="common-dashboard-red-outline-btn dropdown-toggle" id="filterdd" data-bs-toggle="dropdown" aria-expanded="false">Filters <i class="fas fa-filter"></i></a>

                <ul class="dropdown-menu" aria-labelledby="filterdd">
                    <li><a class="dropdown-item active" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
                </label>
                <a href="#" class="common-dashboard-blue-outline-btn">Reset Filters</a>
            </div>
            </div>
        </div> -->
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
                        'attribute'=>'ID',
                        'format' => 'html',
                        'value'=>function($model){
                            return '<a href="'.Url::to(['student/view','ID'=>$model->ID]).'">'.$model->ID.'</a>';
                        },
                    ],
                    'email_id:email',                     
                    [
                'format' => 'html',
                'attribute' => 'lead_status',
                'value' => function($model){
                    $LeadStatuses=\common\models\LeadStatuses::findOne($model->lead_status);
                    $url=Url::to(['changelead','id'=>$model->ID]);
                       if($LeadStatuses){
                        if($LeadStatuses->name == 'New'){
                            $color="btn btn-dark";
                        }else if($LeadStatuses->name == 'In Process'){
                            $color="btn btn-primary";
                        }else if($LeadStatuses->name == 'Pending Document'){
                            $color="btn btn-warning";
                        }else if($LeadStatuses->name == 'Submitted'){
                            $color="btn btn-success";
                        }else if($LeadStatuses->name == 'Rejected'){
                            $color="btn btn-danger";
                        }else{
                            $color="btn btn-default";
                        }
                        
                            return '<a href="javascript::voide(0)" style="color:white"  class="'.$color.'">'.$LeadStatuses->name.'</a>';
                       }else{
                            return '<a href="javascript::voide(0)" style="color:white"  class="btn btn-dark">New</a>';
                       }
                    }
                    ],
                    'first_name',
                    'last_name',
                   // 'birth_date',
                    'phone_no',
                    [
                    'format' => 'html',
                    'attribute' => 'created_date',
                    'value' => function($model){
                           if($model->created_date){
                            return date('d-m-Y',strtotime($model->created_date));
                           }else{
                            return "N/A";
                           }
                    }
                    ],


                    [
                        'format' => 'html',
                        'attribute' => 'recruiter_id',
                        'value' => function($model){
                            $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                               if($Recruiters){
                                return $Recruiters->owner_first_name .' '.$Recruiters->owner_last_name;
                               }else{
                                return "N/A";
                               }
                        }
                    ],
                    //'gender',
                    [
                        'attribute' => 'country_of_citizenship',
                        'label' => 'Nationality',
                        'value' => function($model){
                            $country_name = \common\models\Country::getCountry($model->country_of_citizenship);
                            return $country_name;
                        }
                    ],

                    [
                        'attribute' => 'recruiter_email',                        
                        'label' => 'Recruiter Partner',                        
                        'value' => function($model){
                            return $model->recruiterEmail();
                        }
                    ],
                        [
                    'class' => 'yii\grid\ActionColumn',
                    'options' => ['style' => 'min-width:500px;'],
                    'template' => $actionColumnTemplateString,
                    'buttons' => [
                        'rmcomment' => function ($url, $model, $key) {
                                            $options = [
                                                'title' => Yii::t('cruds', 'view RM comment'),
                                                'class' => 'btn btn-default btn-sm',
                                                'aria-label' => Yii::t('cruds', 'View RM Comment'),
                                                'data-pjax' => '0',
                                            ]; 
                            $query=\common\models\RmRecruiterComment::find()->where(['student_id'=>$model->ID])->one();
                             if($query){
                             $url1=Url::to(['/recruiter/rm-recruiter-comment/view','id'=>$query->id]);
                                 return Html::a('<i class="fa fa-eye-slash"></i>', $url1, $options); 
                             }               

                            // return '<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye-slash" title="View Comment"></i></button>';
                        },
                        'addcomment' => function ($url, $model, $key) {
                                            $options = [
                                                'title' => Yii::t('cruds', 'Add Comment'),
                                                'class' => 'icon-red-btn',
                                                'aria-label' => Yii::t('cruds', 'Add Comment'),
                                                'data-pjax' => '0',
                                            ];                                           
                                            return Html::a('<i class="fas fa-plus"></i>', $url, $options); 
                                        },
                        'viewcomment' => function ($url, $model, $key) {
                            
                                            $options = [
                                                'title' => Yii::t('cruds', 'view comment'),
                                                'class' => 'btn btn-primary btn-sm',
                                                'aria-label' => Yii::t('cruds', 'View Comment'),
                                                'data-pjax' => '0',
                                            ]; 
                            $query=\common\models\RecruiterStudentComment::find()->where(['student_id'=>$model->ID])->one();
                             if($query){
                             $url1=Url::to(['/recruiter/recruiter-student-comment/views','sid'=>$query->student_id]);
                                 return Html::a('<i class="fa fa-eye-slash"></i>', $url1, $options); 
                             }               

                            // return '<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye-slash" title="View Comment"></i></button>';
                        },


                        'downloaddoc' => function ($url, $model, $key) {
                                            $options = [
                                                'title' => Yii::t('cruds', 'Download Document'),
                                                'class' => 'icon-red-btn',
                                                'aria-label' => Yii::t('cruds', 'document download'),
                                                'data-pjax' => '0',
                                            ];                                           
                                            return Html::a('<i class="fas fa-download"></i>', $url, $options); 
                                        },

                         'education' => function ($url, $model, $key) {
                            $url1=Url::to(['/recruiter/student-education/index','sid'=>$model->ID]);
                                            $options = [
                                                'title' => Yii::t('cruds', 'add education'),
                                                'class' => 'icon-red-btn',
                                                'aria-label' => Yii::t('cruds', 'education'),
                                                'data-pjax' => '0',
                                            ];                                           
                                            return Html::a('<i class="fas fa-book"></i>', $url1, $options); 
                                        },
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
                                            return Html::a('<i class="fas fa-edit"></i>', $url, $options); 
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
                    
                    
                    
                    
                    //'recruiter_id',
                    /*'first_language',*/
                    /*'marital_status',*/
                    /*'passport_no',*/
                    /*'address:ntext',*/
                    /*'city',*/
                    /*'country',*/
                    /*'zip_code',*/
                    /*'country_of_education',*/
                    /*'highest_level_education',*/
                    /*'grading_scheme',*/
                    /*'graduated_recent_school',*/
                    /*'refused_visa',*/
                    /*'exact_score_listening',*/
                    /*'exact_score_reading',*/
                    /*'exact_score_writing',*/
                    /*'exact_score_speaking',*/
                    /*'exact_score_overall',*/
                    /*'passport_expiry_date',*/
                    /*'date_of_exam',*/
                    /*'details:ntext',*/
                    /*'middle_name',*/
                    /*'last_name',*/
                    /*'lead_status',*/
                    /*'referral_source',*/
                    /*'state',*/
                    /*'english_exam_type',*/
                    /*'study_permit',*/
                    /*'upload_document',*/
                        ]
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