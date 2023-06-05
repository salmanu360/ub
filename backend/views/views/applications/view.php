<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var frontend\models\ForStudentApplications $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'For Student Applications');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'For Student Applications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';

?>
<div class="giiant-crud for-student-applications-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Html::encode($model->id) ?>
        <small>
            <?= Yii::t('models', 'For Student Applications') ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?php 
/*  echo Html::a(
            '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
            [ 'update', 'id' => $model->id],
            ['class' => 'btn btn-info']) */
          ?>

            <?php 
/*  echo Html::a(
            '<span class="glyphicon glyphicon-copy"></span> ' . 'Copy',
            ['create', 'id' => $model->id, 'ForStudentApplications'=>$copyParams],
            ['class' => 'btn btn-success']) */
          ?>

            <?php 
/*  echo Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
            ['create'],
            ['class' => 'btn btn-success']) */
          ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
            . 'Full list', ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr/>

    <?php $this->beginBlock('frontend\models\ForStudentApplications'); ?>

    
    <?php 
 echo DetailView::widget([
    'model' => $model,
    'attributes' => [

      /* [
        'format' => 'html',
        'label' => 'ten_certificate',
        'value' => function($model){
        $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one();       
        $mainpath = Yii::getAlias('@webroot/');
        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
        $mainroot=$convertPath.'uploads/doc_student/'.$student->ten_certificate;
        $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->ten_certificate]);
        if(!empty($student->ten_certificate)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                         }           
        }
      ],

      [
        'format' => 'html',
        'label' => 'twelve_certificate',
        'value' => function($model){
          $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
        //    return $upload_dir = Yii::getAlias('@webroot').'/uploads/';           
        $mainpath = Yii::getAlias('@webroot/');
        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
        $file=$convertPath.'uploads/doc_student/'.$student->twelve_certificate;
        $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->twelve_certificate]);
        if(!empty($student->twelve_certificate)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                         }           
        }
    ],
    
    
    [
        'format' => 'html',
        'label' => 'passport',
        'value' => function($model){
          $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$student->passport;
        $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->passport]);
        if(!empty($student->passport)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                         }           
        }
    ],
    
    
    [
        'format' => 'html',
        'label' => 'ielts',
        'value' => function($model){
          $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$student->ielts;
        $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->ielts]);
        if(!empty($student->ielts)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                         }           
        }
    ],
    
    [
        'format' => 'html',
        'label' => 'graduation_certificate',
        'value' => function($model){
          $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$student->graduation_certificate;
        $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->graduation_certificate]);
        if(!empty($student->graduation_certificate)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                         }           
        }
    ],
    
    
    [
        'format' => 'html',
        'label' => 'lor',
        'value' => function($model){
          $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$student->lor;
        $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->lor]);
        if(!empty($student->lor)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                         }           
        }
    ],
    
    
    [
        'format' => 'html',
        'label' => 'moi',
        'value' => function($model){
          $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
            $mainpath = Yii::getAlias('@webroot/');
            $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
            $file=$convertPath.'uploads/doc_student/'.$student->moi;
        $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->moi]);
        if(!empty($student->moi)){
            return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                         }           
        }
    ],
    
    
      [
          'format' => 'html',
          'label' => 'sop',
          'value' => function($model){
            $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
              $mainpath = Yii::getAlias('@webroot/');
              $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
              $file=$convertPath.'uploads/doc_student/'.$student->sop;
          $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->sop]);
          if(!empty($student->sop)){
              return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                          }           
          }
      ],
    
      [
          'format' => 'html',
          'label' => 'diploma_certificate',
          'value' => function($model){
            $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
              $mainpath = Yii::getAlias('@webroot/');
              $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
              $file=$convertPath.'uploads/doc_student/'.$student->diploma_certificate;
          $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->diploma_certificate]);
          if(!empty($student->diploma_certificate)){
              return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                          }           
          }
      ],
    
    
        [
            'format' => 'html',
            'label' => 'master_certificate',
            'value' => function($model){
              $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
                $mainpath = Yii::getAlias('@webroot/');
                $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
                $file=$convertPath.'uploads/doc_student/'.$student->master_certificate;
            $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->master_certificate]);
            if(!empty($student->master_certificate)){
                return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                            }           
            }
        ],
        [
            'format' => 'html',
            'label' => 'updated_cv',
            'value' => function($model){
                $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
                $mainpath = Yii::getAlias('@webroot/');
                $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
                $file=$convertPath.'uploads/doc_student/'.$student->updated_cv;
            $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->updated_cv]);
            if(!empty($student->updated_cv)){
                return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                            }           
            }
        ],
        [
            'format' => 'html',
            'label' => 'work_experiance',
            'value' => function($model){
              $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
                $mainpath = Yii::getAlias('@webroot/');
                $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
                $file=$convertPath.'uploads/doc_student/'.$student->work_experiance;
            $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->work_experiance]);
            if(!empty($student->work_experiance)){
                return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                            }           
            }
        ],
        [
            'format' => 'html',
            'label' => 'other_certificate',
            'value' => function($model){
              $student=\common\models\Student::find()->where(['ID' => $model->student_id])->one(); 
                $mainpath = Yii::getAlias('@webroot/');
                $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
                $file=$convertPath.'uploads/doc_student/'.$student->other_certificate;
            $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->other_certificate]);
            if(!empty($student->other_certificate)){
                return '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                }         
            }
        ], */

      


        [
          'attribute' => 'student_id',
          'value' => function($model){
              $Student = \common\models\Student::findOne([ 'ID' => $model->student_id]);
              return !empty($Student->first_name) ? $Student->first_name .' '.$Student->last_name: null;
          } 
      ],
      [
        'attribute' => 'college_id',
        'label' => 'School',
        'value' => function($model){
            $school = \common\models\School::findOne([ 'id' => $model->college_id]);
            return !empty($school->name) ? $school->name : null;
        } 
    ],
    [
      'attribute' => 'course_id',
      'label' => 'Course',
      'value' => function($model){                                   
          $course = \common\models\Course::findOne([ 'id' => $model->course_id]);
          return !empty($course->name) ? $course->name : null;
      } 
  ],
        'application_fee_status',
        'visa_fee_status',
        'payment_date',
        'pay_status',
        'application_fee',
        'visa_fee',
    ],
    ]);
  ?>

    
    <hr/>

    <?php 
 echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
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
    'label'   => '<b class=""># '.Html::encode($model->id).'</b>',
    'content' => $this->blocks['frontend\models\ForStudentApplications'],
    'active'  => true,
],
 ]
                 ]
    );
    ?>
</div>
