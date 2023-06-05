<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="banner-menu">
      <div class="bg-video-wrap">
        <img src="images/login-bg.jpg" alt="banner-img" class="desktop-view-only w-100">
        <img src="images/mob-login-bg.jpg" alt="banner-img" class="mob-view-only w-100">
        <div class="container banner-caption login-caption banner-caption-custom">
          <div class="banner-text mb-3">
            <h2>Contact Us</h2>
            <p>We’re here to help. Don’t hesitate to get in touch with our expert support <br>team who can help answer all of your questions.</p>
          </div>
        </div>
      </div>
    </section>
     <p>
          <?php if (Yii::$app->session->hasFlash('success')): ?>
           <div class="alert alert-success">
               <?php echo "here";die;?>
              <?= Yii::$app->session->getFlash('success') ?>
           </div>
            <?php endif; ?>
            
    <?php
                    $st = Yii::$app->session->getFlash('success');
                   // echo '<pre>';print_r($st);die;
                    if(!empty($st)) { ?>
                        <div class="alert alert-success">
                            <p >  <?=  $st[0]; ?></p>
                        </div>                     
                    <?php } ?>
    <section class="login-body">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-5">
            <div class="login-form">
                <div class="text-center mb-5">
                    <h3>Feel Free to Contact Us</h3>
                    <hr class="line-hr mb-5">
                </div>
                <?php $form = ActiveForm::begin(
                    [
                        'id' => 'contactform',
                        'options' => [
                            'class' => 'contact-form'
                        ]
                    ]
                ); ?>
                <div class="mb-4 mt-5">
                    <div class="login-input">                         
                        <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Name'])->label(false) ?>
                    </div>
                </div>
                <div class="mb-4">
                  <div class="login-input">
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>
                  </div>
                </div> 
                <div class="mb-4">
                  <div class="login-input">
                    <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Contact Number'])->label(false) ?>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="login-input">
                    <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Subject'])->label(false) ?>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="login-input">
                    <?= $form->field($model, 'body')->textarea(['placeholder' => 'Message', 'rows' => 2])->label(false) ?>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="login-input">
                   <?= $form->field($model, 'verifyCode')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className()) ?>
                  </div>
                </div>                
                <div class="mb-4">
                    <?= Html::submitButton('Submit', ['class' => 'common-btn w-100', 'name' => 'contact-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
          </div>
          <div class="col-md-7 text-center"> 
            <h2 class="common-heading">Contact <span>Details</span></h2>
            <div class="row lets-started-row">
              <div class="col-md-12 m-auto mb-3">
                <div class="register-boxes">
                  <a href="mailto:help@universitybureau.com">
                    <i class="fas fa-envelope"></i>
                    <label>support@universitybureau.com</label>
                  </a>
                </div>
              </div>
              <div class="col-md-12 m-auto">
                <div class="register-boxes">
                  <a href="tel:+91-9355500042">
                    <i class="fas fa-phone-square-alt"></i>
                    <label>93-555-000-42</label>
                  </a>
                </div>
              </div>
              <div class="col-md-12 mt-4">
                <div class="register-boxes">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3302.054976400357!2d-117.4607410848519!3d34.14493558058083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c34953007cc255%3A0xd0001948fe248f37!2s6000%20Big%20Pine%20Dr%2C%20Fontana%2C%20CA%2092336%2C%20USA!5e0!3m2!1sen!2sin!4v1646450413754!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
<!-- <section class="login-panel mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-contact">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
                    </p>

                    <div class="row">
                        <div class="col-lg-5">
                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                                <?= $form->field($model, 'email') ?>

                                <?= $form->field($model, 'subject') ?>

                                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                ]) ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                                </div>

                            <?php ActiveForm::end(); ?>
                        </div> 
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>   -->   
