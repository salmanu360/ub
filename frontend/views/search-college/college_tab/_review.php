<?php
  use yii\bootstrap\ActiveForm;
  use yii\helpers\Url;
  use yii\helpers\Html;
  use kartik\widgets\StarRating;
?>       
<div class="tab-pane slide" id="review" role="tabpanel" aria-labelledby="review-tab">

  <?php foreach($reviews as $review):
    $name = $review['name'];
    $email = $review['email_id'];
    $comnt = $review['comment'];
    $rate = $review['rating'];
  ?>

  <div>
    <div class="row border  m-0 mb-5 pt-4 pb-2">
      <div class="col-md-2">
        <div class="review-avtar">
          <div class="common-heading">RN</div>
        </div>
      </div>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-10">
            <div class="review-info">
              <div class="review-name"><b><?= $name; ?></b></div>
              <div class="review-email"><?= $email; ?></div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="review-rating-box">
              <div class="review-rating"><?= $rate; ?></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10 offset-md-2">
        <div class="review-message pt-3 pb-3">
         <?= $comnt; ?>
        </div>
      </div>
    </div> 

  </div>

  <?php endforeach; ?>

    <div class="">
                  <div class="review-heading w-100">Submit Your Review</div>
      <div class="row border shadow m-0 p-3">


       <?php $form = ActiveForm::begin([
        'id' => 'review-form',
      'layout' => 'horizontal',
      'enableClientValidation' => true,
      'errorSummaryCssClass' => 'error-summary alert alert-danger',
      'fieldConfig' => [
           'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
           'horizontalCssClasses' => [
               'label' => 'col-sm-12',
               #'offset' => 'col-sm-offset-4',
               'wrapper' => 'col-sm-12',
               'error' => '',
               'hint' => '',
           ],
         ],
      ]
      );
      ?>
                 
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group field-school-name required">
             <?php echo $form->field($reviewModel, 'name') ?>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group field-school-name required">
              <?= $form->field($reviewModel, 'email_id')->textInput(['maxlength' => true]) ?>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-xs-6 col-sm-6">
            <div class="form-group field-school-comment">
              <?= $form->field($reviewModel, 'comment')->textarea(['rows' => 6]) ?>
            </div>
          </div>
           <div class="col-xs-3 col-sm-3 margin-top-1">
            <div class="stars d-flex align-items-center w-100 h-100">
              <?=  $form->field($reviewModel, 'rating')->widget(StarRating::classname(), [
                  'pluginOptions' => [
                      'step' => 0.1,
                     /* 'theme' => 'krajee-svg',
                      'filledStar' => '<span class="krajee-icon krajee-icon-star"></span>',
                      'emptyStar' => '<span class="krajee-icon krajee-icon-star"></span>',*/
                      'showClear' => false,
                      'showCaption' => false,
                  ]
              ]);?>
            </div>
          </div>
        </div>
          <div class="row"> 
          <div class="col-sm-12 margin-top-2">
             <?= Html::submitButton(Yii::t('app', 'Submit'),  ['class' => 'common-btn review-submit']) ?>
          </div>
        </div>
      <?php ActiveForm::end(); ?>  
    </div>
  </div>
</div>
