<?php

use common\models\Student;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\StudentCollegeApplied;
use common\models\School;
use common\models\Recruiters;


$count_school = School::find()->count();


$user_id = Yii::$app->user->identity->id;
$recruiter = Recruiters::findOne(['user_id' => $user_id]);
$count_application = StudentCollegeApplied::find()->where(['recruiter_id'=>$recruiter->id])->count();

$this->title = 'Dashboard';
?>

  

<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">
  <div class="row">
    <?php if($_SERVER['REMOTE_ADDR'] == '49.36.218.200' || $_SERVER['REMOTE_ADDR'] == '116.73.36.117'): ?>
   <?php endif; ?>
     <!-- <a  href="<?=Url::to(['/recruiter/mou'])?>">Please sign MOU to proceed further</a> -->
     
         <section class="study-destinaton-section pt-0 pb-0 mb-5" style="border-radius: 20px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;margin: 0;">
            <div class="container">
                <div class="row">
                    <div class="studydes_main" style="padding:1rem;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="studydes-container owl-carousel">
                            <div class="item">
                              <a href="/recruiter/programs-colleges/view?id=33">
                                  <div class="studydes-card">
                                      <img src="images/dash-university-canada-west.png" alt="">
                                      <h6><b>University Canada West</b></h6>
                                  </div>
                              </a>
                            </div>    
                            <div class="item">
                              <a href="/recruiter/programs-colleges/view?id=753">
                                  <div class="studydes-card">
                                      <img src="images/dash-nipissing-university.png" alt="">
                                      <h6><b>Nipissing University</b></h6>
                                  </div>
                              </a>
                            </div>
                            <div class="item">
                              <a href="/recruiter/programs-colleges/view?id=749">
                                  <div class="studydes-card">
                                      <img src="images/dash-crandall-university.png" alt="">
                                      <h6><b>Crandall University</b></h6>
                                  </div>
                              </a>
                            </div>
                            <div class="item">
                              <a href="/recruiter/programs-colleges/view?id=697">
                                  <div class="studydes-card">
                                      <img src="images/dash-toronto-school-of-management.png" alt="">
                                      <h6><b>Toronto School of Management</b></h6>
                                  </div>
                              </a>
                            </div>
                            <div class="item">
                              <a href="/recruiter/programs-colleges/view?id=320">
                                  <div class="studydes-card">
                                      <img src="images/dash-granville-college.png" alt="">
                                      <h6><b>Granville College</b></h6>
                                  </div>
                              </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     
      <!--<div class="col-md-12 mb-5">-->
      <!--              <div class="border">-->
      <!--                <div class="row align-items-center">-->
      <!--                  <div class="col-md-4">-->
      <!--                    <div class="kyc-mou-title flex-fill ps-4 pe-5 pt-3 pb-3 bg-warning h-100">-->
      <!--                      <h4 class="m-0 fw-bold text-white ading"><small>KYC Under Review</small></h4>-->
      <!--                    </div>-->
      <!--                  </div>-->
      <!--                  <div class="col-md-8">-->
      <!--                    <div class="ps-4 pe-4 pt-3 pb-3">-->
      <!--                      <p class="m-0">It takes 10-15 working days for KYC to get processed and registered with the KRA. You can check your KYC status here.</p>-->
      <!--                    </div>-->
      <!--                  </div>-->
      <!--                </div>-->
      <!--              </div>-->
      <!--            </div>-->
      <!--            <div class="col-md-12 mb-5">-->
      <!--              <div class="border">-->
      <!--                <div class="row align-items-center">-->
      <!--                  <div class="col-md-4">-->
      <!--                    <div class="kyc-mou-title flex-fill ps-4 pe-5 pt-3 pb-3 bg-success h-100">-->
      <!--                      <h4 class="m-0 fw-bold text-white ading"><small>MOU Details Pending</small></h4>-->
      <!--                    </div>-->
      <!--                  </div>-->
      <!--                  <div class="col-md-8">-->
      <!--                    <div class="ps-4 pe-4 pt-3 pb-3">-->
      <!--                      <p class="m-0">MOU, is a nonbinding agreement that states each party's intentions to take action.</p>-->
      <!--                    </div>-->
      <!--                  </div>-->
      <!--                </div>-->
      <!--              </div>-->
      <!--            </div>-->


    <div class="col-md-4">
      <div class="report-tiels">
        <div class="row align-items-center">
          <div class="col-md-4">
            <a href="<?=Url::to(['/recruiter/student-application/index'])?>" class="report-icon blue-circle"><i class="fas fa-file-alt"></i></a>
          </div>

        
          
          <div class="col-md-8">
            <div class="report-text">
              <label class="report-progress"><?=$count_application?></label>
              <a href="<?=Url::to(['/recruiter/student-application/index'])?>" class="report-title">Applications</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--<div class="col-md-4">
      <div class="report-tiels">
        <div class="row align-items-center">
          <div class="col-md-4">
            <a href="<?=Url::to(['/recruiter/programs-colleges/index'])?>" class="report-icon green-circle"><i class="fa fa-building"></i></a>
          </div>
          
          <div class="col-md-8">
            <div class="report-text">
              <label class="report-progress"><?= $count_school ?></label>
              <a href="<?=Url::to(['/recruiter/programs-colleges/index'])?>" class="report-title">Total Colleges</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->  
    
    <div class="col-md-4">
      <div class="report-tiels">
        <div class="row align-items-center">
          <div class="col-md-4">
            <a href="<?= Url::to(['/recruiter/student/index']) ?>" class="report-icon orange-circle"><i class="fas fa-user-graduate"></i></a>
          </div>
          
          <div class="col-md-8">
            <div class="report-text">
              <label class="report-progress"><?php echo Student::getStudentCount(); ?></label>
              <a href="<?= Url::to(['/recruiter/student/index']) ?>" class="report-title">Students</a>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
    
  <!--<div class="row">-->
  <!--  <div class="col-sm-12">-->
  <!--    <div class="dashboard-card upper-card">-->
  <!--      <div class="right-sidebar">-->
  <!--        <h4 class="common-dashboard-heading">Your Account Managers</h4>-->
  <!--        <div class="row align-items-center">-->
  <!--          <div class="col-md-6 right-border tab-w-100">-->
  <!--            <div class="row">-->
  <!--              <div class="col-md-3 avtar">-->
  <!--                <img src="images/kalrav_pic.jpg" class="account-manager">-->
  <!--              </div>-->
  <!--              <div class="col-md-9 avtar-content">-->
  <!--                <div class="account-manager-text">-->
  <!--                  <label class="account-manager-name">Kalrav Sarojwal (Business Development Manager)</label>-->
  <!--                  <a href="mail:sarojwal.kalrav@universitybureau.com" class="email-text">-->
  <!--                    <i class="fas fa-envelope" aria-hidden="true"></i> <b>sarojwal.kalrav@universitybureau.com</b>-->
  <!--                  </a>-->
  <!--                  <a href="tel:+919355500042" class="mobile-number">-->
  <!--                    <i class="fas fa-mobile" aria-hidden="true"></i> +919355500042-->
  <!--                  </a>-->
  <!--                </div>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->
            
  <!--          <div class="col-md-6 tab-w-100">-->
  <!--            <div class="row">-->
  <!--              <div class="col-md-3 avtar">-->
  <!--                <img src="images/sukhpreet_singh.jpg" class="account-manager">-->
  <!--              </div>-->
  <!--              <div class="col-md-9 avtar-content">-->
  <!--                <div class="account-manager-text">-->
  <!--                  <label class="account-manager-name">Sukhpreet Singh (Business Development Manager)</label>-->
  <!--                  <a href="mail:singh.sukhpreet@universitybureau.com" class="email-text">-->
  <!--                    <i class="fas fa-envelope" aria-hidden="true"></i> <b>singh.sukhpreet@universitybureau.com</b>-->
  <!--                  </a>-->
  <!--                  <a href="tel:+918069009008" class="mobile-number">-->
  <!--                    <i class="fas fa-mobile" aria-hidden="true"></i> +918069009008-->
  <!--                  </a>-->
  <!--                </div>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->

            
  <!--          <div class="col-md-6 right-border tab-w-100">-->
  <!--            <div class="row">-->
  <!--              <div class="col-md-3 avtar">-->
  <!--                <img src="images/rohit.png" class="account-manager">-->
  <!--              </div>-->
  <!--              <div class="col-md-9 avtar-content">-->
  <!--                <div class="account-manager-text">-->
  <!--                  <label class="account-manager-name"> Rohit Kumar Parihar </label>-->
  <!--                  <label class="account-manager-name"> (Business Development Manager)</label>-->
  <!--                  <a href="mail:parihar.rohit@universitybureau.com" class="email-text">-->
  <!--                    <i class="fas fa-envelope" aria-hidden="true"></i> <b>parihar.rohit@universitybureau.com</b>-->
  <!--                  </a>-->
  <!--                  <a href="tel:+918069009008" class="mobile-number">-->
  <!--                    <i class="fas fa-mobile" aria-hidden="true"></i> +919540027687-->
  <!--                  </a>-->
  <!--                </div>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->
          
  <!--        </div>                         -->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->

    
