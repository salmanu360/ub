<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\select2\Select2;
use frontend\components\CounterArchiveWidget;

$this->title = "International  Students Recruitment Services ";
$this->registerMetaTag(['name' => 'description', 'content' =>  "International students recruitment  Services - We help institutions to connect with international students and recruitment partners on our online recruitment platform and choose best students for your institute "]);
$this->registerMetaTag(['name' => 'keywords', 'content' =>  "International students  recruitment services"]);

?>

<!-- attribute ref_no -->
     

<!-- attribute status -->
       

<!-- attribute dest_country -->

<section class="banner-menu mob-inner-height">
    <div class="bg-video-wrap">
    <img src="images/school-banner.jpg" alt="banner-img" class="desktop-view-only w-100">
    <img src="images/mob-school-banner.jpg" alt="banner-img" class="mob-view-only w-100">
    <div class="container banner-caption mob-inner-caption">
        <div class="banner-text mb-3">
        <h1 class="cooper">Get Global reach and diversity</h1>
        <h2>Reach over 100,000+ students and</h2>
        <p>5000+ Recruitment Partners</p>
        </div>
        <a href="service/institutions#start_with_us" class="banner-btn">Start With Us</a>
    </div>
    </div>
</section>

<section class="about-ub connect-top mt-5 mb-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-center mb-3">
        <h2 class="common-heading">Intensify <br><span>your Recruitment Process</span></h2>
        <p>Come and get connected with qualified students and recruiters from a single, easy-to-use platform trusted by more than 1500+ Institutions worldwide. We train our recruitment partners through an industry specialist to ensure that they’re ready to promote your institution.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-3 tab-col-6">
        <div class="top-school-boxes">
            <i class="fas fa-hands-helping"></i>
            <h4>100,000+</h4>
            <label>Students Helped</label>
        </div>
        </div>
        <div class="col-md-3 mb-3 tab-col-6">
        <div class="top-school-boxes">
            <i class="fas fa-globe-asia"></i>
            <h4>100+</h4>
            <label>Student Source Countries</label>
        </div>
        </div>
        <div class="col-md-3 mb-3 tab-col-6">
        <div class="top-school-boxes">
            <i class="fas fa-file-invoice-dollar"></i>
            <h4>90+</h4>
            <label>Admission Rate</label>
        </div>
        </div>
        <div class="col-md-3 mb-3 tab-col-6">
        <div class="top-school-boxes">
            <i class="fas fa-users"></i>
            <h4>150+</h4>
            <label>Team Members</label>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="maximise-commission mb-5 mt-5">
    <img src="images/school-app-bg.jpg" class="desktop-view-only w-100" alt="maximise- commission">
    <img src="images/mob-school-app-bg.jpg" class="mob-view-only w-100 height-450" alt="mob-video-home">
    <div class="maximise-commission-text custom-bottom-tab">
    <div class="container">
        <div class="row">
        <div class="col-md-12 text-center">
            <h1>Expanding Your International Reach with Us <br><span>Get the best students from around the world and diversify your student cohort.</span></h1>
            <p>Trusted by 1,500+ institutions globally</p>
            <a href="#" class="maximise-btn"><span>Start With Us</span></a>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="about-ub exploring mt-5 mb-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-center mb-3"> 
        <h2 class="common-heading">Internationally Recognised and <span>Trusted Institutions Globally</span></h2>
        <p>Our team of experts understands your unique challenges and makes you stand out from the rest- by working with you at every step of the way. <br>We assure you to deliver the quality and compliance checks in the industry.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 tab-col-6 mb-3">
        <div class="top-countries-boxes">
            <div class="top-con-img">
            <img src="images/canada.jpg" class="w-100">
            </div>
            <div class="top-con-text">
            <label>Canada</label>
            </div>
        </div>
        </div>
        <div class="col-md-3 tab-col-6 mb-3">
        <div class="top-countries-boxes">
            <div class="top-con-img">
            <img src="images/us-flag.jpg" class="w-100">
            </div>
            <div class="top-con-text">
            <label>United States</label>
            </div>
        </div>
        </div>
        <div class="col-md-3 tab-col-6 mb-3">
        <div class="top-countries-boxes">
            <div class="top-con-img">
            <img src="images/uk-flag.jpg" class="w-100">
            </div>
            <div class="top-con-text">
            <label>United Kingdom</label>
            </div>
        </div>
        </div>
        <div class="col-md-3 tab-col-6 mb-3">
        <div class="top-countries-boxes">
            <div class="top-con-img">
            <img src="images/aus-flag.jpg" class="w-100">
            </div>
            <div class="top-con-text">
            <label>Australia</label>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>


<section class="school-benefits mt-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
        <h1>Join us and use Easy-to-Use <br><span>Recruitment Platform to Deliver Quality Applications</span></h1>
        <p>We provide you with skilled people and leading technology, to get the most accurate processing systems in international education.</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3 tab-col-6 mb-3">
        <div class="school-benefits-box">
            <i class="fas fa-headset"></i>
            <label>Local Support</label>
        </div>
        </div>
        <div class="col-md-3 tab-col-6 mb-3">
        <div class="school-benefits-box">
            <i class="fas fa-graduation-cap"></i>
            <label>Industry Education</label>
        </div>
        </div>
        <div class="col-md-3 tab-col-6 mb-3">
        <div class="school-benefits-box">
            <i class="fas fa-calendar-alt"></i>
            <label>Events and Webinars</label>
        </div>
        </div>
        <div class="col-md-3 tab-col-6 mb-3">
        <div class="school-benefits-box">
            <i class="fas fa-chart-bar"></i>
            <label>Data and Insights</label>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="partnership-request-form" id="start_with_us" tabindex="-1">
    <div class="container">
        <div class="row lets-started-row">
            <div class="col-md-12 text-center mb-3">  
                <h2 class="common-heading">Work with us <br><span>Partnership Request</span></h2>
                <p>Complete the given form to become our partner and our Partnership Relation Team will get in touch with you.</p>
            </div>
        </div>
        <?php if(!empty(Yii::$app->session->getFlash('success')[0])):?>
                    <div class="alert alert-success" role="alert">
                        <?=  Yii::$app->session->getFlash('success')[0]; ?> 
                    </div>
        <?php endif; ?>

      <div class="row lets-started-row">
     
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
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'cont_email')->textInput(['maxlength' => true])->label('Contact Email') ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'cont_title')->textInput(['maxlength' => true])->label('Contact Title') ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true])->label('Phone Number') ?>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <?= $form->field($model, 'comment')->textarea(['rows' => 6])->label('Any additional comments:') ?>
                </div>
            </div>

             <p>&nbsp;</p>



            <?= $form->field($model, 'agree')->checkbox()->label(' I agree to receive other communications from universitybureau. '); ?> 
            <p>&nbsp;</p>

                   <?= $form->field($model, 'verifycode')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className())->label(false)?>
                    <p>&nbsp;</p>
                 


            <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                ($model->isNewRecord ? 'Send Request' : 'Save'),
                [
                'id' => 'save-' . $model->formName(),
                'class' => 'btn btn-success'
                ]
                );
            ?>
            <p>&nbsp;</p>

            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <p>University Bureau is committed to protecting and respecting your privacy. We will only use your personal information to administer your account and as per your request, we will provide you with the products and services. To get more information about services we offer please tick below.</p>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div> 
    </div>
</section>
<?= CounterArchiveWidget::widget(); ?> 

<script>
 $(function(){
     var scrollDiv = document.getElementById("start_with_us").offsetTop;
     window.scrollTo({ top: scrollDiv, behavior: 'smooth'});
 }) ;   


</script>