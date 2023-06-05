<?php
use yii\helpers\Url;
use frontend\components\CounterArchiveWidget; 
use common\models\Posts;
use common\models\Course;
use common\models\School;
use common\models\Country;
use common\models\SchoolImage;   

$this->title = "Best Overseas Education Consultant for Students in India- Online Study Abroad Recruitment Platform for Institutions, Recruiters - University Bureau";
$this->registerMetaTag(['name' => 'description', 'content' =>  "University Bureau is  the most experienced overseas education advisor in India. Our Study Abroad advisor will help you out by giving you best study abroad counselling to students and also become best online study abroad recruitment platform for recruiters and Institutions"]);
$this->registerMetaTag(['name' => 'keywords', 'content' =>  "Online Recruitment Platform"]);


   

  $posts=Posts::find()->where(['featured'=>1])->limit(15)->asArray()->all();
//   var_dump($posts);


//   foreach($posts as $post):
    
//   echo $img=$post['image'];

// endforeach;
//   die();
?>
<section class="banner-menu home-height">
      <div class="bg-video-wrap">
        <img src="images/banner-1.jpg" alt="banner-img" class="desktop-view-only w-100">
        <img src="images/mob-banner.jpg" alt="banner-img" class="mob-view-only w-100">
        <div class="container banner-caption banner-caption-home">
          <div class="banner-text mb-3">
            <h1 class="cooper">Global Recruitment Platform</h1>
            <h2>TO EMPOWER STUDENTS </h2>
            <p>Create solutions for tomorrow’s challenges</p>
          </div>
          <a href="<?=URL::to('service/students')?>" class="banner-btn">Learn More</a>
        </div>
      </div>
      <div class="carousel-bottom">
        <ul class="banner-boxes">
          <li>
            <a href="#">
              <i class="fas fa-laptop-code"></i>
              <label>All-in-One Online Recruitment Platform</label>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-headset"></i>
              <label>24x7 Support</label>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-chart-bar"></i>
              <label>Real-Time Data Reporting </label>
            </a>
          </li>
        </ul>
      </div>
    </section>

    <section class="call-to-action">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <p><strong>30% More commission</strong>  for the first 50 affiliate partners</p>
            <p>Offering the best opportunities and support to grow your business with no extra effort</p>
          </div>
          <div class="col-md-4 text-end">
            <a href="<?=URL::to('service/recruiters')?>" class="call-to-action-btn">Apply Now</a>
          </div>
        </div>
      </div>
    </section>

    <section class="about-ub mt-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="images/about-img-1.png" class="w-100">
          </div>
          <div class="col-md-6">
            <label class="common-top-heading">About</label>
            <!-- <h2 class="common-heading">Learn More About <span>University Bureau</span></h2> -->
            <p>Find everything you need on one platform: 5,000+ recruiters & 1,500+ institutions globally through one marketplace.</p>
            <p>We guide, build confidence and help students worldwide to study and get the best international education. We provide a recruitment platform which enables institutions and recruitment agents to find and transact with each other, seamlessly.</p>
            <p>Think, approach us for getting the best out of the best course, take a step ahead  and celebrate your win with us.</p>
            <p> <a href="<?=URL::to('about-us')?>" class="common-btn">Learn More</a></p>
          </div>
        </div>
      </div>
    </section>

    <section class="how-we-work mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="common-heading mb-3">How we <span>Work</span></h2>
            <div class="row">
              <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Time-saving recruitment tools
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                          <div class="col-md-9">
                            <p>University Bureau makes your search easy to study abroad, simplifies your application filing, and makes your application acceptance process successful. We connect international students, recruitment partners (5,000+), and academic institutions (1,500+) on one platform across Canada, the United States, the United Kingdom, and Australia.<p>
                          </div>
                          <div class="col-md-3">
                            <img src="images/time-save-img.png" class="w-100" alt="time-save">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        End-to-end quality assurance
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p>We provide you Quality Compliance and Visa (QCV) team to conduct in-depth checks on all visa and course applications by using intuitive automation tools. We aim to make the application process smooth and stress-free for students, recruiters and universities by providing 1-on-1 support worldwide.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Data that drives performance
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p>We provide student portal to recruiters, which saves recruiters time and gives students a seamless counseling experience. With us, students will understand their application funnel and data is organised in one secure place by following a Privacy Compliance Program aligned with the General Data Protection Regulation.</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="lets-started mt-5 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="common-heading"><span>Let’s get started </span> With University Bureau</h2>
            <p>We provide a recruitment platform, providing End to End support from research to admission to visa and arrival at your dream Institute. We guide you at every step of the way 24x7!</p>
            <p>Dream-Achieve-Success-Grow</p>
          </div>
        </div>
        <div class="row lets-started-row">
          <div class="col-md-4 mtb-15">
            <div class="lets-started-box h-100">
              <div class="lets-started-img">
                <img src="images/apply-for-1.jpg" class="w-100" alt="apply-for-1.jpg">
              </div>
              <div class="lets-started-text">
                <label>For Students</label>
                <p>We work hard to make your dreams come true by helping you to apply to institutes or programs based on your skills and interest.</p>
              </div>
              <div class="lets-started-btn">
                <a href="<?=Url::to(['/site/signup'])?>" class="common-btn">Student Registration</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mtb-15">
            <div class="lets-started-box h-100">
              <div class="lets-started-img">
                <img src="images/apply-for-2.jpg" class="w-100" alt="apply-for-1.jpg">
              </div>
              <div class="lets-started-text">
                <label>For Partner Institutions</label>
                <p>We provide a trusted platform to institutions to find a student, which the Home Office has approved as per the requirements.</p>
              </div>
              <div class="lets-started-btn">
                <a href="<?=Url::to('service/institutions')?>" class="common-btn">Institutions Registration</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mtb-15">
            <div class="lets-started-box h-100">
              <div class="lets-started-img">
                <img src="images/apply-for-3.jpg" class="w-100" alt="apply-for-1.jpg">
              </div>
              <div class="lets-started-text">
                <label>For Recruiters</label>
                <p>We provide an online recruitment platform to select student's,  institutions and offer them support 24x7 locally or globally by using our online support system.</p>
              </div>
              <div class="lets-started-btn">
                <a href="<?=Url::to('recruiter')?>" class="common-btn">Recruiters Registration</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="video-home mb-5 mt-5">
      <img src="images/video-bg.jpg" class="desktop-view-only w-100" alt="video-home">
      <img src="images/mob-video-bg.jpg" class="mob-view-only w-100" alt="mob-video-home">
      <div class="video-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <p><a href="#"><img src="images/play-icon.png" alt="Play-Icon"></a></p>
              <h1>Just Everything you need to connect with  <br><span>Institutes, Students, and Recruitment Partners across the Globe.</span></h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="what-says mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="common-heading">Listen to <span>our Partners</span></h2>
            <p>We believe that education must be accessible to all. We guide Students, Institutions, Recruiters and work hard for them to achieve their goals.</p>
          </div>
        </div>
        <div class="row lets-started-row align-items-center">
          <div class="col-md-4 pe-0">
            <div id="students-say" class="carousel slide carousel-fade bg-blue-home" data-bs-ride="carousel">
              <h5>Students:</h5>
              <hr class="line-hr">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#students-say" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#students-say" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#students-say" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item people-pic active">
                  <img src="images/stu2.jpg" alt="people-say">
                  <div class="carousel-caption">
                    <p class="text-white">University Bureau helped me throughout my application filling process. Their team double-checked every part of my application or visa so that everything was correct and they provided 24x7 call support.</p>
                    <small>	Himanshi aggarwal, University of Canada West, Student from India.</small>
                  </div>
                </div>
                <div class="carousel-item people-pic">
                  <img src="images/stu3.jpg" alt="people-say">
                  <div class="carousel-caption">
                    <p class="text-white">Studying at an international university was the most rewarding experience of my life. With the university bureau, it comes true. UB team guided me through the immigration, visa filing, IELTS training process. </p>
                    <small>	Shruti, University of Toronto, Student from India.</small>
                  </div>
                </div>
                <div class="carousel-item people-pic">
                  <img src="images/stu4.jpg" alt="people-say">
                  <div class="carousel-caption">
                    <p class="text-white">Thanks to the University Bureau team for guiding me and helping me at each and every step to make my dream of getting an education at a foreign university successful. </p>
                    <small>	Sonal Rathore, Conestoga College, Ontario, Canada, Student from India.</small>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#students-say" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#students-say" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-md-4 pe-0 ps-0">
            <div id="partner-say" class="carousel slide carousel-fade bg-red-home pb-5 pt-5" data-bs-ride="carousel" >
              <h5>Institutions:</h5>
              <hr class="line-hr">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#partner-say" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#partner-say" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#partner-say" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item people-pic active">
                  <img src="images/int1.jpg" alt="people-say">
                  <div class="carousel-caption">
                    <p class="text-white"> It was not easy to find each student and check all the submitted applications. With University Bureau, institutes can directly reach out to recruiters. Institutes only have to give a final check to the submitted application, which saves time.</p>
                    <!-- <small>SC West Institute-1, Canada</small> -->
                  </div>
                </div>
                <div class="carousel-item people-pic">
                  <img src="images/inst2.jpg" alt="people-say">
                  <div class="carousel-caption">
                    <p class="text-white">The University bureau provides a network of more than 5,000+ recruiters to reach the best and brightest students globally. It provides a single, easy-to-use platform, and they train the recruitment partners through an industry specialist to promote the institution.</p>
                    <!-- <small>SC West Institute-2, Canada</small> -->
                  </div>
                </div>
                <div class="carousel-item people-pic">
                  <img src="images/stu1.jpg" alt="people-say">
                  <div class="carousel-caption">
                    <p class="text-white">University Bureau is a college search and review platform. Students can view thousands of institutions and give their feedback to help other candidates to choose the institute who are willing to study abroad. They also promote institutions worldwide.</p>
                    <!-- <small>SC West Institute-3, Canada</small> -->
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#partner-say" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#partner-say" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-md-4 ps-0">
            <div id="recruiters-say" class="carousel slide carousel-fade bg-blue-home" data-bs-ride="carousel" >
              <h5>Recruiters:</h5>
              <hr class="line-hr">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#recruiters-say" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#recruiters-say" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#recruiters-say" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item people-pic active">
                  <img src="images/rec1.jpg" alt="people-say">
                  <div class="carousel-caption">
                    <p class="text-white">University Bureau has dedicated staff whose support is available for 24x7. They guide everything about their platform, which is so friendly that I quickly understand it. They provide us with all facilities on one recruitment platform. </p>
                    <small>Harshit Shrivastava, Indore.</small>
                  </div>
                </div>
                <div class="carousel-item people-pic">
                  <img src="images/re3.jpg" alt="people-say">
                  <div class="carousel-caption">
                    <p class="text-white"> University Bureau helped me increase my student reach and gave me more students and institutions options on their platform. They also provide us document manager to store the documents and CRM tools to make our work smooth.</p>
                    <small>Ammad, Mumbai</small>
                  </div>
                </div>
                <div class="carousel-item people-pic">
                  <img src="images/newr1.jpg" alt="people-say">
                  <div class="carousel-caption">
                    <p class="text-white">University Bureau simplifies our search and streamlines the application-acceptance process by connecting international students, recruitment partners, and academic institutions globally on one platform. There are providing an online Recruitment AI-Enabled Platform, thus providing complete digital solutions. </p>
                    <small>Malvika Singh, Banglore</small>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#recruiters-say" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#recruiters-say" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

   


    <section class="search-dream-colleges">
      <div class="container">
        <div class="row">

           <div class="common-heading-home-college text-center">Most Recommended <span> Colleges</span></div>
        <!--   <div class="col-md-12 text-center">
            <h2 class="mb-4">Search Your <span>Dream College/Universites</span></h2>
             <div class="pseudo-search">
                <input type="text" placeholder="Search for colleges fees, courses, and more.." required>
                <button class="search-btn" type="submit"> Search</button>
              </div>
          </div> -->

         




          <div class="row lets-started-row">
            <div class="col-md-12 mt-5">
              <div class="3-col-items">


                  <?php




             $schools= School::find()->where(['show_home'=>1])->asArray()->all();

             foreach ($schools as $school):

             // $school=School::find()->where(['id'=>$course['college_id']])->asArray()->one();
              $image=SchoolImage::find()->where(['school_id'=>$school['id']])->asArray()->one();
              $Country=Country::find()->where(['id'=>$school['dest_country']])->asArray()->one();
            
           ?>
                  <div class="card">
                      <div class="media media-2x1 gd-primary"> 
                        
                        <?php if(!empty($image['name'])):?>
                        <img class="blog-image" src="uploads/<?= $image['name'];?>">
                      <?php endif; ?>
                        <div class="college-title">
                          <label><?= $school['name']; ?></label>
                         
                        </div>
                      </div>
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-6 bdr-right">
                              <label><?= $school['min_price'] ?></label>
                              <small>Min Fees</small>
                            </div>
                            <div class="col-md-6">
                              <label><?= $school['max_price'] ?></label>
                              <small>Max Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                                 <label><?= $school['avg_price'] ?></label>
                                 <small>Average Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                              <?php if(!empty($Country['name'])): ?>
                                  <p><i class="fas fa-map-marker-alt"></i> <?= $Country['name']; ?></p>
                              <?php endif; ?> 
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

  
    <?= CounterArchiveWidget::widget(); ?>


    <style type="text/css">
      .slider-nav .slick-list .slick-track {
          transform: translate3d(0px, 0px, 0px) !important;
      }
      
    </style>