<?php
use yii\helpers\Url;
use frontend\components\CounterArchiveWidget; 
use common\models\Posts;
use common\models\Course;
use common\models\School;
use common\models\Country;
use common\models\SchoolImage;   
use yii\helpers\Html;

$image = SchoolImage::find()->where(['school_id'=>$model->id])->asArray()->one();
$Country = Country::find()->where(['id'=>$model->dest_country])->asArray()->one();
?>   
<!-- Sidebar --> 



                            
  <div class="col-md-12">
    <div class="collage-item">
      <div class="collage-img">
        <?php if(!empty($image['name'])):?>
              <img class="blog-image" src="uploads/<?= $image['name'];?>">
        <?php endif; ?>
         <!--  <a href="#" class="apply-now-btn">Apply Now</a> -->
      </div>
      <div class="college-text">
        <h4><?= $model->name; ?></h4>
        <label><?php if(!empty($Country['name'])): ?>
            <p>Location:  <?= $Country['name']; ?></p>
        <?php endif; ?> </label>
        <div class="fees-text">
          <div class="tuition-fees">
            <label><?= $model->min_price ?></label>
            <span>Min Fees</span>
          </div>
          <div class="application-fees">
           <label><?= $model->max_price ?></label>
            <span>Max Fees</span>
          </div>
          <div class="tuition-fees border-right-none">
            <label><?= $model->avg_price ?></label>
            <span>Avg Fees</span>
          </div>
          
        </div>
          <div class="apply-now">
            <a  class="common-dashboard-circle-btn" href="<?= Url::to(["/search-college/". $model->slug])?>"><i class="fa fa-eye margin-r-5"></i> View</a>



          </div>
          <!-- <div class=" row">
            
            <?= Html::a('<i class="fa fa-eye margin-r-5"></i>'.Yii::t('app', 'View'),['/recruiter/programs-colleges/view','id'=>$model->id], ['class' => 'btn btn-danger  btn-xs view-btn ']) ?>
          </div> -->
       
      </div>
    </div>
  </div>



