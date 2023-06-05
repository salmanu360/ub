<!-- <?php
  use yii\helpers\Url;
  use frontend\components\CounterArchiveWidget; 
  use yii\helpers\Html;
  use yii\bootstrap\ActiveForm;

  




?> -->


<section class="banner-menu mob-inner-height">
  <div class="bg-video-wrap">
    <img src="images/recruiters-banner.jpg" alt="banner-img" class="desktop-view-only w-100">
    <img src="images/mob-recruiters-banner.jpg" alt="banner-img" class="mob-view-only w-100">
    <div class="container banner-caption mob-inner-caption">
      <div class="banner-text mb-3">
        <h1 class="cooper">Join us</h1>
        <h2>On the journey to connect Students, Recruiter, Institutions</h2>
        <p>On one platform</p>
      </div>
      <a href="<?=URL::to('job-opening')?>" class="banner-btn">View Openings</a>
    </div>
  </div>
</section>


<section class="apply-job mt-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-center mb-3">
        <h2 class="common-heading">Explore the opportunities <span> at University Bureau</span></h2>
        <p>Interested in transforming the lives of more than million people? Come and Join on on our journey to empower people around the world to access the best education.</p>
        </div>
    </div>
    </div>
</section>

<section class="apply-this-job">
  <div class="container">
  <div class="row">
    <div class="col-md-6">
    <div class="job-details-box mt-5 mb-5">
      <div class="job-list-main p-1">
          <h4 class="job-list-title">Campaign Manager</h4>
          <div class="job-list-inner d-flex">
              <div class="job-list-experience">
                <i class="fas fa-user-graduate"></i>
                <label> 2-5 Year Experience</label>
              </div>
              <div class="job-list-location">
                <i class="fas fa-user-graduate"></i>
                <label>Noida</label>
              </div>
            </div>
            <div class="job-list-description">
              <p><b>Role :</b> Campaign Planning, Management and Reporting</p>
              <br>
              <p><b>Location :</b> Noida</p>
            </div>
            <div class="job-apply-highlights mt-3 mb-3">
              <h3>Benefits & Perks of working with us</h3>
              <ul class="job-apply-list mt-2 mb-2 p-0">
                <li>
                  <i class="fas fa-check"></i>
                  Remote working, work from anywhere
                </li>
                <li>
                  <i class="fas fa-check"></i>
                  ESOPs (depending upon candidate to candidate)
                </li>
                <li>
                  <i class="fas fa-check"></i>
                  Health benefits
                </li>
                <li>
                  <i class="fas fa-check"></i>
                  High focus on Learning & Development and monetary support for relevant upskilling
                </li>
                <li>
                  <i class="fas fa-check"></i>
                  Young and fast-growing company with a healthy work-life balance
                </li>
            
              </ul>
            </div>
            
            <div class="job-apply-highlights mt-3 mb-3">
              <h3>Job Overview</h3>
              <ul class="job-apply-list mt-2 mb-2 p-0">
                <li>
                  <i class="fas fa-dot-circle"></i>
                  To strategize, plan, brief, execute and measure campaigns integrated, multi channel, end to end.
                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  To plan and executing the campaign calendar. 
                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  To support a variety of growth campaigns across different regions and stages of market maturity across both sides of our marketplace student recruiters and institutions. 
                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  To do drive brand awareness, consideration and lead generation outcomes through strategic and well executed campaigns. 

                </li>
                          
              </ul>
            </div>
            <div class="job-apply-highlights mt-3 mb-3">
              <h3>Your Superpowers</h3>
              <ul class="job-apply-list mt-2 mb-2 p-0">
                <li>
                  <i class="fas fa-dot-circle"></i>
                  5+ years experience in marketing campaigns, digital marketing, integrated marketing or related disciplines

                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  Experience with HubSpot is essential
                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  Demonstrated success owning the planning, development, and execution for multichannel/integrated marketing campaigns.

                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  Solutions oriented, self starter who thinks analytically, meets deadlines, and exceeds expectations
                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  Strong collaboration skills for getting buy in and bringing people together to deliver against a plan

                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  Strong analytical skills, and proven track record in making data driven decisions to continually optimize performance


                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  Ability and desire to seek out new ideas and approaches, challenging the status quo on campaign approaches and media mixes

                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  Strong visual and verbal presentation skills

                </li>
                <li>
                  <i class="fas fa-dot-circle"></i>
                  Passionate self starter, decisive and able to move with speed to implement ideas

                </li>
            
            
              </ul>
            </div>
            

            <div class="job-list-description">
            </div>
            <a  class="common-btn"  href="<?=URL::to('apply-job')?>">Apply Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
    <div class="appy-form-box mt-5 mb-5">
      <h2 class="common-heading text-center doted-border pb-3"><span>Apply Now</span></h2>
      
      <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><i class="fa fa-check-circle" aria-hidden="true"></i></i></strong> <?= Yii::$app->session->getFlash('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><i class="fa fa-ban" aria-hidden="true"></i></strong> <?= Yii::$app->session->getFlash('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
      <?php $form = ActiveForm::begin([
        'id' => 'apply-jobs',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
        'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    #'offset' => 'col-sm-offset-4',
                    'wrapper' => 'col-sm-8',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]
        );
        ?>

<div class="row">
          <div class="col-xs-12 col-sm-12">
              <div class="form-group mt-4">
              <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
              </div>                
              <div class="form-group mt-4">
              <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
              </div>                
              <div class="form-group mt-4">
              <?= $form->field($model, 'phone')->textInput() ?>
              </div>
              <div class="form-group mt-4">
                       
              <?= $form->field($model, 'experience')->dropDownList(
                 ['1' => '1', '2' => '2', '3' =>'3' ,'4' => '4' ,'5' => '5' ,'6' => '6' ,'7' => '7', '8' => '8', '9' => '9' ,'More than 10' => 'More than 10'],
                    // ['9'=>'7'],
                    //  ['2'=>'2'],
                    [
                        'prompt' => 'Select',
                        'disabled' => (isset($relAttributes) && isset($relAttributes['experience'])),
                    ]
                ); ?>
              </div>
              <div class="form-group mt-4">
              <?= $form->field($model, 'resume')->fileInput(['maxlength' => true, 'class' => 'form-control file-input']); ?>
              </div>

               <p>&nbsp;</p>
                

               <div class="form-group mb-4">
                  <div class="login-input">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                   <?= $form->field($model, 'verifycode')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className())->label(false) ?>
                  </div>
                </div>   


              <div class="job-apply-button">
                <!-- <button class="common-btn" type="submit" >Apply Now</button> -->
                <?= Html::submitButton(
                    '<span class="fa fa-pencil"></span> ' .
                    'Apply Now',
                    [
                    'id' => 'save-' . $model->formName(),
                    'class' => 'common-btn'
                    ]
                    );
                  ?>
              </div>
          </div>

          </div> 
  <!-- attribute status --> 

          <?php echo $form->errorSummary($model); ?>

       

        <?php ActiveForm::end(); ?>
       
    </div>
    </div>
    </div>
  </div>
</section>
