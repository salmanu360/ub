<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this  yii\web\View
 * @var $form  yii\widgets\ActiveForm
 * @var $model dektrium\user\models\SettingsForm
 */

$this->title = Yii::t('user', 'Account settings');
 
?>

 
                
    <div class="row">
        <div class="col-md-7 m-auto">
            <div class="dashboard-card mb-5">
            <?php if ($flag): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fa fa-check-circle" aria-hidden="true"></i></i></strong> Password changed.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>                  
            <?php endif; ?>
            
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

                <h4 class="common-dashboard-heading mt-3 text-center">User Settings</h4>
               <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                
                <div class="mb-3">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' =>"User Name" ])->label(false) ?>
                </div>

               <!--  <div class="mb-3">
                    <?= Html::input('hidden', 'user_id', Yii::$app->user->identity->id) ?>
                    <label for="formFile" class="form-label">Upload Profile Picture</label>
                    <input class="form-control file-input" type="file" id="formFile">
                   
                    <?= $form->field($model, 'profile_pic')->fileInput(['autofocus' => true, 'placeholder' =>"Profile_pic" ])->label(false) ?>
                </div> -->

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Change Password</label>
                    <?= Html::input('password', 'current_password', '', $options=['class'=>'form-control mb-3','maxlength'=>true, 'placeholder' => 'Current Password' ]) ?>
                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'placeholder' =>"Password" ])->label(false) ?>
                   <?= $form->field($model, 'confirm_password')->passwordInput(['autofocus' => true, 'placeholder' =>"Confirm Password" ])->label(false) ?>
                    
                </div>
                <div class="mb-3 text-center">
                    <!-- <button type="submit" class="common-circle-btn">Submit</button> -->
                    <?= Html::submitButton(Yii::t('app', 'submit'), ['class' => 'common-circle-btn']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
 