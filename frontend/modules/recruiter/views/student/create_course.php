<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Student $model
*/

$this->title = Yii::t('models', 'Student');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">
<div class="row">
  <div class="col-sm-12">
      <div class="dashboard-card mb-5">
          <div class="performance">
            <div class="heading-with-select">
              <h4 class="common-dashboard-heading"> <?php if($model->isNewRecord==1){echo "Add New";}else{echo "Update";}?>
                    <small>
                        <?= Yii::t('models', 'Course') ?>
                    </small></h4>
               <label class="new-btn"> <?= Html::a(
                        'Cancel',
                        \yii\helpers\Url::previous(),
                        ['class' => 'common-dashboard-red-btn w-100']) ?></label>
            </div>
          </div>
          <div class="giiant-crud student-create">
                <?= $this->render('course_form', [
                'model' => $model,
                ]); ?>

            </div>
      </div>
  </div>
</div>
</main>
