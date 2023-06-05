  <?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\select2\Select2;
use frontend\components\CounterArchiveWidget;


?>






  <div class="row lets-started-row">
     
     <h4 style="color: red">Update School Information</h4>
     <hr>
            <?php $form = ActiveForm::begin([
                'id' => 'School',
             
                'enableClientValidation' => true,
               // 'errorSummaryCssClass' => 'error-summary alert alert-danger',
                'fieldConfig' => [
                 
                ]        
            ]);
            ?>

            <div class="row">

                <div class="col-xs-12 col-sm-6">
                    
                    <?php
                        echo $form->field($model, 'dest_country')->widget(Select2::classname(), [
                            'data' =>  common\models\Country::optsCountry(),
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select a country ...'],
                            'theme' => Select2::THEME_DEFAULT,
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label('Destination Country');
                    ?>            
                </div>
                <div class="col-xs-12 col-sm-6">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('School Name') ?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                        <?= $form->field($model, 'cont_fname')->textInput(['maxlength' => true])->label('Contact First Name') ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                        <?= $form->field($model, 'cont_last_name')->textInput(['maxlength' => true])->label('Contact Last Name')?>
                </div>
            </div>

            <div class="row">
                <!-- <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'cont_email')->textInput(['maxlength' => true])->label('Contact Email') ?>
                </div> -->
                 <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true])->label('Phone Number') ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'cont_title')->textInput(['maxlength' => true])->label('Contact Title') ?>
                </div>
            </div>

            <div class="row">
               
                <div class="col-xs-12 col-sm-12">
                    <?= $form->field($model, 'comment')->textarea(['rows' => 6])->label('Any additional comments:') ?>
                </div>
            </div>

             <p>&nbsp;</p>



           <!--  <?= $form->field($model, 'agree')->checkbox()->label(' I agree to receive other communications from universitybureau. '); ?> 
            <p>&nbsp;</p>

                   <?= $form->field($model, 'verifycode')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className())->label(false)?>
                    <p>&nbsp;</p>
                  -->


            <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                ($model->isNewRecord ? 'Submit' : 'Save'),
                [
                'id' => 'save-' . $model->formName(),
                'class' => 'btn btn-success'
                ]
                );
            ?>
            <p>&nbsp;</p>

           <!--  <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <p>University Bureau is committed to protecting and respecting your privacy. We will only use your personal information to administer your account and as per your request, we will provide you with the products and services. To get more information about services we offer please tick below.</p>
                </div>
            </div> -->
            <?php ActiveForm::end(); ?>
        </div> 