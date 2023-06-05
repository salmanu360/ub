<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use cinghie\cookieconsent\widgets\CookieWidget;
use kartik\widgets\TypeaheadBasic;
use yii\jui\Autocomplete;
use yii\helpers\ArrayHelper;
use common\models\User;
use thtmorais\pace\Pace;
use common\models\Recruiters;

AppAsset::register($this); 
if (Yii::$app->user->isGuest){
return Yii::$app->getResponse()->redirect(array(Url::to(['site/login'],302)));
}

if(empty(Yii::$app->user->identity->recruiter->id)){
return Yii::$app->getResponse()->redirect(array(Url::to(['site/login'],302)));
}
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php Html::csrfMetaTags() ?>
    <base href="<?= Url::home(true) ?>" />
    <!-- Multi Image Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />    
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">

    <title> <?= Html::encode($this->title) .' - '. Yii::$app->name ?> </title>
    <?php $this->head() ?>
    <?php echo Pace::widget([
        'color'=>'red',
        'theme'=>'center-radar',
        'options'=>[]
      ]); ?>
  </head>
  <body>
  <?php $this->beginBody() ?>
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow dashboard-top-menu">
      <a class="offset-md-2 col-md-2 mr-0 dashboard-bar" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <i class="fas fa-bars ms-4"></i>
      </a>
        <ul class="navbar-nav top-dashboard-menu px-3 col-md-8 text-end align-items-center">
            <li class="nav-item">
                <a class="nav-link add-student-btn" href="<?=Url::to(['/recruiter/student/create'])?>">Add New Student</a>
            </li>

            <?php $notificationCount=\common\models\Notification::find()->where(['status'=>0,'receiver_id'=>Yii::$app->user->identity->recruiter->id])->count();
             $latestNotifiation=\common\models\Notification::find()
                            //->limit(10)
                            ->where(['status'=>0,'receiver_id'=>Yii::$app->user->identity->recruiter->id])
                            ->orderBy(['id'=>SORT_DESC])
                            ->all();
            ?>
            <li class="nav-item dropstart">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
              <i class="fa fa-bell" style="border:none;"></i><?php echo $notificationCount;?>
              </a>
                <ul class="dropdown-menu">
                   <?php foreach($latestNotifiation as $notificationvalue){
                    $first5words= $notificationvalue->module;
                    $resultFirst5Character = mb_substr($first5words, 0, 5);
                    ?>
                   <li>
                    <?php if($notificationvalue->module =='Recruiter comment'){?>
                    <a class="dropdown-item" href="<?= Url::to(['/recruiter/recruiter-comment/view?id='.$notificationvalue->created_by_id]) ?>">
                    <?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?>
                    </a>
                     <?php }else if($notificationvalue->module =='Comment'){?>
                        <a class="dropdown-item" href="<?= Url::to(['/recruiter/recruiter-student-comment/view?id='.$notificationvalue->created_by_id]) ?>">
                        <?php $show=$notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?>
                    </a>
                     <?php }else if($resultFirst5Character =='Leads'){?>
                        <a class="dropdown-item" href="<?= Url::to(['/recruiter/student/index']) ?>">
                        <?php $show=$notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?>
                    </a>
                     <?php }?>

                </li>
                   <?php }?>
                   <li><a href="<?php echo Url::to(['/recruiter/recruiter-comment/notificationseen'])?>" class="btn btn-success btn-sm">Mark all is seen</a></li>
                  
                </ul>
            </li> 


           <!--  <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="javascript:void(0)"><i class="fas fa-bell"></i></a>
            </li> -->

            <li class="nav-item dropstart">
              <?php if(!Yii::$app->user->isGuest):                 
                $user_id = Yii::$app->user->identity->id;
                $user = Recruiters::find()->where(['user_id'=>$user_id])->one();                
              ?>
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                <?php
                if(!empty(User::get_profile_pic())){
                  echo '<img src="'.Yii::getAlias('@web/uploads/profile/').User::get_profile_pic().'" class="account-manager" style="width:30px">';
                } else {
                  echo '<i class="fas fa-user"></i>';
                }  
                ?>
                Hello ! <?=$user->owner_first_name.' '.$user->owner_last_name?>
              </a>
              <?php endif; ?>                 
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= Url::to(['/recruiter/profile']) ?>"><i class="fas fa-user"></i> My Profile</a></li>
                  <li><a class="dropdown-item" href="<?= Url::to(['/recruiter/settings']) ?>"><i class="fas fa-cog"></i> Account Settings</a></li>
                  <li>
                    <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline']); ?>
                    <?= Html::submitButton('<i class="fas fa-sign-out-alt"></i> Logout', ['class' => 'dropdown-item']); ?>
                    <?= Html::endForm(); ?>
                  </li>
                </ul>
            </li>            
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light d-none d-md-block sidebar dashboard-main-menu">
                <div class="left-sidebar">
                    <a class="navbar-brand" href="javascript:void(0)">
                      <img src="images/logo.png" class="big-logo" alt="Logo">
                      <img src="images/apple-touch-icon.png" class="small-cion-logo" alt="Logo">
                    </a>
                    <ul class="nav flex-column sidebar-nav desktop-view">
                        <li class="nav-item">
                            <a class="nav-link <?php if(Yii::$app->controller->id == 'default'){ echo "active"; } ?>" href="<?=Url::to(['/recruiter/dashboard'])?>">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/recruiter/programs-colleges/index'])?>">
                                <i class="fas fa-search"></i> Programs & Colleges
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(Yii::$app->controller->id == 'student'){ echo "active"; } ?>" href="<?=Url::to(['student/index'])?>">
                                <i class="fas fa-user-graduate"></i> Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/recruiter/student-application/index'])?>">
                                <i class="fas fa-list"></i> Applications
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link <?php //if(Yii::$app->controller->action->id == 'courseindex' || Yii::$app->controller->action->id == 'createcourse' || Yii::$app->controller->action->id == 'updatecourse'){ echo "active"; } ?>" href="<?//=Url::to(['/recruiter/student/courseindex'])?>">
                                <i class="fas fa-list"></i> Add New Course
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link <?php if(Yii::$app->controller->id == 'recruiter-comment'){ echo "active"; } ?>" href="<?=Url::to(['/recruiter/recruiter-comment/index'])?>">
                                <i class="fas fa-list"></i> Admin Comment
                            </a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/recruiter/programs-colleges/coursesearch'])?>">
                                <i class="fas fa-dollar-sign"></i> Course Search
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/recruiter/payment-history/index'])?>">
                                <i class="fas fa-dollar-sign"></i> Payments
                            </a>
                        </li>
                    </ul>

                    <ul class="nav flex-column sidebar-nav tab-view">
                        <li class="nav-item">
                            <a class="nav-link <?php if(Yii::$app->controller->id == 'default'){ echo "active"; } ?>" href="<?=Url::to(['/recruiter/dashboard'])?>">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/recruiter/programs-colleges/index'])?>">
                                <i class="fas fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(Yii::$app->controller->id == 'student'){ echo "active"; } ?>" href="<?=Url::to(['student/index'])?>">
                                <i class="fas fa-user-graduate"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/recruiter/student-application/index'])?>">
                                <i class="fas fa-list"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">
                                <i class="fas fa-dollar-sign"></i>
                            </a>
                        </li>
                    </ul>
        



                <div class="left-sidebar-footer">
                  <ul class="nav inline-list side-icon">
                    <li class="nav-item">
                      <h4 class="common-dashboard-heading">Helpdesk Support</h4>
                    </li>
                    <li class="nav-item">
                      <a href="tel:<?=Yii::$app->params["setting"]["phone"]?>"><i class="fa fa-phone" aria-hidden="true"></i>  <?=Yii::$app->params["setting"]["phone"]?></a>
                    </li>
                    <li class="nav-item"><a href="mailto:<?=Yii::$app->params["setting"]["email"]?>"><i class="fa fa-envelope"></i> <?=Yii::$app->params["setting"]["email"]?></a></li>
                  </ul>
                  
                  <ul class="nav flex-column sidebar-nav social-icons side-icon">
                    <li><a href="https://www.facebook.com/universitybureau"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/universitybure1 "><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/universitybureau"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="https://www.instagram.com/universitybureau/"><i class="fab fa-instagram"></i></a></li>
                  </ul>
                </div>

              </div>
            </div>        
            <!-- views -->
            <?php echo $content ?>
        </div>
    </div>


           <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
              <div class="offcanvas-header justify-content-end">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body tab-view">
                  <div class="left-sidebar">
                    <a class="navbar-brand" href="#">
                      <img src="images/logo.png" class="big-logo" alt="Logo">
                      <img src="images/apple-touch-icon.png" class="small-cion-logo" alt="Logo">
                    </a>
                    <ul class="nav flex-column sidebar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php if(Yii::$app->controller->id == 'default'){ echo "active"; } ?>" href="<?=Url::to(['/recruiter/dashboard'])?>">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/recruiter/programs-colleges/index'])?>">
                                <i class="fas fa-search"></i> Programs & Colleges
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(Yii::$app->controller->id == 'student'){ echo "active"; } ?>" href="<?=Url::to(['student/index'])?>">
                                <i class="fas fa-user-graduate"></i> Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/recruiter/student-application/index'])?>">
                                <i class="fas fa-list"></i> Applications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/recruiter/payment-history/index'])?>">
                                <i class="fas fa-dollar-sign"></i> Payments
                            </a>
                        </li>
                    </ul>
                  </div>

                <div class="left-sidebar-footer">
                  <ul class="nav inline-list side-icon h">
                    <li class="nav-item">
                      <h4 class="common-dashboard-heading">Helpdesk Support</h4>
                    </li>
                    <li class="nav-item">
                      <a href="tel:<?=Yii::$app->params["setting"]["phone"]?>"><i class="fa fa-phone" aria-hidden="true"></i>  <?=Yii::$app->params["setting"]["phone"]?></a>
                    </li>
                    <li class="nav-item"><a href="mailto:<?=Yii::$app->params["setting"]["email"]?>"><i class="fa fa-envelope"></i> <?=Yii::$app->params["setting"]["email"]?></a></li>
                  </ul>
                  
                  <ul class="nav flex-column sidebar-nav social-icons side-icon">
                    <li><a href="https://www.facebook.com/universitybureau"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/universitybure1 "><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/universitybureau"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="https://www.instagram.com/universitybureau/"><i class="fab fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>



    <footer class="dashboard-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <ul class="inline-list">           
              <li><a href="/story">Our Story</a></li>
              <li><a href="/carrer">Careers</a></li>
              <li><a href="/leadership">Leadership</a></li>
              <li><a href="/faq">FAQ</a></li>
              <li><a href="site/contact">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-5 text-end">
            <ul class="social-icons">
              <li><a href="https://www.facebook.com/universitybureau "><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://twitter.com/universitybure1 "><i class="fab fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/company/universitybureau"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="https://www.instagram.com/universitybureau/ "><i class="fab fa-instagram"></i></a></li>
              <li><a href="https://www.youtube.com/channel/UCXXDl1FUiEf1C57TwoJylJA"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="copyright mt-0">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <p class="mb-0"><small>Copyright © Universitybureau 2022 | All Rights Reserved</small> </p>
                  </div>
              </div>
          </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
   <!--  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script> -->
    <!-- Multi Image Slider JS -->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
    <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>



<style type="text/css">
  .side-icon a{
    color: #000 !important;
  }
  .side-icon i{
    color: #f0393a;
  }
  .social-icons.side-icon li a{
    border-color: #f0393a !important;
  }

</style>