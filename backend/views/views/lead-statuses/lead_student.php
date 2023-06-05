<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use kartik\select2\Select2;
$this->title="Student Leads";
?>
<style>
    .board{
        display: inline-flex;
    flex-direction: column;
    width: 290px;
    height: 100%;
    vertical-align: top;
    margin-left: -27px;
    }
    .board2{
        padding: 10px;
    padding-top: 12px;
    background-color: #ebf2f5;
    height: 100%;
    border-radius: 5px;
    border-top: 2px #67757c solid;
    overflow: hidden;
    padding-left: 0px;
    padding-right: 0px;
    }
    .card{
        background: white;
    padding: 10px;
    margin: 11px;
    border-radius: 10px;
    }
</style>
<div class="giiant-crud course-index container">

<div class="alert alert-info" id="loading" style="display:none">Please wait...... email has been generating <center><i class="fa fa-spinner fa-spin" style="font-size:113px"></i></center></div>
<?php $form = ActiveForm::begin(); ?>
<div class="row" style="margin-left: 4px;">
    <div class="col-md-3">
        <label for="">Recruiter</label>
        <?php echo $form->field($model, 'recruiter_id')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(common\models\Recruiters::find()->all(), 'id',function($model){return $model->owner_first_name.' '.$model->owner_last_name;}),
                    'options' => ['placeholder' => 'Select Recruiter ...'],
                    'pluginOptions' => [
                    'tags' => true,
                    ],
                    ])->label(false);?>
    </div>

    <div class="col-md-3">
        <label for="">Student</label>
        <?php echo $form->field($model, 'student_id')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(common\models\Student::find()->all(), 'ID',function($model){return $model->first_name.' '.$model->last_name;}),
                    'options' => ['placeholder' => 'Select Student ...'],
                    'pluginOptions' => [
                    'tags' => true,
                    ],
                    ])->label(false);?> 
    </div>

    <div class="col-md-3">
        <label for="">Status</label>
        <?php echo $form->field($model, 'status')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(common\models\LeadStatuses::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select Lead Status ...'],
                    'pluginOptions' => [
                    'tags' => true,
                    ],
                    ])->label(false);?>  
    </div>

    <div class="col-md-3" style="margin-top: 24px;">
        <input type="submit" class="btn btn-success" name="submit" value="Search">
        <a href="<?php echo Url::to(['/lead-statuses/leadstudent'])?>" class="btn btn-warning">Reset</a>
    </div>
</div>
<?php ActiveForm::end(); ?>
<br>
<br>
<div class="row">
<?php foreach($students as $student){
    $studentcountry=\common\models\Country::findOne($student->country);
    $leadstatusstudent=\common\models\LeadStatuses::findOne($student->lead_status);
    $recruiter=\common\models\Recruiters::findOne($student->recruiter_id);
    // echo '<pre>';print_r($recruiter);die;
    ?>
   <div class="col-md-4">
        <div class="card" style="border: 1px solid #9f7c7c;">
            <div class="card-header">
                <strong>Lead Status: <span id="appendlead<?php echo $student->ID?>"><?php if(!empty($leadstatusstudent->name)){echo $leadstatusstudent->name;}else{echo "N/A";}?></span>
                <input type="hidden" id="stu_id" value="<?php echo $student->ID?>">
            <!-- statuses menu -->
            <span class="pull-right">
            <div class="dropdown">
                <i class='fa fa-ellipsis-v' data-toggle="dropdown" style='font-size:28px;color:red;cursor: pointer;' title="Status"></i>
                <ul class="dropdown-menu">
                    <li><span style="padding: 20px;font-size: 15px;"><strong>Change Status</strong></span></li>
                    <?php foreach($leadStatus as $status){?>
                    <li><a href="#" id="changestatus" data-stu_id="<?php echo $student->ID;?>" data-url="<?php echo Url::to(['changestatus'])?>"><?= $status->name;?></a></li>
                    <?php }?>
                </ul>
             </div>
            </span>
            <!-- statuses menu end -->
        </div>
            <div class="card-header"><strong>Student:<?= $student->first_name .' '.$student->last_name;?></strong> <span class="pull-right">
            
            
            </span></div>
            <a href="<?php echo Url::to(['/student/view?ID='.$student->ID])?>">
            <div class="card-body">
                <div>Email: <?= $student->email_id;?></div>
                <div>Recruiter: <?php if(!empty($recruiter->owner_first_name)){echo $recruiter->owner_first_name.' '.$recruiter->owner_last_name;}else{echo "N/A";};?></div>
                <div>Gender: <?= $student->gender;?></div>
                <div>Country: <?php if($studentcountry){echo $studentcountry->name;}else{echo "N/A";};?></div>
                <div>City: <?php if($student->city){echo $student->city;}else{echo "N/A";};?></div>
                <div>Passport No: <?php if($student->passport_no){echo $student->passport_no;}else{echo "N/A";};?></div>
            </div>
            </a>
        </div>
    </div>
   
    <?php } ?>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo LinkPager::widget(['pagination' => $pages]);?>
    </div>
</div>

<?php
$script= <<< JS
    $(document).on('click','#changestatus',function(){
        $("#loading").show();
        var stu_id=$(this).data('stu_id');
        // alert(stu_id);
        var id=$(this).text();
        var url=$(this).data('url');
        $.ajax
        ({
            type: "POST",
            dataType:"JSON",
            data: {id:id,stu_id:stu_id} ,
            url: url,
            cache: false,
            success: function(html)
            {
                
             $("#appendlead"+stu_id).text(html.status);
            } 
        }); 
        
    });
JS;
$this->registerJs($script);