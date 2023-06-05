<?php
/* @var $this yii\web\View */
use buttflattery\formwizard\FormWizard;
use yii\jui\DatePicker;
use yii\helpers\Url;
use common\models\Country;
use borales\extensions\phoneInput\PhoneInput;
use kartik\select2\Select2;

$this->title = 'Recruiter';
?> 
<section class="banner-menu">
  <div class="bg-video-wrap">
    <img src="images/login-bg.jpg" alt="banner-img" class="desktop-view-only w-100">
    <img src="images/mob-login-bg.jpg" alt="banner-img" class="mob-view-only w-100">
    <div class="container banner-caption login-caption">
      <div class="banner-text mb-3">
        <h2>Register as recruiter</h2>
        <p>If already registered then login now</p>
      </div>
      <a href="<?=URL::to('site/login')?>" class="banner-btn">Login Now</a>
    </div>
  </div>
</section>
<section class="login-body">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="login-form register-form">
          <div class="text-center mb-5">
            <h3>Register as Recruiter</h3>
            <hr class="line-hr">
          </div>
          <?php if (Yii::$app->session->hasFlash('success')):
            foreach(Yii::$app->session->getFlash('success') as $msg):
            ?>
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h6><i class="icon fa fa-check"></i> <strong>Success!</strong> <?= $msg ?></h6>                
            </div>
        <?php endforeach; 
      endif; ?>

        
        <?php if (Yii::$app->session->hasFlash('error')):
          foreach(Yii::$app->session->getFlash('error') as $error):          
          ?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h6><i class="icon fa fa-check"></i> <strong>Error!</strong> <?=$error?></h6>                
            </div>
        <?php 
          endforeach;
          endif; ?>
          <?php
            echo FormWizard::widget([
              'theme' => FormWizard::THEME_DEFAULT,
              'wizardContainerId' => 'form-wizard',
              'forceBsVersion' => FormWizard::BS_4,
              'classNext' => 'common-btn ',
              'classPrev' => 'common-btn ',
              'classFinish' => 'common-btn ',
              'enablePersistence' => false,
              // 'showStepURLhash' => true,
              'toolbarPosition' => 'bottom',
              'formOptions'=>[
                'id' => 'recruiter_form',
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true, 
              ],
              'steps' => [
                  [
                    'model' => $recruiterModel,
                    'title' => 'Company Detail',
                    'description' => false,
                    'formInfoText' => false,
                    'fieldOrder' => [
                      'company_name',
                      'email', 
                      'website', 
                      'facebook_page', 
                      'instagram_handle',
                      'twitter_handle',
                      'linked_url'
                    ],
                    'fieldConfig' => [
                      'only' => [
                        'company_name',
                        'email', 
                        'website', 
                        'facebook_page', 
                        'instagram_handle',
                        'twitter_handle',
                        'linked_url'
                      ],
                      'facebook_page' => [
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'text',
                            'placeholder' => 'e.g. www.facebook.com/universitybureau',
                        ]
                      ],
                      'instagram_handle' => [
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'text',
                            'placeholder' => 'e.g. @universitybureau',
                        ]
                      ],
                      'twitter_handle' => [
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'text',
                            'placeholder' => 'e.g. @universitybureau',
                        ]
                      ],
                      'linked_url' => [
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'text',
                            'placeholder' => 'e.g. www.linkedin.com/company/universitybureau',
                        ]
                      ],
                    ]
                  ],
                  [
                      'model' => $recruiterModel,
                      'title' => 'Contact Detail',
                      'description' => false,
                      'formInfoText' => false,
                      'fieldOrder' => ['main_source', 'owner_first_name', 'owner_last_name', 'street_address', 'city','state', 'country', 'postal_code', 'phone', 'cellphone', 'sky_id', 'whatsapp_id', 'refer_name'],
                      'fieldConfig' => [
                        'only' => ['main_source', 'owner_first_name', 'owner_last_name', 'street_address', 'city','state', 'country', 'postal_code', 'phone', 'cellphone', 'sky_id', 'whatsapp_id', 'refer_name'], // only these field will be added in the step, rest all will be hidden/ignored.
                        'main_source' => [
                          'widget' => Select2::class,
                          'containerOptions' => [
                            'class' => 'form-group'
                          ],
                          'options' => [
                            'data' =>  common\models\Country::optsCountry(),
                            'options' => [
                                'id' => 'main-source',
                                'class' => 'form-control'
                            ],
                            'theme' => Select2::THEME_DEFAULT,
                            'pluginOptions' => [
                              'allowClear' => true,
                              'placeholder' => 'Select...'
                            ]                           
                          ]
                        ],
                        'country' => [
                          'widget' => Select2::class,
                          'containerOptions' => [
                            'class' => 'form-group'
                          ],
                          'options' => [
                            'data' =>  common\models\Country::optsCountry(),
                            'options' => [
                                'id' => 'country',
                                'class' => 'form-control'
                            ],
                            'theme' => Select2::THEME_DEFAULT,
                            'pluginOptions' => [
                              'allowClear' => true,
                              'placeholder' => 'Select...'
                            ]                           
                          ]
                        ],
                        'phone' => [
                          'widget' => PhoneInput::class,
                          'labelOptions' => [
                            'label' => 'Phone'
                          ],                          
                          'containerOptions' => [
                            'class' => 'form-group'
                          ],                          
                        ],
                        'cellphone' => [
                          'widget' => PhoneInput::class,
                          'labelOptions' => [
                            'label' => 'Cellphone'
                          ],                          
                          'containerOptions' => [
                            'class' => 'form-group'
                          ],                          
                        ],
                      ]
                  ],
                  [
                    'model' => $recruiterModel,
                    'title' => 'Recruitment Detail',
                    'description' => false,
                    'formInfoText' => false,
                    'fieldOrder' => ['begin_rec_time', 'client_service', 'rep_students', 'inst_rep', 'edu_org_bl', 'recut_form', 'stu_abroad_year', 'market_methods', 'aver_service_fee', 'refer_stu_univer', 'add_comment', 'refrence_name', 'ref_stu_name', 'ref_business_email', 'ref_phone', 'ref_website', 'comp_logo', 'bus_certificate', 'confirmation', 'acceptance'],
                    'fieldConfig' => [
                      'only' => ['recut_form', 'stu_abroad_year', 'aver_service_fee', 'confirmation', 'client_service','inst_rep', 'edu_org_bl', 'add_comment', 'refrence_name', 'ref_stu_name', 'ref_business_email', 'ref_phone', 'ref_website', 'comp_logo', 'bus_certificate', 'begin_rec_time', 'market_methods', 'refer_stu_univer', 'rep_students', 'acceptance'], // only these field will be added in the step, rest all will be hidden/ignored.
                      'client_service' => [
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'cols' => 25,
                            'rows' => 2
                        ]
                      ],
                      'rep_students' => [
                        'labelOptions' => [
                            'label' => ''
                        ],
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'checkbox',
                            'template' => '{input}{beginLabel}{labelTitle}{endLabel}{error}{hint}',
                            'itemsList' => [1 => 'Canadian Schools Represented', 2 => 'American Schools Represented', 3 => 'Represents Other Countries'],
                        ]
                      ],
                      'inst_rep' => [
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'cols' => 25,
                            'rows' => 2
                        ]
                      ],
                      'edu_org_bl' => [
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'cols' => 25,
                            'rows' => 2
                        ]
                      ],
                      'recut_form' => [
                        'widget' => Select2::class,
                          'containerOptions' => [
                            'class' => 'form-group'
                          ],
                          'options' => [
                            'data' =>  common\models\Country::optsCountry(),
                            'options' => [
                                'id' => 'recruit-from',
                                'class' => 'form-control'
                            ],
                            'theme' => Select2::THEME_DEFAULT,
                            'pluginOptions' => [
                              'allowClear' => true,
                              'placeholder' => 'Select...'
                            ]                           
                        ]
                      ],
                      'stu_abroad_year' => [                             
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'radio',
                            'itemsList' => [1 => '1 - 5', 6 => '6 - 20', 21 => '21 - 50', 51 => '51 - 250', 251 => '251+'], // the radio inputs to be created for the radioList
                        ]
                      ],
                      'market_methods' => [
                        'widget' => Select2::class,
                          'containerOptions' => [
                            'class' => 'form-group'
                          ],
                          'options' => [
                            'data' => [0 => 'Online Advertising', 1 => 'Education Fairs', 2 => 'Workshops', 3 => 'Sub-Agent Network', 4 => 'Newspaper and Magazine Advertising', 5 => 'Other'],
                            'options' => [
                                'id' => 'market-methods',
                                'class' => 'form-control',
                            ],
                            'theme' => Select2::THEME_DEFAULT,
                            'pluginOptions' => [
                              'allowClear' => true,
                              'multiple' => true,
                              'placeholder' => 'Select...'
                            ]                           
                        ]                        
                      ],
                      'aver_service_fee' => [
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],                            
                        'options' => [
                            'type' => 'radio',
                            'itemsList' => [0 => '₹0 - ₹200', 200 => '₹200 - ₹500', 500 => '₹500 - ₹1000', 1000 => '₹1000 - ₹2500', 2500 => '₹2500+'], // the radio inputs to be created for the radioList
                        ]
                      ],
                      'refer_stu_univer' => [
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'radio',
                            'itemsList' => [1 => '1 - 5', 6 => '6 - 20', 21 => '21 - 50', 51 => '51 - 250', 251 => '251+'], // the radio inputs to be created for the radioList
                        ]
                      ],
                      'add_comment' => [
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'cols' => 25,
                            'rows' => 2
                        ]
                      ],
                      'confirmation' => [
                        'labelOptions' => [
                            'label' => 'I declare that the information contained in this application and all supporting documentation is true and correct.'
                        ],
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'checkbox',
                            'checked' => 'checked',
                            'itemsList' => 'I declare that the information contained in this application and all supporting documentation is true and correct.',
                        ]
                      ],
                      'ref_phone' => [
                        'widget' => PhoneInput::class,
                        'labelOptions' => [
                          'label' => 'Reference Phone'
                        ],                          
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],                          
                      ],
                      'comp_logo' => [                             
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        //'multifield'=>true,
                        'options' => [
                          'type'=>'file'                                
                        ]
                      ],
                      'bus_certificate' => [                             
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        //'multifield'=>true,
                        'options' => [
                          'type'=>'file'                                
                        ]
                      ],
                      'acceptance' => [
                        'labelOptions' => [
                            'label' => 'I have read and accept <a href="page/terms-and-conditions"> Terms and Conditions </a> and <a href="page/privacy-and-cookies-policy"> Privacy Policy </a>.'
                        ],
                        'containerOptions' => [
                          'class' => 'form-group'
                        ],
                        'options' => [
                            'type' => 'checkbox', 
                            'checked' => 'checked'                 
                        ]
                      ],
                    ]
                ],
              ]
          ]);
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?= frontend\components\CounterArchiveWidget::widget(); ?>