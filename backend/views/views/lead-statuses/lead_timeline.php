<?php
use common\models\LeadStatuses;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\LinkPager;
use kartik\select2\Select2;
$this->title = 'Lead Timeline';
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
    .statuses{
        border: 1px solid;
    border-radius: 10px;
    padding: 7px;
    background: #f1d5ea;
    }
</style>
<div class="lead-statuses-index">
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

  <!--   <div class="col-md-3">
        <label for="">Status</label>
        <?php 
                    /* echo $form->field($model, 'status')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(common\models\LeadStatuses::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select Lead Status ...'],
                    'pluginOptions' => [
                    'tags' => true,
                    ],
                    ])->label(false); */
                    ?>  
    </div> -->

    <div class="col-md-3" style="margin-top: 24px;">
        <input type="submit" class="btn btn-success" name="submit" value="Search">
        <a href="<?php echo Url::to(['/lead-statuses/leadtimeline'])?>" class="btn btn-warning">Reset</a>
    </div>
</div>
<?php ActiveForm::end(); ?>
<br>
<br>
    <?php 
    // echo '<pre>';print_r($students);die;
    foreach($students as $student){
        $recruiter=\common\models\Recruiters::findOne($student['recruiter_id']);
        $leadhistorytable=\common\models\LeadHistory::find()->where(['student_id'=>$student['studentId']])->all();?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h5><strong>Student: <?php echo $student['first_name'] .' '.$student['last_name'];?> Email: <?php echo $student['email_id'];?> Recruiter: <?php if(!empty($recruiter['owner_first_name'])){echo $recruiter['owner_first_name'].' '.$recruiter['owner_last_name'];}else{echo "N/A";};?></strong></h5>
                <!-- <span class="statuses">New</span>&nbsp;&nbsp;&nbsp;&nbsp; -->
                <?php foreach($leadhistorytable as $history){?>
                <span class="statuses"><?php if(!empty($history['name'])){echo $history['name'];}else{echo "new";};?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php }?>
            </div>
        </div>
    <?php }?>
<div class="row">
    <div class="col-md-6">
    <?php echo LinkPager::widget(['pagination' => $pages]);?>
    </div>
</div>
</div>