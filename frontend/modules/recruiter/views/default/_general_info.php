<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper; 
use kartik\date\DatePicker;
use kartik\select2\Select2;
use borales\extensions\phoneInput\PhoneInput;
use kartik\switchinput\SwitchInput;
use buttflattery\formwizard\FormWizard;
use kartik\widgets\FileInput;

/**
* @var yii\web\View $this
* @var common\models\Student $model
* @var yii\widgets\ActiveForm $form
*/

?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fa fa-check-circle" aria-hidden="true"></i></i></strong> <?= Yii::$app->session->getFlash('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fa fa-ban" aria-hidden="true"></i></strong> <?= Yii::$app->session->getFlash('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin([
        'id' => 'general-info',
        'options' => [
            'class' => 'dashboard-pills'
        ],
        'layout' => 'default',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
    ]);
    ?>
    <?php $this->beginBlock('main'); ?>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3"> 
            <?= $form->field($model, 'comp_logo')->fileInput(['maxlength' => true, 'class' => 'form-control file-input']); ?>
            <?php if(!empty($model->comp_logo)): ?>
            <div class="company-logo">
                <img src="<?=Yii::getAlias('@web/uploads/'). $model->comp_logo?>" alt="company logo" class="image" style="width:60px">
                <div class="overlay">
                    <a href="#" class="icon remove" title="Remove" data-attr="comp_logo" data-rec_id="<?=$model->id?>">
                    <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'bus_certificate')->fileInput(['maxlength' => true, 'class' => 'form-control file-input']); ?>  
            <?php if(!empty($model->bus_certificate)): ?>
            <div class="company-logo">
                <?php 
                    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
                    $target_file = $upload_dir . basename($model->bus_certificate);
                    $ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                ?>
                <?php if($ext == "pdf"): ?>
                    <span class="file-icon"><i class="fas fa-file-pdf"></i></span>       
                <?php elseif($ext == "doc" || $ext == "docx" ): ?>
                    <span class="file-icon"><i class="fas fa-file-word"></i></span>       
                <?php else: ?>
                    <img src="<?=Yii::getAlias('@web/uploads/'). $model->bus_certificate?>" alt="Business certificate" class="image" style="width:60px">
                <?php endif; ?>   
 
                <div class="overlay">
                    <a href="#" class="icon remove" title="Remove" data-attr="bus_certificate" data-rec_id="<?=$model->id?>">
                    <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <?php endif; ?>         
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'company_name')->textInput(['maxlength' => true, 'placeholder' => 'Company Name']); ?>        
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'website')->textInput(['maxlength' => true, 'placeholder' => 'Website']); ?>       
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'sky_id')->textInput(['maxlength' => true, 'placeholder' => 'Skype Id']); ?>        
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'whatsapp_id')->textInput(['maxlength' => true, 'placeholder' => 'Whatsapp Id']); ?>        
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <h6><strong>Contact Information</strong></h6>
        <hr>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'owner_first_name')->textInput(['maxlength' => true, 'placeholder' => 'First Name']); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'owner_last_name')->textInput(['maxlength' => true, 'placeholder' => 'Last Name']); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
        <?= $form->field($model, 'phone')->widget(PhoneInput::classname(), [
            'options' => ['placeholder' => 'Phone']                        
        ]);?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
        <?= $form->field($model, 'cellphone')->widget(PhoneInput::classname(), [
            'options' => ['placeholder' => 'Cellphone ...']                        
        ]);?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?=$form->field($model, 'main_source')->widget(Select2::classname(), [
                'data' => common\models\Country::optsCountry(),
                'options' => ['placeholder' => 'Main Source'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'autocomplete' => false
                ],
            ]) ?>   
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'street_address')->textInput(['maxlength' => true, 'placeholder' => 'City']); ?>    
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'placeholder' => 'City']); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'state')->textInput(['maxlength' => true, 'placeholder' => 'State']); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?=$form->field($model, 'country')->widget(Select2::classname(), [
                'data' => common\models\Country::optsCountry(),
                'options' => ['placeholder' => 'Country'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'autocomplete' => false
                ],
            ]) ?>   
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true, 'placeholder' => 'Postal Code']); ?>
        </div>
    </div>
</div>
<?php $this->endBlock(); ?>
    <?=
        Tabs::widget(
            [
            'encodeLabels' => false,
            'items' => [ 
                [
                    'label'   => Yii::t('models', ''),
                    'content' => $this->blocks['main'],
                    'active'  => true,
                ],
            ]
            ]
        );
        ?>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-12 text-end">
            <div class="mb-3">
            <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                ($model->isNewRecord ? 'Create' : 'Save'),
                [
                'id' => 'save-' . $model->formName(),
                'class' => 'common-btn'
                ]
                );
                ?>
            </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
<?php
$url = Url::to(['/recruiter/remove/']);

$script = <<< JS
    $(function(){
        $('.company-logo').on('click', '.remove', function(e){
            e.preventDefault();

            var button = $(this);
            if(confirm("Are you sure you want to delete")){
                var rec_id = button.data('rec_id');
                var attribute = button.data('attr');
    
                $.ajax({
                    url: "{$url}", 
                    type: 'GET',
                    data: {rec_id: rec_id, attr: attribute},
                    success: function(response){
                        if(response == 'OK'){
                            button.closest(".company-logo").fadeOut(3000).remove();
                        }
                    }
                })
                //.done(function(response) { alert("Success: " + response); })
                //.fail(function(){ alert("Error"); })

            }
             
        })
    }); 
JS;
$this->registerJs($script);
?>