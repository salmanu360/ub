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

$this->title="Admin Dashboard";
$count_school=School::find()->count();
$total_recruiters=Recruiters::find()->count();
$new_recruiters=Recruiters::find()->where(['status'=>0])->count();
$total_students=Student::find()->count();

?>

  <!-- page content -->
  <div class="dashboard" role="main">
          <div class="">
            <div class="row">
            <div class="top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i style="color:red" class="fa fa-building"></i></div>
                  <div class="count"><b><?= $count_school; ?></b></div>
                  <h3>Total School</h3>
                  <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i  style="color:blue" class="fa fa-users"></i></div>
                  <div class="count"><?= $total_recruiters; ?></div>
                  <h3>Total Recruiters</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i  style="color:green" class="fa fa-users"></i></div>
                  <div class="count"><?= $new_recruiters; ?></div>
                  <h3>New Recruiters</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count"><?= $total_students; ?></div>
                  <h3>Total Students</h3>
                  
                </div>
              </div>
            </div>
          </div>

          </div>
        </div>
        <!-- /page content -->