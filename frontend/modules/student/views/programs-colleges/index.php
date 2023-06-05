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

<div class="container-d">                
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
<div class="row">
      <div class="col-md-12">
        <div class="dashboard-card top-red-border mb-5">
          <div class="row">            
            <div class="col-md-3">
              <div class="left-dashboard-bar">
                <h4 class="common-dashboard-heading">Filters</h4>
                <div class="accordion mt-4" id="accordionExample">
                  <?php echo $this->render('_course_search', ['model' =>$searchCourseModel]); ?>
                  <?php echo $this->render('_search', ['model' =>$searchModel]); ?>
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
                  $programsTab = ListView::widget([
                    'id' => 'listofprograms',
                    'dataProvider' => $dataProviderCourse,
                    //'viewParams' => ['StudentCollegeApplied' => $StudentCollegeApplied],
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
                    // 'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],                              
                    'pager' => ['class' => \kop\y2sp\ScrollPager::className()]                    
                  ]);
                      
                  echo Tabs::widget([
                    'id' => 'pro-col',
                    'items' => [
                        [
                          'label' => 'Programs',
                          'content' => $programsTab,
                          'active' => true
                        ],
                        [
                          'label' => 'Colleges',
                          'content' => $collegesTab,
                        ]
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