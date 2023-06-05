<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AssignRecuiterRmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Recuiter Rms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-recuiter-rm-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             [
                'header'=>'Actions',
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' =>['style' => 'width:140px'],
                'template' => "{notes} {view} {update}",
                'buttons' => [
                 'notes' => function ($url, $model, $key) {
                       return '<button type="button" data-id="'.$model['id'].'" class="btn btn-info btn-sm popupnotes">Notes</button>';
                },
                'view' => function ($url, $model, $key) {
                   
                    return Html::a('<i class="fa fa-eye margin-r-5"></i>'." View",['/recruiters/view', 'id' =>$model['id']], ['class'=>'btn btn-info btn-xs','title'=>"View"]);
                    
                },               
                'update' => function ($url, $model, $key) {
                    
                    return Html::a('<i class="fa fa-pencil"></i>'." Edit",['/recruiters/update', 'id' =>$model['id']], ['class'=>'btn btn-primary btn-xs','title'=>"Edit"]);                    
                   
                },
            ],
            ],


            'id',
        [
            'label' => 'Notes',
            'format'=> 'raw',
            'value' => function($model){
                return '<a type="button" data-id="'.$model['id'].'" class="btn btn-success btn-sm shownotes" data-url="'.Url::to(["recruiters/shownotes"]).'">Show Notes</button>';
            }

        ],
            
            'owner_first_name',
            'owner_last_name',
            'phone',
            'email:email',
            'company_name',
            [
                'attribute' => 'ref_no',
                'format' => 'html',
                'value' => function ($model) {
                    return "<b><p style='color:red'>".$model['ref_no']."</p></b>";
                }   
            ],
           
           // 'created_at',
           
            /*[
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
            ],*/
            'date_created',
            
        ],
    ]); ?>


</div>
<!-- notes model -->
<div class="modal fade" id="mynotesmodal" style="text-align: left;">
<div class="modal-dialog">
<form method="post" action="<?php echo Url::to(['assign-recuiter-rm/index'])?>">
        <div class="modal-content">
            <div class="modal-body">
            <div class="form-group">
              <label for="">Notes</label>
              <textarea class="form-control" name="notes" id="" rows="3"></textarea>
              <input type="hidden" value="" name="recruiter_id" class="recruiter_id_fetch">
            </div>
                </div> <!-- row end !-->
                <div class="modal-footer">
                <!-- <input style="margin-right: 10px;" type="submit" name="bulkdeletesubmit"  class="btn btn-success" /> -->
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input style="margin-right: 10px;" type="submit" name="bulkdeletesubmit"  class="btn btn-success" />
            </div> 

            </div>

        </div>
        </form>
    </div> 
</div> 
<!--  -->
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
                <!-- <input style="margin-right: 10px;" type="submit" name="bulkdeletesubmit"  class="btn btn-success" /> -->
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