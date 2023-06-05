<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\models\RecruitersSearch $searchModel
*/

$this->title = Yii::t('models', 'Recruiters');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
}else if(\Yii::$app->user->identity->type==5){
        \Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
        $actionColumnTemplateString = "{view} {update} {notes} ";
        // {mou}
    } else {
    if(\Yii::$app->user->identity->type==3){
        \Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
        $actionColumnTemplateString = "{changepass} {view} {update} {view-students} {approve} {disapprove} {notes} ";
        // {mou}
    }else{
        $is_action= \Yii::$app->userAccess->getAccessModule(\Yii::$app->user->identity->type,'recruiters');
        $is_add=  \Yii::$app->userAccess->isShowAdd(\Yii::$app->user->identity->type,'recruiters');
        if($is_add){
            \Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
        }
        $actionColumnTemplateString =  $is_action;
    }
}

$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<?= common\widgets\Alert::widget() ?>
<div class="giiant-crud recruiters-index">
    <?php echo $this->render('_search', ['model' =>$searchModel]);?>
 <a href="<?php echo Url::to(['recruiters/export'])?>" class="btn btn-primary"><i class="fa fa-download"></i> Export Excel</a>
<?php
    $st = Yii::$app->session->getFlash('deleteError');
    if(!empty($st)) { ?>
        <div class="alert alert-success">
            <p >  <?=  $st[0]; ?></p>
        </div>                     
    <?php } ?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if(\Yii::$app->user->identity->type ==3){?>
   <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Add New Recruiter', ['create'], ['class' => 'btn btn-success']) ?>
   <a href="#"  id="extendSow" onclick="return checkOptionsextend('extend');"  class="btn btn-danger">Bulk Delete</a>
   <?php }?>
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
    <?php $form = ActiveForm::begin(['action' => ['recruiters/bulkdelete'],'options' => ['id'=>'sowContractList','method' => 'post']]) ?>
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
            'class' => 'yii\grid\ActionColumn',
            'template' => $actionColumnTemplateString,
            'buttons' => [
                'changepass' => function ($url, $model, $key) {
                    $url1=Url::to(['users/changerecruiterpass','id'=>$model->user_id]);
                    return Html::a('<i class="fa fa-key margin-r-5"></i>'."", $url1, ['class'=>'btn btn-info btn-xs','title'=>"Change Password"]);
                    
                },
                'view' => function ($url, $model, $key) {
                    return Html::a('<i class="fa fa-eye margin-r-5"></i>'." View", $url, ['class'=>'btn btn-info btn-xs','title'=>"View"]);
                },               
                'update' => function ($url, $model, $key) {
                    return Html::a('<i class="fa fa-pencil"></i>'." Edit",['/recruiters/update', 'id' =>$model->id], ['class'=>'btn btn-primary btn-xs','title'=>"Edit"]);                    
                },
                'view-students' => function ($url, $model, $key) {
                    return Html::a('<i class="fa fa-eye margin-r-5"></i>'." View Students", ['/recruiters/students', 'id' => $model->id], ['class'=>'btn btn-dark btn-xs','title'=>"View Students"]);
                },
                'disapprove' => function ($url, $model, $key) {
                    if($model->status === $model::STATUS_RECRUITERS_NEW || $model->status === $model::STATUS_RECRUITERS_ACTIVE){
                        return Html::a('<i class="fa fa-thumbs-down margin-r-5"></i>'." Disapprove", ['/recruiters/disapprove', 'id' =>$model->id], ['class' => 'btn btn-danger btn-xs','title'=>"Disapprove",
                        'data' => [
                                'confirm' => 'Are you sure you want to Disapprove this?',
                                'method' => 'post',
                            ],

                        ]);
                    }    
                },
                'approve' => function ($url, $model, $key) {
                    if($model->status === $model::STATUS_RECRUITERS_NEW || $model->status === $model::STATUS_RECRUITERS_INACTIVE){
                        return Html::a('<i class="fa fa-thumbs-up margin-r-5"></i>'." Approve", ['/recruiters/approve', 'id' =>$model->id], ['class' => 'btn btn-success btn-xs','title'=>"Approve",
                        'data' => [
                                'confirm' => 'Are you sure you want to Approve this?',
                                'method' => 'post',
                            ],
    
                        ]);
                    }
                },
                'notes' => function ($url, $model, $key) {
                       return '<button type="button" data-id="'.$model->id.'" class="btn btn-info btn-sm popupnotes">Notes</button>';
                       
                },
                
                'mou' => function ($url, $model, $key) {
                    $path = Yii::getAlias('@frontend/web/uploads/files/');        
                    $modelMou = \common\models\MouDetail::findOne(['recruiter_id' => $model->id]);
                    if($modelMou){
                    if(file_exists($path.$modelMou->mou_agreement_file) && !empty($modelMou->mou_agreement_file)){
                        return Html::a('<i class="fa fa-file-text"></i>'." View MOU ", ['/recruiters/mou', 'id' => $model->id], ['class'=>'btn btn-dark btn-xs','title'=>"mou"]);
                    }
                }else{
                    return "";
                }
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
            'format' => 'raw',
            //'attribute' => 'comp_logo',
            'label' => '',
            'value' => function($model){
                return '<input type="checkbox" name="bulk_delete[]" value="'.$model->id.'" id="input" class="form-control allcheckbox">';            
            }
        ],
        'id',
        [
            'label' => 'Notes',
            'format'=> 'raw',
            'value' => function($model){
                return '<a type="button" data-id="'.$model->id.'" class="btn btn-success btn-sm shownotes" data-url="'.Url::to(["shownotes"]).'">Show Notes</button>';
            }

        ],
            // 'user_id',
           /*  [
                'format' => 'raw',
                //'attribute' => 'comp_logo',
                'label' => 'Logo',
                'value' => function($model){
                    $url = Url::base(true).'/uploads/'.$model->comp_logo; 
                    if(!empty($url)){
                       return Html::img($url, ['alt' => $model->comp_logo, 'width' => '50px']);
                    }            
                }
            ], */
            
            'owner_first_name',
            'owner_last_name',
            'phone',
            'email:email',
            [
                'attribute' => 'ref_no',
                'format' => 'html',
                'value' => function ($model) {
                    return "<b><p style='color:red'>".$model->ref_no."</p></b>";
                }   
            ],
            [
                'attribute' => 'status',
                'value' => 'recruiterStatus',
                'format' => 'html',
                'filter' => common\models\Recruiters::optionStatus(),
                'content' => function($model){
                    if( $model->status == common\models\Recruiters::STATUS_RECRUITERS_NEW ){
                        $label_class = 'primary';
                    } else if( $model->status == common\models\Recruiters::STATUS_RECRUITERS_ACTIVE ){
                        $label_class = 'success'; 
                    } else if( $model->status == common\models\Recruiters::STATUS_RECRUITERS_INACTIVE ){
                        $label_class = 'danger'; 
                    } else {
                        $label_class = 'default';
                    }
                    return '<span class="label label-'.$label_class.'">'.$model->recruiterStatus.'</span>';
                }
            ],
           // 'created_at',
            [
                'attribute' => 'Date',
                'contentOptions' => ['style' => 'width:5000%;'],
                'format' => 'html',
                'value' => function ($model) {
                 return date('d-m-Y',$model->created_at);
                }   
            ],
            /* 'instagram_handle',
            'twitter_handle',
            'linked_url:url',
            'main_source',
            'owner_first_name',
             
            'owner_last_name', */
            
            /*'country',*/
            /*'postal_code',*/
            /*'recut_form',*/
            /*'stu_abroad_year',*/
            /*'aver_service_fee',*/
            /*'refer_stu_univer',*/
            /*'confirmation',*/
            /*'company_name',*/
            /*'email:email',*/
            /*'street_address:ntext',*/
            /*'city',*/
            /*'phone',*/
            /*'client_service:ntext',*/
            /*'inst_rep:ntext',*/
            /*'edu_org_bl:ntext',*/
            /*'add_comment:ntext',*/
            /*'state',*/
            /*'refer_name',*/
            /*'refrence_name',*/
            /*'ref_stu_name',*/
            /*'ref_business_email:email',*/
            /*'comp_logo',*/
            /*'bus_certificate',*/
            /*'website',*/
            /*'sky_id',*/
            /*'whatsapp_id',*/
            /*'facebook_page',*/
            /*'begin_rec_time',*/
            /*'cellphone',*/
            /*'rep_students',*/
            /*'ref_phone',*/
            /*'market_methods',*/
            /*'ref_website',*/
                ]
        ]); ?>
    </div>

    <!-- extend modal -->
    <div class="modal fade" id="extend_sow_modal" style="text-align: left;">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                <h2> Are you sure you want to delete these recruiters..?</h2>
                                 </div> <!-- row end !-->

                                    <div class="modal-footer">
                                    <input style="margin-right: 10px;" type="submit" name="bulkdeletesubmit"  class="btn btn-success" />
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div> 

                                </div>

                            </div>
                        </div> 
                 </div> <!-- extend buld end !-->

    <?php ActiveForm::end(); ?>

</div>


<?php \yii\widgets\Pjax::end() ?>
<!-- notes model -->
<div class="modal fade" id="mynotesmodal" style="text-align: left;">
<div class="modal-dialog">
<form method="post" action="">
        <div class="modal-content">
            <div class="modal-body">
            <div class="form-group">
              <label for="">Notes</label>
              <textarea class="form-control" name="notes" id="" rows="3"></textarea>
              <input type="hidden" value="" name="recruiter_id" class="recruiter_id_fetch">
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
    '$("document").ready(function(){
        $(".popupnotes").click(function(e) {
            var id=$(this).attr("data-id");
            $(".recruiter_id_fetch").val(id);
          e.preventDefault();
          $("#mynotesmodal").modal("show");
        });
        });
        $(document).on("click", ".shownotes", function(){
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
<script>
function checkOptionsextend(){
        if ($('#sowContractList :checkbox:checked').length > 0){
            // one or more checkboxes are checked
            $("#extend_sow_modal").modal('show');
            return true;
        }else{
            // No checkbox selected
            alert('Please check one or more check box to proceed further');
            $("#extend_sow_modal").modal('hide');
             return false;
        }
    }    
</script>