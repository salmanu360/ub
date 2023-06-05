<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper; 
use kartik\date\DatePicker;
use kartik\select2\Select2;
use borales\extensions\phoneInput\PhoneInput;
use kartik\switchinput\SwitchInput;
use buttflattery\formwizard\FormWizard;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use \yii\helpers\Url;
use kartik\widgets\FileInput;

/**
* @var yii\web\View $this
* @var common\models\Student $model
* @var yii\widgets\ActiveForm $form
*/

?>
<?php $form = ActiveForm::begin([
        'id' => 'Student-profile',
        'options' => [
            'class' => 'dashboard-pills'
        ],
        'layout' => 'default',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
    ]);
    ?>
    <?php $this->beginBlock('main'); ?>
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><i class="fa fa-ban" aria-hidden="true"></i></strong> <?= Yii::$app->session->getFlash('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            General Information
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <div class="row">
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'First Name']); ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true, 'placeholder' => 'Middle Name']) ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => 'Last Name']) ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'yyyy-mm-dd'],
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]);
                    ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                <?= $form->field($model, 'first_language')->textInput(['maxlength' => true, 'placeholder' => 'First Language']) ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                <?=$form->field($model, 'country_of_citizenship')->widget(Select2::classname(), [
                    'data' => common\models\Country::optsCountry(),
                    'options' => ['placeholder' => 'Country of Citizenship'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'autocomplete' => false
                    ],
                ]) ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">                    
                    <?= $form->field($model, 'passport_no')->textInput(['maxlength' => true, 'placeholder' => 'Passport Number'])->label('Passport Number <i class="fas fa-info-circle text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="We collect your passport information for identity verification purposes, your school or program of interest may require this information to process your application. If applicable, it may also be used for processing your visa."></i>'); ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($model, 'passport_expiry_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'yyyy-mm-dd'],
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]);
                    ?>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <?= $form->field($model, 'marital_status')->inline(true)->radioList(['single'=>'Single', 'married' => 'Married'])->label('Marital Status <i class="fas fa-info-circle text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="We collect information about your marital status because your school or program of interest may require this information to process your application."></i> '); ?>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($model, 'gender')->inline(true)->radioList(['male'=>'Male', 'female' => 'Female']) ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Address Detail
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <div class="row">
                <div class="col-md-12">
                <div class="mb-3">
                    <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'placeholder' => 'Address']); ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'placeholder' => 'City'])->label('City/Town') ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?=$form->field($model, 'country')->widget(Select2::classname(), [
                        'data' => common\models\Country::optsCountry(),
                        'options' => ['placeholder' => 'Country...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'autocomplete' => false
                        ],
                    ]) ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($model, 'state')->textInput(['maxlength' => true, 'placeholder' => 'State'])->label('Province/State') ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true, 'placeholder' => 'Zip Code'])->label('Postal/Zip Code') ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($model, 'email_id')->textInput(['maxlength' => true, 'placeholder' => 'Email']); ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($model, 'phone_no')->widget(PhoneInput::classname(), [
                        'options' => ['placeholder' => 'Enter Phone No...']                        
                    ]);?>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Education History
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <small class="mb-3 text-blue d-block">Please enter your information accurately and correctly</small>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <?= $form->field($model, 'country_of_education')->widget(Select2::classname(), [
                            'data' => common\models\Country::optsCountry(),
                            'options' => ['placeholder' => 'Country...', 'id' => 'country'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'autocomplete' => false
                            ]
                        ]) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <?php $edu_data = ArrayHelper::map(\common\models\LevelEducation::find()->where(['country_id' => $model->country_of_education])->all(), 'id', 'edu_name'); ?>
                        <?= $form->field($model, 'highest_level_education')->widget(DepDrop::classname(), [
                                'type' => DepDrop::TYPE_SELECT2,
                                'data' => $edu_data,
                                'options' => ['id' => 'level-education'],
                                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                'pluginOptions' => [
                                    'depends' => ['country'],
                                    'placeholder' => 'Select ...',
                                    'url' => Url::to(['/recruiter/student/education-lists'])
                                ]
                            ]);
                        ?>        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <?php $grade_data = ArrayHelper::map(\common\models\GradingScheme::find()->all(), 'id', 'name'); ?>                        
                        <?= $form->field($model, 'grading_scheme')->widget(DepDrop::classname(), [
                                'type' => DepDrop::TYPE_SELECT2,
                                'data' => $grade_data, 
                                'options' => ['id' => 'grading-scheme'],
                                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                'pluginOptions'=>[
                                    'depends'=>['country', 'level-education'],
                                    'placeholder'=>'Select...',
                                    'url' => Url::to(['/recruiter/student/grading-lists'])
                                ]
                            ]);
                        ?>
                    </div>
                </div>
                <div class="col-md-4 grade-scl <?php if($model->grading_scheme != 7){ echo "hide"; } ?>">
                    <div class="mb-3">
                        <?php $data = [4 => 4, 5 => 5, 7 => 7, 10 => 10, 20 => 20, 100 => 100]; ?>
                        <?=$form->field($model, 'grade_scale')->widget(Select2::classname(), [
                            'data' => $data,
                            'options' => ['placeholder' => 'Grade Scale...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'autocomplete' => false
                            ],
                        ])->label("Grade Scale (out of)") ?>
                    </div>
                </div>
                <div class="col-md-4 grade-avg <?php if(!$model->grading_scheme){ echo "hide"; } ?>">
                    <div class="mb-3">
                        <?= $form->field($model, 'grade_average')->textInput(['type' => 'number', 'min' => 0, 'max' => 5, 'step' => 0.1, 'maxlength' => true, 'placeholder' => 'Grade Average']) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-check">                    
                            <?= $form->field($model, 'graduated_recent_school')->checkbox()->label('Graduated from most recent school'); ?> 
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Schools Attended
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">            
            <div class="row">
                <div class="col-md-6">
                <div class="mb-3">
                <?=$form->field($collegeModel, 'institution_country')->widget(Select2::classname(), [
                    'data' => common\models\Country::optsCountry(),
                    'options' => ['placeholder' => 'Country...', 'id' => 'inst-country-id'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'autocomplete' => false
                    ],
                ])->label("Country of Institution <span>*</span>"); ?>                    
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($collegeModel, 'institution_name')->textInput(['maxlength' => true])->label("Name of Institution <span>*</span>"); ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?=$form->field($collegeModel, 'education_level')->widget(Select2::classname(), [
                        'data' => common\models\LevelEducation::getLevelOfEducation(),
                        'options' => ['placeholder' => 'Level of Education'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'autocomplete' => false
                        ],
                    ])->label("Level of Education <span>*</span>") ?>    
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">                    
                    <?= $form->field($collegeModel, 'primary_language')->textInput(['maxlength' => true])->label("Primary Language of Instruction <span>*</span>"); ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($collegeModel, 'attended_institution_from')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'yyyy-mm-dd'],
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->label("Attended Institution From <span>*</span>");
                    ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                <?= $form->field($collegeModel, 'attended_institution_to')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'yyyy-mm-dd'],
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->label("Attended Institution To <span>*</span>");
                ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($collegeModel, 'degree_name')->textInput(['maxlength' => true])->label("Degree Name"); ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                   <!--  <label>I have graduated from this institution <span>*</span></label>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="graduated" id="inlineRadiogr1" value="option1">
                    <label class="form-check-label" for="inlineRadiogr1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="graduated" id="inlineRadiogr2" value="option2">
                    <label class="form-check-label" for="inlineRadiogr2">2</label>
                    </div> -->
                    <?= $form->field($collegeModel, 'graduated_from_institute')->inline(true)->radioList([0=>'No', 1=>'Yes'])->label("I have graduated from this institution *") ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($collegeModel, 'graduation_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'yyyy-mm-dd'],
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->label('Graduation Date <i class="fas fa-info-circle text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="For some institution"></i> <span>*</span>');
                ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <div class="form-check">
                        <?= $form->field($collegeModel, 'physical_certificate')->checkbox()
                        ->label('I have the physical certificate for this degree <i class="fas fa-info-circle text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="This means the physical degree"></i>') ?>
                    </div>
                </div>
                </div>
                <div class="col-md-12">
                <h4 class="common-dashboard-heading">School Address</h4>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($collegeModel, 'address')->textInput(['maxlength' => true])->label("Address <span>*</span>"); ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($collegeModel, 'city')->textInput(['maxlength' => true])->label("City/Town <span>*</span>"); ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <?= $form->field($collegeModel, 'province')->textInput(['maxlength' => true])->label("Province"); ?>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <?= $form->field($collegeModel, 'zip_code')->textInput(['maxlength' => true])->label("Postal/Zip Code"); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <!-- <label class="form-label">Enter the school attended for 3-Year Bachelor's Degree</label> -->
                        <!-- <a href="#" class="common-dashboard-red-btn">Add Row</a> -->
                    </div>
                </div>
               <!--  <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Enter the school attended for Grade 12 / High School</label>
                        <a href="#" class="common-dashboard-red-btn">Add Row</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Enter the school attended for Grade 10</label>
                        <a href="#" class="common-dashboard-red-btn">Add Row</a>
                    </div>
                </div> -->
            </div>
            </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Test Scores
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                    <?=$form->field($model, 'english_exam_type')->widget(Select2::classname(), [
                        'data' => common\models\Student::englishExamType(),
                        // 'theme' => Select2::THEME_KRAJEE_BS5,
                        'pluginOptions' => [
                            'allowClear' => true,
                            'autocomplete' => false
                        ],
                    ]) 
                    ?>
                    </div>
                </div>
                <div class="col-md-6 toe exam-date">
                    <div class="mb-3">
                        <?= $form->field($model, 'date_of_exam')->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => 'yyyy-mm-dd'],
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                            'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                            'pluginOptions' => [
                                'autoclose' => true,
                                'todayHighlight' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]);
                        ?>
                    </div>
                </div>
                <div class="col-md-12 later">
                    <div class="mb-3">
                        <p>Note: You will be able to apply for conditional admission by enrolling in an ESL program if the academic program does not accept delayed submission of English Language Proficiency scores.</p>
                    </div>
                </div>
                <div class="col-md-6 toe">
                    <div class="mb-3">
                        <?= $form->field($model, 'exact_score_reading')->textInput(['maxlength' => true, 'placeholder' => 'Reading'])->label('Enter exact scores') ?>
                    </div>
                </div>
                <div class="col-md-6 toe">
                    <div class="mb-3">
                        <?= $form->field($model, 'exact_score_listening')->textInput(['maxlength' => true, 'placeholder' => 'Listening'])->label('Enter exact scores') ?>
                    </div>
                </div>
                <div class="col-md-6 toe">
                    <div class="mb-3">
                        <?= $form->field($model, 'exact_score_speaking')->textInput(['maxlength' => true, 'placeholder' => 'Speaking'])->label('Enter exact scores') ?>
                    </div>
                </div>
                <div class="col-md-6 toe">
                    <div class="mb-3">
                        <?= $form->field($model, 'exact_score_writing')->textInput(['maxlength' => true, 'placeholder' => 'Writing'])->label('Enter exact scores') ?>
                    </div>
                </div>
                <div class="col-md-6 duo_test">
                    <div class="mb-3">
                        <?= $form->field($model, 'exact_score_overall')->textInput(['maxlength' => true, 'placeholder' => 'Overall'])->label('Enter exact scores') ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <h4 class="common-dashboard-heading">Additional Qualifications</h4>
                </div>
                <div class="col-md-12">
                <div class="form-check have-gre-head">
                    <?= $form->field($model, 'have_gre_exam')->checkbox(['class'=>'form-check-input'])->label('I have GRE exam scores'); ?> 
                </div>
                <div class="table-responsive mt-3 have-gre-body <?php if(!$model->have_gre_exam){ echo "hide"; } ?>">
                    <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                        <th>GRE Exam Date</th>
                        <th>Verbal</th>
                        <th>Quantitative</th>
                        <th>Writing</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <?= $form->field($model, 'gre_exam_date')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'yyyy-mm-dd'],
                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                                'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'todayHighlight' => true,
                                    'format' => 'yyyy-mm-dd'
                                ]
                            ])->label(false);
                            ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gre_verbal_score')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Score'])->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gre_quantitative_score')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Score'])->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gre_writing_score')->textInput(['type' => 'number', 'min' => 0, 'max' => 6, 'step' => 0.5, 'maxlength' => true, 'placeholder' => 'Score'])->label(false) ?>
                        </td>
                        </tr>
                        <tr>
                        <td></td>
                        <td>
                            <?= $form->field($model, 'gre_verbal_rank')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Rank %'])->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gre_quantitative_rank')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Rank %'])->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gre_writing_rank')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Rank %'])->label(false) ?>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-check have-gmat-head">
                    <?= $form->field($model, 'have_gmat_exam')->checkbox(['class'=>'form-check-input'])->label('I have GMAT exam scores'); ?> 
                </div>
                <div class="table-responsive mt-3 have-gmat-body hide">
                    <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                        <th>GMAT Exam Date</th>
                        <th>Verbal</th>
                        <th>Quantitative</th>
                        <th>Writing</th>
                        <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <?= $form->field($model, 'gmat_exam_date')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'yyyy-mm-dd'],
                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                                'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'todayHighlight' => true,
                                    'format' => 'yyyy-mm-dd'
                                ]
                            ])->label(false);
                            ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gmat_verbal_score')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Score'])->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gmat_quantitative_score')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Score'])->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gmat_writing_score')->textInput(['type' => 'number', 'min' => 0, 'max' => 6, 'step' => 0.5, 'maxlength' => true, 'placeholder' => 'Score'])->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gmat_total_score')->textInput(['type' => 'number', 'min' => 200, 'max' => 800, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Score'])->label(false) ?>                             
                        </td>
                        </tr>

                        <tr>
                        <td>
                        </td>
                        <td>
                            <?= $form->field($model, 'gmat_verbal_rank')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Rank %'])->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gmat_quantitative_rank')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Rank %'])->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gmat_writing_rank')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Rank %'])->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gmat_total_rank')->textInput(['type' => 'number', 'min' => 0, 'step' => 1, 'maxlength' => true, 'placeholder' => 'Rank %'])->label(false) ?>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            Background Information
            </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <div class="row">
                <div class="col-md-12">
                <div class="mb-3">                    
                    <?= $form->field($model, 'refused_visa')
                        ->inline(true)->radioList([1=>'Yes', 0 => 'No'])
                        ->label('Have you been refused a visa from Canada, the USA, the United Kingdom, New Zealand, Australia or Ireland? <i class="fas fa-info-circle text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="The schools listed share biometric information. Hence, visa refusal from these countries might result in a low visa chance approval rate."></i>'); ?> 
                </div>
                </div>
                <div class="col-md-12">
                <div class="mb-3">                    
                    <?=$form->field($model, 'study_permit')->widget(Select2::classname(), [
                        'value' => [0,1],
                        'data' => \common\models\StudentForm::studyPermit(),
                        'toggleAllSettings' => [
                            'selectLabel' => '<i class="fas fa-check-circle"></i> Select All',
                            'unselectLabel' => '<i class="fas fa-times-circle"></i> Unselect All',
                            'selectOptions' => ['class' => 'text-success'],
                            'unselectOptions' => ['class' => 'text-danger'],
                        ],
                        'maintainOrder' => true,
                        'options' => ['multiple' => true],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'autocomplete' => false,
                        ],
                    ]); ?>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'details')->textArea()->label('If you answered "Yes" to any of the questions above, please provide more details below: <span>*</span>') ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header" id="headingSeven">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            Upload Documents
            </button>
        </h2>
        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                To upload documents to your profile, please <strong>complete</strong> your profile first.
            </div>
            <?php 
                $upload_path = Yii::getAlias('@web').'/uploads/docs/';
                $upload_dir = Yii::getAlias('@webroot').'/uploads/docs/';
                $files = explode(',', $model->upload_document);              
                
                $initialPreview = [];
                $initialPreviewConfig = [];
                foreach($files as $file){
                    $initialPreview[] = $upload_path. $file; 
                    $ext = pathinfo($upload_dir. $file, PATHINFO_EXTENSION);
                    $image_type = ['jpg', 'jpeg', 'png'];
                    if( in_array($ext, $image_type) ){
                        $type = 'image';
                    } elseif ( $ext == 'pdf' ) {
                        $type = 'pdf';
                    } else {
                        $type = 'office'; 
                    }

                    $initialPreviewConfig[] = [
                        'type' => $type,
                        'caption' => $file,
                        'size' => filesize($upload_dir . $file),
                        //'filetype' => 'file/pdf', 
                        //'url'=> Url::to(['/recruiter/student/delete']),
                        //'key' => 100, 
                        //'extra' => ['ID' => 100]
                    ];
                }
                //die();
            ?>
            <?=$form->field($model, 'upload_document[]')->widget(FileInput::classname(), [
                'options' => ['multiple' => true],
                'pluginOptions' => [
                    'showPreview' => true,
                    'showCaption' => true,
                    'previewFileType' => 'any',
                    'initialPreview' => $initialPreview,                    
                    'initialPreviewAsData' => true,
                    'initialPreviewFileType' => 'image',                      
                    'initialPreviewConfig' => $initialPreviewConfig,
                    'preferIconicPreview' => true,
                    'theme' => 'fas',                     
                    'uploadAsync'=> true,
                    'allowedPreviewTypes' => false,
                    'previewFileIconSettings' => [
                        'jpg' => '<i class="fas fa-file-image text-warning"></i>',
                        'jpeg' => '<i class="fas fa-file-image text-warning"></i>',
                        'png' => '<i class="fas fa-file-image text-warning"></i>',
                        'doc' => '<i class="fas fa-file-word text-primary"></i>',
                        'docx' => '<i class="fas fa-file-word text-primary"></i>',
                        'pdf' => '<i class="fas fa-file-pdf text-danger"></i>',
                        'zip' => '<i class="fas fa-file-archive text-muted"></i>',
                    ],                   
                    'overwriteInitial' => false,
                    'maxFileSize' => 2800,
                    'showCaption' => false,
                    'showRemove' => false,
                    'showCancel' => false,
                    'showUpload' => false,
                    'browseClass' => 'common-dashboard-red-outline-btn',
                    'browseIcon' => '<i class="fas fa-upload"></i> ',
                    'browseLabel' =>  'Select Document',
                ]
            ]);?>
             <?php
            $ten_certificate = (!empty($model->ten_certificate))?Yii::$app->request->baseUrl.'/uploads/docs/'.$model->ten_certificate:'';
                echo $form->field($model, 'ten_certificate')->widget(FileInput::classname(), [
                'options' => [
                'multiple'=>false
                ],
                'value'=>$ten_certificate,
                'pluginOptions' =>[
                'showRemove' => true,
                'showUpload' => true,
                'previewFileType' => 'any',
                'initialPreview'=>[
                $ten_certificate
                ],
                'initialPreviewAsData'=>true,
                'overwriteInitial'=>true,
                ]
                ]);  ?>




        </div>
        </div>
    </div>
    <?php $this->endBlock(); ?>
    <?=
        Tabs::widget(
            [
            'encodeLabels' => false,
            'items' => [ 
                [
                    'label'   => Yii::t('models', ''),
                    'content' => $this->blocks['main'],
                    'active'  => true,
                ],
            ]
            ]
        );
        ?>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-12 text-end">
            <div class="mb-3">
            <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                (!$model->isNewRecord ? 'Create' : 'Save'),
                [
                'id' => 'save-' . $model->formName(),
                'class' => 'common-btn'
                ]
                );
                ?>
                <button type="submit" class="common-gray-btn">Reset</button>
                <!-- <button type="submit" class="common-btn">Submit</button> -->
            </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
