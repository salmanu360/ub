<?php
use frontend\components\CounterArchiveWidget;
use common\models\Course;
use common\models\Country;
use common\models\SchoolImage;
use common\models\School;
use common\models\Review;  
use common\models\AppliedCouncilStudent;


//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;	
use kartik\widgets\StarRating;
use yii\web\JsExpression;
use yii\bootstrap\Tabs;
use yii\widgets\Pjax;

  
  // $this->title = 'students';
// $college = CourseSearch::getCollegeByCourseId($model->id);

  $reviews = Review::find()->where(['type'=>0,'info_id'=>$model->id])->asArray()->all();
  $image = SchoolImage::find()->where(['school_id'=>$model->id])->asArray()->one();
  $Country = Country::find()->where(['id'=>$model->dest_country])->asArray()->one();
  $courses = Course::find()->where(['college_id'=>$model->id])->all();
  //$course = Course::findOne(['college_id' => $model->id]);

  //select * from course where college_id = 1 

    // echo "<pre>";
// var_dump($model->id);
   // var_dump($review);
/* var_dump($college);
 die('two');*/

?>
<!-- university detail page--------------------------------------------------------------------------------->


<section class="banner-menu mob-inner-height" style="height: 450px;">
  <div class="bg-video-wrap" style="background:linear-gradient( to right, #000 , #00000040) ,  url(uploads/<?= $image['name'];?>);background-repeat: no-repeat; background-size: cover; background-position: center;">
    <div class="container banner-caption mob-inner-caption">
      <div class="banner-text mb-3">
        <h2><?= $model->name; ?></h2>
      </div>
    </div>
  </div>
</section>


<section class="university-detail-header mt-5 mb-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
        <div class="uni-detail-main">
          <h4 class="common-heading custom-fs-22">
            <span><?= $model->name; ?></span>
           <!--  Ranking, Programs,Application Process, Cost of Attendance & Scholerships -->
          </h4>
          <div class="uni-detail-inner d-flex row">
              <div class="col-md-6 col-lg-3 uni-detail-iconbox">
                <i class="fas fa-map-marker-alt"></i>
                <label><b>University: </b> <span>School Type</span> </label>
              </div>
              <div class="col-md-6 col-lg-3 uni-detail-iconbox">
                <i class="fas fa-star"></i>
                <label> 4.5 </label>
              </div>
            </div>
            <div class="uni-detail-description">
            <p><?= str_replace('?',"'", utf8_decode($model->comment)); ?></p>
            </div>
          </div>
           <button class="common-btn " onclick="showApplyform('<?= "https://universitybureau.com/course/add?id=".$model->id ?>')"> Apply Now </button>
          <!-- <button class="common-btn">Apply Now</button> -->
        </div>
    </div>
    </div>
</section>


<!-- university detail body -->

