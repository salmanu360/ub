<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var frontend\models\ForStudents $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'For Students');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'For Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud for-students-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Html::encode($model->ID) ?>
        <small>
            <?= Yii::t('models', 'For Students') ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?php 
  Html::a(
            '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
            [ 'update', 'ID' => $model->ID],
            ['class' => 'btn btn-info'])
          ?>

            <?php 
 /* echo Html::a(
            '<span class="glyphicon glyphicon-copy"></span> ' . 'Copy',
            ['create', 'ID' => $model->ID, 'ForStudents'=>$copyParams],
            ['class' => 'btn btn-success']) */
          ?>

            <?php 
             Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
            ['create'],
            ['class' => 'btn btn-success'])
          ?>

        <?php 
       /*  echo Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'Comment',
            ['/recruiter-comment/create?rid='.$model->recruiter_id],
            ['class' => 'btn btn-primary']) */
          ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
            . 'Full list', ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr/>

    <!-- <?php //$this->beginBlock('frontend\models\ForStudents'); ?> -->
    
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
            <th>twelve_certificate</th>
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
            <th>passport</th>
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
            <th>ielts</th>
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
            <th>graduation_certificate</th>
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
            <th>lor</th>
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
            <th>moi</th>
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
            <th>sop</th>
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
            <th>diploma_certificate</th>
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
            <th>master_certificate</th>
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
            <th>updated_cv</th>
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
        <!--///////////////////////-->
        
        
        <?php if(!empty($model->work_experiance)){?>
        <tr>
            <th>Work Experience</th>
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
            <?php echo $model->other_certificate;
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
    <?php 
 echo DetailView::widget([
    'model' => $model,
    'attributes' => [
      /*[
        'format' => 'raw',
        'attribute' => 'ten_certificate',
        'value' => function($model){
        //    return $upload_dir = Yii::getAlias('@webroot').'/uploads/';           
        $mainpath = Yii::getAlias('@webroot/');
        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
        $mainroot=$convertPath.'uploads/doc_student/'.$model->ten_certificate;
        $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->ten_certificate]);
        $urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->ten_certificate]);
        if(!empty($model->ten_certificate)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>
            <a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
      ],

      [
        'format' => 'raw',
        'attribute' => 'twelve_certificate',
        'value' => function($model){           
        $mainpath = Yii::getAlias('@webroot/');
        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
        $file=$convertPath.'uploads/doc_student/'.$model->twelve_certificate;
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
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$model->passport;
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
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$model->ielts;
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
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$model->graduation_certificate;
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
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$model->lor;
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
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$model->moi;
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
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$model->sop;
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
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$model->diploma_certificate;
        $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->diploma_certificate]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->diploma_certificate]);
        if(!empty($model->diploma_certificate)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],


    [
        'format' => 'raw',
        'attribute' => 'master_certificate',
        'value' => function($model){
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$model->master_certificate;
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
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$model->updated_cv;
        $url=Url::to(['student/downloaddocument','id'=>$model->ID,'c'=>$model->updated_cv]);$urldoc=Url::to(['student/showdocument','id'=>$model->ID,'c'=>$model->updated_cv]);
        if(!empty($model->updated_cv)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a><a target="_blank" href="'.$urldoc.'" class="btn btn-success">Show</a>';
                         }           
        }
    ],*/
    
   


        'first_name',
        'last_name',
        'birth_date',
        'gender',
        
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
        'first_language',
        'marital_status',
        'passport_no',
        'address:ntext',
        'city',
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
                'label' => 'Recruiter Email',
                'value' => function($model){
                    $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                       if($Recruiters){
                        return $Recruiters->email;
                       }else{
                        return "N/A";
                       }
                }
            ],
            
            
            [
                'format' => 'html',
                'label' => 'Recruiter Phone',
                'value' => function($model){
                    $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                       if($Recruiters){
                        return $Recruiters->phone;
                       }else{
                        return "N/A";
                       }
                }
            ],
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
        'grading_scheme',
        //'refused_visa',
        'details:ntext',
        'consent',
        'grade_scale',
        // 'graduated_recent_school',
        'exact_score_listening',
        'exact_score_reading',
        'exact_score_writing',
        'exact_score_speaking',
        'exact_score_overall',
        'have_gre_exam',
        'gre_verbal_score',
        'gre_verbal_rank',
        'gre_quantitative_score',
        'gre_quantitative_rank',
        'gre_writing_score',
        'gre_writing_rank',
        'have_gmat_exam',
        'gmat_verbal_score',
        'gmat_verbal_rank',
        'gmat_quantitative_score',
        'gmat_quantitative_rank',
        'gmat_writing_score',
        'gmat_writing_rank',
        'gmat_total_score',
        'gmat_total_rank',
        'passport_expiry_date',
        'date_of_exam',
        'gre_exam_date',
        'gmat_exam_date',
        'phone_no',
        //'country_of_interest',
        //'service_of_interest',
        // 'state',
        'study_permit',
        'grade_average',
        'english_exam_type',
    
            
    ],
    ]);
  ?>

    
    <hr/>

    <?php 
 echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->ID],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]);
  ?>
    <!-- <?php //$this->endBlock(); ?> -->


    
    <?php 
        echo Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [
      [
          'label'   => '<b class=""># '.Html::encode($model->ID).'</b>',
          // 'content' => $this->blocks['common\models\Student'],
          'active'  => true,
      ],
      ]
                 ]
    );
    ?>
</div>
