<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\StudentCollegeApplied;

/**
* @var yii\web\Payment $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var frontend\models\StudentApplication $searchModel
*/

$this->title = Yii::t('models', 'Student Applications');
$this->params['breadcrumbs'][] = $this->title;

?>

<main role="main" class="col-md-10 ms-sm-auto px-4 dashboard-main-body"> 
    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-card top-red-border mb-5">
                <div class="giiant-crud student-college-applied-index">                    
                    <h2 class="common-dashboard-heading mt-3">
                        <?= Yii::t('models.plural', 'Payment') ?>
                    </h2>
                    
                    <?php 
                    echo "<pre>";    
                    var_dump($dataProvider); die(); ?>
                </div>
            </div>
        </div>
    </div>
</main>


