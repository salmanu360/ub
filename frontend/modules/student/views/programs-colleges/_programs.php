<?php
use yii\helpers\Url;
use frontend\components\CounterArchiveWidget; 
use common\models\Posts;
use common\models\Course;
use common\models\School;
use common\models\Country;
use common\models\SchoolImage;   
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\CourseSearch;
use frontend\models\ForStudents;
use kartik\widgets\Typeahead;
use yii\web\JsExpression;

$user_id = Yii::$app->user->identity->id;
$college = CourseSearch::getCollegeByCourseId($model->id);
$student = ForStudents::findOne(['user_id' => $user_id]);
?>   
<!-- Sidebar -->                            
  <div class="col-md-12">
    <div class="collage-item programs">
      <div class="collage-img">        
        <a href="<?=Url::to(['/recruiter/programs-colleges/index'])?>">
            <img src="uploads/<?=CourseSearch::getCollegeImageByCourseId($model->id)?>" alt="<?=$college->name?>">
        </a>
        <?php $form = ActiveForm::begin([
            'id' => 'apply-form',
            'action' => Url::to(['/student/programs-colleges/apply-now']),
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            ]);
          ?>
            <input type="hidden" name="course-id" id="course-id" value="<?=$model->id?>">
            <input type="hidden" name="college-id" id="college-id" value="<?=$college->id?>">
            <input type="hidden" name="student-id" id="student-id" value="<?=$student->id?>">
          <?= Html::submitButton('Apply Now', ['class' => 'apply-now-btn']); ?>
          <?php ActiveForm::end(); ?> 
        <?php //Html::a(Yii::t('app', 'Apply Now'), ['/recruiter/programs-colleges/apply-now'], ['class' => 'apply-now-btn', 'data-course-id' => $model->id, 'data-college-id' => $college->id]) ?>
      </div>
      <div class="college-text">
        <h4>
          <a href="<?=Url::to(['/recruiter/programs-colleges/index'])?>" class="header-link"><?= $model->name; ?></a>
        </h4>
        <div class="d-flex pt-2 justify-content-between">            
            <p><i class="fa fa-university" aria-hidden="true" title="College"></i> <b><?=$college->name?></b></p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i> <b><?=CourseSearch::getCollegeLocationByCourseId($model->id)?></b></p>
        </div>
        <label><?= substr($model->comment, 0, 180) ?>...</label>
        
        <div class="fees-text">
          <div class="tuition-fees min-fees">
            <label><?= $model->tution_fee ?></label>
            <span>Tution Fee</span>
          </div>
          <div class="application-fees">
           <label><?= $model->application_fee ?></label>
            <span>Application Fee</span>
          </div>
          <div class="apply-now">
          <?php $form = ActiveForm::begin([
            'id' => 'apply-form',
            'action' => Url::to(['/student/programs-colleges/apply-now']),
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            ]);
          ?>
            <input type="hidden" name="course-id" id="course-id" value="<?=$model->id?>">
            <input type="hidden" name="college-id" id="college-id" value="<?=$college->id?>">
            <input type="hidden" name="student-id" id="student-id" value="<?=$student->id?>">
          <?= Html::submitButton('Apply Now', ['class' => 'common-dashboard-circle-btn']); ?>
          <?php ActiveForm::end(); ?>          
            <!-- <?php //Html::a(Yii::t('app', 'Apply Now'),['/recruiter/programs-colleges/apply-now'], ['class' => 'common-dashboard-circle-btn', 'data-course-id' => $model->id, 'data-college-id' => $college->id]) ?> -->
          </div>
        </div>       
      </div>
    </div>
  </div> 
<?php
$script = <<< JS
    $(function(){
      
    }); 
JS;
$this->registerJs($script);
?>

