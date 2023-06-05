<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;





/**
* @var yii\web\View $this
* @var common\models\Color $model
* @var yii\widgets\ActiveForm $form
*/
$this->title = Yii::t('occ', 'User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('occ', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->username, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Access');
?>

<div class="color-form box box-primary">

    <?php $form = ActiveForm::begin([
    'id' => 'Color',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-2',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-8',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="box-body ">
          <div class="row">
               <div class="col-sm-2">
                   &nbsp;
               </div>
               <div class="col-sm-1 ">
                   <div class="form-group all-access">
                       <div class="col-sm-8 col-sm-offset-3">
                          <div class="checkbox">
                             <label for="all-access">
                                <input type="checkbox" id="all-access">
                                <?= Yii::t('occ','All')?>
                             </label>
                          </div>
                       </div>
                   </div>
               </div>
               <div class="col-sm-1 ">&nbsp;</div>
               <div class="col-sm-1 ">
                   <div class="form-group">
                       <div class="col-sm-8 col-sm-offset-3">
                          <div class="checkbox">
                             <label for="all-read">
                                <input type="checkbox" id="all-read">
                                <?= Yii::t('occ','All')?>
                             </label>
                          </div>
                       </div>
                   </div>
               </div>

               <div class="col-sm-1 ">
                   <div class="form-group">
                       <div class="col-sm-8 col-sm-offset-3">
                          <div class="checkbox">
                             <label for="all-write">
                                <input type="checkbox" id="all-write">
                                <?= Yii::t('occ','All')?>
                             </label>
                          </div>
                       </div>
                   </div>
               </div>

               <div class="col-sm-1 ">
                   <div class="form-group">
                       <div class="col-sm-8 col-sm-offset-3">
                          <div class="checkbox">
                             <label for="all-edit">
                                <input type="checkbox" id="all-edit">
                                <?= Yii::t('occ','All')?>
                             </label>
                          </div>
                       </div>
                   </div>
               </div>

               <div class="col-sm-1 ">
                   <div class="form-group">
                       <div class="col-sm-8 col-sm-offset-3">
                          <div class="checkbox">
                             <label for="all-delete">
                                <input type="checkbox" id="all-delete">
                                <?= Yii::t('occ','All')?>
                             </label>
                          </div>
                       </div>
                   </div>
               </div>
          </div>
          <?php 
            
            foreach($modules as $module):
          ?>
          <div class="row">
             <div class="col-sm-2 ">
                  <label><?= $model->getModuleNameById($module['module'])?></label>
                  <?= $form->field($model, '['.$module['module'].']module')->hiddenInput(['value'=>$module['module']])->label(false) ?>
             </div>

             <div class="col-sm-1 ">
                 <?php $model->status = $module['status']?true:false;?>
                 <?= $form->field($model, '['.$module['module'].']status')->checkbox(['class'=>'access']);?>
             </div>
             <div class="col-sm-1 col-sm-push-1">
                 <?php $model->can_read = $module['can_read']?true:false;?>
                 <?= $form->field($model, '['.$module['module'].']can_read')->checkbox(['class'=>'can-read']);?>
             </div>

             <div class="col-sm-1 col-sm-push-1">
                 <?php $model->can_write = $module['can_write']?true:false;?>
                 <?= $form->field($model, '['.$module['module'].']can_write')->checkbox(['class'=>'can-write']);?>
             </div>

             <div class="col-sm-1 col-sm-push-1">
                 <?php $model->can_edit = $module['can_edit']?true:false;?>
                 <?= $form->field($model, '['.$module['module'].']can_edit')->checkbox(['class'=>'can-edit']);?>
             </div>

             <div class="col-sm-1 col-sm-push-1">
                 <?php $model->can_delete = $module['can_delete']?true:false;?>
                 <?= $form->field($model, '['.$module['module'].']can_delete')->checkbox(['class'=>'can-delete']);?>
             </div>
          </div>
          <?php endforeach;?>
    </div>
    <div class="box-footer">
        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        Yii::t('occ', 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success btn-flat'
        ]
        );
        ?>
        <?=         Html::a(
        Yii::t('occ', 'Back'),
        Url::to(['user/view','id'=>$model->id]),
        ['class' => 'btn btn-default btn-flat']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php 
$script = <<<JS
   
     $("#all-access").click(function(){
          if($(this).is(":checked")){
             $("input[type='checkbox']").prop("checked",true);
          }else{
             $("input[type='checkbox']").prop("checked",false);
          }
     });

     $(".access").click(function(){
          var row = $(this).closest(".row");
          if($(this).is(":checked")){
            row.find(".can-read").prop("checked",true);
            row.find(".can-write").prop("checked",true);
            row.find(".can-edit").prop("checked",true);
            row.find(".can-delete").prop("checked",true);
          }else{
            row.find(".can-read").prop("checked",false);
            row.find(".can-write").prop("checked",false);
            row.find(".can-edit").prop("checked",false);
            row.find(".can-delete").prop("checked",false);
          }

          if( $(".access").not(":checked").length > 0 ){ 
             $("#all-access").prop("checked",false);
          }else{
             $("#all-access").prop("checked",true);
          }
     });

     $("#all-read").click(function(){console.log("test");
          if($(this).is(":checked")){
             $(".can-read").prop("checked",true);
          }else{
             $(".can-read").prop("checked",false);
          }
     });

     $(".can-read").click(function(){
          check_access();
          if( $(".can-read").not(":checked").length > 0 ){ 
             $("#all-read").prop("checked",false);
          }else{
             $("#all-read").prop("checked",true);
          }
     });

     $("#all-write").click(function(){
          if($(this).is(":checked")){
             $(".can-write").prop("checked",true);
          }else{
             $(".can-write").prop("checked",false);
          }
     });

     $(".can-write").click(function(){
          check_access();
          if( $(".can-write").not(":checked").length > 0 ){ 
             $("#all-write").prop("checked",false);
          }else{
             $("#all-write").prop("checked",true);
          }
     });

     $("#all-edit").click(function(){
          if($(this).is(":checked")){
             $(".can-edit").prop("checked",true);
          }else{
             $(".can-edit").prop("checked",false);
          }
     });

     $(".can-edit").click(function(){
          check_access();
          if( $(".can-edit").not(":checked").length > 0 ){ 
             $("#all-edit").prop("checked",false);
          }else{
             $("#all-edit").prop("checked",true);
          }
     });

     $("#all-delete").click(function(){
          if($(this).is(":checked")){
             $(".can-delete").prop("checked",true);
          }else{
             $(".can-delete").prop("checked",false);
          }
     });

     $(".can-delete").click(function(){
          check_access();
          if( $(".can-delete").not(":checked").length > 0 ){ 
             $("#all-delete").prop("checked",false);
          }else{
             $("#all-delete").prop("checked",true);
          }
     });
     

     function check_access(){

        if( $("input[type='checkbox']").not(":checked").length > 0 ){
           $("#all-access").prop("checked",false);
        }

        if( $(".access").not(":checked").length == 0 && $(".can-read").not(":checked").length == 0 && $(".can-write").not(":checked").length == 0 && $(".can-edit").not(":checked").length == 0 && $(".can-delete").not(":checked").length == 0 ){
           $("#all-access").prop("checked",true);
        }
        
        $(".can-read").each(function(index){
           
           var can_read = $(".can-read").eq(index).is(":checked");
           var can_write = $(".can-write").eq(index).is(":checked");
           var can_edit = $(".can-edit").eq(index).is(":checked");
           var can_delete = $(".can-delete").eq(index).is(":checked");

           if( can_read || can_write || can_edit || can_delete ){
             $(".access").eq(index).prop("checked",true);
           }else if( !can_read && !can_write && !can_edit && !can_delete ){
             $(".access").eq(index).prop("checked",false);   
           }

        });

     }

JS;
$this->registerJs($script);

