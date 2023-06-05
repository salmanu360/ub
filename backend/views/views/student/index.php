<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var backend\models\ForStudentsSearch $searchModel
*/
use yii\bootstrap\ActiveForm;
$this->title = Yii::t('models', 'For Students');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete} "; //{applications}
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud for-students-index">

    <?php
         echo $this->render('_search', ['model' =>$searchModel]);
    ?>
    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <h1>
        <?= Yii::t('app', 'Students') ?>
        <small>
            <?= Yii::t('app', 'List') ?>
        </small>
    </h1>
    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?php 
            if (Yii::$app->user->can('create-allstudent')) {
            Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);} ?>
            <a href="#"  id="extendSow" onclick="return checkOptionsextend('extend');"  class="btn btn-danger">Assign Bulk Student To Application Team</a>
        </div>

        <div class="pull-right">

                        
            <?= 
            \yii\bootstrap\ButtonDropdown::widget(
            [
            'id' => 'giiant-relations',
            'encodeLabel' => false,
            'label' => '<span class="glyphicon glyphicon-paperclip"></span> ' . 'Relations',
            'dropdown' => [
            'options' => [
            'class' => 'dropdown-menu-right'
            ],
            'encodeLabels' => false,
            'items' => [

]
            ],
            'options' => [
            'class' => 'btn-default'
            ]
            ]
            );
            ?>
        </div>
    </div>
    <hr />
    <?php $form = ActiveForm::begin(['action' => ['student/bulkassign'],'options' => ['id'=>'assignformId','method' => 'post']]) ?>
    <div class="table-responsive">
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
                    'format' => 'raw',
                    //'attribute' => 'comp_logo',
                    'label' => '',
                    'value' => function($model){
                        return '<input type="checkbox" name="bulk_student[]" value="'.$model->ID.'" id="input" class="form-control allcheckbox">';            
                    }
                ],
                [
                    'format' => 'html',
                    'attribute' => 'ID',
                    'label' => 'Unique ID',
                    'value' => function($model){
                        return $model->ID;
                    }
                ],
			// 'user_id',
			'first_name',
			'last_name',
			'email_id',
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
            'passport_no',
            'comment',
			[
                'format' => 'html',
                'attribute' => 'assign_application_team',
                'value' => function($model){
                    $assign_application_team=\common\models\User::findOne($model->assign_application_team);
                       if($assign_application_team){
                        return $assign_application_team->username .' ('.$assign_application_team->email.')';
                       }else{
                        return "N/A";
                       }
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'rm_id',
                'value' => function($model){
                    $assign_application_team=\common\models\User::findOne($model->rm_id);
                       if($assign_application_team){
                        return $assign_application_team->username .' ('.$assign_application_team->email.')';
                       }else{
                        return "N/A";
                       }
                }
            ],
			'birth_date',
			'gender',
			[
                'format' => 'html',
                'attribute' => 'country_of_interest',
                'value' => function($model){
                    $country=\common\models\Country::findOne($model->country_of_interest);
                       if($country){
                        return $country->name;
                       }else{
                        return "N/A";
                       }
                }
            ],
			// 'country_of_citizenship',
            [
                'attribute' => 'country_of_citizenship',
                'label' => 'Nationality',
                'value' => function($model){
                    if(!empty($model->country_of_citizenship)){
                        $country_name = \common\models\Country::getCountry($model->country_of_citizenship);
                        return $country_name;
                    } else {
                        return '(not set)';
                    }
                }
            ],
            [
                //'attribute' => 'country_of_citizenship',
                'label' => 'RM Comment to Recruiter',
                'value' => function($model){
                        $rm_comment = \common\models\RmRecruiterComment::find()->where(['student_id'=>$model->ID])->one();
                        if($rm_comment){
                            return $rm_comment->comment;
                        }else{
                            return 'n/a';
                        }
                }
            ],

            [
                'label' => 'RM Comment to Application',
                'format' => 'html',
                'value' => function($model){
                    $url=Url::to(['rm-application-team-comment/rmcomment','id'=>$model->ID]);
                    return '<a href="'.$url.'"  class="btn btn-sm btn-primary" title="Show All Comments">Show</a>';
                }
            ],
            
            /*[
                'label' => 'RM Comment File',
                'format' => 'html',
                'value' => function($model){
                        $RmApplicationTeamComment = \common\models\RmApplicationTeamComment::find()->where(['student_id'=>$model->ID])->one();
                        return $RmApplicationTeamComment->file;
                }
            ],*/

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
                        
                            return '<a href="'.$url.'"  class="'.$color.'">'.$LeadStatuses->name.'</a>';
                       }else{
                            return '<a href="'.$url.'"  class="btn btn-dark">New</a>';
                       }
                }
            ],
			//'first_language',
			/*'marital_status',*/
			/*'passport_no',*/
			/*'address:ntext',*/
			/*'city',*/
			/*'country',*/
			/*'zip_code',*/
			/*'country_of_education',*/
			/*'highest_level_education',*/
			/*'grading_scheme',*/
			/*'refused_visa',*/
			/*'details:ntext',*/
			/*'consent',*/
			/*'grade_scale',*/
			/*'graduated_recent_school',*/
			/*'exact_score_listening',*/
			/*'exact_score_reading',*/
			/*'exact_score_writing',*/
			/*'exact_score_speaking',*/
			/*'exact_score_overall',*/
			/*'have_gre_exam',*/
			/*'gre_verbal_score',*/
			/*'gre_verbal_rank',*/
			/*'gre_quantitative_score',*/
			/*'gre_quantitative_rank',*/
			/*'gre_writing_score',*/
			/*'gre_writing_rank',*/
			/*'have_gmat_exam',*/
			/*'gmat_verbal_score',*/
			/*'gmat_verbal_rank',*/
			/*'gmat_quantitative_score',*/
			/*'gmat_quantitative_rank',*/
			/*'gmat_writing_score',*/
			/*'gmat_writing_rank',*/
			/*'gmat_total_score',*/
			/*'gmat_total_rank',*/
			/*'passport_expiry_date',*/
			/*'date_of_exam',*/
			/*'gre_exam_date',*/
			/*'gmat_exam_date',*/
			/*'phone_no',*/
			/*'country_of_interest',*/
			/*'service_of_interest',*/
			/*'state',*/
			/*'study_permit',*/
			/*'grade_average',*/
			/*'english_exam_type',*/
			/*'upload_document',*/
                [
                'header' => 'Actions',
                'class' => 'yii\grid\ActionColumn',
                'template' => $actionColumnTemplateString,
                'buttons' => [
                    'applications' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('cruds', 'Applications'),
                            'aria-label' => Yii::t('cruds', 'Applications'),
                            'data-pjax' => '0',
                        ];
                        //if (Yii::$app->user->can('view-application')) {
                        return Html::a('<span class="glyphicon glyphicon-tasks"></span>', $url, $options);
                        //}
                    },
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('cruds', 'View'),
                            'aria-label' => Yii::t('cruds', 'View'),
                            'data-pjax' => '0',
                        ];
                        //if (Yii::$app->user->can('view-allstudent')) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                        //}
                    },
                    'update' => function ($url, $model) {
                        //if (Yii::$app->user->can('update-allstudent')) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                    'title' => Yii::t('app', 'update'),
                        ]);
                    //}
                    },
                    'delete' => function ($url, $model,$key) {
                        //if (Yii::$app->user->can('delete-allstudent')) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                        ]);
                    //}
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
            


           



                ]



        ]); ?>
    </div>

