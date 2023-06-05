<?php
use frontend\components\CounterArchiveWidget; 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ListView;
use dmstr\bootstrap\Tabs;
use yii\widgets\Pjax;
use common\models\AppliedCouncilStudent;
use common\models\Country;
use common\models\Course;
use yii\bootstrap\Modal;




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



<section class="banner-menu mob-inner-height">
  <div class="bg-video-wrap">
    <img src="images/university-detail-banner.png" alt="banner-img" class="desktop-view-only w-100">
    <img src="images/mob-recruiters-banner.jpg" alt="banner-img" class="mob-view-only w-100">
    <div class="container banner-caption mob-inner-caption">
      <div class="banner-text mb-3">
        <h2>BEGIN YOUR SEARCH FOR COLLEGES YOU WANT TO EXPLORE</h2>
        <p>Using the Find a College/Program search tool,  search through hundreds of college programs to find the one suitable for you.</p>
      </div>
      <a href="<?=URL::to('recruiter')?>" class="banner-btn">View Openings</a>
    </div>
  </div>
</section>

<section class="search-page-search-box">
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-3 mb-3">
        <h2 class="common-heading">Find the Colleges and Universities of  <span class="search-font">Your Dreams</span></h2>
          <!-- <div class="input-group job-list-search-box">
            <input type="search" class="form-control job-list-search-input" placeholder="Search colleges fess, courses and more..." aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn job-list-search-button">Search</button>
          </div> -->
        </div>
    </div>
    </div>
</section>

