<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use cinghie\cookieconsent\widgets\CookieWidget;
use kartik\widgets\TypeaheadBasic;
use yii\jui\Autocomplete;
use yii\helpers\ArrayHelper;
use common\models\User;
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
    
    <!-- Bootstrap CSS -->
   <!--  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css"> -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">

    <title> <?= Html::encode($this->title) .' - '. Yii::$app->name ?> </title>
    <?php $this->head() ?>
  </head>
  <body>
  <?php $this->beginBody() ?>
  <?php
    $user_id = Yii::$app->user->identity->id; 
    $user = \frontend\models\ForStudents::findOne(['user_id' => $user_id]);
  ?>
  <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow dashboard-top-menu">
      <a href="javascript:void(0)" class="offset-md-2 col-md-2 mr-0 dashboard-bar">
        <i class="fas fa-bars ms-4"></i> <span class="desktop-view-only">Dashboard</span>
      </a>
        <ul class="navbar-nav top-dashboard-menu px-3 col-md-8 text-end align-items-center">
            
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
            </li>
            <li class="nav-item dropstart">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                <?php
                if(!empty(User::get_profile_pic())){
                  echo '<img src="'.Yii::getAlias('@web/uploads/profile/').User::get_profile_pic().'" class="account-manager" style="width:30px">';
                } else {
                  echo '<i class="fas fa-user"></i>';
                }  
                ?> 
                Hello! <strong><?=$user->first_name . ' ' .$user->last_name?></strong></a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= Url::to(['/student/profile']) ?>"><i class="fas fa-user"></i> My Profile</a></li>
                  <li><a class="dropdown-item" href="<?= Url::to(['/student/setting']) ?>"><i class="fas fa-cog"></i> Account Settings</a></li>
                   <li>
                    <?= Html::a('<i class="fas fa-cog"></i> Logout', ['/student/course/logouta'], ['data-method' => 'post', 'class' => 'dropdown-item']) ?></li>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light d-md-block sidebar dashboard-main-menu">
                <div class="left-sidebar">
                   
                    <a class="navbar-brand" href="javascript:void(0)">
                      <img src="images/logo.png" style="width: 169px" class="big-logo" alt="Logo">
                      <img src="images/apple-touch-icon.png" class="small-cion-logo" alt="Logo">
                    </a>
                    <?php
                    $items  = [
                      [
                        'label' => '<i class="fas fa-home"></i> Home',
                        'url' => ['/student/dashboard'],
                        'active' => Yii::$app->controller->action->id == 'dashboard' ? true : false,
                        'linkOptions' => [],
                      ],                          
                      [
                        'label' => '<i class="fas fa-search"></i> Programs & Colleges',
                        'url' => ['/student/programs-colleges/index'],
                        //'visible' => Yii::$app->user->isGuest
                      ],
                      [
                        'label' => '<i class="fas fa-user-graduate"></i> Profile',
                        'url' => ['/student/profile'],
                        'active' => Yii::$app->controller->action->id == 'profile' ? true : false,
                      ],
                      [
                        'label' => '<i class="fas fa-list"></i> My Applications',
                        'url' => ['/student/applications/index'],
                        //'active' => Yii::$app->controller->action->id == 'applications' ? true : false,
                      ],
                      [
                        'label' => '<i class="fas fa-dollar-sign"></i> Payments',
                        'url' => ['/student/payments/index'],
                      ],
                    ];
                    echo Nav::widget([
                      'id' => 'nav-bar',                       
                      'encodeLabels' => false,
                      'options' => ['class' =>'nav flex-column sidebar-nav'],
                      'items' => $items,                      
                  ]);
                    ?>
                   <!--  <ul class="nav flex-column sidebar-nav">
                        <li class="nav-item">
                          <a class="nav-link <?php if(Yii::$app->controller->id == 'default'){ echo "active"; } ?>" href="<?=Url::to(['/student/dashboard'])?>">
                              <i class="fas fa-home"></i> Home
                          </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Url::to(['/student/programs-colleges/index'])?>">
                                <i class="fas fa-search"></i> Programs & Colleges
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['/student/profile']) ?>">
                                <i class="fas fa-user-graduate"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">
                                <i class="fas fa-list"></i> My Applications
                            </a>
                        </li>
                        <li class="nav-item">
                         <li><a class="nav-link" href="<?= Url::to(['/student/course/logouta']) ?>"><i class="fas fa-cog"></i> Logout</a></li>
                            <a class="nav-link" href="javascript:void(0)">
                                <i class="fas fa-dollar-sign"></i> Payments
                            </a>
                        </li>
                    </ul> -->


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
                  
                  <ul class="flex-column sidebar-nav social-icons side-icon">
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
              <li><a href="<?= Url::to(['/story'])?>">Our Story</a></li>
              <li><a href="<?= Url::to(['/carrer'])?>">Careers</a></li>
              <li><a href="<?= Url::to(['/leadership'])?>">Leadership</a></li>
              <li><a href="<?= Url::to(['/faq'])?>">FAQ</a></li>
              <li><a href="<?= Url::to(['/site/contact'])?>">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-5 text-end">
            <ul class="social-icons">
              <li><a href="https://www.facebook.com/universitybureau"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://twitter.com/universitybure1"><i class="fab fa-twitter"></i></a></li>
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
                      <p class="mb-0"><small>Copyright © Universitybureau 2019-2022 | All Rights Reserved</small> </p>
                  </div>
              </div>
          </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->

    <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>



<script>
    function showmodel(){
     // $("#myModal").modal("show");
    }

  </script>

  <script type="text/javascript">
      function applyScourse(course_id,schoo_id){
        $("#school_id").val(schoo_id);
        $("#course_id").val(course_id);


         var request = $.ajax({
                url: "<?php echo Url::to(['/student/course/apply']) ?>",
                type: "POST",
                data: {
                    course_id : course_id,
                    schoo_id : schoo_id

                },
                dataType: "json"
        });
        request.done(function(data) {
             console.log(data);

        });
        request.fail(function(jqXHR, textStatus) {
            
        });
        
          // $("#myModal_course").modal('show');
     }



</script>