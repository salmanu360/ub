<?php

use yii\helpers\Html;
use common\models\StudentCollegeAttended;

/**
* @var yii\web\View $this
* @var common\models\Student $model
*/

$this->title = Yii::t('models', 'Recruitment partner');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Recruiter'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => (string)$model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body">              
  <div class="row">
    <div class="col-md-12">
      <div class="dashboard-card mb-5">                      
          <?php echo $this->render('_forms', [
              'model' => $model
          ]); ?>
      </div>
    </div>
  </div>
</main>