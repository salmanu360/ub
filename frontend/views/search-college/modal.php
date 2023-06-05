      <!-- modalllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll -->


      <div class="modal-dialog apply-now-modal-box">

        <!-- Modal content-->
        <div class="modal-content" style="height: auto;">
          <div class="modal-header justify-content-end">
              <button id="cust_btn" type="button" class="close common-btn-close" data-dismiss="modal">&times;</button>
          </div>
          <div class="container-fluid p-0">
            <div class="row"> 
              <div class="col-12 ask-question-form">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-2">
                          <div class="avtar">
                            <img src="images/apple-touch-icon.png"/>
                          </div>
                        </div>
                        <div class="col-md-10">
                          <div class="avtar-title">
                            <h4 class="common-heading">Get Free Counselling</h4>
                            <h4 class="common-heading"><?= $model->name; ?></h4>
                            <p> <?= $model->name; ?> </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- form -->

                    <?php $form = ActiveForm::begin();


                    ?>


                    <div class="col-md-12">
                      <form class="modal-form" action="/service/institutions" method="post">
                        <input type="hidden" name="_csrf" value="fEb-jTGS0kSoSDATp1qy0aaSj9jo4fjE_nqgrKsk_bAKK4TjQd-VJccHaGfzb9CUyNX5lpGKy4O5Dezh6EGvgA==">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group field-school-name required">
                             <?php echo $form->field($councilStudent, 'name') ?>
                             
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group field-school-name required">
                             <?php echo $form->field($councilStudent, 'email') ?>
                              
                            </div>
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group field-school-cont_fname required">
                             <?php echo $form->field($councilStudent, 'phone') ?>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group field-school-cont_last_name required">
                             <?= $form->field($councilStudent, 'country')->widget(Select2::classname(), [
                                    'data' => common\models\Country::optsCountry(),
                                    'options' => ['placeholder' => 'Country'],
                                    'pluginOptions' => [
                                    'allowClear' => true,
                                    'autocomplete' => false
                                ],
                                ])->label('Country') ?>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group field-school-cont_fname required">
                              <?php echo $form->field($councilStudent, 'state') ?>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group field-school-cont_last_name required">
                             <?php echo $form->field($councilStudent, 'city') ?>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group field-school-cont_email required">
                             <?php echo $form->field($councilStudent, 'course_id') ?>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group field-school-cont_email required">
                             <?php echo $form->field($councilStudent, 'zip_code') ?>
                            </div>
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-12">
                            <div class="form-group field-school-comment">
                              <?php echo $form->field($councilStudent, 'additional_message') ?>
                            </div>
                          </div>
                        </div>

                      </form>
                    </div>
                   
                    <!-- form -->
                    <div class="col-md-12 pb-3">
                      <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center">

                        </div>
                        <div class="col-md-3">
                           <?= Html::submitButton(Yii::t('app', 'Submit'),  ['class' => 'common-btn w-100 btn-success']) ?>

                         <!--  <button type="submit" id="save-School" class="common-btn w-100 btn-success"><span class="glyphicon glyphicon-check"></span> Submit</button> -->
                        </div>
                      </div>
                    </div>

                    
                              <?php ActiveForm::end(); ?>  
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


        <!-- modalllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll ends -->




