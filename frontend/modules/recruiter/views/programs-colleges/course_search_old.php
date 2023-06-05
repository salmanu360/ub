<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper; 
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\School;
use common\models\Country;
$this->title = Yii::t('models', 'Student');
$this->params['breadcrumbs'][] = $this->title;
?>
<main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">

<h1>Course search</h1>
   <?php $form = ActiveForm::begin() ?>
<div class="row">
	<div class="col-md-3">
		<label>Course</label>
		<?php $course = ArrayHelper::map(\common\models\Course::find()->all(), 'name', 'name'); ?>
            <?=$form->field($model, 'course')->widget(Select2::classname(), [
                'data' => $course,
                'options' => ['placeholder' => 'Select Course'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'autocomplete' => false
                ],
            ])->label(false) ?>   
	</div>

	<div class="col-md-3">
		<label>College</label>
		<?php $course = ArrayHelper::map(\common\models\School::find()->all(), 'id', 'name'); ?>
            <?=$form->field($model, 'school')->widget(Select2::classname(), [
                'data' => $course,
                'options' => ['placeholder' => 'Select College'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'autocomplete' => false
                ],
            ])->label(false) ?>   
	</div>

	 <div class="col-md-3">
		<?php 
		echo $form->field($model, 'country')->widget(Select2::classname(), [
		    'data' => common\models\Country::optsCountry(),
		    'options' => ['placeholder' => 'Country'],
		    'pluginOptions' => [
		        'allowClear' => true,
		        'autocomplete' => false
		    ],
		]) 
		?>
	</div>

	<!-- <div class="col-md-3">
		<label>Program Level</label>
           <?php 
           /*$edu_data = ArrayHelper::map(\common\models\LevelEducation::find()->all(), 'id', 'edu_name'); 
            echo $form->field($model, 'program_level')->widget(Select2::classname(), [
                'data' => $edu_data,
                'options' => ['placeholder' => 'Grade Scale...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'autocomplete' => false
                ],
            ])->label(false)*/ ?>   
	</div> -->

	<div class="col-md-3">
		<?php $data = [2020 => 2020,2021 => 2021,2022 => 2022, 2023 => 2023, 2024 => 2024, 2025 => 2025]; ?>
                        <?=$form->field($model, 'year')->widget(Select2::classname(), [
                            'data' => $data,
                            'options' => ['placeholder' => 'Year...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'autocomplete' => false
                            ],
                        ]); ?>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-6">
		<input type="submit" name="" class="btn btn-success" value="Search">
		<a href="<?php echo Url::to(['/recruiter/programs-colleges/coursesearch'])?>" class="btn btn-warning">Reset</a>
	</div>
</div>
 <?php ActiveForm::end(); ?>
<br>
<!-- country search -->
<?php if(isset($query)){
	$data=Yii::$app->request->post('CourseSearchs');
	$course=$data['course'];
    $school=$data['school'];
    $country=$data['country'];
    $year=$data['year'];
	//echo '<pre>';print_r($query);?>
 <!-- table -->
 <table class="table table-bordered table-hover">
 	<thead>
 		<tr>
 			<th>#</th>
 			<th>Course</th>
 			<th>College</th>
 			<th>Country</th>
 			<th>Tution Fee</th>
 			<th>Application Fee</th>
 			<th>Registeration Fee</th>
 			<th>Currency</th>
 			<th>Discount</th>
 			<!-- <th>Comment</th> -->
 			<th>Date</th>
 			<!-- <th>Action</th> -->
 		</tr>
 	</thead>
 	<tbody>
 		<?php 
 		if(!empty($query)){
 		$i=0;
 		foreach($query as $value){
 			 $college=School::find()->where(['id'=>$value['college_id']])->one();
 			 $country=Country::find()->where(['id'=>$college['dest_country']])->one();
 			 // $LevelEducation=LevelEducation::find()->where(['id'=>$college['dest_country']])->one();
 			 $i++;
 			?>
 		<tr>
 			<td><?php echo $i?></td>
 			<td><?php echo $value['name']?></td>
 			<td><?php echo $college['name']?></td>
 			<td><?php echo $country['name']?></td>
 			<td><?php echo $value['tution_fee']?></td>
 			<td><?php echo $value['application_fee']?></td>
 			<td><?php echo $value['registeration_fee']?></td>
 			<td><?php echo $value['currency']?></td>
 			<td><?php echo $value['discount']?></td>
 			<!-- <td><?php //echo $value['comment']?></td> -->
 			<td><?php echo $value['created_at']?></td>
 			<!-- <td><a href=""><i class="fa fa-eye"></i></a></td> -->
 		</tr>
 		<?php } }else{ ?>
 			<tr>
 				<th colspan="3">No record found</th>
 			</tr>
 		<?php }?>
 	</tbody>
 </table>
<?php }?>
 <!-- table end -->
</main>