<section class="university-detail-body mt-5 mb-5">
  <div class="container">
  <div class="row">
    <div class="col-md-8">
      <!-- detail tab panel  -->
      <div class="uni-detail-nav-panel">

        

        <?= Tabs::widget([
          'navType' => 'nav-tabs',
          'options' => ['class' => 'tabs-section', 'id' => 'myTab', 'role' => 'tablist'],
          'encodeLabels' => false,
          'items' => [
            [
                'label' => 'Home',
                'content' => $this->render('college_tab/_home', ['model' => $model]),
                'headerOptions' => ['class' => 'nav-item'],
                'linkOptions' => ['class' => 'nav-link'],
                'active' => true
            ],
            [
                'label' => 'Courses & Fees',
                'content' => $this->render('college_tab/_courses', ['courses' => $courses]),
                'headerOptions' => ['class' => 'nav-item tab-custom-width'],
                'linkOptions' => ['class' => 'nav-link tab-custom-width'],
            ],


             [
                'label' => 'Admission',
                'content' => $this->render('college_tab/_admission'),
                'headerOptions' => ['class' => 'nav-item'],
                'linkOptions' => ['class' => 'nav-link'],
            ],

             [
                'label' => 'Gallery',
                'content' => $this->render('college_tab/_gallery',['model' => $model]),
                'headerOptions' => ['class' => 'nav-item'],
                'linkOptions' => ['class' => 'nav-link'],
            ],

             [
                'label' => 'Review',
                'content' => $this->render('college_tab/_review', ['reviews' => $reviews, 'reviewModel' => $reviewModel]),
                'headerOptions' => ['class' => 'nav-item'],
                'linkOptions' => ['class' => 'nav-link'],
            ],

             [
                'label' => 'Accommodation',
                'content' => $this->render('college_tab/_accomodation'),
                'headerOptions' => ['class' => 'nav-item'],
                'linkOptions' => ['class' => 'nav-link'],
            ],            

             [
                'label' => 'FAQ',
                'content' => $this->render('college_tab/_faq'),
                'headerOptions' => ['class' => 'nav-item'],
                'linkOptions' => ['class' => 'nav-link'],
            ],
        ]]);
  ?>



          <div class="tab-content" id="myTabContent">

         
          
           
           

           
           
            
          </div>
      </div>

      <!-- detail tab panel ends-->

    </div>
    <div class="col-md-4">
      <div class="uni-detail-sidebar">
        <div class="sidebar-apply-now-btn text-center">
          <button class="common-btn w-100" onclick="showApplyform('<?= "https://universitybureau.com/course/add?id=".$model->id ?>')"> Apply Now </button>
         <!--  <button class="common-btn w-100">Apply Now</button> -->
        </div>
                <div class="siderbar-counselling-box text-center">
            <i class="fas fa-university"></i>
            <p>Interseted In this College ?</p>
            <!-- <button id="cust_btn" class="common-btn">Get Free Counselling</button> -->
              <button class="common-btn" onclick="showApplyform('<?= "https://universitybureau.com/course/add?id=".$model->id ?>')"> Get Free Counselling</button>
        </div>
        <div class="sidebar-follow-share-box text-center" style="position: relative;">
            <p>Follow & Share, To Get Information About Admission.</p>
            <!-- <button  id="cust_btn" class="common-btn"><i class="fas fa-user-plus"></i> Follow</button> -->
             <button class="common-btn w-100" onclick="showApplyform('<?= "https://universitybureau.com/course/add?id=".$model->id ?>')"> Follow </button>
            <!-- <a href="https://www.facebook.com/universitybureau" class="common-btn"><i class="fas fa-share-alt"></i> Share</a> -->
                    <div class="share-btn common-btn w-100"><i class="fas fa-share-alt"></i>Share</div>
                    <a href="https://www.facebook.com/universitybureau" ><div class="social facebook"><i class="fab fa-facebook-f"></i></div></a>
                    <a href="https://twitter.com/universitybure1 "><div class="social twitter"><i class="fab fa-twitter"></i></div></a>
                    <a href="https://www.linkedin.com/company/universitybureau"><div class="social linkedin"><i class="fab fa-linkedin"></i></a></div></a>
                    <a href="https://www.instagram.com/universitybureau/"><div class="social instagram"><i class="fab fa-instagram"></i></div></a>
        </div>


          


        <div class="sidebar-affilated-colleges-container">
          <div class="affilated-title">
              <h2>Affilated Colleges</h2>
          </div>
          <hr>
          <!-- affilated item list -->

           <?php



             $schools= School::find()->where(['show_home'=>1])->asArray()->all();

             foreach ($schools as $school):

             // $school=School::find()->where(['id'=>$course['college_id']])->asArray()->one();
              $image=SchoolImage::find()->where(['school_id'=>$school['id']])->asArray()->one();
              $Country=Country::find()->where(['id'=>$school['dest_country']])->asArray()->one();
            
           ?>
          

          <div class="affilated-item-box">
            <div class="affilated-thumb">
                      <?php if(!empty($image['name'])):?>
                        <img class="blog-image" src="uploads/<?= $image['name'];?>">
                      <?php endif; ?>
            </div>
            <div class="affilated-content">
             <a href="/search-college"> <h5><?= $school['name']; ?></h5> </a>
              <div class="uni-detail-iconbox">
                <i class="fas fa-map-marker-alt"></i>
               <!--  <label> Londaon, Ontario</label> -->

                <?php if(!empty($Country['name'])): ?>
                <label><?= $Country['name']; ?></label>
                <?php endif; ?> 
              </div>
            </div>
          </div>

           <?php endforeach; ?>

        
        </div>
      
      </div>
    </div>
  </div>
  </div>
</section>


<!-- university detail body ends-->

<!-- university detail similar projects-->



<!-- university detail similar projects-->

    <?= CounterArchiveWidget::widget(); ?>

<!-- university detail page ends--------------------------------------------------------------------------------->
     

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
    type:0
  },
  success: function(data){
    console.log(data);
    $('#show_model_apply').html(data);
  },
  error: function(error){
    console.log(error.message);
  }
});

}

</script>


<!-- /*************************share ***************/ -->
<script>
$(".share-btn").hover(function(){
  $(".social").toggleClass("visible");
});
$(".social").hover(function() {
  $(".social").addClass("visible")
}, function() {
  $(".social").removeClass("visible")
})
</script>
<!-- /*********************share end***************/
 -->


    
      





