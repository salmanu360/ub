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
use frontend\models\CourseSearch;
use kartik\widgets\Typeahead;
use yii\web\JsExpression;

$college = CourseSearch::getCollegeByCourseId($model->id);
?>   
<!-- Sidebar -->                      
  <div class="col-md-4">
    <div class="collage-item programs">
      <div class="collage-img w-100">        
        <a>
            <img src="uploads/<?=CourseSearch::getCollegeImageByCourseId($model->id)?>" alt="<?=$college->name?>">

            <button class="apply-now-btn-modal" onclick="showApplyform('<?= "https://universitybureau.com/course/add?id=".$model->id ?>')"> Apply Now</button>

            <?php 

                                //   echo Html::a(
                                //      Yii::t('occ', 'Apply Now'), 
                                //     ['course/add', 'id'=>$model->id], 
                                //     [
                                //         'title' => Yii::t('occ', 'Apply Now'),
                                //         'class' => 'apply-now-btn-modal',
                                //         'aria-label' => Yii::t('occ', ' Apply Now'),
                                //         'data-pjax' => '0',
                                //         'data'=>['target'=>'#modal_school_details', 'toggle'=>'modal'],
                                //     ]
                                // ) ;
            ?>
        </a>



     


      </div>
      <div class="programs-college-text">
        <h4>
          <a href="<?=Url::to(['/recruiter/programs-colleges/index'])?>" class="header-link"><?= $model->name; ?></a>
        </h4>
        <div class="programs-title-content">            
            <p><i class="fa fa-university" aria-hidden="true" title="College"></i> <b><?=$college->name?></b></p>
            <p><i class="fa fa-map-marker-alt" aria-hidden="true"></i> <b><?=CourseSearch::getCollegeLocationByCourseId($model->id)?></b></p>
        </div>
        <label class="p-comment"><?= substr($model->comment, 0, 100) ?>...</label>
        
        <div class="programs-fees-text">
          <div class="tuition-fees min-fees">
            <label>Tution Fee</label>
            <label><?= $model->tution_fee ?></label>
          </div>
          <div class="application-fees">
            <label>Application Fee</label>            
            <label><?= $model->application_fee ?></label>
          </div>
         
        </div>       
      </div>
    </div>
  </div>
<!-- Modal -->
  
<?php
$script = <<< JS
   
JS;
$this->registerJs($script);
?>