<main role="main" class="col-md-12 ms-sm-auto px-4 dashboard-main-body">                
                <div class="row">
                  <div class="col-md-12">
                    <div class="dashboard-card top-red-border mb-5">
                      <div class="row">                      
                        <div class="col-md-3">
                          <div class="left-dashboard-bar">
                            <h4 class="common-dashboard-heading">Filters</h4>

                           
                              
                              <?php echo $this->render('_course_search', ['model' =>$searchCourseModel]); ?>
                               <?php
                              echo $this->render('_search', ['model' =>$searchModel]); ?>
                           
                          </div>
                        </div>

                        <div class="col-md-9">
                          <!-- <h5 class="inst-list-heading">Institutes List</h5> -->

                         <!--  <div class="heading-with-select">
                            <h4 class="common-dashboard-heading">
                              <a href="javascript:void(0)"><span>Programs</span></a> | <a href="#">Institutes</a></h4>
                           
                          </div>
 -->
                          <div class="row mt-4 ">                
                <?php
                  $programsTab = ListView::widget([
                    'id' => 'listofprograms',
                    'dataProvider' => $dataProviderCourse,

                    // 'viewParams' => ['StudentCollegeApplied' => $StudentCollegeApplied],
                    'options' => [],
                    //'layout' => "{pager}\n{items}\n{summary}",
                    'itemView' => '_programs',
                    'itemOptions' => ['class' => 'item col-md-4', 'tag' => false],                                
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
                    'itemOptions' => ['class' => 'item col-md-4'],                                
                     'pager' => [
                      'firstPageLabel' => 'First',
                      'lastPageLabel' => 'Last',
                      'nextPageLabel' => 'Next',
                      'prevPageLabel' => 'Previous',
                      'maxButtonCount' => 5,
                    ],
                  ]);
                          // <div class="row mt-4">
                          //   <?php
                          //      echo ListView::widget([
                          //         'dataProvider' => $dataProvider,
                          //         //'layout' => "<div class='shop-toolbar clearfix'>{summary}\n<div class='pull-right'>{viewMode}</div>\n</div>\n<div class='row'>{items}</div>\n{pager}",
                          //         'itemView' => '_school',
                          //         'itemOptions' => ['class' => 'item col-md-4'],                                
                          //         'pager' => ['class' => \kop\y2sp\ScrollPager::className()]
                          //      ]);



                                echo Tabs::widget([
                    'items' => [
                        [
                          'label' => 'Programs',
                           'id'=> "college_programs",
                          'content' => $programsTab,
                          'active' => true
                        ],
                        [
                          'label' => 'Colleges',
                          'id'=> "college_info",

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

            <?= CounterArchiveWidget::widget(); ?>








<div id="modal_school_details" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body" id="show_model_apply">
      
      </div>
      
    </div>

  </div>
</div>


<script type="text/javascript">
  
function showApplyform(href){
  $('#modal_school_details').modal('show');
  $('#show_model_apply').html('<i class=\"fa fa-spinner fa-spin\"></i>');

$.ajax({
  url: href, 
  type: "POST",
   data:{
    type:1
  },
  success: function(data){
    $('#show_model_apply').html(data);
  },
  error: function(error){
    console.log(error.message);
  }
});


   // $.post(href)
   //          .done(function( data ,status,xhr) {
   //              $('#show_model_apply').html(data);
                

   //          });
}



</script>


<?php


    // $this->registerJs("
    // var count=0;  
    // $('#modal_school_details').on('show.bs.modal', function (event) {
    //   event.stopImmediatePropagation();
    //       $('#show_model_apply').html('');
    //     var button = $(event.relatedTarget);
    //      var href = button.attr('href'); 
         
    //      $('#show_model_apply').html('<i class=\"fa fa-spinner fa-spin\"></i>');
    //      if(count==0){
       
    //     $.post(href)
    //         .done(function( data ) {
    //             $('#show_model_apply').html(data);
    //             $('#modal_school_details').modal('show');

    //         });

    //       }
    //     })
    // ");
?>
  

   


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
JS;
$this->registerJs($script);
?>

<style>
        #w2{
        justify-content: space-around;
      }
      #w2 li{
        width: 50%;
        text-align: center; 
      }
      #w2 li:nth-child(1) {
        border-right: 2px solid #f0383a;
      }
      #w2 li a{
        width: 100%;
        height: 100%;
      }
      #listofprograms{
        display: flex;
        flex-wrap: wrap;
      }
      .pace-done .dashboard-main-body{
        padding-top: 20px;
      }
      .inst-list-heading{
          text-transform: uppercase;
          width: 100%;
          font-weight: 900;
          margin: 0;
          color: #0f6889;
      }
      .collage-item{
          flex-wrap: wrap; 
          position: relative;
          margin: 1rem;
          border-radius: 10px;
          height: 450px;
      }
      .collage-item.programs{
          flex-wrap: wrap; 
          position: relative;
          margin: 1rem;
          border-radius: 10px;
          align-items: baseline;
          height: 530px;
      }
      .collage-img {
          width: 100%;
          height: 200px;
          border-radius: 0px;
          position: relative;
      }
      .collage-img img{
          height: 100%;
          width: 100%;
          border-top-right-radius: 10px;
          border-top-left-radius: 10px;
      }
      .college-text {
          padding: 15px 0;
          text-align: center;
          margin-left: 10px;
      }
      .programs-college-text {
          padding: 15px 0;
          text-align: center;
          padding-left: 10px;
          padding-right: 10px;
      }
      .programs-college-text h4 a{
        font-size: 1rem;
        color: #f0393a;
      }
      .programs-college-text .p-comment{
         font-size: 13px;
      }
      .application-fees{
          padding: 0 1rem;
      }
      .tuition-fees{
          padding: 0 1rem;
      }
      .programs-fees-text .tuition-fees.min-fees{
        display: flex;
        padding: 0.5rem;
        justify-content: space-between;
        border: none;
      }
      .programs-fees-text .application-fees{
        display: flex;
        justify-content: space-between;
        padding: 0.5rem;
        padding-top: 0; 
        border: none;
      }
      .min-fees{
          padding-left: 0;
      }
      .fees-text {
          display: flex;
          margin-top: 5px;
      }
      .programs-fees-text {
          display: block;
          margin-top: 5px;
      }
      .border-right-none{
         border-right: none;
      }
      .view-btn{
          position: absolute;
          display: none;
          top: 10px;
          right: 12px;
          width: 100px;
          height: 34px;
          font-size: 15px;
      }
      .fa-eye{
        margin-right: 7px;
      }

      .list-view{
        display: flex;
        flex-wrap: wrap;
      }
      .summary{
        width: 100%;
      }
      .apply-now{
        width: 100%; 
      }

      .pagination{
        width: 100%;
      }

      .apply-now-btn-modal{
        position: absolute;
        bottom: 0;
        right: 0;
        width: 100%;
        margin: 0;
        border: none;
        background: rgb(0 0 0 / 80%);
        text-align: center;
        padding: 10px;
        color: #fff;
        text-decoration: none;
        transition: 0.3s;
      }

      .apply-now-modal-box{
        max-width: 70%

      }
</style>