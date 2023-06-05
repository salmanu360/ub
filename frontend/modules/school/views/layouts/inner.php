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

use common\models\School;

AppAsset::register($this);
$controller = Yii::$app->controller;
$default_controller = Yii::$app->defaultRoute;
$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : false;
            
  $user_id = Yii::$app->user->identity->id;
  $user = School::find()->where(['user_id'=>$user_id])->one();  




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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">

    <title> <?= Html::encode($this->title) .' - '. Yii::$app->name ?> </title>
    <?php $this->head() ?>
  </head>
  <body>
  <?php $this->beginBody() ?>
  <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow dashboard-top-menu">
      <a class="offset-md-2 col-md-2 mr-0 dashboard-bar" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <i class="fas fa-bars ms-4"></i>
      </a>
        <ul class="navbar-nav top-dashboard-menu px-3 col-md-8 text-end align-items-center">
            <li class="nav-item">
                <a class="nav-link add-student-btn desktop-view-only" href="<?=Url::to(['/school/course/create'])?>">Add Program/Course</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
            </li> -->
            <li class="nav-item dropstart">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-user"></i> Hello!  <?= $user->name; ?></a>
                <!-- <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> My Profile</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> s</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul> -->
            </li>
        </ul>
    </nav>

    <div class="container-fluid">

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
                        <!-- <ul class="nav flex-column sidebar-nav desktop-view">
                             <li class="nav-item">
                                <a class="nav-link <?php if(Yii::$app->controller->id == 'default'){ echo "active"; } ?>" href="<?=Url::to(['/school/'])?>">
                                    <i class="fas fa-home"></i> Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="<?=Url::to(['/school/default/info'])?>">
                                    <i class="fas fa-university"></i> School Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="<?=Url::to(['/school/course/index'])?>">
                                    <i class="fas fa-search"></i> Programs
                                </a>
                            </li>
                            <li class="nav-item "><a class="nav-link" href="<?=Url::to(['/school/default/settings'])?>">
                              <i class="fas fa-cog"></i>Account Setting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=Url::to(['/school/course/logout'])?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </li>
                        </ul> -->


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

        <div class="row">
            <!-- Sidebar -->

            <div class="col-md-2 bg-light d-md-block sidebar dashboard-main-menu">
                <div class="left-sidebar">
                   
                    <a class="navbar-brand" href="javascript:void(0)">
                      <img src="images/logo.png" style="width: 169px" class="big-logo" alt="Logo">
                      <img src="images/apple-touch-icon.png" class="small-cion-logo" alt="Logo">
                    </a>
                    <ul class="nav flex-column sidebar-nav desktop-view">
                         <li class="nav-item">
                            <a class="nav-link active" href="<?=Url::to(['/school/'])?>">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/school/default/info'])?>">
                                <i class="fas fa-university"></i> School Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/school/course/index'])?>">
                                <i class="fas fa-search"></i> Programs
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?=Url::to(['/school/default/settings'])?>">
                          <i class="fas fa-cog"></i>Account Setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/school/course/logout'])?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>

                    <ul class="nav flex-column sidebar-nav tab-view">
                         <li class="nav-item">
                            <a class="nav-link active" href="<?=Url::to(['/school/'])?>">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/school/default/info'])?>">
                                <i class="fas fa-university"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/school/course/index'])?>">
                                <i class="fas fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?=Url::to(['/school/default/settings'])?>">
                            <i class="fas fa-cog"></i>
                          </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/school/course/logout'])?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>

                      <div class="left-sidebar-footer desktop-view ">
                        <h4 class="common-dashboard-heading">Helpdesk Support</h4>
                        <ul class="helpsupport-list">
                          <li class="nav-item">
                            <a href="tel:<?=Yii::$app->params["setting"]["phone"]?>"><i class="fa fa-phone" aria-hidden="true"></i>  <?=Yii::$app->params["setting"]["phone"]?></a>
                          </li>
                          <li class="nav-item"><a href="mailto:<?=Yii::$app->params["setting"]["email"]?>"><i class="fa fa-envelope"></i> <?=Yii::$app->params["setting"]["email"]?></a></li>
                        </ul>
                        
                        <ul class="helpsupport-icons mt-3">
                          <li><a href="https://www.facebook.com/universitybureau"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="https://twitter.com/universitybure1 "><i class="fab fa-twitter"></i></a></li>
                          <li><a href="https://www.linkedin.com/company/universitybureau"><i class="fab fa-linkedin-in"></i></a></li>
                          <li><a href="https://www.instagram.com/universitybureau/"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                      </div>
             
                </div>

            </div>
            <!-- views -->
            <main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">
            <?php echo $content ?>
</main>
        </div>
    </div>




    <footer class="dashboard-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <ul class="inline-list">           
              <li><a href="#">Our Story</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Leadership</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-5 text-end">
            <ul class="social-icons">
              <li><a href="https://www.facebook.com/universitybureau"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://twitter.com/universitybure1"><i class="fab fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/company/universitybureau"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="https://www.instagram.com/universitybureau/ "><i class="fab fa-instagram"></i></a></li>
              <li><a href="#"><i class="fab fa-youtube"></i></a></li>
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
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- Multi Image Slider JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
  .left-sidebar-footer .nav-item a li a{
    border-color: #f0393a !important;
  }

</style>