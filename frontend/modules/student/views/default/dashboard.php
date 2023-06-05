<?php

use common\models\Student;
use yii\helpers\Url;

?>

<div class="row">
    <div class="col-md-4">
    <div class="dashboard-card student-progress mb-5">
        <a href="<?=Url::to(['/student/dashboard'])?>" class="mt-3">
        <i class="fas fa-check-square text-green"></i>
        <label>Check Eligibility</label>
        </a>
        <div class="progress mb-3">
        <div class="progress-bar bg-green" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
        </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="dashboard-card student-progress mb-5">
        <a href="<?=Url::to(['/student/programs-colleges/index'])?>" class="mt-3">
        <i class="fas fa-address-card text-orange"></i>
        <label>Choose a Program</label>
        </a>
        <div class="progress mb-3">
        <div class="progress-bar bg-orange" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
        </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="dashboard-card student-progress mb-5">
        <a href="<?=Url::to(['/student/profile'])?>" class="mt-3">
        <i class="fas fa-id-card-alt text-blue"></i>
        <label>Complete Profile</label>
        </a>
        <div class="progress mb-3">
        <div class="progress-bar bg-blue-bg" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
        </div>
    </div>
    </div>
</div>




 <div class="row">
    <div class="col-sm-12">
      <div class="dashboard-card upper-card">
        <div class="right-sidebar">
          <h4 class="common-dashboard-heading">Your Account Managers</h4>
          <div class="row align-items-center">
            <div class="col-md-6 right-border tab-w-100">
              <div class="row">
                <div class="col-md-3 avtar">
                  <img src="images/abhilasha.jpg" class="account-manager">
                </div>
                <div class="col-md-9 avtar-content">
                  <div class="account-manager-text">
                    <label class="account-manager-name">Abhilasha Upadhyay (Business Development Manager)</label>
                    <a href="mail:sarojwal.kalrav@universitybureau.com" class="email-text">
                      <i class="fas fa-envelope" aria-hidden="true"></i> <b>abhilasha@universitybureau.com</b>
                    </a>
                    <a href="tel:+919355500042" class="mobile-number">
                      <i class="fas fa-mobile" aria-hidden="true"></i> +919355500042
                    </a>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-6 tab-w-100">
              <div class="row">
                <div class="col-md-3 avtar">
                  <img src="images/shifali.jpg" class="account-manager">
                </div>
                <div class="col-md-9 avtar-content">
                  <div class="account-manager-text">
                    <label class="account-manager-name">Shivali Kundal (Business Development Manager)</label>
                    <a href="mail:singh.sukhpreet@universitybureau.com" class="email-text">
                      <i class="fas fa-envelope" aria-hidden="true"></i> <b>shivali.kundal@universitybureau.com</b>
                    </a>
                    <a href="tel:+918069009008" class="mobile-number">
                      <i class="fas fa-mobile" aria-hidden="true"></i> +919355500042
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>                         
        </div>
      </div>
    </div>
  </div>