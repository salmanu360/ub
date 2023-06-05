<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\Student $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Student');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'Student'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'View';
?>

<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">
  <div class="row">
      <div class="col-sm-12">
        <div class="dashboard-card mb-5">
            <div class="performance">
              <div class="heading-with-select">
                <h4 class="common-dashboard-heading"> View
                  <small>
                      <?= Yii::t('models', 'Student') ?>
                  </small></h4>
                  <label class="new-btn">
                    <?php 
                    echo Html::a(
                      '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
                      [ 'update', 'ID' => $model->ID],
                      ['class' => 'common-dashboard-red-btn w-100'])
                    ?>
                  </label>
              </div>
            </div>
            <div class="giiant-crud student-view">

              <!-- flash message -->
              <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
                  <span class="alert alert-info alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <?= \Yii::$app->session->getFlash('deleteError') ?>
                  </span>
              <?php endif; ?>

 


<div class="clearfix crud-navigation">

<!-- menu buttons -->
<div class='pull-left'>
  <?php 
echo Html::a(
  '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
  [ 'update', 'ID' => $model->ID],
  ['class' => 'btn btn-info'])
?>

  <?php 
echo Html::a(
  '<span class="glyphicon glyphicon-copy"></span> ' . 'Copy',
  ['create', 'ID' => $model->ID, 'Student'=>$copyParams],
  ['class' => 'btn btn-success'])
?>

  <?php 
echo Html::a(
  '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
  ['create'],
  ['class' => 'btn btn-success'])
?>

<?= Html::a('<span class="glyphicon glyphicon-list"></span> '
  . 'Full list', ['index'], ['class'=>'btn btn-danger']) ?>
</div>
 

</div>

<hr/>

<?php $this->beginBlock('common\models\Student'); ?>


