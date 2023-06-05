     <?php
    
    use Yii;
    use yii\bootstrap\ActiveForm;
    use kartik\widgets\FileInput;
    use kartik\select2\Select2;
    use yii\helpers\Html;
    use yii\captcha\Captcha;
    use yii\helpers\ArrayHelper;


use yii\helpers\StringHelper;

$this->title = 'Modal';


     ?>
       
          <div class="container-fluid p-0">
            <div class="row"> 
              <div class="col-12 ask-question-form">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                     <div class="modal-header justify-content-end p-0">
                      <button id="cust_btn" type="button" class="close common-btn-close" data-dismiss="modal">&times;</button>
                     </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="avtar">
                            <img src="images/apple-touch-icon.png"/>
                          </div>
                        </div>
                        <div class="col-md-10">
                          <div class="avtar-title">
                            <h4 class="common-heading">Get Free Counselling</h4>
                             <?php if($_POST['type']==0){ ?>
                            <p> <b><?= $college->name; ?> </b></p>
                        <?php }else{ ?>
                        		<p> <b><?= $college->name  ."( ".$course->name." )"; ?> </b></p>
                        <?php }?>

                          </div>
                        </div>
                      </div>
                    </div>
                  

                    <?php $form = ActiveForm::begin([ 'id' => 'form_counsil', 'options' => ['enableAjaxValidation' => true, 'validateOnSubmit' => true,'method' => 'post']]); ?>


                    <div class="col-md-12">
                     
                        <div class="row">
                      
                          <div class="col-xs-12 col-sm-6">
                            
                             <?php echo $form->field($councilStudent, 'name') ?>
                             
                           
                          </div>
                           
                          <div class="col-xs-12 col-sm-6">
                           
                             <?php echo $form->field($councilStudent, 'email') ?>
                              
                          
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                           
                             <?php echo $form->field($councilStudent, 'phone') ?>
                            
                          </div>
                          <div class="col-xs-12 col-sm-6">
 
                              <?php echo $form->field($councilStudent, 'city') ?>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                          
                              <?php echo $form->field($councilStudent, 'state') ?>
                            
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            
                             <?php echo $form->field($councilStudent, 'zip_code') ?>
                           
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                            <?php   if($_POST['type']==1){ ?>
                            
                             <?= $form->field($councilStudent, 'course_id')->hiddenInput(['value'=>$course->id])->label(false) ?>

                           <?php } ?>
                           
                          </div>

                           <div class="col-xs-12 col-sm-6">
                           
                             <?= $form->field($councilStudent, 'college_id')->hiddenInput(['value'=>$college->id])->label(false) ?>
                           
                          </div>
                         
                         



                          <div class="col-xs-12 col-sm-6">
                           
                             
                       <?php
                             if($_POST['type']==0){

                                echo $form->field($councilStudent, 'course_id')->widget(Select2::classname(), [
                                    'data' =>ArrayHelper::map(common\models\Course::find()->where(['college_id'=>$college->id])->asArray()->all(), 'id', 'name'),
                                    'language' => 'en',
                                    'options' => ['placeholder' => 'Select a course ...'],
                                   // 'theme' => Select2::THEME_DEFAULT,
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ])->label('Courses');

                              }
                              ?>       
                           
                          </div>


                          <div class="col-xs-12 col-sm-6">
                           
                             
                              <?php
                                echo $form->field($councilStudent, 'country')->widget(Select2::classname(), [
                                    'data' =>  \common\models\Country::optsCountry(),
                                    'language' => 'en',
                                    'options' => ['placeholder' => 'Select a country ...'],
                                    'theme' => Select2::THEME_DEFAULT,
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ])->label('Destination Country');
                              ?>      
                           
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-12 mt-3">
                           
                              <?php echo $form->field($councilStudent, 'additional_message') ?>
                           
                          </div>
                        </div>

                        <br>

                         <div class="mb-4">
                  <div class="login-input">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                   <?= $form->field($councilStudent, 'verifycode')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className())->label(false) ?>
                  </div>
                </div>   

                      
                    </div>


                    
                   
                  
                   <?= Html::submitButton(Yii::t('app', 'Submit'),  ['class' => 'common-btn w-100 btn-success']) ?>
                    
                              
                  </div>
                  <?php ActiveForm::end(); ?>  

                </div>
              </div>
            </div>
          </div>
  
<script type="text/javascript">
  $("#cust_btn").on("click", function () {
    // alert("hello");
    $('.modal-content').hide();
   location.reload();
   // $(this).parent().fadeOut();
   ///event.preventDefault();
});
</script>
        <!-- modalllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll ends -->