<?php
$script = <<< JS
    $(function(){
        $('.field-grading-scheme').on('change', '#grading-scheme', function(event) {
            var option = $(this).val();
            if(option && option != 7){
                $('.grade-avg').removeClass('hide');
                $('.grade-scl').addClass('hide');
                //$('.grade-avg').attr("disabled", true);
                $('.grade-scl #studentform-grade_scale').val("");
                $('.grade-scl #studentform-grade_scale').attr("disabled", true);
            } else if(option && option == 7){
                $('.grade-avg').removeClass('hide');
                $('.grade-scl').removeClass('hide');
                //$('.grade-avg').attr("disabled", false);
                $('.grade-scl #studentform-grade_scale').attr("disabled", false);
            }
        });

        $('.field-studentform-english_exam_type').on('change', '#studentform-english_exam_type', function(){            
            var type = $(this).val();
            if(type == 'later'){
                $('.later').show();
                $('.toe').hide();
                $('.toe input').attr("disabled", true);
                $('.duo').hide();
                $('.duo input').attr("disabled", true);
                $('.exam-date').hide();
                $('.exam-date input').attr("disabled", true);
            } else if(type == 'toefl' || type == 'ielts'){
                $('.later').hide();
                $('.toe').show();
                $('.toe input').attr("disabled", false);
                $('.exam-date').show();
                $('.exam-date input').attr("disabled", false);
                $('.duo').hide();
                $('.duo input').attr("disabled", true);
            } else if(type == 'duolingo_english_test'){
                $('.toe').hide();
                $('.toe input').attr("disabled", true);
                $('.later').hide();
                $('.duo').show();
                $('.duo input').attr("disabled", false);
                $('.exam-date').show();
                $('.exam-date input').attr("disabled", false);
            } else if(type == 'pte'){
                $('.toe').show();
                $('.toe input').attr("disabled", false);
                $('.later').hide();
                $('.duo').show();
                $('.duo input').attr("disabled", false);
                $('.exam-date').show();
                $('.exam-date input').attr("disabled", false);
            } else {
                $('.later').hide();
                $('.toe').hide();
                $('.toe input').attr("disabled", true);
                $('.duo').hide();
                $('.duo input').attr("disabled", true);
                $('.exam-date').hide();
                $('.exam-date input').attr("disabled", true);
            }
        });
        $(".field-studentform-english_exam_type #studentform-english_exam_type").trigger("change");

        /* Have GRE Enable */
        $('.have-gre-head').on('click', '#studentform-have_gre_exam', function(){
            var checked = $(this).is(":checked");
            if(checked){
                $('.have-gre-body').slideDown();
            } else {
                $('.have-gre-body').slideUp();
            }
        });

        /* Have GRE Enable */
        $('.have-gmat-head').on('click', '#studentform-have_gmat_exam', function(){
            var checked = $(this).is(":checked");
            if(checked){
                $('.have-gmat-body').slideDown();
            } else {
                $('.have-gmat-body').slideUp();
            }
        });
       
    });
JS;
$this->registerJs($script);
?>
