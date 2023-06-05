<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
use borales\extensions\phoneInput\PhoneInput;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="banner-menu">
  <div class="bg-video-wrap">
    <img src="images/login-bg.jpg" alt="banner-img" class="desktop-view-only w-100">
    <img src="images/mob-login-bg.jpg" alt="banner-img" class="mob-view-only w-100">
    <div class="container banner-caption login-caption">
      <div class="banner-text mb-3">
        <h2>Student Registration</h2>
        <p>If already registered then login now</p>
      </div>
      <a href="<?=URL::to('site/login')?>" class="banner-btn">Login Now</a>
    </div>
  </div>
</section>
   
<section class="login-body">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5">
        <div class="login-form">
          <div class="text-center mb-5">
              <h3>Student Registration</h3>
              <hr class="line-hr mb-5">
          </div> 
          <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <!-- <h4 class="mt-5">Sign up with</h4> -->
            <!-- <hr> -->
            <!-- <div class="login-with-icon text-center mb-4">
                <a href="#" class="fb-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="google-icon"><i class="fab fa-google"></i></a>
            </div>  -->
            <h4>Sign up with your email</h4>
            <hr>
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong><i class="fa fa-check-circle" aria-hidden="true"></i></i></strong> <?= Yii::$app->session->getFlash('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="mb-4">
                <div class="login-input">
                    <i class="fas fa-user"></i>
                    <?= $form->field($model, 'first_name')->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('first_name')])->label(false) ?>
                </div>
            </div>

            <div class="mb-4">
                <div class="login-input">
                    <i class="fas fa-user"></i>
                    <?= $form->field($model, 'last_name')->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('last_name')])->label(false) ?>
                </div>
            </div>

            <div class="mb-4">
                <div class="login-input">
                    <i class="fas fa-user"></i>
                    <?= $form->field($model, 'mobile')->widget(PhoneInput::classname(), [
                'options' => ['placeholder' => 'Enter Phone No...']                        
            ])->label(false);?>
                </div>
            </div>

            <div class="mb-4">
                <div class="login-input">
                    <i class="fas fa-envelope"></i>
                    <?= $form->field($model, 'email')->textInput(['placeholder' =>'email'])->label(false) ?>
                </div>
            </div>

            <div class="mb-4">
                <div class="login-input">
                    <i class="fas fa-lock"></i>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' =>'Password'])->label(false) ?>
                </div>
            </div>

            <div class="mb-4">
                <div class="login-input">
                    <i class="fas fa-lock"></i>
                    <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder' =>'Confirm Password'])->label(false) ?>
                </div>
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="checkif">
                    <label class="form-check-label" for="checkif">
                    I have read and agree to the <a href="<?=URL::to('page/privacy-and-cookies-policy')?>">Terms and Conditions</a> and the <a href="<?=URL::to('page/privacy-and-cookies-policy')?>">Privacy and Cookies Policy*.</a>
                    </label>
                </div>
            </div>

            <div class="mb-4">
              <div class="login-input">
                <i class="fa fa-refresh" aria-hidden="true"></i>
              <?= $form->field($model, 'verifycode')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className())->label(false) ?>
              </div>
            </div>   

            <div class="mb-4">
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'common-btn w-100', 'name' => 'signup-button']) ?>
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
<?= \frontend\components\CounterArchiveWidget::widget(); ?>