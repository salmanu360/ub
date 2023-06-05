 <?php
use common\models\SchoolImage;
use common\models\School;  



$image = SchoolImage::find()->where(['school_id'=>$model->id])->asArray()->one();

 ?>


 <!-- gallery tab content -->
            
            <div class="tab-pane slide" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">

               

               <div class="row">
                 <div class="col-md-4">
                   <img src="uploads/<?= $image['name'];?>" class="w-100">
                 </div>
               </div>



            </div>
            
            <!-- gallery tab content ends-->
