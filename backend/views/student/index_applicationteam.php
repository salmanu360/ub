<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var backend\models\ForStudentsSearch $searchModel
*/

$this->title = Yii::t('models', 'For Students');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view}  "; //{applications} {update} {delete}
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
            'comment',
            [
                'label' => 'RM Comment to Application',
                'format' => 'html',
                'value' => function($model){
                    $url=Url::to(['rm-application-team-comment/rmcomment','id'=>$model->ID]);
                    return '<a href="'.$url.'"  class="btn btn-sm btn-primary" title="Show All Comments">Show</a>';
                }
            ],
            [
                'label' => 'Eligible/Not Eligible',
                'format'=> 'raw',
                'value' => function($model){
                    $studentEligible=\common\models\StudentEligibleNoteligible::find()->where(['student_id'=>$model->ID])->One();
                    if($studentEligible && $studentEligible->status == 1){
                        return '<a type="button" data-id="'.$model->ID.'" class="btn btn-success btn-sm shownotes" data-url="'.Url::to(["showcomment"]).'">Eligible</a>';
                    }else if($studentEligible && $studentEligible->status == 0){
                        return '<a type="button" data-id="'.$model->ID.'" class="btn btn-danger btn-sm shownotes" data-url="'.Url::to(["showcomment"]).'">Not Eligible</a>';
                    }else{
                        return "N/A";
                    }
                }
    
            ],

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


<?php \yii\widgets\Pjax::end() ?>
<!--  -->
<div class="modal fade" id="notesshowmodal" style="text-align: left;">
<div class="modal-dialog">
<form method="post" action="">
        <div class="modal-content">
            <div class="modal-body">
            <div class="form-group allnotesvalues">
              <label for="">Notes</label>
              
            </div>
                </div> <!-- row end !-->
                <div class="modal-footer">
                <input style="margin-right: 10px;" type="submit" name="bulkdeletesubmit"  class="btn btn-success" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> 

            </div>

        </div>
        </form>
    </div> 
</div>
    <!-- notes model end-->
<?php
    $this->registerJs(
    '$(document).on("click", ".shownotes", function(){
            var url=$(this).data("url");
                    userid = $(this).val();
                    var id=$(this).attr("data-id");
                        $.ajax({
                            type: "POST",
                            dataType:"JSON",
                            url: url,
                            data: {
                                id: id,
                            },
                            success: function(data){
                                $(".allnotesvalues").html(data.view);
                                $("#notesshowmodal").modal("show");
                            }
                        });
                });

        '
    );
  ?> 
