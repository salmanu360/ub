<?php
//   ($model->attributes);
//  echo $model->body;
//  echo $model->updated_at;
//   die();
use yii\helpers\Html;
use yii\helpers\Url;




// var_dump($posts);

// echo "<br> <br> <br> <br>";
// // echo $post->title;

// die();


?>

<section class="banner-menu">
      <div class="bg-video-wrap">
        <img src="images/login-bg.jpg" alt="banner-img" class="desktop-view-only w-100">
        <img src="images/mob-login-bg.jpg" alt="banner-img" class="mob-view-only w-100">
        <div class="container banner-caption login-caption banner-caption-custom">
        <div class="banner-text mb-3">
             
            <h2><?= $model->title; ?></h2>
           
          </div>
        </div>
      </div>
    </section>


   
    <section class="single-blog-section">
      <div class="container">
        <div class="row">
         
           <?= $model->body ?>
            
        </div>
    </section>
