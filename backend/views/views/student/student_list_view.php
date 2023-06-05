<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;
use yii\widgets\ActiveForm;
use common\models\AssignUnivCourse;
$this->title = Yii::t('models', 'Student View');
$leadstatus=\common\models\LeadStatuses::find()->where(['id'=>$student->lead_status])->one();
?>
<div class="row">
    <div class="col-md-12">
    <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Unique ID</td>
                    <td>Name</td>
                    <td>Passport No.</td>
                    <td>College</td>
                    <td>Course</td>
                    <td>Intake</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                    <?php $college=\common\models\School::findOne($model->college_id);?>
                <tr>
                    <td><?php echo $model->id;?></td>
                    <td><?php echo $student->first_name.' '.$student->last_name?></td>
                    <td><?php echo $student->passport_no?></td>
                    <td>
                        <?php 
                        if(!empty($model->college_id)){
                            $School=\common\models\School::findOne($model->college_id);
                            echo $School->name;
                        }else{
                            echo "No College assign";
                        }
                        ?></td>
                                            <td>
                        <?php 
                        if(!empty($model->course_id)){
                            $Course=\common\models\Course::findOne($model->course_id);
                            echo $Course->name;
                        }else{
                            echo "No Course assign";
                        }
                        ?>
                    </td>

                    <td>
                        <?php 
                        if(!empty($model->intake)){
                            echo date('M Y',strtotime($model->intake));
                        }else{
                            echo "No intake assign";
                        }
                        ?>
                        </td>
                    <td><?php echo $leadstatus->name;?></td>
                </tr>    
            </tbody>
    </table>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
    <?php 
    $mainpath = Yii::getAlias('@webroot/');
    $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
   ?>   
   <table class="table table-bordered">
                <?php if(!empty($student->ten_certificate)){?>
                <tr>
                    <td>Grade 10th Certificate</td>
                    <td><?php  
                    $mainroot=$convertPath.'uploads/doc_student/'.$student->ten_certificate;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->ten_certificate]);
                    if(!empty($student->ten_certificate)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                              
                    ?></td>
                </tr>
                <?php }?>
                <?php if(!empty($student->twelve_certificate)){?>
                    <tr><td>Grade 12th Certificate</td>
                <td>
                    <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->twelve_certificate;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->twelve_certificate]);
                    if(!empty($student->twelve_certificate)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                    }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->passport)){?>
                    <tr>
                    <td>Passport</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->passport;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->passport]);
                    if(!empty($student->passport)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->ielts)){?>
                    <tr><td>IELTS/PTE/TOEFL</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->ielts;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->ielts]);
                    if(!empty($student->ielts)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->graduation_certificate)){?>
                    <tr><td>Graduation Certificate</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->graduation_certificate;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->graduation_certificate]);
                    if(!empty($student->graduation_certificate)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->lor)){?>
                    <tr><td>LOR</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->lor;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->lor]);
                    if(!empty($student->lor)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->moi)){?>
                    <tr><td>MOI</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->moi;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->moi]);
                    if(!empty($student->moi)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->sop)){?>
                    <tr><td>SOP</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->sop;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->sop]);
                    if(!empty($student->sop)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->diploma_certificate)){?>
                    <tr><td>Diploma Certificate</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->diploma_certificate;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->diploma_certificate]);
                    if(!empty($student->diploma_certificate)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->master_certificate)){?>
                    <tr><td>Master Certificate</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->master_certificate;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->master_certificate]);
                    if(!empty($student->master_certificate)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->updated_cv)){?>
                    <tr><td>Updated Cv</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->updated_cv;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->updated_cv]);
                    if(!empty($student->updated_cv)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->work_experiance)){?>
                    <tr><td>Work Experiance</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->work_experiance;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->work_experiance]);
                    if(!empty($student->work_experiance)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>
                <?php if(!empty($student->other_certificate)){?>
                    <tr><td>Other Certificate</td>
                <td>
                <?php 
                    $file=$convertPath.'uploads/doc_student/'.$student->other_certificate;
                    $url=Url::to(['student/downloaddocument','id'=>$student->ID,'c'=>$student->other_certificate]);
                    if(!empty($student->other_certificate)){
                        echo '<a href="'.$url.'"  class="" title="Download document">Download Attachment <i class="fa fa-download fa-fw"></i></a>';
                                     }  
                    ?>
                </td>
                </tr>
                <?php }?>

                <?php }?>
            </table>
    </div>
</div>
