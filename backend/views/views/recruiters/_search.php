<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\date\DatePicker;

/**
* @var yii\web\View $this
* @var backend\models\RecruitersSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="recruiters-search">

 <h1>Recruiter <small>Lists</small></h1>

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>


        <div class="row">

           <!-- <div class="col-sm-3">	
                    	<?//= $form->field($model, 'user_id') ?>
           </div> -->	


           <div class="col-sm-3">	
                    	<?= $form->field($model, 'owner_first_name') ?>
           </div>
		   <div class="col-sm-3">	
                    	<?= $form->field($model, 'owner_last_name') ?>
           </div>	

           <div class="col-sm-3">	
                    	<?= $form->field($model, 'phone') ?>
           </div>	
           <div class="col-sm-3">	
                    	<?= $form->field($model, 'ref_no') ?>
           </div>	

           <div class="col-sm-3">	
                    	<?php echo $form->field($model, 'email') ?>
           </div>

            <!-- <div class="col col-sm-3 col-md-3">
					 <?/*=  $form-> field($model, 'created_at')->widget(DatePicker::classname(), [

											'options' => ['placeholder' => 'Created date'],
											'pluginOptions' => [
											'autoclose' => true,
											'format' => 'dd-mm-yyyy',  
					                    ]
					                ]);*/
					  ?>
			</div> -->
			<!-- <div class="col col-sm-3 col-md-3">
					 <?/*=  $form-> field($model, 'end_date')->widget(DatePicker::classname(), [

											'options' => ['placeholder' => 'Start date'],
											'pluginOptions' => [
											'autoclose' => true,
											'format' => 'dd-mm-yyyy',  
					                    ]
					                ]);
					    */?>
			</div> -->



			<div class="col col-sm-3 col-md-3">
				<label class="control-label ">&nbsp;</label> <!-- to fix alignment -->
				<div class="form-group">
					 <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
       				 <?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Reset'),['/recruiters/index'], ['class' => 'btn btn-default btn-flat']) ?>
				</div>
			</div>


        </div>


	

		

	

		<?php // echo $form->field($model, 'facebook_page') ?>

		<?php // echo $form->field($model, 'instagram_handle') ?>

		<?php // echo $form->field($model, 'twitter_handle') ?>

		<?php // echo $form->field($model, 'linked_url') ?>

		<?php // echo $form->field($model, 'main_source') ?>

		<?php // echo $form->field($model, 'owner_first_name') ?>

		<?php // echo $form->field($model, 'owner_last_name') ?>

		<?php // echo $form->field($model, 'street_address') ?>

		<?php // echo $form->field($model, 'city') ?>

		<?php // echo $form->field($model, 'state') ?>

		<?php // echo $form->field($model, 'country') ?>

		<?php // echo $form->field($model, 'postal_code') ?>

		

		<?php // echo $form->field($model, 'cellphone') ?>

		<?php // echo $form->field($model, 'sky_id') ?>

		<?php // echo $form->field($model, 'whatsapp_id') ?>

		<?php // echo $form->field($model, 'refer_name') ?>

		<?php // echo $form->field($model, 'begin_rec_time') ?>

		<?php // echo $form->field($model, 'client_service') ?>

		<?php // echo $form->field($model, 'rep_students') ?>

		<?php // echo $form->field($model, 'inst_rep') ?>

		<?php // echo $form->field($model, 'edu_org_bl') ?>

		<?php // echo $form->field($model, 'recut_form') ?>

		<?php // echo $form->field($model, 'stu_abroad_year') ?>

		<?php // echo $form->field($model, 'market_methods') ?>

		<?php // echo $form->field($model, 'aver_service_fee') ?>

		<?php // echo $form->field($model, 'refer_stu_univer') ?>

		<?php // echo $form->field($model, 'add_comment') ?>

		<?php // echo $form->field($model, 'refrence_name') ?>

		<?php // echo $form->field($model, 'ref_stu_name') ?>

		<?php // echo $form->field($model, 'ref_business_email') ?>

		<?php // echo $form->field($model, 'ref_phone') ?>

		<?php // echo $form->field($model, 'ref_website') ?>

		<?php // echo $form->field($model, 'comp_logo') ?>

		<?php // echo $form->field($model, 'bus_certificate') ?>

		<?php // echo $form->field($model, 'confirmation') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

   
    <?php ActiveForm::end(); ?>

</div>
