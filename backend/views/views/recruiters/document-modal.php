<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="x_title heading">
    <h2>Download Documents</h2>
    <button id="close-btn" type="button" class="close common-btn-close" data-dismiss="modal">&times;</button>
</div>
<div class="documents-flex">
<?php 
    $path = Yii::getAlias('@web/uploads/docs/');
    $path = str_ireplace('/backend/web', '/frontend/web', $path);
?>    
<?php foreach($documents as $document): ?>
<?php
    $file = pathinfo($document);
    if($file["extension"] == 'pdf'){
        $icon = 'file-pdf-o';
    } elseif($file["extension"] == 'doc' || $file["extension"] == 'docx'){
        $icon = 'file-word-o';
    } else {
        $icon = 'file-image-o';
    }  
?>     
<div class="card">
    <a href="<?=$path.$document?>">
    <?php if($file["extension"] == 'jpg' || $file["extension"] == 'jpeg' || $file["extension"] == 'png' || $file["extension"] == 'gif'): ?>
        <img src="<?=$path.$document?>" class="card-img-top" alt="..." style="width: 100px;">
    <?php else: ?>
        <i class="fa fa-<?=$icon?> fa-5x" aria-hidden="true"></i>
    <?php endif; ?>
    </a>
    <div class="card-body">
    <h5 class="card-title"><?=substr($file["filename"], 0,10)?></h5>   
    <a href="<?=$path.$document?>" class="btn btn-primary btn-sm" download>Download</a>
  </div>
</div>
<?php endforeach; ?>
</div>

<div class="modal-footer">
    <a href="<?=Url::to(['/recruiters/download-zip', 'id' => $student->ID]); ?>" class="btn btn-dark">Download Zip</a>
</div>

<style>
.documents-flex {
    display: flex;
    justify-content: space-between;
    padding: 30px;
}
.documents-flex .card {
    text-align: center;
}
.heading h2{
    float: none;
}
.heading button#close-btn {
    margin: 0;
    padding: 0;
    position: absolute;
    right: 15px;
    top: 18px;
}
</style>