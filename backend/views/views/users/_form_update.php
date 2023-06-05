<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\widgets\Select2; // or kartik\select2\Select2
use kartik\widgets\DepDrop; // or kartik\select2\Select2
use yii\bootstrap\ToggleButtonGroup;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/**
* @var yii\web\View $this
* @var common\models\User $model
* @var yii\widgets\ActiveForm $form
*/

?>
<h3>User Management System</h3> <hr>
<div class="user-form">
<div class="row">
        <div class="col-md-6">
        <!-- <button type="button" id="AccessControl" class="btn btn-success float-right" data-toggle='modal'
        data-target='#AccessControlModal' style="position:relative;top:30px;" >Access Control</button> -->
        </div>
    </div>

    
    
    <?php $form = ActiveForm::begin([
    'id' => 'User',
    'layout' => 'horizontal',
   // 'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-3',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-9',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>
    
    <br>
    <br>
    <div class="box-body ">
    
<!-- attribute username -->
            <?= $form->field($model, 'username')->textInput(['readonly' => 'readonly']) ?>
<!-- attribute email -->
            <?= $form->field($model, 'email')->textInput(['readonly' => 'readonly']) ?>
<!-- attribute status -->
                    <?= $form->field($model, 'status')->hiddenInput(['value'=>$model->status])->label(false);
                            /* $form->field($model, 'status')->widget(ToggleButtonGroup::classname(), [
                                'type'=>'radio',
                                'items'=> common\models\User::optsstatus(),
                                'labelOptions' => ['class'=>'btn btn-default'],
                                'options'=>['class'=>'btn-group'],
                                //'value'=> $model->status,
                            ]); */
                        ?>

            <?php 
            if($model->type == '3'){?>
            <input type='' value='Super Admin' class='form-control' readonly style='margin-left: 323px;width: 916.9px;'>
            <?php }else{
            echo $form->field($model, 'type')->dropDownList( 
            common\models\User::optionType())->label("User Type"); 
            }
            ?>
            <br>

            <?= $form->field($model, 'password')->passwordInput() ?> 
            <?= $form->field($model, 'confirm_password')->passwordInput() ?>         

           

    </div>
    <div class="box-footer">
        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? Yii::t('cruds', 'Create') : Yii::t('cruds', 'Save')),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success btn-flat'
        ]
        );
        ?>
        <a href="<?php echo Url::to(['users/index'])?>" class="btn btn-warning">Cancel</a>

    </div>
    <?php ActiveForm::end(); ?>
</div>

<!-- Modal: Access Control  -->
<div class="modal fade" id="AccessControlModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
			<h5 class="modal-title">Access Control Right</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
						
            </div>
			<div class="modal-footer">
                <button type="button" class="btn btn-primary mt-2" id="SaveAccessControl" data-dismiss="modal" >Save</button>
                <a href="<?php echo Url::to(['user/index'])?>" class="add btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="UserID" value="<?php echo $model->ID; ?>">
<input type="hidden" id="fetchurl" value="<?php echo Url::to(['get-user-access-control','id'=>$model->ID]); ?>">
<input type="hidden" id="inserturl" value="<?php echo Url::to(['update-access-control','id'=>$model->ID]); ?>">
<?php $this->registerJsFile(Url::base(true).'/js/User.js',['depends' => [\yii\web\JqueryAsset::className()]]); ?>