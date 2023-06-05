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
use thtmorais\pace\Pace;
use common\models\User;


AppAsset::register($this);
$controller = Yii::$app->controller;
$default_controller = Yii::$app->defaultRoute;
$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : false;



?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name='verify-v1' content='01887400be7cf71b46fd788648196e67'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if($controller->id == 'search-college'): ?>
    <meta name="robots" content="noindex">
    <?php endif; ?>
    <?php Html::csrfMetaTags() ?>
    <base href="<?= Url::home(true) ?>" />
    <title> <?= Html::encode($this->title) .' - '. Yii::$app->name ?> </title>
    <?php $this->head() ?>
    
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png"> 

<!-- Pixel Code for https://socialproof.universitybureau.com/ -->
<script defer src="https://socialproof.universitybureau.com/pixel/nu4nhw25cqg8oa4jsfba2ucseuxo9lsl"></script>
<!-- END Pixel Code -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-218810195-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-218810195-1');
</script>   
</head>
<body>
<?php $this->beginBody() ?>

<?php
    echo Pace::widget([
      'color'=>'red',
      'theme'=>'minimal',
      'options'=>[]
    ]);
?>
    <header class="main-menu">
      <div class="top-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-start desktop-view-only">
              <ul class="contacts-link">
                <li><a href="tel:<?=Yii::$app->params["setting"]["phone"]?>"><i class="fa fa-phone-alt call-ani"></i> <?=Yii::$app->params["setting"]["phone"]?></a></li>
                 <li><a href="tel: 9355500042"><i class="fa fa-phone-alt call-ani"></i>  93-555-000-42 </a></li>
                <li><a href="mailto:<?=Yii::$app->params["setting"]["email"]?>"><i class="fa fa-envelope call-ani"></i> <?=Yii::$app->params["setting"]["email"]?></a></li>
              </ul>
              <!-- <ul class="social-icons">
                <li><a href="https://www.facebook.com/universitybureau  "><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/universitybure1"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/company/universitybureau"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="https://www.instagram.com/universitybureau/  "><i class="fab fa-instagram"></i></a></li>
              </ul> -->
            </div>
            <div class="col-md-6 text-end">
              <ul class="contacts-link">
                <?php if(Yii::$app->user->isGuest): ?>
                <li><a href="<?= Url::to(['/site/login'])?>" class="top-header-btn"><i class="fas fa-user pe-1"></i>  Login</a></li>
                <li class="ps-1"><a href="<?= Url::to(['/site/register'])?>" class="top-header-btn"><i class="fas fa-user-plus pe-1"></i> Register</a></li>
                <?php else: ?>
                <li>
                  <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline']); ?>
                  <?= Html::submitButton(
                      '<i class="fas fa-user pe-1"></i> Logout (' . Yii::$app->user->identity->username . ')',
                      ['class' => 'top-header-btn']
                  )?>
                  <?= Html::endForm(); ?>
                </li>
                <?php endif; ?>  
                <li class="btn-group">
                  <a href="#" class="top-menu-bar" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight"><i class="fas fa-bars"></i></a>
                  <div class="offcanvas offcanvas-end home-side-menu-container" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header home-side-menu-header">
                      <h5 id="offcanvasRightLabel"></h5>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body home-side-menu-inner">
                      <ul class="dropdown-menu show home-side-menu">
                        <?php if(!Yii::$app->user->isGuest): 
                        $user_type = Yii::$app->user->identity->type;
                        if($user_type == User::TYPE_USER_SCHOOL){
                          $dashboard_url = Url::to(['/school/dashboard']);
                        } elseif ( $user_type == User::TYPE_USER_RECRUITER ) {
                          $dashboard_url = Url::to(['/recruiter/dashboard']); 
                        } elseif ( $user_type == User::TYPE_USER_STUDENT ) {
                          $dashboard_url = Url::to(['/student/dashboard']);
                        } else {
                          $dashboard_url = '#'; 
                        }
                        ?>
                        <li><a class="dropdown-item" href="<?=$dashboard_url?>">Dashboard</a></li>
                        <?php endif; ?>
                        <!--  <li><a class="dropdown-item" href="#">Affiliated</a></li>
                          <li><a class="dropdown-item" href="#">Publisher</a></li>
                          <li><a class="dropdown-item" href="#">Advertiser</a></li> -->

                        <li><a class="dropdown-item" href="<?= Url::to(['/story'])?>">Our Story</a></li>
                        <li><a class="dropdown-item" href="<?= Url::to(['/carrer'])?>">Careers</a></li>
                        <li><a class="dropdown-item" href="<?= Url::to(['/site/contact'])?>">Contact</a></li>
                        <li><a class="dropdown-item" href="<?= Url::to(['/blogs'])?>">Blog</a></li>
                        <li><a class="dropdown-item" href="<?= Url::to(['/about-us'])?>">About Us</a></li>
                        <li>
                          <div class="dropdown study-menu-container">
                            <a class="btn dropdown-toggle dropdown-item" type="button" id="dropdownMenu2" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Study Destination
                            </a>
                            <div class="dropdown-menu study-menu" aria-labelledby="dropdownMenu2">
                              <a class="dropdown-item" href="<?= Url::to(['/country/study-in-canada'])?>">Study In Canada</a>
                              <a class="dropdown-item" href="<?= Url::to(['/country/study-in-australia'])?>">Study In Australia</a>
                              <a class="dropdown-item" href="<?= Url::to(['/country/study-in-switzerland'])?>">Study In Switzerland</a>
                              <a class="dropdown-item" href="<?= Url::to(['/country/study-in-united-kingdom'])?>">Study In United Kingdom</a>
                              <a class="dropdown-item" href="<?= Url::to(['/country/study-in-united-state-of-america'])?>">Study In U.S.A</a>
                              <a class="dropdown-item" href="<?= Url::to(['/country/study-in-ireland'])?>">Study In Ireland</a>
                              <a class="dropdown-item" href="<?= Url::to(['/country/study-in-france'])?>">Study In France</a>
                              <a class="dropdown-item" href="<?= Url::to(['/country/study-in-germany'])?>">Study In Germany</a> 
                              <a class="dropdown-item" href="<?= Url::to(['/country/study-in-latvia'])?>">Study In Latvia</a> 
                              <a class="dropdown-item" href="<?= Url::to(['/country/study-in-europe'])?>">Study In Europe</a> 
                              <!-- <a class="dropdown-item" href="<?= Url::to(['/country/study-in-australia'])?>">Study In Australia</a> -->
                              
                            </div>
                          </div>
                        </li>

                        <li>
                          <div class="helpdesk mt-4">
                            <ul class="contacts-link">
                              <li>
                                <h4>Helpdesk Support</h4>
                              </li>
                              <li><a href="tel:+91-XXXXXXXXXX"><i class="fa fa-phone-alt"></i> 806-900-9000</a></li>
                              <li><a href="mailto:support@universitybureau.com"><i class="fa fa-envelope"></i>
                                  support@universitybureau.com</a></li>
                            </ul>
                            <ul class="social-icons mt-3">
                              <li><a href="https://www.facebook.com/universitybureau"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="https://twitter.com/universitybure1 "><i class="fab fa-twitter"></i></a></li>
                              <li><a href="https://www.linkedin.com/company/universitybureau"><i class="fab fa-linkedin-in"></i></a>
                              </li>
                              <li><a href="https://www.instagram.com/universitybureau/"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="navbar" class="">
        <div class="container">
          <nav class="navbar desktop-menu navbar-expand-lg navbar-light" aria-label="Eleventh navbar example">
            <div class="container-fluid p-0">
              <?= Html::a('<img src="'.Yii::getAlias('@web/images/logo-white.png').'" alt="Logo" class="white-logo">
                <img src="'.Yii::getAlias('@web/images/logo.png').'" alt="Logo" class="sticky-logo">', 
                ['/'],
                ['class' => 'navbar-brand']
              ); ?>
               
               <a href="#" class="navbar-toggler">
                <i class="fas fa-search"></i>
              </a>
              
              <div class="mob-view-only mob-mar-t-10">
                <ul class="navbar-nav ms-auto mb-lg-0 mt-0">
                  <li class="nav-item ">
                    <a class="nav-link <?= ($controller->action->id=='students')?'active':'' ?>" href="<?= Url::to(['/service/students'])?>"><i class="fas fa-user-graduate"></i>Students</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?= ($controller->action->id=='recruiters')?'active':'' ?>"  href="<?= Url::to(['/service/recruiters'])?>"><i class="fas fa-user-tie"></i>Recruiters</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?= ($controller->action->id=='institutions')?'active':'' ?>" href="<?= Url::to(['/service/institutions'])?>"><i class="fas fa-university"></i>Institutions </a>
                  </li>
                </ul>
              </div>

              <div class="collapse navbar-collapse pe-2">
                <ul class="navbar-nav ms-auto mb-lg-0 mt-0">

                 <!--  <li class="nav-item ">
                    <a class="nav-link <?= ($controller->action->controller->id=='search-college')?'active':'' ?>" href="<?= Url::to(['/search-college'])?>"><i class="fas fa-search"></i>Search Colleges</a>
                  </li>
                   -->
                  <li class="nav-item ">
                    <a class="nav-link <?= ($controller->action->id=='students')?'active':'' ?>" href="<?= Url::to(['/service/students'])?>"><i class="fas fa-user-graduate"></i>For Students</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?= ($controller->action->id=='recruiters' || $controller->action->id=='register' )?'active':'' ?>" href="<?= Url::to(['/service/recruiters'])?>"><i class="fas fa-user-tie"></i>For Recruiters</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?= ($controller->action->id=='institutions')?'active':'' ?>" href="<?= Url::to(['/service/institutions'])?>"><i class="fas fa-university"></i>For Institutions </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>

    <!-- views -->
    <?= Alert::widget() ?>
    <?php echo $content ?>

    <footer>
        <div class="container">
            <div class="row">
              <div class="col-md-3">
                    <h5>Important Links</h5>
                    <ul class="footer-list">
                     <!--  <li><a href="#">Publisher</a></li>
                      <li><a href="#">Advertiser</a></li>
                      <li><a href="#">Affiliated</a></li> -->
                      <li><a href="#">Search Program</a></li>
                      <li><a href="<?=URL::to('service/institutions')?>">Search Institutions</a></li>
                      
                      <li><a href="<?=URL::to('about-us')?>">About Us</a></li>
                      <li><a href="<?=URL::to('site/contact')?>">Contact</a></li>
                      <li><a href="<?=URL::to('affiliates')?>">Affiliate</a></li>
                      
                


                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Other Links</h5>
                    <ul class="footer-list">
                      <li><a href="<?= Url::to(['/story'])?>">Our Story</a></li>
                      <li><a href="<?= Url::to(['/carrer'])?>">Careers</a></li>
                      <li><a href="<?= Url::to(['/blogs'])?>">Blogs</a></li>
                      <li><a href="<?= Url::to(['/faq'])?>">FAQ</a></li>
                      
                       


                    </ul>
                </div>



                <div class="col-md-3">
                    <h5>Our Policies</h5>

                     <ul class="footer-list">

                      <li><a href="<?= Url::to(['/page/privacy-and-cookies-policy'])?>">Privacy And Policy</a></li>
                       <li><a href="<?= Url::to(['/page/terms-and-conditions'])?>">Terms And Conditions</a></li>

                       <li><a href="<?= Url::to(['/page/refund-policy'])?>">Refund Policies</a></li>


                     </ul>
                  </div>





                <div class="col-md-3">
                  <h5>Get In Touch</h5>

                  <ul class="footer-list-1">
                      <li><i class="fa fa-phone-alt"></i> <a href="tel:<?=Yii::$app->params["setting"]["phone"]?>"><?=Yii::$app->params["setting"]["phone"]?> </a></li>
                      <li><i class="fa fa-envelope"></i> <a href="mailto:<?=Yii::$app->params["setting"]["email"]?>"><?=Yii::$app->params["setting"]["email"]?></a></li>
                    </ul>

                  <ul class="footer-list-1">
                    <li><i class="fas fa-map-marker-alt"></i> <strong>Head Office :</strong> C-127, 3rd Floor, Sec-2, NOIDA - 201301</li>
                  </ul>
                                        <ul class="social-icons mt-3">
                      <li><a href="https://www.facebook.com/universitybureau "><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="https://twitter.com/universitybure1 "><i class="fab fa-twitter"></i></a></li>
                      <li><a href="https://www.linkedin.com/company/universitybureau"><i class="fab fa-linkedin-in"></i></a></li>
                      <li><a href="https://www.instagram.com/universitybureau/  "><i class="fab fa-instagram"></i></a></li>
                      <li><a href="https://www.youtube.com/channel/UCXXDl1FUiEf1C57TwoJylJA"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="mb-0"><small>&copy; Universitybureau 2019-<?=date('Y')?> | All Rights Reserved</small> </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Back to top button -->
        <a id="button"></a>
    </footer>
    
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>