<div class="row">
    <div class="col-md-12">
        <div class="row">
    <div class="col-sm-6 our-team-container">
        <div class="dashboard-card mb-4 other-team">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 p-0" style="display: flex; align-items: center;justify-content: center;">
                        <img src="images/tamanna-girdhar.jpeg" class="account-manager">
                    </div>
                    <div class="col-md-9 p-0">
                        <div class="account-manager-text">
                            <label class="account-manager-name">Tamanna Girdhar ( Universitybureau Head )</label>
                            <a href="mail:singh.sukhpreet@universitybureau.com" class="email-text">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <b>girdhar.tamanna@universitybureau.com</b>
                            </a>
                            <a href="+91-9910595444" class="email-text">
                                <i class="fas fa-phone" aria-hidden="true"></i> <b>+919910595444</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 our-team-container">
        <div class="dashboard-card mb-4 other-team">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 p-0" style="display: flex; align-items: center;justify-content: center;">
                        <img src="images/sukhpreet_singh.jpg" class="account-manager">
                    </div>
                    <div class="col-md-9 p-0">
                        <div class="account-manager-text">
                            <label class="account-manager-name">Sukhpreet Singh ( Operation Head )</label>
                            <a href="mail:singh.sukhpreet@universitybureau.com" class="email-text">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <b>singh.sukhpreet@universitybureau.com</b>
                            </a>
                            <a href="tel:+919350396314" class="mobile-number">
                                <i class="fas fa-phone" aria-hidden="true"></i> +919350396314
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 our-team-container">
        <div class="dashboard-card mb-4 other-team">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 p-0" style="display: flex; align-items: center;justify-content: center;">
                        <img src="images/ankit.jpeg" class="account-manager">
                    </div>
                    <div class="col-md-9 p-0">
                        <div class="account-manager-text">
                            <label class="account-manager-name">Ankit Tiwari ( Regional Manager )</label>
                            <a href="mail:tiwari.ankit@universitybureau.com" class="email-text">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <b>tiwari.ankit@universitybureau.com</b>
                            </a>
                            <a href="tel:+918920695038" class="mobile-number">
                                <i class="fas fa-phone" aria-hidden="true"></i> +918920695038
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 our-team-container">
        <div class="dashboard-card mb-4 other-team">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 p-0" style="display: flex; align-items: center;justify-content: center;">
                        <img src="images/sourabh.jpeg" class="account-manager">
                    </div>
                    <div class="col-md-9 p-0">
                        <div class="account-manager-text">
                            <label class="account-manager-name">Sourabh Singhal ( Regional Manager )</label>
                            <a href="mail:singhal.sourabh@universitybureau.com" class="email-text">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <b>singhal.sourabh@universitybureau.com</b>
                            </a>
                            <a href="tel:+917838394216" class="mobile-number">
                                <i class="fas fa-phone" aria-hidden="true"></i> +917838394216
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 our-team-container">
        <div class="dashboard-card mb-4 other-team">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 p-0" style="display: flex; align-items: center;justify-content: center;">
                        <img src="images/janvi.jpeg" class="account-manager">
                    </div>
                    <div class="col-md-9 p-0">
                        <div class="account-manager-text">
                            <label class="account-manager-name">Janvi ( Portal Head )</label>
                            <a href="mail:khandelwal.janvi@universitybureau.com" class="email-text">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <b>khandelwal.janvi@universitybureau.com</b>
                            </a>
                            <a href="tel:+919355500042" class="mobile-number">
                                <i class="fas fa-phone" aria-hidden="true"></i> +919355500042
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <!--<div class="col-md-12 team-contact-container">-->
            <!--    <div class="row">-->
            <!--        <div class="col-sm-12">-->
            <!--            <div class="dashboard-card mb-5">-->
            <!--            <div class="right-sidebar">-->
                            <!-- Important Links -->
            <!--                <h4 class="common-dashboard-heading">Other Contacts</h4>-->
            <!--                <ul class="common-list">-->
            <!--                <li>-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-2" style="display: flex; align-items: center;justify-content: center;"><img src="images/ankit.jpeg" class="account-manager"></div>-->
            <!--                        <div class="col-md-5" style="font-weight: 600;color: #000;">Ankit Tiwari <br> ( Relationship Manager ) <br> tiwari.ankit@universitybureau.com </div>-->
            <!--                        <div class="col-md-5" style="display: flex; align-items: center;justify-content: end;"><a style="font-size: 18px;font-weight: 600" href="tel:+918920695038"><span>+918920695038</span></a></div>-->
            <!--                    </div>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-2" style="display: flex; align-items: center;justify-content: center;"><img src="images/sourabh.jpeg" class="account-manager"></div>-->
            <!--                        <div class="col-md-5" style="font-weight: 600;color: #000;">Sourabh Singhal <br> ( Relationship Manager ) <br> singhal.sourabh@universitybureau.com </div>-->
            <!--                        <div class="col-md-5" style="display: flex; align-items: center;justify-content: end;"><a style="font-size: 18px;font-weight: 600" href="tel:+917838394216"><span>+917838394216</span></a></div>-->
            <!--                    </div>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-2" style="display: flex; align-items: center;justify-content: center;"><img src="images/sonam.jpeg" class="account-manager"></div>-->
            <!--                        <div class="col-md-5" style="font-weight: 600;color: #000;">Sonam Verma  <br> ( Relationship Manager ) <br> verma.sonam@universitybureau.com </div>-->
            <!--                        <div class="col-md-5" style="display: flex; align-items: center;justify-content: end;"><a style="font-size: 18px;font-weight: 600" href="tel:+919650155709"><span>+919650155709</span></a></div>-->
            <!--                    </div>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-2" style="display: flex; align-items: center;justify-content: center;"><img src="images/seema.jpeg" class="account-manager"></div>-->
            <!--                        <div class="col-md-5" style="font-weight: 600;color: #000;">Seema Nair <br> ( Relationship Manager ) <br> nair.seema@universitybureau.com </div>-->
            <!--                        <div class="col-md-5" style="display: flex; align-items: center;justify-content: end;"><a style="font-size: 18px;font-weight: 600" href="tel:+918590552506"><span>+918590552506</span></a></div>-->
            <!--                    </div>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-2" style="display: flex; align-items: center;justify-content: center;"><img src="images/janvi.jpeg" class="account-manager"></div>-->
            <!--                        <div class="col-md-5" style="font-weight: 600;color: #000;">Janvi <br> ( Portal Head ) <br> khandelwal.janvi@universitybureau.com </div>-->
            <!--                        <div class="col-md-5" style="display: flex; align-items: center;justify-content: end;"><a style="font-size: 18px;font-weight: 600" href="tel:+919355500042"><span>+919355500042</span></a></div>-->
            <!--                    </div>-->
            <!--                </li>-->
            <!--                </ul>                                             -->
            <!--            </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
</div>


    
  </div>
</main>