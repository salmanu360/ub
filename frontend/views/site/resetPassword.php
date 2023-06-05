<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="banner-menu">
      <div class="bg-video-wrap">
        <img src="images/login-bg.jpg" alt="banner-img" class="desktop-view-only w-100">
        <img src="images/mob-login-bg.jpg" alt="banner-img" class="mob-view-only w-100">
        <div class="container banner-caption login-caption">
          <div class="banner-text mb-3">
            <h2>Login to Explore More</h2>
            <p>Not registered yet? Register now as</p>
          </div>
          <a href="<?=URL::to('site/signup')?>" class="banner-btn">Register as Students</a> 
          <a href="<?=URL::to('recruiter')?>" class="banner-btn">Register as Recruitment Partner</a>
        </div>
      </div>
    </section>

   
    <section class="login-body">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-5">
            <div class="login-form">
              <div class="text-center mb-5">
                <h3>Request password reset</h3>
                <hr class="line-hr mb-5">
              </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <!-- <h1 class="text-center"><?= Html::encode($this->title) ?></h1> -->
                   <!--  <h4 class="mt-5">Login With</h4>
                    <hr>
                    <div class="login-with-icon text-center mb-4">
                        <a href="#" class="fb-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="google-icon"><i class="fab fa-google"></i></a>
                    </div> -->
                    <h4>Please choose your new password</h4>
                    <hr>
                    <div class="mb-4 mt-5">
                        <div class="login-input">
                           <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                        </div>
                    </div>
                    <div class="mb-4 mt-5">
                        <div class="login-input">
                           <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder' =>'Confirm Password']) ?>
                        </div>
                    </div>

                    
                    <div class="mb-4">
                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'common-btn w-100', 'name' => 'login-button']) ?>
                        </div>                         
                    </div>
                <?php ActiveForm::end(); ?>               
            </div>
          </div>
          <div class="col-md-7 text-center"> 
            <h2 class="common-heading">Not registered yet? <br><span>Register Now</span></h2>
            <div class="row lets-started-row">
              <div class="col-md-6 m-auto">
                <div class="register-boxes">
                  <a href="<?=URL::to('site/signup')?>">
                    <i class="fas fa-user-graduate"></i>
                    <label>Register as Students</label>
                  </a>
                </div>
              </div>
              <div class="col-md-6 m-auto">
                <div class="register-boxes">
                  <a href="<?=URL::to('recruiter')?>">
                    <i class="fas fa-user-tie"></i>
                    <label>Register as Recruiter</label>
                  </a>
                </div>
              </div>
            </div>
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