<?php 
  echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'portalId',
            [
            'format' => 'html',
            'attribute' => 'created_date',
            'value' => function($model){
                   if($model->created_date){
                    return date('d-m-Y',strtotime($model->created_date));
                   }else{
                    return "N/A";
                   }
            }
            ],
        [
            'format' => 'html',
            'attribute' => 'recruiter_id',
            'value' => function($model){
                $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                   if($Recruiters){
                    return $Recruiters->owner_first_name .' '.$Recruiters->owner_last_name;
                   }else{
                    return "N/A";
                   }
            }
        ],
        [
            'format' => 'html',
            'attribute' => 'country_of_interest',
            'value' => function($model){
                $country=\common\models\Country::findOne($model->country_of_interest);
                   if($country){
                    return $country->name;
                   }else{
                    return "N/A";
                   }
            }
        ],
        'first_name',
        'birth_date',
        'email_id:email',
        'phone_no',
        'gender',
        'comment',
        [
            'format' => 'html',
            'attribute' => 'intake',
            'value' => function($model){
                if($model->intake){
                    return date('d-m-Y',strtotime($model->intake));
                }else{
                    return 'N/A';
                }
            }
        ],
        [
            'format' => 'html',
            'attribute' => 'country_of_citizenship',
            'value' => function($model){
                $country=\common\models\Country::findOne($model->country_of_citizenship);
                   if($country){
                    return $country->name;
                   }else{
                    return "N/A";
                   }
            }
        ],
        
        [
            'format' => 'html',
            'attribute' => 'lead_status',
            'value' => function($model){
                $LeadStatuses=\common\models\LeadStatuses::findOne($model->lead_status);
                   if($LeadStatuses){
                    return $LeadStatuses->name;
                   }else{
                    return "N/A";
                   }
            }
        ],
        'first_language',
        'marital_status',
        'passport_no',
        'address:ntext',
        'city',
        [
            'format' => 'html',
            'attribute' => 'country',
            'value' => function($model){
                $country=\common\models\Country::findOne($model->country);
                   if($country){
                    return $country->name;
                   }else{
                    return "N/A";
                   }
            }
        ],
        'zip_code',
        [
            'format' => 'html',
            'attribute' => 'country_of_education',
            'value' => function($model){
                $country=\common\models\Country::findOne($model->country_of_education);
                 if($country){
                    return $country->name;
                   }else{
                    return "N/A";
                   }
            }
        ],
        [
            'format' => 'html',
            'attribute' => 'highest_level_education',
            'value' => function($model){
                $LevelEducation=\common\models\LevelEducation::findOne($model->highest_level_education);
                if($LevelEducation){
                    return $LevelEducation->edu_name;
                   }else{
                    return "N/A";
                   }
            }
        ],

        [
            'format' => 'html',
            'attribute' => 'grading_scheme',
            'value' => function($model){
                $grading_scheme=\common\models\GradingScheme::findOne($model->grading_scheme);
                if($grading_scheme){
                    return $grading_scheme->name;
                   }else{
                    return "N/A";
                   }
                }
             ],
        'graduated_recent_school',
        'refused_visa',
        'exact_score_listening',
        'exact_score_reading',
        'exact_score_writing',
        'exact_score_speaking',
        'exact_score_overall',
        'passport_expiry_date',
        'date_of_exam',
        'details:ntext',
        'middle_name',
        'last_name',
        'referral_source',
        'state',
        'english_exam_type',
        'study_permit',
        /*[
        'format' => 'raw',
        'attribute' => 'ten_certificate',
        'value' => function($model){        
        $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->ten_certificate]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->ten_certificate]);
        if(!empty($model->ten_certificate)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
      ],

      [
        'format' => 'raw',
        'attribute' => 'twelve_certificate',
        'value' => function($model){
        //    return $upload_dir = Yii::getAlias('@webroot').'/uploads/';           
        $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->twelve_certificate]);
        $urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->twelve_certificate]);
        if(!empty($model->twelve_certificate)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],


    [
        'format' => 'raw',
        'attribute' => 'passport',
        'value' => function($model){
            $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->passport]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->passport]);
        if(!empty($model->passport)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],


    [
        'format' => 'raw',
        'attribute' => 'ielts',
        'label' => 'IELTS/PTE/TOEFL',
        'value' => function($model){
            $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->ielts]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->ielts]);
        if(!empty($model->ielts)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],

    [
        'format' => 'raw',
        'attribute' => 'graduation_certificate',
        'value' => function($model){
            $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->graduation_certificate]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->graduation_certificate]);
        if(!empty($model->graduation_certificate)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],


    [
        'format' => 'raw',
        'attribute' => 'lor',
        'label' => 'LOR',
        'value' => function($model){
            $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->lor]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->lor]);
        if(!empty($model->lor)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],


    [
        'format' => 'raw',
        'attribute' => 'moi',
        'label' => 'MOI',
        'value' => function($model){
            $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->moi]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->moi]);
        if(!empty($model->moi)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],


    [
        'format' => 'raw',
        'attribute' => 'sop',
        'label' => 'SOP',
        'value' => function($model){
            $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->sop]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->sop]);
        if(!empty($model->sop)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],

    [
        'format' => 'raw',
        'attribute' => 'diploma_certificate',
        'value' => function($model){
            $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->diploma_certificate]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->diploma_certificate]);
        if(!empty($model->diploma_certificate)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],


    [
        'format' => 'html',
        'attribute' => 'master_certificate',
        'value' => function($model){
            $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->master_certificate]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->master_certificate]);
        if(!empty($model->master_certificate)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],
    [
        'format' => 'raw',
        'attribute' => 'updated_cv',
        'value' => function($model){
            $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->updated_cv]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->updated_cv]);
        if(!empty($model->updated_cv)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],*/
    
   

        // 'upload_document',
        ],
    ]);
?>

