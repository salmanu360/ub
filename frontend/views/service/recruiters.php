<?php
  use yii\helpers\Url;
  use frontend\components\CounterArchiveWidget;
  
  $this->title = "Become a trusted Recruitment Partner - University Bureau";
$this->registerMetaTag(['name' => 'description', 'content' =>  "Join us today as a recuitment partner- Access More Institutes and grab the opportunities to reach over 1,500+ Institutions & over 100,000 Students,On our recruitment platform you will get time saving recruitment tools,recruitment data and insights to make your work faster. Become a trusted recruitment partner with University Bureau and grab 100% commission"]);
$this->registerMetaTag(['name' => 'keywords', 'content' =>  "Become Recruitment  Partner"]);

?>
<section class="banner-menu mob-inner-height">
  <div class="bg-video-wrap">
    <img src="images/recruiters-banner.jpg" alt="banner-img" class="desktop-view-only w-100">
    <img src="images/mob-recruiters-banner.jpg" alt="banner-img" class="mob-view-only w-100">
    <div class="container banner-caption mob-inner-caption">
      <div class="banner-text mb-3">
        <h1 class="cooper">Innovative and Easy-to-Use Platform for</h1>
        <h2>opportunities and support</h2>
        <p>to grow your business by receiving upto 100% commission on the All-in-one platform.</p>
      </div>
      <a href="<?=URL::to('recruiter')?>" class="banner-btn">Become a Recruitment Partner</a>
    </div>
  </div>
</section>

    <section class="about-ub mt-5">
      <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7"> 
                <h2 class="common-heading mb-3">Make your business easy by converting students faster <span>work smarter by using our recruitment platform</span></h2>
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
                          <div class="col-md-12">
                            <p>Access our recruitment platform to get a variety of exclusive bonuses and to give a boost to your earnings.<p>
                            <p> With our network of 1,500+ institutions worldwide, Stay ahead of the competition by using advanced filtering tools available on our platform to find the best options for your student.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Admissions Processing
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p>Use our recruitment platform to process applications faster than ever and make your students happy. By working with us you can lodged your application within 3 hours and use only one form to apply in multiple institutes with a maximum success rate. You can get instant updates from our global admission experts based on your application to enhance the chances of getting selected in the institutes. All the documents are organized by using Document manager which uploads each application in seconds.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Destination Training
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p>We support you, guide you to focus on your students 24x7. We have a team of Customer Relationship Officers and Regional Managers to help you with anything you need. We also conduct training sessions by our institution specialists to keep you informed about the entry requirement to the institution. We are behind the scene to work with you at each step to ensure that every application is 100% correct and will get selected. Trusted by 5,000+ recruiters worldwide, we have dedicated staff who have expertise in admissions and will guide you from application to commission to visa under one platform.</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
          <div class="col-md-5">
            <img src="images/dashboard-img.jpg" class="w-100" alt="dashboard-img">
          </div>
        </div>
      </div>
    </section>

    <section class="become-partner mt-5">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center mb-3">
            <h2 class="common-heading">Become a recruitment partner get <span>commission and <br>many more rewards.</span></h2>
            <p>Access More Institutes and grab the opportunities to reach over 1,500+ Institutions & over 100,000 Students in key and emerging source markets.
            <br>We are continually engaging with new partners, so you only have to access 50,000+ courses at the click of a button and our advanced filtering tools will find the best options for your student.
            </p>
          </div>
        </div>
        <div class="row lets-started-row mt-5">
          <div class="col-md-4">
            <div class="partner-point-box bg-red h-100">
              <div class="icon-box">
                <i class="fas fa-file-invoice-dollar"></i>
              </div>
              <div class="partner-text">
                <label>Best Commission</label>
                <p>We will give you upto 100% commission which an institution pays for successful student placement and give it to you as soon as possible.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="partner-point-box bg-blue h-100">
              <div class="icon-box">
                <i class="fas fa-trophy"></i>
              </div>
              <div class="partner-text">
                <label>Get Rewards</label>
                <p>Earn bonuses and increase your revenue with access to incentives offered by institutions for placing students with them.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="partner-point-box bg-red h-100">
              <div class="icon-box">
                <i class="fas fa-university"></i>
              </div>
              <div class="partner-text">
                <label>Top Institutes</label>
                <p>Offer top programs at the top institutes by accessing a large inventory of 50,000+ programs by using advanced filters.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="maximise-commission mb-5 mt-5">
      <img src="images/maximise-commission.jpg" class="desktop-view-only w-100" alt="maximise- commission">
      <img src="images/mob-commission-bg.jpg" class="mob-view-only w-100 height-450" alt="mob-video-home">
      <div class="maximise-commission-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1>Maximise your commission <br><span>Grow Your Business</span></h1>
              <p>Maximize your commission by using our advanced system to make application process-tracking and student and institution management work seamlessly.
                Get upto 100% commission and incentives and get success
                </p>
              <a href="<?=URL::to('recruiter')?>" class="maximise-btn">Register with us & <span>Start Earning</span></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="easy-to-use mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="common-heading">All-In-One <span>Platform</span></h2>
            <p>We support you at every step of the recruitment process by providing intelligent technology, to make your work faster and smarter.<br> University Bureau is here whenever you need us.</p>
          </div>
        </div>
        <div class="row lets-started-row">
          <div class="col-md-4">
            <div class="easy-box h-100">
              <div class="easy-img-box">                 
                <img src="images/easy-img-1.jpg" class="w-100" alt="easy-img">
              </div>
              <div class="easy-text">
                <label>Time-saving recruitment tools</label>
                <p>We provide you with a recruitment platform using intelligent technology, which will be your trusted partner and help you do what you do best.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="easy-box h-100">
              <div class="easy-img-box">
                <img src="images/easy-img-2.jpg" class="w-100" alt="easy-img">
              </div>
              <div class="easy-text">
                <label>24X7 Support</label>
                <p>Our Client Relationship Officers and Regional Managers will guide you from entry requirements to institution guidance through your options.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="easy-box h-100">
              <div class="easy-img-box">
                <img src="images/easy-img-3.jpg" class="w-100" alt="easy-img">
              </div>
              <div class="easy-text">
                <label>Data and Insights</label>
                <p>Our platform has brought many world-class institutions Industry-leading insights and knowledge within the reach of consultants, which helps you to plan and achieve your goals.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?= CounterArchiveWidget::widget(); ?>