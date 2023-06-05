  <?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;
use common\models\School;
use common\models\Country;
use common\models\SchoolImage;   
use common\models\Course;
use frontend\models\CourseSearch;
use backend\models\SchoolSearch;
use kartik\widgets\Typeahead;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;


      $image=SchoolImage::find()->where(['school_id'=>$model->id])->asArray()->one();
       $Country=Country::find()->where(['id'=>$model->dest_country])->asArray()->one();
       $courses = Course::find()->where(['college_id'=>$model->id])->all();
       // $course = SchoolSearch::getCoursesBySchoolId($model->id);


// var_dump($images);
// die();
?>

 <main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">
              <div class="row">

                <div class="col-md-12">
                  <div class="dashboard-card mb-5">
                    <?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Back'),['/recruiter/programs-colleges/index'], ['class' => 'btn btn-danger btn-flat back-btn']) ?>
                    <h4 class="common-dashboard-heading mt-3 my-school-heading">My School</h4>

                    <div class="row">
                      <div class="col-md-4 detail-view-img">
                        <?php if(!empty($image['name'])):?>
                            <img class="blog-image" src="uploads/<?= $image['name'];?>">
                        <?php endif; ?>
                      </div>
                      <div class="col-md-8">
                          <h4 class="common-dashboard-heading"><?= $model->name; ?></h4>
                          <p class="common-dashboard-heading"><span style="color:red">Location:</span>  <?= $Country['name']; ?></p>
                          <p class="common-dashboard-heading"><span style="color:red">Min Fees:</span>   <?= $model->min_price ?> <span style="color:red">Max Fees: </span>  <?= $model->max_price ?> <span style="color:red">Avg Fees: </span>  <?= $model->avg_price ?></p>
            
                        <p><?= $model->comment ?></p>
                        <!--<h4 class="common-dashboard-heading mt-4">Admission Requirements</h4>
                        <ul class="common-list">
                          <li>IELTS Score - for diploma 6 and less then 5.5, PTE 52</li>
                          <li>For PG Diploma- 6.5 not less then 5.5</li>
                          <li>50% in 12th or Graduation</li>
                          <li>IELTS 6.5 and NOT less then 5.5 for Generic Degrees</li>
                        </ul>-->
                      </div>
                    </div>
                  </div>
                <div class="important-dates-container mb-5">
                <table class="table table-bordered important-dates-table">
                  <thead>
                    <tr>
                      <th>Program</th>
                      <th>Tution Fees</th>
                      <th>Application Fees</th>
                      <th>Intake</th>
                      <th>Duration</th>
                      <th>Apply  </th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach($courses as $course): 

                    $app=$course['application_fee'];
                    $tution=$course['tution_fee'];
                    $prgrm=$course['name'];
                    if(!empty($course['intake'])){
                        $intake=date('M Y',strtotime($course['intake']));
                    }else{
                        $intake='N/A';
                    }


                    ?>
                    <tr>
                      <td>
                      <?= Html::a(Yii::t('app', $prgrm),['/recruiter/programs-colleges/courseview','id'=>$course->id],['class' => 'normal-text']) ?>
                      </td>
                      <td><?= $tution; ?></td>
                      <td><?= $app; ?></td>
                      <td><?= $intake; ?></td>
                      <td><?= $course['discount']; ?></td>
                        <td>
                            <!--<?= Html::a(Yii::t('app', 'View'),['/recruiter/programs-colleges/courseview','id'=>$course->id],['class' => 'btn btn-primary']) ?>-->
                             <?= Html::a(Yii::t('app', 'Apply Now'),['/recruiter/programs-colleges/apply-now'], ['class' => 'common-dashboard-circle-btn', 'data-course-id' =>$course->id, 'data-college-id' => $model->id,'data-bs-toggle'=> 'modal', 'data-bs-target' => '#studentModal']) ?></td>

                    </tr>
                    

                      <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                </div>
          </div>
</main>



<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Check Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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






<style type="text/css">

.dashboard-card{
    position: relative;
}
.my-school-heading{
    font-size: 1.5rem;
}
.back-btn{
    position: absolute;
    top: 24px;
    right: 18px;
} 
.fa-undo{
    margin-right: 6px;
}
.detail-view-img{
    position: relative;
    height: inherit;
    width: 320px;
    height: 250px;
}
.detail-view-img img{
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    border-radius: 0;
    margin-left: 5px;
    padding: 0 10px;  
}

</style>