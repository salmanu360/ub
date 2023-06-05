<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var frontend\models\ForStudents $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Show Student Doc');

?>
<main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">
  
<?php

        $mainpath = Yii::getAlias('@webroot/');
        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
        $mainroot=$convertPath.'uploads/doc_student/'.$c;
        
        ?>
        <!--<a href="https://universitybureau.com/backend/web/uploads/doc_student/<?php //echo $c?>">asdfasdf</a>-->
    <iframe tar src="https://universitybureau.com/frontend/web/uploads/doc_student/<?php echo $c?>" width="1000" height="1000"></iframe>
   

    
   
    
</main>
