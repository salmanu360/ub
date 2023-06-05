<?php

use yii\helpers\Html;
use common\models\StudentCollegeAttended;
use yii\widgets\ActiveForm;
/**
* @var yii\web\View $this
* @var common\models\Student $model
*/

$this->title = Yii::t('models', 'Student');
// $this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Student'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => (string)$model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Comment';
?>
 <?php $form = ActiveForm::begin(); ?>
<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">                
  <div class="row">
    <div class="col-md-12">
      <div class="dashboard-card mb-5">                      
          <?= $form->field($model, 'student_id')->hiddenInput(['value'=>$_GET['ID']])->label(false) ?>

          <?= $form->field($model, 'recruiter_id')->hiddenInput(['value'=>Yii::$app->user->identity->recruiter->id])->label(false) ?>

          <?= $form->field($model, 'comment')->textarea(['rows' => 12]) ?>

          <?= $form->field($model, 'created_date')->hiddenInput(['value'=>date('Y-m-d')])->label(false) ?>
          <br>
          <div class="form-group">
          <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
         </div>
      </div>
    </div>
  </div>
</main>
 <?php ActiveForm::end(); ?>