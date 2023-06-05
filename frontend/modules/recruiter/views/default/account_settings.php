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

<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">
                
    <div class="row">
        <div class="col-md-7 m-auto">
            <div class="dashboard-card mb-5">
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
                <?php $AssignRecuiterRm=\common\models\AssignRecuiterRm::find()->where(['recruiter_id'=>Yii::$app->user->identity->recruiter->id])->one();
                      $User=\common\models\User::findOne($AssignRecuiterRm->rm_id);
                ?>
                <strong>Assign RM: <?php echo $User->username.' ('.$User->email.')';?></strong><br><br>
                <?php $form = ActiveForm::begin([
                    'id'          => 'account-form',
                    'options'     => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                    'fieldConfig' => [
                        'template'     => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                ]); ?>
                
                <div class="mb-3">
                    <?= Html::input('hidden', 'user_id', Yii::$app->user->identity->id) ?>
                    <label for="formFile" class="form-label">Upload Profile Picture</label>
                    <!-- <input class="form-control file-input" type="file" id="formFile"> -->
                    <?= Html::input('file', 'profile_pic', '', $options=['class'=>'form-control file-input','maxlength'=>true]) ?>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Change Password</label>
                    <?= Html::input('password', 'current_password', '', $options=['class'=>'form-control mb-3','maxlength'=>true, 'placeholder' => 'Current Password' ]) ?>
                    <?= Html::input('password', 'new_password', '', $options=['class'=>'form-control mb-3','maxlength'=>true, 'placeholder' => 'New Password' ]) ?>
                    <?= Html::input('password', 'confirm_password', '', $options=['class'=>'form-control mb-3','maxlength'=>true, 'placeholder' => 'Confirm Password' ]) ?>
                    
                </div>
                <div class="mb-3 text-center">
                    <!-- <button type="submit" class="common-circle-btn">Submit</button> -->
                    <?= Html::submitButton(Yii::t('app', 'submit'), ['class' => 'common-circle-btn']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</main>