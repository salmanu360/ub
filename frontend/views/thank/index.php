<?php
/* @var $this yii\web\View */
use buttflattery\formwizard\FormWizard;
use yii\jui\DatePicker;
use yii\helpers\Url;
use common\models\Country;
use borales\extensions\phoneInput\PhoneInput;
use kartik\select2\Select2;

$this->title = 'Institution';
?> 
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
<section class="login-body">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="login-form thankyou-page">
              <div class="text-center">
                <h3>Thank you for filling out our sign-up form. We are glad that you joined us.</h3>
                <br>
                <p class="text-white">You will receive your verification link on your registered E–mail Id.  One of our colleagues will get back in touch with you soon!</p>
                <br>
                <br>
                <p class="text-white">Have a great day!</p>
                <p class="text-white">Team University Bureau</p>
                <hr class="line-hr">            
              </div>
              <div class="text-center">
                <a href="/" class="banner-btn">Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?= frontend\components\CounterArchiveWidget::widget(); ?>