<table class="table table-striped table-hover table-bordered">
    <thead>
        <?php if(!empty($model->ten_certificate)){?>
        <tr>
            <th>Ten Certificate</th>
            <?php
            $other_explode_work= explode(',',$model->ten_certificate);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
            <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
            
            </td>
            <?php }?>
        </tr>
        <?php }?>
        
         <?php if(!empty($model->twelve_certificate)){?>
        <tr>
            <th>Twelve Certificate</th>
            <?php
            $other_explode_work= explode(',',$model->twelve_certificate);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
            <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
            
        </tr>
        <?php }?>
        
         <?php if(!empty($model->passport)){?>
        <tr>
            <th>Passport</th>
            <?php
            $other_explode_work= explode(',',$model->passport);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
            <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              
            </td>
            <?php }?>
        </tr>
        <?php }?>
        
        
         <?php if(!empty($model->ielts)){?>
        <tr>
            <th>IELTS</th>
            <?php
            $other_explode_work= explode(',',$model->ielts);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
            <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
        </tr>
        <?php }?>
        
        
         <?php if(!empty($model->graduation_certificate)){?>
        <tr>
            <th>Graduation Certificate</th>
            <?php
            $other_explode_work= explode(',',$model->graduation_certificate);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
                <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
        </tr>
        <?php }?>
        
         <?php if(!empty($model->lor)){?>
        <tr>
            <th>LOR</th>
            <?php
            $other_explode_work= explode(',',$model->lor);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
                <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
        </tr>
        <?php }?>
        
        
         <?php if(!empty($model->moi)){?>
        <tr>
            <th>MOI</th>
            <?php
            $other_explode_work= explode(',',$model->moi);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
                <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
        </tr>
        <?php }?>
        
         <?php if(!empty($model->sop)){?>
        <tr>
            <th>SOP</th>
            <?php
            $other_explode_work= explode(',',$model->sop);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
                <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
        </tr>
        <?php }?>
        
         <?php if(!empty($model->diploma_certificate)){?>
        <tr>
            <th>Diploma Certificate</th>
            <?php
            $other_explode_work= explode(',',$model->diploma_certificate);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
                <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
        </tr>
        <?php }?>
        
        
        <?php if(!empty($model->master_certificate)){?>
        <tr>
            <th>Master Certificate</th>
            <?php
            $other_explode_work= explode(',',$model->master_certificate);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
                <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
        </tr>
        <?php }?>
    <?php if(!empty($model->updated_cv)){?>
        <tr>
            <th>Updated CV</th>
            <?php
            $other_explode_work= explode(',',$model->updated_cv);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
                <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
        </tr>
        <?php }?>
    <?php if(!empty($model->work_experiance)){?>
        <tr>
            <th>Work Experiance</th>
            <?php
            $other_explode_work= explode(',',$model->work_experiance);
            foreach($other_explode_work as $key =>$other1){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other1]);
                $urldoc1=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other1]);
                ?>
                <td>
                <a target="_blank" href="<?php echo $urldoc1?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
        </tr>
        <?php }?>
        <?php if(!empty($model->other_certificate)){?>
        <tr>
            <th>Other Certificate</th>
            <?php
            $other_explode= explode(',',$model->other_certificate);
            foreach($other_explode as $key =>$other){
                $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$other]);
                $urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$other]);?>
                <td>
                <a target="_blank" href="<?php echo $urldoc?>" class="btn btn-success">Show</a>
              <a href="<?php echo $url?>"  class="" title="Download document">Download Attachment  | <i class="fa fa-download fa-fw"></i></a>
              </td>
            <?php }?>
        </tr>
<?php }?>
        
    </thead>
    </table>
<hr/>
<h2>Recrutier Comments</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Unique ID</th>
            <th>Student</th>
            <th>RM</th>
            <th>Comment</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <tbody>
            <?php $query = \common\models\RmRecruiterComment::find()->where(['recruiter_id'=>Yii::$app->user->identity->recruiter->id])->all();
            $i=0;
            foreach($query as $value){
                $Student=\common\models\Student::find()->where(['ID'=>$value->student_id])->one();
                $User=\common\models\User::find()->where(['id'=>$value->rm_id])->one();
                $i++;
                ?>
                <tr>
                    <td><?= $i;?></td>
                    <td><?= $value->id;?></td>
                    <td><?= $Student->first_name .' '.$Student->last_name;?></td>
                    <td><?= $User->username .' '.$User->email;?></td>
                    <td><?= $value->comment;?></td>
                    <td><?= date('d-m-Y',strtotime($value->date_created));?></td>
                </tr>

            <?php }?>
        </tbody>
    </tbody>
</table>
<?php 
echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'ID' => $model->ID],
[
'class' => 'btn btn-danger',
'data-confirm' => '' . 'Are you sure to delete this item?' . '',
'data-method' => 'post',
]);
?>
<?php $this->endBlock(); ?>



<?php 
echo Tabs::widget(
       [
           'id' => 'relation-tabs',
           'encodeLabels' => false,
           'items' => [
[
'label'   => ' ',
'content' => $this->blocks['common\models\Student'],
'active'  => true,
],
]
       ]
);
?>
</div>
        </div>
    </div>
  </div>
</main>