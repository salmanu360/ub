<?php

// use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Posts;



// var_dump($posts);

// echo "<br> <br> <br> <br>";
// // echo $post->title;

// die();

$posts=Posts::find()->where(['featured'=>1])->orderBy(['id' => SORT_DESC])->limit(10)->asArray()->all();
//$posts_all=Posts::find()->asArray()->all();



$this->title = $model->seo_title;
$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description ]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->meta_keywords]);


?>

<section class="banner-menu"> 
      <div class="bg-video-wrap">
        <img src="images/login-bg.jpg" alt="banner-img" class="desktop-view-only w-100">
        <img src="images/mob-login-bg.jpg" alt="banner-img" class="mob-view-only w-100">
        <div class="container banner-caption login-caption ban-blog-caption" style="padding-bottom:100px;">
          <div class="banner-text mb-3">
            <h2>Blog Info</h2>
            <p>Explore the world</p>
            <a href="/blogs" class="banner-btn">See All Posts</a>
          </div>
        </div>
      </div>
    </section>

<?php
    
        $body1=$model->body;
        $bdy1=substr($body1,0,300);
        $image1="https://".$_SERVER['HTTP_HOST'].'/backend/web/uploads/'.$model->image;
      //  $image='backend/web/uploads/'.$model->image;
        $created_at1=date('M d Y',$model->created_at);
        $title1=$model->title;
       $slug1="https://".$_SERVER['HTTP_HOST']."/blogs/".$model->slug;
        
      
?>
   
    <section class="single-blog-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h1> <?= $title1; ?> </h1>

            

            <div class="col mb-4">
              <div class="post-meta">
                <span class="d-inline-block"><i class="far fa-calendar-alt text-red"></i> <?= $created_at1; ?> </span> <span class="ms-2 d-inline-block"><i class="far fa-user text-red"></i> By Admin </span>
              </div>
            </div>

            

            <hr>

             <div class="shadow">
              <img src="<?= $image1; ?>" class="w-100" alt="Blog">
            </div>
            <br>
            <p>   <?= $body1; ?>  </p>
            <br>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p> -->
          </div>
          <div class="col-md-4">
           <!--  <div class="shadow">
              <img src="<?= $image1; ?>" class="w-100" alt="Blog">
            </div> -->
            <div class="row">
               <div class="col-md-12">
            <div class="right-blog-posts">
              <h4 class="common-sub-heading">Top Posts</h4>
              <hr>

              <?php foreach($posts as $post): 
                
                $image='backend/web/uploads/'.$post['image'];
                $created_at= date('M d Y', $post['created_at']);
                $title=$post['title'];
                
              
                $slug=$post['slug'];
                
                ?>
              <div class="top-blog-post">
                <div class="top-blog-post-img">
                <a href="<?= Url::to(["/blogs/". $slug])?>"> <img src="<?= $image; ?>" alt="blog-post"> </a>
                </div>
                <div class="top-blog-text">
                <a href="<?= Url::to(["/blogs/". $slug])?>"> <label><?= $title; ?></label></a>
                  <div class="col mb-2">
                    <div class="post-meta">
                      <span class="d-inline-block"><i class="far fa-calendar-alt text-red"></i> <?= $created_at; ?> </span> <span class="ms-2 d-inline-block"><i class="far fa-user text-red"></i> By Admin </span>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
              
            
            
            </div>
          </div>

            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-9">
           
            <div class="share-post">
              <label><i class="fas fa-share text-red"></i> Share this post :</label>
             
              <?= \ymaker\social\share\widgets\SocialShare::widget([
                            'configurator'  => 'socialShare',
                            'url'           => $slug1,
                            'title'         => strip_tags($title1),
                            'description'   => strip_tags($bdy1),
                            'imageUrl'      => $image1,
                            ]); ?>
            </div>
           <!--  <div class="view-comments-box text-center">
              <a href="#" class="common-circle-btn">View Comments (0)</a>
            </div> -->
          </div>

         
        </div>
      </div>
    </section>


       <section class="latest-blog mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><span>Read our blog </span> and let’s grow Globally</h1>
                    <p class="mb-4">We have got you covered! Get the latest education trends and the best tips related to studying overseas</p>
                </div>
            </div>
            <div class="row lets-started-row">
              <div class="col-md-12">
                    <div class="3-col-items">

                    <?php foreach($posts as $post): 
               

                   $image='backend/web/uploads/'.$post['image'];
                   $created_at= date('M d ', $post['created_at']);
                   $created_aty= date('y', $post['created_at']);
                   $title=$post['title'];
                   $body=$post['body'];
                   $dot="....";
                   $bdy=substr($body,0,200).$dot;
                
                   $slug="blogs/".$post['slug'];
                   
                
                ?>
                        <div class="card">
                            <div class="media media-2x1 gd-primary"> 
                              <img class="blog-image" src="<?= $image; ?>">
                            </div>
                            <div class="card-body card-body-review">
                                <h5 class="card-title"><a href="<?= $slug; ?>" class="link-red"><?= $title; ?></a></h5>
                                <p><?= $bdy; ?></p>
                                <a href="<?= $slug; ?>" class="link-re home-read-more" tabindex="-1">Read More</a>
                            </div>
                            <div class="post-date">
                              <label class="date-month"><?= $created_at; ?></label>
                              <span class="year"><?= $created_aty; ?></span>
                            </div>
                        </div>

                        <?php endforeach; ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- <div class="carousel-wrap">
      <div class="owl-carousel">
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
      </div>
    </div> -->