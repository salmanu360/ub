<?php
  use yii\helpers\Url;
  $this->title = ucfirst(Yii::$app->controller->action->id);
?>
   <section class="banner-menu">
      <div class="bg-video-wrap">
        <img src="images/login-bg.jpg" alt="banner-img" class="desktop-view-only w-100">
        <img src="images/mob-login-bg.jpg" alt="banner-img" class="mob-view-only w-100">
        <div class="container banner-caption login-caption">
          <div class="banner-text mb-3">
            <h2>Register Today</h2>
            <p>Register today to find out how we can support you.</p>
          </div>
          <a href="<?=Url::to('site/login')?>" class="banner-btn">Register as Students</a> 
          <a href="<?=Url::to('recruiter')?>" class="banner-btn">Register as Recruitment Partner</a>
        </div>
      </div>
    </section>

   
    <section class="login-body">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center"> 
            <h2 class="common-heading">Register today to find out how <br><span>we can support you.</span></h2>
            <div class="row lets-started-row">
              <div class="col-md-4">
                <div class="register-boxes">
                  <a href="<?=Url::to(['/site/signup'])?>">
                    <i class="fas fa-user-graduate"></i>
                    <label>Register as Students</label>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="register-boxes">
                  <a href="<?=Url::to('recruiter')?>">
                    <i class="fas fa-user-tie"></i>
                    <label>Register as Recruiter</label>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="register-boxes">
                  <a href="<?=Url::to('service/institutions')?>">
                    <i class="fas fa-university"></i>
                    <label>School Partners Inquiry</label>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="call-to-action-blue">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <p><strong>Already a Registered User?</strong></p>
          </div>
          <div class="col-md-4 text-end">
            <a href="<?=Url::to('site/login')?>" class="call-to-action-btn">Login Now</a>
          </div>
        </div>
      </div>
    </section>


     <section class="counter-achive">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="row">
              <li class="col">
                <i class="fas fa-university"></i>
                <label>250 +</label>
                <span>Institution Partners</span>
              </li>
              <li class="col">
                <i class="fas fa-user-tie"></i>
                <label>500 +</label>
                <span>Recruitment Partners</span>
              </li>
              <li class="col">
                <i class="fas fa-globe-asia"></i>
                <label>10 +</label>
                <span>Countries</span>
              </li>
              <li class="col">
                <i class="fas fa-users"></i>
                <label>150 +</label>
                <span>Team Members</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>