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
  <div class="row">
      <div class="col-md-12">
        <div class="collage-item programs">
          <div class="collage-img">        
            <a href="<?=Url::to(['/recruiter/programs-colleges/index'])?>">
                <img src="uploads/<?=CourseSearch::getCollegeImageByCourseId($model->id)?>" alt="<?=$college->name?>">
            </a>
            <?= Html::a(Yii::t('app', 'Apply Now'), ['/recruiter/programs-colleges/apply-now'], ['class' => 'apply-now-btn', 'data-course-id' => $model->id, 'data-college-id' => $college->id, 'data-bs-toggle'=> 'modal', 'data-bs-target' => '#studentModal']) ?>
          </div>
          <div class="college-text">
            <h4>
              <a href="<?=Url::to(['/recruiter/programs-colleges/courseview','id'=>$model->id])?>" class="header-link"><?= $model->name; ?></a>
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
                <?= Html::a(Yii::t('app', 'Apply Now'),['/recruiter/programs-colleges/apply-now'], ['class' => 'common-dashboard-circle-btn', 'data-course-id' => $model->id, 'data-college-id' => $college->id,'data-bs-toggle'=> 'modal', 'data-bs-target' => '#studentModal']) ?>
                <!--<?= Html::a(Yii::t('app', 'View'),['/recruiter/programs-colleges/courseview','id'=>$model->id],['class' => 'common-circle-blue-btn']) ?>-->
              </div>
            </div>       
          </div>
        </div>
      </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Check Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="row">
          <div class="col-md-10 alert alert-info" role="alert" style="margin-left: 20px;">
           Please Register your student before apply <a class="btn btn-primary" href="<?php echo Url::to(['student/create'])?>">Register</a>
          </div>
        </div>
      <div class="modal-body">        
        <?php
          // Defines a custom template with a <code>Handlebars</code> compiler for rendering suggestions
          echo '<label class="control-label">Select a Student to apply</label>';
          $template = '<div><p class="repo-language">[{{ID}}] {{first_name}} {{last_name}} ({{email_id}})</p></div>';
          
          echo Typeahead::widget([
            'name' => 'search_student', 
            'options' => ['placeholder' => 'Search student name, email or ID ...'],
            'pluginOptions' => ['highlight'=>true],
            'dataset' => [
              [
                  //'prefetch' => Yii::getAlias('@web/uploads/') . 'repos.json',
                  'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('first_name')",
                  'display' => 'first_name',
                  'templates' => [
                      'notFound' => '<div class="text-danger" style="padding:0 8px">Unable to find student for selected query.</div>',
                      'suggestion' => new JsExpression("Handlebars.compile('{$template}')")
                  ],
                  'remote' => [
                    'url' => Url::to(['/recruiter/programs-colleges/student-list']) . '?q=%QUERY',
                    'wildcard' => '%QUERY'
                  ],
              ]
            ],
            'pluginEvents' => [
              "typeahead:select" => "function(e, val) {
                jQuery('#stud-id').val(val.ID);
              }",
            ]
          ]);
        ?>
      </div>
      <div class="modal-footer">
        <!-- <input type="hidden" name="stud_id" id="stud-id" value=""> -->
        <!-- <input type="hidden" name="college_Id" id="college-id" value=""> -->

        <?php $form = ActiveForm::begin([
            'action' => ['save-apply'],
            'method' => 'post',
        ]); ?> 

        <?= $form->field($StudentCollegeApplied, 'student_id')->hiddenInput(['id'=>'stud-id','class'=>'form-control','value'=> ''])->label(false)?>
        <?= $form->field($StudentCollegeApplied, 'college_id')->hiddenInput(['id'=>'college-id','class'=>'form-control','value'=> ''])->label(false)?>
        <?= $form->field($StudentCollegeApplied, 'course_id')->hiddenInput(['id'=>'course-id','class'=>'form-control','value'=> ''])->label(false)?>

        <?= Html::submitButton(Yii::t('app', 'Apply'),  ['class' => 'common-circle-blue-btn mb-3 mt-3']) ?>
        <?php ActiveForm::end(); ?>

        <!-- <button type="button" class="common-circle-blue-btn mb-3 mt-3">Apply</button> -->
        <button type="button" class="common-dashboard-circle-btn mb-3 mt-3" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>   
<?php
$script = <<< JS
    $(function(){
      $('#studentModal').on('show.bs.modal', function(e) {
        var courseId = $(e.relatedTarget).data('course-id');
        var collegeId = $(e.relatedTarget).data('college-id');
        $(e.currentTarget).find('#course-id').val(courseId);
        $(e.currentTarget).find('#college-id').val(collegeId);
      });
    }); 
JS;
$this->registerJs($script);
?>

