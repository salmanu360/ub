  <?php
//   ($model->attributes);
//  echo $model->body;
//  echo $model->updated_at;
//   die();
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\School;
use common\models\Recruiters;
use common\models\Student;
use common\models\AssignUnivCourse;

$count_school=School::find()->count();
$total_recruiters=Recruiters::find()->count();
$new_recruiters=Recruiters::find()->where(['status'=>0])->count();
$total_students=Student::find()->where(['assign_application_team'=>Yii::$app->user->id])->count();
$total_lead1=Student::find()->where(['lead_status'=>1])->count();
$total_lead5=Student::find()->where(['lead_status'=>5])->count();
$total_lead6=Student::find()->where(['lead_status'=>6])->count();
$total_lead7=Student::find()->where(['lead_status'=>7])->count();
$total_lead8=Student::find()->where(['lead_status'=>8])->count();
$assignuniv=AssignUnivCourse::find()->select(['student_id'])->distinct()->count();
$lead=\common\models\LeadStatuses::find()->all();
?>

  <!-- page content -->
  <div class="dashboard" role="main">
          <div class="">
            <div class="row">
                
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <a href="<?php echo Url::to(['/assign-univ-course/studentlistapplication'])?>">
                  <div class="tile-stats">
                    <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                    <div class="count"><?= $assignuniv; ?></div>
                    <h4 style="margin-left: 14px;color:#BAB8B8"><?= ucfirst('Total Students Assign') ?></h4>
                  </div>
                  </a>
              </div>
            <div class="top_tiles">
              
             <!-- lead -->
             
              <?php foreach($lead as $leadvalue){
                $leadcount=Student::find()->where(['lead_status'=>$leadvalue->id,'assign_application_team'=>Yii::$app->user->id])->count();
                ?>
                <a href="<?php echo Url::to(['/assign-univ-course/studentlistapplication','id'=>$leadvalue->id])?>">
                
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                
                  <div class="tile-stats">
                    <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                    <div class="count"><?= $leadcount; ?></div>
                    <h4 style="margin-left: 14px;color:#BAB8B8"><?= ucfirst($leadvalue->name) ?></h4>
                  </div>
                  </a>
                  
              </div>
              <?php }?>
              <!-- lead end -->
              
            
             
              
            </div>
          </div>

          </div>
        </div>
        <!-- /page content -->