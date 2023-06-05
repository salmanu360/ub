<?php
  use yii\helpers\Url;
  use frontend\components\CounterArchiveWidget; 

?>

<section class="banner-menu mob-inner-height">
        <div class="bg-video-wrap">
        <img src="images/school-banner.jpg" alt="banner-img" class="desktop-view-only w-100">
        <img src="images/mob-school-banner.jpg" alt="banner-img" class="mob-view-only w-100">
        <div class="container banner-caption mob-inner-caption">
            <div class="banner-text mb-3">
            <h1 class="cooper"></h1>
            <h2>Leadership</h2>
            </div>
        </div>
        </div>
</section>


    <section class="about-ub">
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-center mb-3">
        <h2 class="common-heading">OUR<span> LEADRES</span></h2>
        </div>
    </div>
    </div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <label class="common-top-heading">About</label>
            <!-- <h2 class="common-heading">Learn More About <span>University Bureau</span></h2> -->
            <p>Find everything you need on one platform: 5,000+ recruiters &amp; 1,500+ institutions globally through one marketplace.</p>
            <p>We guide, build confidence and help students worldwide study and get the best international education. We provide a recruitment platform which enables institutions and recruitment agents to find and transact with each other, seamlessly.</p>
          </div>
          <div class="col-md-6">
            <img src="images/logo.png" class="w-100">
          </div>
        </div>
      </div>
    </section>

  <section class="our-founders mb-5 mt-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-center mb-3">
        <h2 class="common-heading">Our<span> Founders</span></h2>
        <p>Our team of experts understands your unique challenges and makes you stand out from the rest- by working with you at every step of the way.We assure you to deliver the quality and compliance checks in the industry.</p>
        </div>
    </div>
    </div>
    <img src="images/school-app-bg.jpg" class="desktop-view-only w-100 height-550" alt="maximise- commission">
    <img src="images/mob-school-app-bg.jpg" class="mob-view-only w-100 height-900" alt="mob-video-home">
    <div class="our-founders-text-container">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <img src="images/mr.DP.png" class="w-100 height-500" alt="Mr.D.P-Chaudary">
        </div>
        <div class="col-md-6 our-founders-text">
            <p class="our-founders-innertext"><i><b class="bold-name">Mr. DP. Chaudhary </b><span>is an expert of the international education system, having more than 16 years of experience dedicatedly in the industry of overseas education. He started to embellish student's careers with Rite Education Private Limited and has delivered extraordinary values for the overseas education industry since 2005.</span></i></p>
        </div>
        </div>
    </div>
    </div>
  </section>

  <section class="our-founders-second">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <div class="our-founders-second-textbox overflow-none">
                <img src="images/black-text-back.png" class="w-100 height-550 sticky-img" alt="">
                <p><b class="bold-name">Mr. Rajan Arya</b>  an Author, Blogger, and present Chief Digital Officer and Chief Executive Officer of Info Birth Innovations Pvt Ltd. &amp; Info Birth Innovations INC, has experience of more than 13 years in delivering optimal results &amp; business value via Data Science / Digital Marketing Solutions. He conceptualized, developed, and led many new knowledge analytics-based capabilities which have had far-reaching industry impact. He is passionate about Digital Marketing, Digital Transformation, Product Development /Marketing. Before Infobirth Innovations Pvt Ltd. &amp; Infobirth Innovations INC, Rajan has held several top management positions. He has worked with Investors Clinic Infratech Ltd &amp; Motion Infotech Pvt. Ltd. as Chief Digital Officer, Armada Group (Kuwait) as Head of Digital Marketing team, RBS (Royal Bank Of Scotland) as Analyst – Rmo, Option Town Softwares Inc as Head of Digital Marketing. He is Google Ads, Tableau, Salesforce, HubSpot &amp; ITIL V4, RPA Certified.</p>
            </div>
        </div>
        <div class="col-md-6">
            <img src="images/mr.rajan.png" class="w-100 height-550" alt="Mr.Rajan-Arya">
        </div>
        </div>
    </div>
</section>

    <section class="about-ub mb-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="images/about-img-1.png" class="w-100">
          </div>
          <div class="col-md-6">
            <label class="common-top-heading">About</label>
            <!-- <h2 class="common-heading">Learn More About <span>University Bureau</span></h2> -->
            <p>Find everything you need on one platform: 5,000+ recruiters &amp; 1,500+ institutions globally through one marketplace.</p>
            <p>We guide, build confidence and help students worldwide study and get the best international education. We provide a recruitment platform which enables institutions and recruitment agents to find and transact with each other, seamlessly.</p>
          </div>
        </div>
      </div>
    </section>

  

    <?= CounterArchiveWidget::widget(); ?>
