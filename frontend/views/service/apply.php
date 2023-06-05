<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\Course $model
* @var yii\widgets\ActiveForm $form
*/

?>
<section class="banner-menu mob-inner-height">
    <div class="bg-video-wrap">
    <img src="images/school-banner.jpg" alt="banner-img" heigth="20%" class="desktop-view-only w-100">
    <img src="images/mob-school-banner.jpg" alt="banner-img" heigth="20%" class="mob-view-only w-100">
    <div class="container banner-caption mob-inner-caption">
        <div class="banner-text mb-3">
      <h1 class="cooper">Apply For</h1>
        <h2><?= $model->school_name;?></h2>
        <h1  class="cooper"><?= $model->course_name;?></h1>


       
        </div>


        
    </div>
    </div>
</section>
<section class="about-ub connect-top mt-5 mb-5">
    <div class="container">
<div class="course-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Course',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-4',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-8',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="">
    
        <div class="row">
             <div class="col-sm-6">
                 <?= $form->field($model, 'school_name')->textInput(['maxlength' => true]) ?>
             </div>
              <div class="col-sm-6">
                 <?= $form->field($model, 'course_name')->textInput(['maxlength' => true]) ?>
             </div>
        </div>
          <div class="row">
             <div class="col-sm-6">
                  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
             </div>
              <div class="col-sm-6">
                  <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
             </div>
        </div>

          <div class="row">
             <div class="col-sm-6">
                  <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
             </div>
              <div class="col-sm-6">
                 <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
             </div>
        </div>


			
                
                   
                       
                       

<!-- attribute comment -->
			

        </p>
      
        
 
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Apply to Universitybureau' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

</div>
</section>
