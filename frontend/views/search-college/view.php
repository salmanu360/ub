            <?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;
use common\models\School;
use common\models\Country;
use common\models\SchoolImage;   


      $image=SchoolImage::find()->where(['school_id'=>$model->id])->asArray()->one();
       $Country=Country::find()->where(['id'=>$model->dest_country])->asArray()->one();


// var_dump($images);
// die();
?>

 <main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">
              <div class="row">

                <div class="col-md-12">
                  <div class="dashboard-card mb-5">
                    <?= Html::a('<i class="fa fa-undo margin-r-5"></i>'.Yii::t('app', 'Back'),['/recruiter/programs-colleges/index'], ['class' => 'btn btn-danger btn-flat back-btn']) ?>
                    <h4 class="common-dashboard-heading mt-3 my-school-heading">My School</h4>

                    <div class="row">
                      <div class="col-md-4 detail-view-img">
                        <?php if(!empty($image['name'])):?>
                            <img class="blog-image" src="uploads/<?= $image['name'];?>">
                        <?php endif; ?>
                      </div>
                      <div class="col-md-8">
                          <h4 class="common-dashboard-heading"><?= $model->name; ?></h4>
                          <p class="common-dashboard-heading"><span style="color:red">Location:</span>  <?= $Country['name']; ?></p>
                          <p class="common-dashboard-heading"><span style="color:red">Min Fees:</span>   <?= $model->min_price ?> <span style="color:red">Max Fees: </span>  <?= $model->max_price ?> <span style="color:red">Avg Fees: </span>  <?= $model->avg_price ?></p>
            
                        <p><?= $model->comment ?></p>
                        <h4 class="common-dashboard-heading mt-4">Admission Requirements</h4>
                        <ul class="common-list">
                          <li>IELTS Score - for diploma 6 and less then 5.5, PTE 52</li>
                          <li>For PG Diploma- 6.5 not less then 5.5</li>
                          <li>50% in 12th or Graduation</li>
                          <li>IELTS 6.5 and NOT less then 5.5 for Generic Degrees</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
</main>



<style type="text/css">

.dashboard-card{
    position: relative;
}
.my-school-heading{
    font-size: 1.5rem;
}
.back-btn{
    position: absolute;
    top: 24px;
    right: 18px;
} 
.fa-undo{
    margin-right: 6px;
}
.detail-view-img{
    position: relative;
    height: inherit;
    width: 320px;
    height: 250px;
}
.detail-view-img img{
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    border-radius: 0;
    margin-left: 5px;
    padding: 0 10px;  
}

</style>