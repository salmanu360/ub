  <?php
use yii\helpers\Url;
use frontend\components\CounterArchiveWidget; 
use common\models\Posts;
use common\models\Course;
use common\models\School;
use common\models\Country;
use common\models\SchoolImage;   
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\widgets\Typeahead;
use yii\web\JsExpression;

$image = SchoolImage::find()->where(['school_id'=>$model->id])->asArray()->one();
$Country = Country::find()->where(['id'=>$model->dest_country])->asArray()->one();
?>   
<!-- Sidebar --> 
                            
  <div class="col-md-12">
    <div class="collage-item">
      <div class="collage-img">
        <?php if(!empty($image['name'])):?>
          <a href="<?=Url::to(['/recruiter/programs-colleges/view','id'=>$model->id])?>">
            <img src="uploads/<?= $image['name'];?>" alt="">
          </a>  
          <a  class="apply-now-btn " href="<?=Url::to(['/recruiter/programs-colleges/view','id'=>$model->id])?>"><i class="fa fa-eye margin-r-5"></i> View</a>
        <?php endif; ?>
      </div>
            

      <div class="college-text">
        <h4>
          <a href="<?=Url::to(['/recruiter/programs-colleges/view', 'id' => $model->id])?>" class="header-link"><?= $model->name; ?></a>
        </h4>
        <label><?php if(!empty($Country['name'])): ?>
            <p>Location:  <?= $Country['name']; ?></p>
        <?php endif; ?> </label>
        <div class="fees-text">
          <div class="tuition-fees min-fees">
            <label><?= $model->min_price ?></label>
            <span>Min Fees</span>
          </div>
          <div class="application-fees">
           <label><?= $model->max_price ?></label>
            <span>Max Fees</span>
          </div>
          <div class="application-fees">
            <label><?= $model->avg_price ?></label>
            <span>Avg Fees</span>
          </div>
          
          <!-- <div class="apply-now">
            <?= Html::a(Yii::t('app', 'Apply Now'),['/recruiter/programs-colleges/apply-now'], ['class' => 'common-dashboard-circle-btn', 'data-college-id' => $model->id,'data-bs-toggle'=> 'modal', 'data-bs-target' => '#studentModal']) ?>
          </div> -->
        </div>       
      </div>
    </div>
  </div>
<?php
$script = <<< JS
    
JS;
$this->registerJs($script);
?>

