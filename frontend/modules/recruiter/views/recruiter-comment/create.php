<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\RecruiterComment $model */

$this->title = 'Create Recruiter Comment';
$this->params['breadcrumbs'][] = ['label' => 'Recruiter Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">
<div class="row">
  <div class="col-sm-12">
      <div class="dashboard-card mb-5">
          <div class="performance">
            <div class="heading-with-select">
              <h4 class="common-dashboard-heading"> Add New
                    <small>
                        <?= Yii::t('models', 'Student') ?>
                    </small></h4>
              
            </div>
          </div>
          <div class="giiant-crud student-create">
                <?= $this->render('_form', [
                'model' => $model,
                ]); ?>

            </div>
      </div>
  </div>
</div>
</main>