</div>
<!-- assign application team modal -->
<div class="modal fade" id="assign_application_team_model" style="text-align: left;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <h2> Assign application team</h2>
                <label for="">Application Team</label>
                <select name="assign_application_team" id="" class="form-control" required>
                    <option value="">Select</option>
                    <?php $applicationTeam=\common\models\User::find()->where(['type'=>6])->all();
                    foreach($applicationTeam as $applicationTeamvalue){?>
                    <option value="<?= $applicationTeamvalue->id?>"><?= $applicationTeamvalue->username.' ('.$applicationTeamvalue->email.')'?></option>
                    <?php }?>
                </select>
                    </div> <!-- row end !-->
                    <div class="modal-footer">
                    <input style="margin-right: 10px;" type="submit" name="bulkdeletesubmit"  class="btn btn-success" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> 

                </div>
            </div>
        </div> 
    </div> 
<!-- assign application team model end !-->
<?php ActiveForm::end(); ?>
<?php \yii\widgets\Pjax::end() ?>

<script>
function checkOptionsextend(){
        if ($('#assignformId :checkbox:checked').length > 0){
            $("#assign_application_team_model").modal('show');
            return true;
        }else{
            alert('Please check one or more check box to proceed further');
            $("#assign_application_team_model").modal('hide');
             return false;
        }
    }    
</script>

