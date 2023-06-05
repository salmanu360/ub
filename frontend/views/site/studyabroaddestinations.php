<?php
  use yii\helpers\Url;
  use frontend\components\CounterArchiveWidget; 

?>



<div>
<section class="banner-menu mob-inner-height lp-banner-height" style="height: 400px;background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(0, 0, 0, 0.027) 40%),url('<?php echo Yii::getAlias('@web/images/overseas-banner.jpg');?>');background-size: cover;">
            <!-- <img src="" alt="banner-img" class="desktop-view-only w-100"> -->
</section>
    
</div>

<section class="lets-started mt-5 mb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="<?php echo Yii::getAlias('@web/images/can-flag.png');?>" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="<?=URL::to('best-universities-in-canada')?>"" class="common-btn">View Universities </a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="<?php echo Yii::getAlias('@web/images/uk-flag.png');?>" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="<?=URL::to('best-universities-in-uk')?>"" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="<?php echo Yii::getAlias('@web/images/aus-flag.png');?>" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="<?=URL::to('best-universities-in-aus')?>"" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    
    <section class="lets-started mt-5 mb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="<?php echo Yii::getAlias('@web/images/eur-flag.png');?>" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="<?=URL::to('europe')?>"" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="<?php echo Yii::getAlias('@web/images/usa-flag.png');?>" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="<?=URL::to('united-states')?>"" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="<?php echo Yii::getAlias('@web/images/new-flag.png');?>" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="<?=URL::to('new-zeeland')?>"" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    
