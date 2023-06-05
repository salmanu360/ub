<?php
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use \yii\helpers\Url;
use backend\assets\AppAsset;
use dmstr\widgets\Alert;
use thtmorais\pace\Pace;
use common\models\Notification;

$bundle = yiister\gentelella\assets\Asset::register($this);
AppAsset::register($this);
if (Yii::$app->user->isGuest){
return Yii::$app->getResponse()->redirect(array(Url::to(['site/login'],302)));
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody() ?>    
    <?php echo Pace::widget([
        'color'=>'red',
        'theme'=>'center-radar',
        'options'=>[]
    ]); ?>

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?=\yii\helpers\Url::home()?>" class="site_title">
                        <!-- <i class="fa fa-paw"></i> <span><?= Yii::$app->name?></span> -->
                        <img src="<?=\yii\helpers\Url::home()?>/images/logo-white.png" class="big-logo" alt="<?=Yii::$app->name?>">
                        <img src="<?=\yii\helpers\Url::home()?>/images/apple-touch-icon.png" class="favicon" alt="<?=Yii::$app->name?>">
                    </a>
                </div>
                <div class="clearfix"></div>
                <br />
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>


                        <?php 
                        
                    
                        if( \Yii::$app->user->identity->type==3){   // main superadmin 
                        echo \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Home", "url" => ['site/index'], "icon" => "home"],
                                    ["label" => "Users", "url" => ["users/index"], "icon" => "users"],
                                    ["label" => "See All Chat", "url" => ["chat/index"], "icon" => "envelope"],
                                    // ["label" => "History", "url" => ["history/index"], "icon" => "history"],
                                    ["label" => "Notification", "url" => ["notification/index"], "icon" => "envelope-open"],
                                    [
                                        "label" => "CMS",
                                        "icon" => "th",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Posts/Blogs", "url" => ['posts/index']],
                                            ["label" => 'Comment Recruiter', "url" => ['recruiter-comment/index']],
                                            ["label" => 'Recruiter Student Comment', "url" => ['recruiter-student-comment/index']],
                                            ["label" => "Courses", "url" => ['course/index']],
                                            // ["label" => "College", "url" => ['college/index']],
                                            ["label" => "Study Country", "url" => ['studycanada/index']],
                                            ["label" => "College", "url" => ['school/index']],
                                            ["label" => "Blog-category", "url" => ['blog-category/index']],
                                            ["label" => "Pages", "url" => ['pages/index']],
                                            ["label" => "Setting", "url" => ['setting/update','id'=>1]],
                                            ["label" => "Tags", "url" => ['tag-category/index']],
                                            ["label" => "Highest/Level of Education", "url" => ['level-education/index']],
                                            ["label" => "Grading Scheme", "url" => ['grading-scheme/index']],
                                            ["label" => "Affiliates", "url" => ['affiliate/index']],
                                            ["label" => "Contacts", "url" => ['contact/index']],
                                            ["label" => "Get Touch Study Country", "url" => ['get-in-touch-country/index']],
                                            ["label" => "More Services", "url" => ['more-services/index']],
                                            // ["label" => "Highest Level Education", "url" => ['highest-level-education/index']],
                                            // ["label" => "Level Of Education", "url" => ['level-of-education/index']],
                                        ],
                                    ],

                                    [
                                        "label" => "Leads",
                                        "icon" => "book",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Student Leads", "url" => ['lead-statuses/leadstudent']], 
                                            ["label" => 'Create Leads Status', "url" => ['lead-statuses/index']],
                                            ["label" => 'Lead Trace', "url" => ['lead-statuses/leadtimeline']],
                                        ],
                                    ],


                                    [
                                        "label" => "Regions",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            ['label' => 'Country', 'url' => ['country/index']],
                                            ['label' => 'States', 'url' => ['state/index']],
                                            ['label' => 'Cities', 'url' => ['cities/index']],
                                        ],
                                    ],
                                    [
                                        "label" => "Recruiters",
                                        "icon" => "users",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => 'Recruiters', "url" => ['recruiters/index']],
                                            ["label" => 'Assign Recruiters to RM', "url" => ['assign-recuiter-rm/index']],
                                        ],
                                    ],
                                    //['label' => 'Recruiters', 'url' => ['recruiters/index'], 'icon' => 'users'],
                                    ['label' => 'College', 'url' => ['school/index'], 'icon' => 'building'],
                                    // ['label' => 'Students', 'url' => ['student/index'], 'icon' => 'user'],
                                    [
                                        "label" => "Students",
                                        "icon" => "user",
                                        "url" => "#",
                                        "items" => [
                                            ['label' => "Register Students", 'url' => ['for-students/index'], 'icon' => 'users'],
                                            ['label' => "All Students", 'url' => ['student/index'], 'icon' => 'users'],
                                            ['label' => "Assign Students to Recruiter", 'url' => ['/assign-student-recruiter'], 'icon' => 'users'],
                                            ["label" => "All Applications", "url" => ['applications/index'], 'icon' => 'archive'],    
                                            ["label" => "Assign student to application team", "url" => ['assign-student-application-team/index'], 'icon' => 'archive'],
                                            ["label" => "Assign Univ/Course to Student", "url" => ['assign-univ-course/index'], 'icon' => 'archive'],
                                        ],
                                    ],
                                    ['label' => 'Marketing Methods', 'url' => ['marketing-methods/index'], 'icon' => 'table'], 
                                    ['label' => 'Reports', 'url' => ['student/report'], 'icon' => 'table'], 
                                ],
                            ]
                            );

                            /* admin */
                            if( \Yii::$app->user->identity->type==4){   // moderate admin 
                                echo \yiister\gentelella\widgets\Menu::widget(
                                    [
                                        "items" => [
                                            ["label" => "Home", "url" => ['site/index'], "icon" => "home"],
                                            ["label" => "Users", "url" => ["users/index"], "icon" => "users"],
                                            // ["label" => "History", "url" => ["history/index"], "icon" => "history"],
                                            ["label" => "Notification", "url" => ["notification/index"], "icon" => "envelope-open"],
                                            [
                                                "label" => "CMS",
                                                "icon" => "th",
                                                "url" => "#",
                                                "items" => [
                                                    ["label" => "Posts/Blogs", "url" => ['posts/index']],
                                                    ["label" => 'Comment Recruiter', "url" => ['recruiter-comment/index']],
                                                    ["label" => 'Recruiter Student Comment', "url" => ['recruiter-student-comment/index']],
                                                    ["label" => "Courses", "url" => ['course/index']],
                                                    // ["label" => "College", "url" => ['college/index']],
                                                    ["label" => "Study Canada", "url" => ['studycanada/index']],
                                                    ["label" => "College", "url" => ['school/index']],
                                                    ["label" => "Blog-category", "url" => ['blog-category/index']],
                                                    ["label" => "Pages", "url" => ['pages/index']],
                                                    ["label" => "Setting", "url" => ['setting/update','id'=>1]],
                                                    ["label" => "Tags", "url" => ['tag-category/index']],
                                                    ["label" => "Highest/Level of Education", "url" => ['level-education/index']],
                                                    ["label" => "Grading Scheme", "url" => ['grading-scheme/index']],
                                                    ["label" => "More Services", "url" => ['more-services/index']],
                                                    // ["label" => "Highest Level Education", "url" => ['highest-level-education/index']],
                                                    // ["label" => "Level Of Education", "url" => ['level-of-education/index']],
                                                ],
                                            ],
        
                                            [
                                                "label" => "Leads",
                                                "icon" => "book",
                                                "url" => "#",
                                                "items" => [
                                                    // ["label" => "Student Leads", "url" => ['lead-statuses/leadstudent']],
                                                    ["label" => 'Create Leads Status', "url" => ['lead-statuses/index']],
                                                    ["label" => 'Lead Trace', "url" => ['lead-statuses/leadtimeline']],
                                                ],
                                            ],
        
        
                                            [
                                                "label" => "Regions",
                                                "url" => "#",
                                                "icon" => "table",
                                                "items" => [
                                                    ['label' => 'Country', 'url' => ['country/index']],
                                                    ['label' => 'States', 'url' => ['state/index']],
                                                    ['label' => 'Cities', 'url' => ['cities/index']],
                                                ],
                                            ],
                                            ['label' => 'Recruiters', 'url' => ['recruiters/index'], 'icon' => 'users'],
                                            ['label' => 'College', 'url' => ['school/index'], 'icon' => 'building'],
                                            // ['label' => 'Students', 'url' => ['student/index'], 'icon' => 'user'],
                                            [
                                                "label" => "Students",
                                                "icon" => "user",
                                                "url" => "#",
                                                "items" => [
                                                    ['label' => "Register Students", 'url' => ['for-students/index'], 'icon' => 'users'],
                                                    ['label' => "All Students", 'url' => ['student/index'], 'icon' => 'users'],
                                                    ["label" => "All Applications", "url" => ['applications/index'], 'icon' => 'archive'],                                            
                                                ],
                                            ],
                                            ['label' => 'Marketing Methods', 'url' => ['marketing-methods/index'], 'icon' => 'table'],                                     
                                        ],
                                    ]
                                    );

                                }
                            /* admin end */

                            /* rm */

                        }else if( \Yii::$app->user->identity->type==5){ //rm portal
                            //TYPE_SUPPORT_TEAM
                                echo \yiister\gentelella\widgets\Menu::widget(
                                    [
                                        "items" => [
                                            ["label" => "Home", "url" => ['site/index'], "icon" => "home"],
                                            ["label" => "Assign Recruiters", "url" => ["assign-recuiter-rm/index"], "icon" => "users"],
                                            // ["label" => 'Recruiters', "url" => ['recruiters/index'], "icon" => "users"],
                                            [
                                                "label" => "CMS",
                                                "icon" => "th",
                                                "url" => "#",
                                                "items" => [
                                                 //   ["label" => "Posts/Blogs", "url" => ['posts/index']],
                                                 //   ["label" => "Blog-category", "url" => ['blog-category/index']],
                                                 //   ["label" => "Pages", "url" => ['pages/index']],
                                                 //   ["label" => "Setting", "url" => ['setting/update','id'=>1]],
                                                  //  ["label" => "Tags", "url" => ['tag-category/index']],
                                                    ["label" => "Level of Education", "url" => ['level-education/index']],
                                                    ["label" => "Grading Scheme", "url" => ['grading-scheme/index']],
                                                    ["label" => "Courses", "url" => ['course/index']],
                                                    // ["label" => "College", "url" => ['college/index']],
                                                   // ["label" => "More Services", "url" => ['more-services/index']],
                                                ],
                                            ],
                                            // [
                                            //     "label" => "Regions",
                                            //     "url" => "#",
                                            //     "icon" => "table",
                                            //     "items" => [
                                            //         ['label' => 'Country', 'url' => ['country/index']],
                                            //         ['label' => 'States', 'url' => ['state/index']],
                                            //         ['label' => 'Cities', 'url' => ['cities/index']],
                                            //     ],
                                            // ],
                                            //['label' => 'Recruiters', 'url' => ['recruiters/index'], 'icon' => 'users'],
                                            ['label' => 'College', 'url' => ['school/index'], 'icon' => 'building'], 
                                            [
                                                "label" => "Students",
                                                "icon" => "user",
                                                "url" => "#",
                                                "items" => [
                                                    ["label" => 'Students', "url" => ['student/index']],
                                                    ["label" => 'RM Recruiter Comment', "url" => ['rm-recruiter-comment/index']],
                                                    ["label" => 'RM Application Team Comment', "url" => ['rm-application-team-comment/index']],
                                                    ["label" => "Assign student to application team", "url" => ['assign-student-application-team/index'], 'icon' => 'archive'],
                                                     ["label" => "Assign Univ/Course to Student", "url" => ['assign-univ-course/index'], 'icon' => 'archive'],
                                                ],
                                            ],
                                            ['label' => 'Marketing Methods', 'url' => ['marketing-methods/index'], 'icon' => 'table'],                                     
                                        ],
                                    ]
                                    );


                        }else if( \Yii::$app->user->identity->type==4){
                            //TYPE_MANAGEMENT_TEAM 
                                echo \yiister\gentelella\widgets\Menu::widget(
                                    [
                                        "items" => [
                                            ["label" => "Home", "url" => ['site/index'], "icon" => "home"],
                                           // ["label" => "Users", "url" => ["users/index"], "icon" => "users"],
                                            [
                                                "label" => "CMS",
                                                "icon" => "th",
                                                "url" => "#",
                                                "items" => [
                                                 //   ["label" => "Posts/Blogs", "url" => ['posts/index']],
                                                   // ["label" => "Blog-category", "url" => ['blog-category/index']],
                                                    //["label" => "Pages", "url" => ['pages/index']],
                                                   // ["label" => "Setting", "url" => ['setting/update','id'=>1]],
                                                  //  ["label" => "Tags", "url" => ['tag-category/index']],
                                                    ["label" => "Level of Education", "url" => ['level-education/index']],
                                                    ["label" => "Grading Scheme", "url" => ['grading-scheme/index']],
                                                ],
                                            ],
                                            [
                                                "label" => "Regions",
                                                "url" => "#",
                                                "icon" => "table",
                                                "items" => [
                                                    ['label' => 'Country', 'url' => ['country/index']],
                                                    ['label' => 'States', 'url' => ['state/index']],
                                                    ['label' => 'Cities', 'url' => ['cities/index']],
                                                ],
                                            ],
                                            ['label' => 'Recruiters', 'url' => ['recruiters/index'], 'icon' => 'users'],
                                            ['label' => 'College', 'url' => ['school/index'], 'icon' => 'building'],                
                                            ['label' => 'Marketing Methods', 'url' => ['marketing-methods/index'], 'icon' => 'table'],                                     
                                        ],
                                    ]
                                    );


                        }else if( \Yii::$app->user->identity->type==6){ //application team
                            //TYPE_MANAGEMENT_TEAM 
                                echo \yiister\gentelella\widgets\Menu::widget(
                                    [
                                        "items" => [
                                            ["label" => "Home", "url" => ['site/index'], "icon" => "home"],
                                            ["label" => "Courses", "url" => ['course/index'],"icon"=>"fa fa-book"],
                                            ["label" => "Student Leads", "url" => ['lead-statuses/leadstudent'],"icon"=>"fa fa-book"],
                                            ["label" => "Chat", "url" => ['chat/showapplicationchat'],"icon"=>"fa fa-envelope-open"],
                                            
                                           // ["label" => "Users", "url" => ["users/index"], "icon" => "users"],
                                           /*  ["label" => "School", "url" => ['school/index'],"icon"=>"user-circle"],
                                            ["label" => "College", "url" => ['college/index'],"icon"=>"fa fa-bank"],
                                           
                                            ["label" => "History", "url" => ['history'],"icon"=>"fa fa-book"], */

                                            // ["label" => "Notification", "url" => ["notification/index"], "icon" => "envelope-open"],
                                           [
                                            "label" => "Students",
                                            "icon" => "user",
                                            "url" => "#",
                                            "items" => [
                                               ['label' => "All Students", 'url' => ['student/index'], 'icon' => 'users'],
                                                ["label" => "All Applications", "url" => ['applications/index'], 'icon' => 'archive'],  
                                                ["label" => "Assign Univ/Course to Student", "url" => ['assign-univ-course/index'], 'icon' => 'archive'],
                                                 ["label" => "Assign Univ/Course to Student", "url" => ['assign-univ-course/index'], 'icon' => 'archive'],
                                            ],
                                        ],
                                            
                                            ['label' => 'Recruiters', 'url' => ['recruiters/index'], 'icon' => 'users'],
                                            //['label' => 'School', 'url' => ['school/index'], 'icon' => 'building'],                
                                            //['label' => 'Marketing Methods', 'url' => ['marketing-methods/index'], 'icon' => 'table'],                                     
                                        ],
                                    ]
                                    );


                        }else if( \Yii::$app->user->identity->type==7){ //seo team
                            //TYPE_MANAGEMENT_TEAM 
                                echo \yiister\gentelella\widgets\Menu::widget(
                                    [
                                        "items" => [
                                            ["label" => "Home", "url" => ['site/index'], "icon" => "home"],
                                           // ["label" => "Users", "url" => ["users/index"], "icon" => "users"],
                                            ["label" => "College", "url" => ['school/index'],"icon"=>"user-circle"],
                                            // ["label" => "College", "url" => ['college/index'],"icon"=>"fa fa-bank"],
                                            ["label" => "Courses", "url" => ['course/index'],"icon"=>"fa fa-book"],
                                            // ["label" => "History", "url" => ['history'],"icon"=>"fa fa-book"],

                                            ["label" => "Notification", "url" => ["notification/index"], "icon" => "envelope-open"],
                                           [
                                            "label" => "Students",
                                            "icon" => "user",
                                            "url" => "#",
                                            "items" => [
                                               // ['label' => "All Students", 'url' => ['student/index'], 'icon' => 'users'],
                                                ["label" => "All Applications", "url" => ['applications/index'], 'icon' => 'archive'],                                            
                                            ],
                                        ],
                                            
                                            //['label' => 'Recruiters', 'url' => ['recruiters/index'], 'icon' => 'users'],
                                            //['label' => 'School', 'url' => ['school/index'], 'icon' => 'building'],                
                                            //['label' => 'Marketing Methods', 'url' => ['marketing-methods/index'], 'icon' => 'table'],                                     
                                        ],
                                    ]
                                    );


                        }else{
                            //TYPE_CONTENT_MANAGEMENT_TEAM
 
                                echo \yiister\gentelella\widgets\Menu::widget(
                                    [
                                        "items" => [
                                            ["label" => "Home", "url" => ['site/index'], "icon" => "home"],
                                          //  ["label" => "Users", "url" => ["users/index"], "icon" => "users"],
                                            [
                                                "label" => "CMS",
                                                "icon" => "th",
                                                "url" => "#",
                                                "items" => [
                                                    ["label" => "Posts/Blogs", "url" => ['posts/index']],
                                                    ["label" => "Blog-category", "url" => ['blog-category/index']],
                                                    ["label" => "Pages", "url" => ['pages/index']],
                                                    ["label" => "Setting", "url" => ['setting/update','id'=>1]],
                                                    ["label" => "Tags", "url" => ['tag-category/index']],
                                                    ["label" => "Level of Education", "url" => ['level-education/index']],
                                                    ["label" => "Grading Scheme", "url" => ['grading-scheme/index']],
                                                ],
                                            ],
                                            [
                                                "label" => "Regions",
                                                "url" => "#",
                                                "icon" => "table",
                                                "items" => [
                                                    ['label' => 'Country', 'url' => ['country/index']],
                                                    ['label' => 'States', 'url' => ['state/index']],
                                                    ['label' => 'Cities', 'url' => ['cities/index']],
                                                ],
                                            ],
                                         //   ['label' => 'Recruiters', 'url' => ['recruiters/index'], 'icon' => 'users'],
                                           // ['label' => 'School', 'url' => ['school/index'], 'icon' => 'building'],                
                                            ['label' => 'Marketing Methods', 'url' => ['marketing-methods/index'], 'icon' => 'table'],                                     
                                        ],
                                    ]
                                    );

                        }
                        ?>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <?= Html::a('<span class="glyphicon glyphicon-off" aria-hidden="true"></span>', ['users/logout'], ['data-method' => 'post', 'class' => 'dropdown-item']) ?>
                   <!--  <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a> -->
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                    
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span>Welcome</span>
                                <span class="user-identity"> <strong><?=((!Yii::$app->user->isGuest) ? Yii::$app->user->identity->username : '') ?></strong></span>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"><i class="fa fa-user pull-right"></i> <strong>Profile</strong></a></li>
                                <li>
                                    <a href="<?=Url::to(['/setting/update', 'id' => '1']);?>">                                        
                                        <i class="fa fa-gear pull-right"></i> <strong>Settings</strong> 
                                    </a>
                                </li>

                                <li>
                                    <a href="<?=Url::to(['/users/changepass', 'id' => '1']);?>">                                        
                                        <i class="fa fa-key pull-right"></i> <strong>Change Password</strong> 
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;"><i class="fa fa-question pull-right"></i> <strong>Help</strong></a>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-sign-out pull-right"></i> <strong>Log Out</strong>', ['users/logout'], ['data-method' => 'post', 'class' => 'dropdown-item']) ?>
                                </li>
                            </ul>
                        </li>

                        <!-- notification -->
                        <?php
                        // status 0 is not seen when 1 it is seen
                        if( \Yii::$app->user->identity->type==3){ 
                        $notificationCount=Notification::find()->where(['status'=>0])->count();
                            $latestNotifiation=Notification::find()
                            //->limit(10)
                            ->where(['status'=>0])
                            ->orderBy(['id'=>SORT_DESC])
                            ->all();
                        
                        
                        ?>
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span><i class="fa fa-bell"></i></span>
                                <span class="user-identity"> <strong><?php echo $notificationCount;?></strong></span>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <?php if($notificationCount >0){?>
                                
                            <ul class="dropdown-menu dropdown-usermenu pull-right" style="overflow: scroll;height: 500px;">
                                <?php foreach($latestNotifiation as $notificationvalue){
                                   $user=\common\models\Users::findOne($notificationvalue->created_by);
                                    ?>
                                <li>
                                    <?php if($notificationvalue->module == 'Student Create' || $notificationvalue->module == 'student Update'){?>
                                <a href="<?php echo Url::to(['/student/view?ID='.$notificationvalue->created_by_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                <?php }else if($notificationvalue->module =='Recruiter comment'){?>
                                    <a href="<?php echo Url::to(['/recruiter-comment/view?id='.$notificationvalue->created_by_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                <?php }else if($notificationvalue->module =='chat'){?>
                                    <?php if($notificationvalue->created_by_id == 1){?>
                                        <a href="<?php echo Url::to(['/chat/create?id='.$notificationvalue->receiver_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                    <?php }else{?>
                                    <a href="<?php echo Url::to(['/chat/index'])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                    <?php }?>
                                    <?php }else if($notificationvalue->module =='Comment'){?>
                                    <a href="<?php echo Url::to(['/recruiter-student-comment/view?id='.$notificationvalue->created_by_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                    <?php }else{?>
                                    <a href="<?php echo Url::to(['/notification'])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                <?php }?>
                                </li>
                                <?php } ?>
                                
                                <li>
                                     <!-- <a href="<?php //echo Url::to(['/notification'])?>" class="btn btn-primary btn-block" style="color:black">Show More</a>  -->
                                   <a href="<?php echo Url::to(['/notification'])?>" class="btn btn-primary btn-sm" style="color:black"> View all</a>
                                   <a href="<?php echo Url::to(['notification/notificationseen'])?>" class="btn btn-success btn-sm" style="color:black">Mark all is seen</a>
                                
                                    </li>

                                
                            </ul>
                            <?php }?>
                        </li>
                        <?php }?>
                        <!-- notification end -->


                        <!-- notification to application team -->
                        <?php
                        // status 0 is not seen when 1 it is seen
                        if( \Yii::$app->user->identity->type==6){ 
                        $Userapplication=\common\models\User::find()->where(['username'=>'Litika'])->one();
                        $notificationCount=Notification::find()->where(['status'=>0,'created_by_id'=>$Userapplication->id])->count();
                            $latestNotifiation=Notification::find()
                            //->limit(10)
                            ->where(['status'=>0,'created_by_id'=>$Userapplication->id])
                            ->orderBy(['id'=>SORT_DESC])
                            ->all();
                            
                        
                        ?>
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span><i class="fa fa-bell"></i></span>
                                <span class="user-identity"> <strong><?php echo $notificationCount;?></strong></span>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <?php if($notificationCount >0){?>
                                
                            <ul class="dropdown-menu dropdown-usermenu pull-right" style="overflow: scroll;height: 500px;">
                                <?php foreach($latestNotifiation as $notificationvalue){
                                   $user=\common\models\Users::findOne($notificationvalue->created_by);
                                    ?>
                                <li>
                                    <?php if($notificationvalue->module == 'Student Create' || $notificationvalue->module == 'student Update'){?>
                                <a href="<?php echo Url::to(['/student/view?ID='.$notificationvalue->created_by_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                <?php }else if($notificationvalue->module =='Recruiter comment'){?>
                                    <a href="<?php echo Url::to(['/recruiter-comment/view?id='.$notificationvalue->created_by_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                <?php }else if($notificationvalue->module =='chat' && $notificationvalue->created_by_id==$Userapplication->id){?>
                                    <a href="<?php echo Url::to(['/chat/chatapplication?id='.$notificationvalue->receiver_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                    <?php }else if($notificationvalue->module =='Comment'){?>
                                    <a href="<?php echo Url::to(['/recruiter-student-comment/view?id='.$notificationvalue->created_by_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                    <?php }?>
                                </li>
                                <?php } ?>
                                
                                <li>
                                     <!-- <a href="<?php //echo Url::to(['/notification'])?>" class="btn btn-primary btn-block" style="color:black">Show More</a>  -->
                                   <a href="<?php echo Url::to(['/notification'])?>" class="btn btn-primary btn-sm" style="color:black"> View all</a>
                                   <a href="<?php echo Url::to(['notification/notificationseen'])?>" class="btn btn-success btn-sm" style="color:black">Mark all is seen</a>
                                
                                    </li>

                                
                            </ul>
                            <?php }?>
                        </li>
                        <?php }?>
                        <!-- notification end -->
                        <!-- notification to application team -->
                        
                        <!-- notification to RM -->
                        <?php
                        // status 0 is not seen when 1 it is seen
                        if( \Yii::$app->user->identity->type==5){ 
                        $Userapplication=\common\models\User::find()->where(['id'=>Yii::$app->user->id])->one();
                        $notificationCount=Notification::find()->where(['status'=>0,'created_by_id'=>$Userapplication->id])->count();
                            $latestNotifiation=Notification::find()
                            //->limit(10)
                            ->where(['status'=>0,'created_by_id'=>$Userapplication->id])
                            ->orderBy(['id'=>SORT_DESC])
                            ->all();
                            
                        
                        ?>
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span><i class="fa fa-bell"></i></span>
                                <span class="user-identity"> <strong><?php echo $notificationCount;?></strong></span>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <?php if($notificationCount >0){?>
                                
                            <ul class="dropdown-menu dropdown-usermenu pull-right" style="overflow: scroll;height: 500px;">
                                <?php foreach($latestNotifiation as $notificationvalue){
                                   $user=\common\models\Users::findOne($notificationvalue->created_by);
                                    ?>
                                <li>
                                    <?php if($notificationvalue->module == 'Student Create' || $notificationvalue->module == 'student Update'){?>
                                <a href="<?php echo Url::to(['/student/view?ID='.$notificationvalue->created_by_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                <?php }else if($notificationvalue->module =='Recruiter comment'){?>
                                    <a href="<?php echo Url::to(['/recruiter-comment/view?id='.$notificationvalue->created_by_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                <?php }else if($notificationvalue->module =='chat' && $notificationvalue->created_by_id==$Userapplication->id){?>
                                    <a href="<?php echo Url::to(['/chat/chatapplication?id='.$notificationvalue->receiver_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                    <?php }else if($notificationvalue->module =='Comment'){?>
                                    <a href="<?php echo Url::to(['/recruiter-student-comment/view?id='.$notificationvalue->created_by_id])?>"> <strong><?php $show= $notificationvalue->module.' ('.$notificationvalue->name.') by '.$notificationvalue->created_by;
                                    echo wordwrap($show,28,"<br>\n");?></a></strong>
                                    <?php }?>
                                </li>
                                <?php } ?>
                                
                                <li>
                                     <!-- <a href="<?php //echo Url::to(['/notification'])?>" class="btn btn-primary btn-block" style="color:black">Show More</a>  -->
                                   <a href="<?php echo Url::to(['/notification'])?>" class="btn btn-primary btn-sm" style="color:black"> View all</a>
                                   <a href="<?php echo Url::to(['notification/notificationseen'])?>" class="btn btn-success btn-sm" style="color:black">Mark all is seen</a>
                                
                                    </li>

                                
                            </ul>
                            <?php }?>
                        </li>
                        <?php }?>
                        <!-- notification to RM -->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
       

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>                
            <?php endif; ?>
            <div class="clearfix"></div>
            <div class="row">
                <?php
                    $st = Yii::$app->session->getFlash('success');
                    if(!empty($st)) { ?>
                        <div class="alert alert-success">
                            <p >  <?=  $st[0]; ?></p>
                        </div>                     
                    <?php } ?>

                    <?php
                    $st = Yii::$app->session->getFlash('error');
                    if(!empty($st)){ ?>
                        <div class="alert alert-danger">
                            <p >  <?=  $st[0]; ?></p>
                        </div>
                    <?php } ?>
            </div>           
            <?= $content ?>
        </div>
        <!-- /page content -->       
    </div>
</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage(); ?>