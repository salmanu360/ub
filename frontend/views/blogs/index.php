<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Posts;

$posts=Posts::find()->asArray()->all();

?>
<section class="banner-menu">
      <div class="bg-video-wrap">
        <img src="images/login-bg.jpg" alt="banner-img" class="desktop-view-only w-100">
        <img src="images/mob-login-bg.jpg" alt="banner-img" class="mob-view-only w-100">
        <div class="container banner-caption login-caption">
          <div class="banner-text mb-3">
            <h2>Latest Blog</h2>
            <p>Explore the world</p>
          </div>
          <a href="<?= Url::to(['/'])?>" class="banner-btn">Go to Home</a>
        </div>
      </div>
    </section>

   
    <section class="our-blog mt-5 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="blog-posts">
                <h2 class="common-heading text-center">Read our blog and get the key to the <br><span>door of studying internationally</span></h2>

                <!-- <div class="search-box mt-5">
                  <input type="text" class="common-search form-control" placeholder="Search tips, guides, upcoming events, news, etc" name="">
                  <button type="button" class="search-btn-2">Search</button>
                </div> -->

                <section class="timeline">
                  <div class="timeline-body">
                  
                  <?php
                   $ex_date='';
                   $en=1;
                  foreach($posts as $post): ?>
                     

                    <?php 
                        $create_dt=date('M Y',$post['created_at']);
                    if($ex_date!=$create_dt){ ?>
                    <div class="timeline-date">
                      <h3 class="font-weight-bold"><?= date('M Y',$post['created_at']); ?></h3>
                    </div>
                    <?php 
                  $ex_date=$create_dt;
                  $en=1;
                  } 
                  if($en%2==0){ 
                    $cl="right";
                  }else{
                    $cl="left";
                  }
                  $en++;

                 
                   $image='backend/web/uploads/'.$post['image'];
                   $created_at= date('M d Y', $post['created_at']);
                   $title=$post['title'];
                   $body=$post['body'];
                   $bdy=substr($body,0,300);
                   $slug=$post['slug'];
                  //  $extra="...";


                  //  var_dump($bdy);
                  //  die();
                  //  $content="Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos";
                  //  $con=substr($content,50);
                  
                  ?>

                    <article class="timeline-box <?= $cl ?> post post-medium">
                      <div class="timeline-box-arrow"></div>
                      <div class="p-2">
                        <div class="row mb-2">
                          <div class="col">
                            <div class="post-image">
                              <a href="<?= Url::to(["/blogs/". $slug])?>">
                                <img src="<?= $image; ?>" class="w-100 img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-meta">
                              <span class="d-inline-block"><i class="far fa-calendar-alt"></i><?= $created_at; ?> </span> <span class="ms-2 d-inline-block"><i class="far fa-user"></i> By Admin </span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-content">
                              <h4 class="mt-2 mb-2"><a href="<?= Url::to(["/blogs/". $slug])?>" target="_blank"><?= $title; ?></a></h4>
                              <p> <?= $bdy."....";?></p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <a href="<?= Url::to(["/blogs/". $slug])?>" class="common-btn" target="_blank">Read More</a>
                          </div>
                        </div>
                      </div>
                    </article>

                    <?php endforeach; ?>

                    <!-- <article class="timeline-box right post post-medium">
                      <div class="timeline-box-arrow"></div>
                      <div class="p-2">
                        <div class="row mb-2">
                          <div class="col">
                            <div class="post-image">
                              <a href="single-blog.html">
                                <img src="images/blog-2.jpg" class="w-100 img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-meta">
                              <span class="d-inline-block"><i class="far fa-calendar-alt"></i> January 10, 2021 </span> <span class="ms-2 d-inline-block"><i class="far fa-user"></i> By Admin </span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-content">
                              <h4 class="mt-2 mb-2"><a href="single-blog.html">This is a stardard post with preview image</a></h4>
                              <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <a href="single-blog.html" class="common-btn">Read More</a>
                          </div>
                        </div>
                      </div>
                    </article> -->

                    <!-- <article class="timeline-box left post post-medium">
                      <div class="timeline-box-arrow"></div>
                      <div class="p-2">
                        <div class="row mb-2">
                          <div class="col">
                            <div class="post-image">
                              <a href="single-blog.html">
                                <img src="images/blog-3.jpg" class="w-100 img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-meta">
                              <span class="d-inline-block"><i class="far fa-calendar-alt"></i> January 10, 2021 </span> <span class="ms-2 d-inline-block"><i class="far fa-user"></i> By Admin </span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-content">
                              <h4 class="mt-2 mb-2"><a href="single-blog.html">This is a stardard post with preview image</a></h4>
                              <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <a href="single-blog.html" class="common-btn">Read More</a>
                          </div>
                        </div>
                      </div>
                    </article> -->

                    <!-- <div class="timeline-date">
                      <h3 class="font-weight-bold">November 2021</h3>
                    </div>

                    <article class="timeline-box left post post-medium">
                      <div class="timeline-box-arrow"></div>
                      <div class="p-2">
                        <div class="row mb-2">
                          <div class="col">
                            <div class="post-image">
                              <a href="single-blog.html">
                                <img src="images/blog-4.jpg" class="w-100 img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-meta">
                              <span class="d-inline-block"><i class="far fa-calendar-alt"></i> January 10, 2021 </span> <span class="ms-2 d-inline-block"><i class="far fa-user"></i> By Admin </span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-content">
                              <h4 class="mt-2 mb-2"><a href="single-blog.html">This is a stardard post with preview image</a></h4>
                              <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <a href="single-blog.html" class="common-btn">Read More</a>
                          </div>
                        </div>
                      </div>
                    </article>

                    <article class="timeline-box right post post-medium">
                      <div class="timeline-box-arrow"></div>
                      <div class="p-2">
                        <div class="row mb-2">
                          <div class="col">
                            <div class="post-image">
                              <a href="single-blog.html">
                                <img src="images/blog-5.jpg" class="w-100 img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-meta">
                              <span class="d-inline-block"><i class="far fa-calendar-alt"></i> January 10, 2021 </span> <span class="ms-2 d-inline-block"><i class="far fa-user"></i> By Admin </span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-content">
                              <h4 class="mt-2 mb-2"><a href="single-blog.html">This is a stardard post with preview image</a></h4>
                              <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <a href="single-blog.html" class="common-btn">Read More</a>
                          </div>
                        </div>
                      </div>
                    </article>

                    <div class="timeline-date">
                      <h3 class="font-weight-bold">September 2021</h3>
                    </div>

                    <article class="timeline-box left post post-medium">
                      <div class="timeline-box-arrow"></div>
                      <div class="p-2">
                        <div class="row mb-2">
                          <div class="col">
                            <div class="post-image">
                              <a href="single-blog.html">
                                <img src="images/blog-1.jpg" class="w-100 img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-meta">
                              <span class="d-inline-block"><i class="far fa-calendar-alt"></i> January 10, 2021 </span> <span class="ms-2 d-inline-block"><i class="far fa-user"></i> By Admin </span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-content">
                              <h4 class="mt-2 mb-2"><a href="single-blog.html">This is a stardard post with preview image</a></h4>
                              <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <a href="single-blog.html" class="common-btn">Read More</a>
                          </div>
                        </div>
                      </div>
                    </article>

                    <article class="timeline-box right post post-medium">
                      <div class="timeline-box-arrow"></div>
                      <div class="p-2">
                        <div class="row mb-2">
                          <div class="col">
                            <div class="post-image">
                              <a href="single-blog.html">
                                <img src="images/blog-2.jpg" class="w-100 img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-meta">
                              <span class="d-inline-block"><i class="far fa-calendar-alt"></i> January 10, 2021 </span> <span class="ms-2 d-inline-block"><i class="far fa-user"></i> By Admin </span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-content">
                              <h4 class="mt-2 mb-2"><a href="single-blog.html">This is a stardard post with preview image</a></h4>
                              <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <a href="single-blog.html" class="common-btn">Read More</a>
                          </div>
                        </div>
                      </div>
                    </article>

                    <article class="timeline-box left post post-medium">
                      <div class="timeline-box-arrow"></div>
                      <div class="p-2">
                        <div class="row mb-2">
                          <div class="col">
                            <div class="post-image">
                              <a href="single-blog.html">
                                <img src="images/blog-3.jpg" class="w-100 img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-meta">
                              <span class="d-inline-block"><i class="far fa-calendar-alt"></i> January 10, 2021 </span> <span class="ms-2 d-inline-block"><i class="far fa-user"></i> By Admin </span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="post-content">
                              <h4 class="mt-2 mb-2"><a href="single-blog.html">This is a stardard post with preview image</a></h4>
                              <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <a href="single-blog.html" class="common-btn">Read More</a>
                          </div>
                        </div>
                      </div>
                    </article> -->

                    <div class="timeline-date">
                      <h3 class="font-weight-bold">
                        <a href="#">Load More...</a>
                      </h3>
                    </div>

                  </div>

                </section>

              </div>
            </div>
        </div>
      </div>
    </section>


