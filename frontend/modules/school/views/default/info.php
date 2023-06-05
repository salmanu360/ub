<?php
use common\models\School;   
use yii\widgets\ActiveForm; 
use common\models\SchoolImage; 


  $user_id = Yii::$app->user->identity->id;
  $user = School::find()->where(['user_id'=>$user_id])->one();  
  $images=SchoolImage::find()->where(['school_id'=>$user->id])->asArray()->all();  

?>

<div class="row">
                <div class="col-md-12 text-end mb-4 mob-view-only">
                  <a class="common-dashboard-circle-btn" href="add-programs.html">Add Program/Course</a>
                </div>

                <div class="col-md-12">
                  <div class="text-end mb-4">
                    <a href="/school/default/update"  class="common-btn"> Edit </a>
                   <!--  <button type="button" class="common-btn">Edit</button> -->
                  </div>
                  <div class="dashboard-card mb-5">
                    <h4 class="common-dashboard-heading mt-3">My School</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <h4 class="common-dashboard-heading mt-3">Refrence No.( <b style="color:red" ><?= $user->ref_no ?> </b>) </h4>
                        <div class="row align-items-center">
                          <div class="row">
                            <p><b>Contact Person Name:</b> <?= $user->cont_fname." ".$user->cont_last_name ?> </p>
                          </div>
                          <div class="row">
                            <p><b>Contact Email:</b> <?= $user->cont_email ?> </p>
                          </div>
                          <div class="row">
                            <p><b>Contact Mobile:</b> <?= $user->phone_number ?> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <h4 class="common-dashboard-heading mt-3">Comment</h4>
                        <p><?= $user->comment;?></p>
                      </div>
                    </div>

                  </div>
                </div>


                <div class="col-md-12">
                  <div class="dashboard-card mb-5">
                    <h4 class="common-dashboard-heading mt-3">Upload Photo</h4>
                    <div class="row align-items-center">
                      
                      <div class="col-md-12">
                     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="row align-items-center mt-4">
                  <div class="col-sm-8">
                        <?= $form->field($model, 'file')->fileInput()->label('') ?>
                  </div>

                  <div class="col-sm-4 text-end">
                      <button  class="btn btn-danger" type="submit" >Submit</button>
                  </div>

                </div>




<?php ActiveForm::end(); ?>
                      </div>
                     <div class="row" style="margin-top:10px">

                         <?php if(!empty($images)):?>
                            <?php foreach($images as $image):
                          ?>
                            
                            <div class="col-sm-3">
                                <img   style="height:150px;width:150px" src="uploads/<?= $image['name'] ?>" alt="">
                            </div>
                         <?php 
                          endforeach; 
                        endif;
                            
                         ?>


                     </div>


                    </div>

                  </div>
                </div>


              </div>