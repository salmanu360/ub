<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;
use yii\widgets\ActiveForm;
use common\models\AssignUnivCourse;
use common\models\School;
$this->title = Yii::t('models', 'Student View');
$leadstatus=\common\models\LeadStatuses::find()->where(['id'=>$student->lead_status])->one();
?>
<div class="row">
    <div class="col-md-12">
    <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Unique ID</td>
                    <td>Passport No.</td>
                    <td>Email</td>
                    <td>College</td>
                    <td>Intake</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $student->first_name.' '.$student->last_name?></td>
                    <td><?php echo $student->ID;?></td>
                    <td><?php echo $student->passport_no?></td>
                    <td><?php echo $student->email_id;?></td>
                    <td>
                        <?php foreach($AssignUnivCourse as $assignuniv){?>
                        <?php 
                        if(!empty($assignuniv['college_id'])){
                            $School=School::findOne($assignuniv['college_id']);
                            echo $School['name'] .', <br>';
                        }else{
                            echo "N/A";
                        }
                        ?>
                        <?php }?>  
                        </td>
                        <td>
                        <?php 
                        if(!empty($student->intake)){
                            echo date('M Y',strtotime($student->intake));
                        }else{
                            echo "No intake assign";
                        }
                        ?>
                        </td>
                </tr>    
            </tbody>
    </table>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
    <?php 
    if(!empty($student->ten_certificate) || !empty($student->twelve_certificate) || !empty($student->passport) || !empty($student->ielts) ||
    !empty($student->graduation_certificate) || !empty($student->lor) ||  !empty($student->moi) || !empty($student->sop) || 
    !empty($student->diploma_certificate) || !empty($student->master_certificate) || !empty($student->updated_cv) || !empty($student->work_experiance)
    || !empty($student->other_certificate)){
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
            </table>
            <?php }else{
                echo "No document uploaded";
                }?>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Action</div>
            <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <label for="">Pendency</label>
            <select class="form-control" name="pending_document" id="" required>
                    <option value="">Select</option>
                        <option value="Grade 10th Certificate">Grade 10th Certificate</option>
                        <option value="Grade 12th Certificate">Grade 12th Certificate</option>
                        <option value="Passport">Passport</option>
                        <option value="IELTS/PTE/TOEFL">IELTS/PTE/TOEFL</option>
                        <option value="Graduation Certificate">Graduation Certificate</option>
                        <option value="LOR">LOR</option>
                        <option value="MOI">MOI</option>
                        <option value="SOP">SOP</option>
                        <option value="Diploma Certificate">Diploma Certificate</option>
                        <option value="Master Certificate">Master Certificate</option>
                        <option value="Updated Cv">Updated Cv</option>
                        <option value="Work Experiance">Work Experiance</option>
                        <option value="Other Certificate">Other Certificate</option>
            </select>
            <br>
            <label for="">Action</label>
            <?php $lead=\common\models\LeadStatuses::find()->all();?>
            <select class="form-control" name="lead_status" id="" required>
                        <option value="">Select</option>
                        <?php foreach($lead as $leadstatus){?>
                        <option value="<?php echo $leadstatus->id?>" <?php if($student->lead_status ==$leadstatus->id){echo "selected";}?>><?php echo $leadstatus->name?></option>
                        <?php }?>
            </select>
            <br>
            <input type="hidden" name="student_id" value="<?= $student_id?>">
            <input type="hidden" name="recruiter_id" value="<?= $student->recruiter_id?>">
            <input type="hidden" name="rm_id" value="<?= $student->rm_id?>">
            <label for="">Comment</label>
            <textarea class="form-control" name="comment" id="" rows="10" required></textarea>
            <br><br><br>
            <button class="btn btn-success">Submit</button>
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
