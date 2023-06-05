<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\Student $model
*/

$this->title = Yii::t('models', 'Signature');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Recruiter'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => (string)$model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Edit';

$path = Yii::getAlias('@webroot/uploads/files/');
?>
<main role="main" class="col-md-12 ms-sm-auto px-4 dashboard-main-body mou-container_main">            
  <div class="row">
    <div class="col-md-12">
       <div class="dashboard-card mou-container_inner top-red-border mb-5">
        <?php echo $this->render('_mou_certificate', [
              'model' => $modelMou,
              'recruiter' => $recruiter
        ]); ?>
        <hr>
        <?php 
        //if($modelMou){          
        if(!file_exists($path.$modelMou->mou_agreement_file) || empty($modelMou->mou_agreement_file)): ?>
        <h3 class="common-dashboard-heading mt-3">Draw your Signature with mouse or touch</h3>
        <?php 
         /* echo \inquid\signature\SignatureWidget::widget([
            'clear' => true,
            'undo' => true,
            'change_color' => false,
            'url' => Url::to(['/recruiter/mou']),
            'save_server' => false,
            'save_png' => true,
            'save_jpg' => false,
            'save_svg' => false,
          ]);*/

          echo \diggindata\signaturepad\SignaturePadWidget::widget([
            'model' => $model,
            'attribute' => 'signature',
            'options' => ['style' => 'min-width:300px;min-height:200px;', 'data-rec_id' => $recruiter->id],
            'showSaveAsJpg' => false,
        ]);
        ?>
        <?php endif; 

     /* }else{

      }*/
      ?>
        <!-- Buttons -->
        <div class="card mt-5">
          <div class="card-body buttons">
            <?php   
            if(!file_exists($path.$modelMou->mou_agreement_file) || empty($modelMou->mou_agreement_file)): ?>
              <a href="" class="common-circle-blue-btn" id="upload_sign">Upload Signature Image</a>
              <a href="<?=Url::to(['/recruiter/generate-pdf'])?>" class="common-circle-blue-btn text-end">Submit Mou Certificate</a>
            <?php else: ?>
              <a href="<?=Yii::getAlias('@web/uploads/files/').$modelMou->mou_agreement_file?>" class="common-circle-blue-btn">View/Download MOU</a>
            <?php endif; 
            ?>
            <a href="<?=Url::to(['/recruiter/dashboard'])?>" class="common-circle-blue-btn">Go to dashboard</a>
          </div>
        </div>
        <!-- end Buttons  -->
     
      </div>
      
    </div>
  </div>
</main>
<!-- modal for upload signature image -->
<div id="modal_upload_sign" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload your signature</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>      
      <div class="modal-body text-center" id="show_model_apply">
      <h3 class="common-dashboard-heading">Upload Image</h3>
        <?php $form = ActiveForm::begin([
            'id' => 'upload-sign',
            'options' => [
                'class' => 'dashboard-pills'
            ],
            'layout' => 'default',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-danger',
          ]);
        ?>
        <div class="row">
          <div class="col-md-12">              
            <?= $form->field($model, 'signature')->fileInput(['maxlength' => true, 'class' => 'form-control file-input'])->label(false); ?>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-end">
            <div class="mb-3">
            <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                'Upload',
                [
                  'id' => 'upld-btn',
                  'class' => 'common-btn'
                ]
                );
                ?>
            </div>
            </div>
        </div>
      <?php ActiveForm::end(); ?>      
      </div>      
    </div>
  </div>
</div>


<!-- modal create signature pad -->
<!-- <div class="modal fade" id="signaturePadModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signaturePadModalLabel">Signature Pad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="common-dashboard-heading">Create your signature</h3>      
        
       
      </div>
  </div>
</div> -->

<?php
$script = <<< JS
  $(document).ready(function(){
    $('.card .buttons').on('click', '#upload_sign', function(e){
      e.preventDefault();
      $('#modal_upload_sign').modal('show');       
    })
  });     
JS;
$this->registerJs($script);
?>