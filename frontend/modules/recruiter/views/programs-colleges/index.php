<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ListView;
use dmstr\bootstrap\Tabs;
use yii\widgets\Pjax;


$this->title = Yii::t('models', 'Programs');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view}";
}
    $actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>

<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">                
  <div class="row">


    <div class="col-md-12">
      <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><i class="fa fa-check-circle" aria-hidden="true"></i></i></strong> <?= Yii::$app->session->getFlash('success') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong><i class="fa fa-ban" aria-hidden="true"></i></strong> <?= Yii::$app->session->getFlash('error') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
    </div>
  </div>    
  
<section class="study-destinaton-section pt-0 pb-0 mb-3" style="border-radius: 20px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;margin: 0;">
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
  
<div class="row">


      <div class="col-md-12">
        <div class="dashboard-card top-red-border mb-5">
          <div class="row">   
            
            



            <div class="col-md-3">
              <div class="left-dashboard-bar">
                <h4 class="common-dashboard-heading">Filters</h4>
                <div class="accordion mt-4" id="accordionExample">
                  <?php echo $this->render('_course_search', ['model' =>$searchCourseModel,'modelcollege' =>$searchModel]); ?>
                  <?php echo $this->render('_search', ['model' =>$searchModel]); ?>
                  <!-- <?php //echo $this->render('_course_filter', ['model' =>$searchCourseModel]); ?> -->
                </div>
              </div>
            </div>

            <div class="col-md-9">
              <!-- <h5 class="inst-list-heading">Institutes List</h5> -->

             <!--  <div class="heading-with-select">
                <h4 class="common-dashboard-heading">
                  <a href="javascript:void(0)"><span>Programs</span></a> | <a href="#">Institutes</a></h4>                 
              </div> -->
              <div class="programs-college-tabs">                
                <?php

                     $courseTab = ListView::widget([
                      'id' => 'listofprogramssss',
                      'dataProvider' => $dataProvidercoursefilter,
                      'viewParams' => ['StudentCollegeApplied' => $StudentCollegeApplied],
                      'options' => [],
                      //'layout' => "{pager}\n{items}\n{summary}",
                      'itemView' => '_course',
                      'itemOptions' => ['class' => 'item', 'tag' => false],                                
                      'pager' => [
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                        'nextPageLabel' => 'Next',
                        'prevPageLabel' => 'Previous',
                        'maxButtonCount' => 5,
                      ],
                    ]);
                  $programsTab = ListView::widget([
                    'id' => 'listofprograms',
                    'dataProvider' => $dataProviderCourse,
                    'viewParams' => ['StudentCollegeApplied' => $StudentCollegeApplied],
                    'options' => [],
                    //'layout' => "{pager}\n{items}\n{summary}",
                    'itemView' => '_programs',
                    'itemOptions' => ['class' => 'item', 'tag' => false],                                
                    'pager' => [
                      'firstPageLabel' => 'First',
                      'lastPageLabel' => 'Last',
                      'nextPageLabel' => 'Next',
                      'prevPageLabel' => 'Previous',
                      'maxButtonCount' => 5,
                    ],
                  ]);

                  $collegesTab = ListView::widget([
                    'id' => 'listofcolleges',
                    'dataProvider' => $dataProvider,
                    //'layout' => "<div class='shop-toolbar clearfix'>{summary}\n<div class='pull-right'>{viewMode}</div>\n</div>\n<div class='row'>{items}</div>\n{pager}",
                    'itemView' => '_school',
                    'itemOptions' => ['class' => 'item'],                                
                    'pager' => ['class' => \kop\y2sp\ScrollPager::className()]                    
                  ]);
                      
                  echo Tabs::widget([
                    'id' => 'pro-col',
                    'class'=>'d-flex',
                    'items' => [
                        [
                          'label' => 'Programs',
                          'content' => $programsTab,
                          'active' => true
                        ],
                        [
                          'label' => 'Colleges',
                          'content' => $collegesTab,
                        ],

                         /* [
                          'label' => 'Course',
                          'content' => $courseTab,
                        ] */
                        
                    ]
                  ]);

                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
<?php
$script = <<< JS
    $(function(){
      $('.school-search').on('click', 'button[type="submit"]', function(e) {
        $('#collapseOne').removeClass('show');
        $('#headingTwo button').removeClass('collapsed');
        $('#collapseTwo').addClass('show');
        
        $('#w26 li').addClass('active');
        $('#w26 li a').attr('aria-expanded', true);
      });
    });
    
    $(window).on('load', function() {
      var find = window.location.search.includes("SchoolSearch");
      if(find){
        $('.programs-college-tabs .nav-tabs li:first').removeClass('active');
        $('.programs-college-tabs .nav-tabs li:first').attr('aria-expanded', false);
        $('.programs-college-tabs .tab-content .tab-pane:first').removeClass('active');

        $('.programs-college-tabs .nav-tabs li:last').addClass('active');
        $('.programs-college-tabs .nav-tabs li:last').attr('aria-expanded', true);
        $('.programs-college-tabs .tab-content .tab-pane:last').addClass('active')
      }
    });
      
    $(document).ready(function() {
      $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href");
        localStorage.setItem('selectedTab', id)
      });

      var selectedTab = localStorage.getItem('selectedTab');
      if (selectedTab != null) {
        $('a[data-toggle="tab"][href="' + selectedTab + '"]').tab('show');
        $('a[data-toggle="tab"][href="' + selectedTab + '"]').closest('li').addClass('active');
        $('a[data-toggle="tab"][href="' + selectedTab + '"]').closest('li').siblings().removeClass('active');
      }
    });
JS;
$this->registerJs($script);
?>