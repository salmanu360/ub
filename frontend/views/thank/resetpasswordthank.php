<?php
/* @var $this yii\web\View */
use buttflattery\formwizard\FormWizard;
use yii\jui\DatePicker;
use yii\helpers\Url;
use common\models\Country;
use borales\extensions\phoneInput\PhoneInput;
use kartik\select2\Select2;

$this->title = 'Recruiter';
?> 
<section class="banner-menu">
  <div class="bg-video-wrap">
    <img src="images/login-bg.jpg" alt="banner-img" class="desktop-view-only w-100">
    <img src="images/mob-login-bg.jpg" alt="banner-img" class="mob-view-only w-100">
    <div class="container banner-caption login-caption">
      <div class="banner-text mb-3">
        <h2>Password Reset</h2>
        <!-- <p>If already registered then login now</p> -->
      </div>
      <a href="<?=Yii::$app->homeUrl?>" class="banner-btn">Home</a>
    </div>
  </div>
</section>
<section class="login-body">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="login-form thankyou-page">
          <div class="text-center">
            <h3>Your password has been successfully changed</h3>
            <hr class="line-hr">            
          </div>
          <div class="text-center">
            
            <a href="<?=URL::to('site/login')?>" class="banner-btn">Login Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= frontend\components\CounterArchiveWidget::widget(); ?>