<!----------------------- affilate page -------------------------------------------->
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use frontend\widgets\Alert;
$this->title = 'Affiliates';
?>
<section class="banner-menu mob-inner-height">
    <div class="bg-video-wrap-affilate">
      <img src="images/affilate-page-banner2.jpg" alt="banner-img" class="desktop-view-only w-100">
      <img src="images/affilate-page-banner2.jpg" alt="banner-img" class="mob-view-only w-100">
      <div class="landing-page-banner-overlay"></div>
    </div>
  </section>
  
  <section class="affilate-page-student-study mt-5 mb-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php 
          if (Yii::$app->session->hasFlash('success')): ?>
           <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?= Yii::$app->session->getFlash('success') ?>
           </div>
            <?php endif;?>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 p-3 apage-student-study-img-container">
          <img src="images/world-img.png">
        </div>
        <div class="col-md-6 pb-3">
          <h2 class="apage-student-study-heading">We are looking <br>for Students who<br> Want to  <br><span>Study</span> abroad</h2>
          
        <div class="col-md-12 text-center pt-3">
          <p class="apage-student-study-text">
            Guidance, training, scholarships, and counseling, Here to help your friends find their journey abroad.
            <br>
            <br>
            Do you have anyone who is thinking about<br> studying abroad? Introduce them to us. They ll be glad you did. And so will you...
            <br>
            <br>  
            In this way, you don t just help your family and friends find the best program and institution, you also get to earn for yourself too.
            <br>
            <br>  
            Now that s what we call a win win <br>Lead Your Friends on a Complete Pathway to Studying Abroad.
          </p>
        </div>
      </div>
    </div>
  </section>
  
  <section class="affilate-page-earning mb-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class="apage-earning-heading">It's entirely free <br>for everyone and <br>you can start <br><span>earning</span> right <br>away.</h2>
        </div>
        <div class="col-md-6 apage-earning-img-container">
          <img src="images/earning-img.png">
        </div>
        <div class="col-md-12 text-center pt-3">
          <p class="apage-earning-text">
            Spread the word about the University bureau to your readers, viewers, followers, friends, or family and get a 20% revenue share plus incentives for each qualified lead that gets the visa.
            <br>
            <br>
            So whether you re a student, parent, blogger, influencer, or digital marketer <br>and want to generate <br>additional revenue..
            <br>
            <br>  
            Then sign up and become a University bureau affiliate today. Whatever the <br>size of your website or <br>your following you can apply.
            <br>
            <br>  
            The affiliate program is global, so you can become a partner no matter what your audience is.
          </p>
        </div>
      </div>
    </div>
  </section>
  
  <section class="affilate-page-referring mt-5 mb-3">
    <div class="container">
      <div class="row">
        <div class="col-md-8 p-3 apage-referring-img-container">
          <img src="images/referring-img.png">
        </div>
        <div class="col-md-4 pb-3">
          <h2 class="apage-referring-heading">referring is <span>easy!<span></h2>
          <p class="apage-referring-text">Here are the simple steps that bring you closer to your reward</p>
        </div>
  
        <div class="col-md-12 text-center pt-3">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8 apage-referring-arrow-box">
              <img src="images/down-right-arrow-icon.png">
            </div>
          </div>
        </div>
  
        <div class="col-md-12 apage-referring-steps-box">
          <img src="images/register-icon.png">
          <h2>1. Fill out the registration form.</h2>
        </div>
        <div class="col-md-12 apage-referring-steps-box">
          <img src="images/share-icon.png">
          <h2>2. Get your custom link and share it with your friends.</h2>
        </div>
        <div class="col-md-12 apage-referring-steps-box">
          <img src="images/money-icon.png">
          <h2>3. The sign up of your friend with your referral link gives you a reward after they successfully get their visa and join the college.</h2>
        </div>
  
        <div class="col-md-12 text-center pt-3">
          <div class="row">
            <div class="col-md-6 apage-referring-form-arrow-box">
              <img src="images/down-right-arrow-icon.png" rotate="90">
            </div>
            <div class="col-md-6"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="affilate-page-signup-form">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <?php $form = ActiveForm::begin(); ?>
            <div class="row apage-signup-form-container">
              <div class="col-md-12">
                <h2 class="apage-signup-form-heading">Signsdf in with your <br>account here!</h2>
              </div>
              <div class="col-md-6 apage-signup-form-input-box">
               <?= $form->field($model, 'first_name')->textInput(['id' => 'first_name','placeholder'=>'First name','required'=>'required'])->label(false) ?>
              </div>
              <div class="col-md-6 apage-signup-form-input-box">
                <?= $form->field($model, 'last_name')->textInput(['id' => 'last_name','placeholder'=>'Last name','required'=>'required'])->label(false) ?>
              </div>
              <div class="col-md-12 apage-signup-form-input-box">
                 <?= $form->field($model, 'email')->textInput(['id' => 'user_email','placeholder'=>'Email','required'=>'required'])->label(false) ?>
              </div>
              <div class="col-md-12 apage-signup-form-spacer"></div>
              <div class="col-md-12 apage-signup-form-submit-box">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
              </div>
            </div>
          <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-6 apage-signup-form-img-box">
          <img src="images/signup-img.webp">
        </div>
      </div>
    </div>
  </section>
  
  <section class="affilate-page-journey">
    <h2 class="apage-journey-heading">Get rewarded for connecting us with students <br>who need help with their journey <br>to study abroad.</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-12 apage-journey-inner text-center">
          <p class="apage-journey-text">Simply click on the button below and start your journey.</p>
          <img src="images/join-arrow-gif.gif">
        </div>
        <div class="col-md-12 text-center">
          <a href="https://affiliate.universitybureau.com/" class="apage-journey-joinus-btn">Join Us</a>
        </div>
      </div>
    </div>
  </section>
  
  <section class="affilate-page-our-guidance">
    <div class="container">
      <div class="row">
        <div class="col-md-12 apage-our-guidance-heading-box">
          <p>Our Guidance is as Serious as You Take It</p>
          <h2>Add Qualified Leads as a Partner and Earn <br>More, with no referral limitations.</h2>
        </div>
        <div class="col-md-12 text-center">
          <img src="images/growth-img.jpg">
          <p class="apage-our-guidance-text">
            Partner with an efficient and responsible business model that enables you to lead your friends and family to their first step at their dream institutions abroad.
            <br>
            <br>
            We really value your referrals, as our partner you get a share in the revenue after your referral gets a visa, this way your referrals get smiles back and you scale up your passive income.
            <br>
            <br>
            Stressing over the research and application process only reduces the chance for the application to be approved.
            <br>
            <br>
            Lead your friends to their dream institute from the U.S to China with the help of a single web page.
            <br>
            <br>
            It isn t as complicated as you think. Let s succeed in the daunting task together.
          </p>
        </div>
      </div>
      <div class="col-md-12 text-center">
        <a href="https://affiliate.universitybureau.com/" class="apage-our-guidance-joinus-btn">Join Us Today</a>
      </div>
    </div>
  </section>
  
  <section class="affilate-page-testimonial">
    <div class="container">
     <div class="row">
        <div class="col-md-12 apage-testimonial-img-box">
          <img src="images/testimonials-img.png">
        </div>
        <div class="col-md-12 apage-testimonial-container">
          <div class="row">
            <div class="col-md-4 apage-testimonial-inner">
              <div class="apage-testimonial-inner-border">
                  <img class="apage-testimonial-inner-coma-img" src="images/testimonial-coma-img.png">   
                  <p class="apage-testimonial-inner-text">I got to know about the University bureau affiliate program for referring students who want to study abroad by my friend. My niece wants to go to Canada to study after the 12th, I gave her a reference to the university bureau, and you can’t believe I got a very good amount of referral money, which counts my extra income. I am happy that I became a business partner without spending a single penny to establish a business. Till now, I have referred around 50 students and working to find more.<br>
-        <b> Aysha, a Housewife from Chandigarh</b></p>
              </div>
             <div class="apage-testimonial-avtar">
                <img src="images/testimonial-avtar-img.png">
              </div>
            </div>
            <div class="col-md-4 apage-testimonial-inner">
              <div class="apage-testimonial-inner-border">
                  <img class="apage-testimonial-inner-coma-img" src="images/testimonial-coma-img.png">   
                  <p class="apage-testimonial-inner-text">I could not believe that by referring one of my friend to the university bureau and his successful admission to the college of Australia, I could earn money on a single call. It was great to work with the university bureau, and I am recommending more students to the university bureau.<br>
-         <b>Sia, doing a job in a call center</b></p>
              </div>
             <div class="apage-testimonial-avtar">
                <img src="images/testimonial-avtar-img.png">
              </div>
            </div>
            <div class="col-md-4 apage-testimonial-inner">
              <div class="apage-testimonial-inner-border">
                  <img class="apage-testimonial-inner-coma-img" src="images/testimonial-coma-img.png">   
                  <p class="apage-testimonial-inner-text">I could not believe that by referring one of my friend to the university bureau and his successful admission to the college of Australia, I could earn money on a single call. It was great to work with the university bureau, and I am recommending more students to the university bureau.<br>
-         <b>Sia, doing a job in a call center</b></p>
              </div>
             <div class="apage-testimonial-avtar">
                <img src="images/testimonial-avtar-img.png">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
  
  <section class="affilate-page-revenue-share">
    <div class="container">
      <div class="row">
        <div class="col-md-12 apage-revenue-share-container">
          <h2 class="apage-revenue-share-heading">The Models for Revenue Sharing!</h2>
          <div class="row">
            <div class="col-md-6 apage-revenue-share-inner pt-5">
              <h2>Cost Per Qualified Lead (CPQL)</h2>
              <p> 
                Focus on bringing a qualified lead rather than just a lead and screen out the unqualified leads.
                <br>
                <br>
                As a result, you earn per qualified lead that gets their visa successfully.
              </p>
            </div>
            <div class="col-md-6 apage-revenue-share-img-box">
              <img src="images/lead-img.png">
            </div>
            <div class="col-md-6 apage-revenue-share-img-box w-70">
              <img src="images/revenue-img.png">
            </div>
            <div class="col-md-6 apage-revenue-share-inner">
              <h2>Revenue Share</h2>
              <p>
                Get a reward for your efforts to bring in revenue by acquiring a share of the revenue.
                <br>
                <br>
                A profit sharing system allows us to share 20% revenue plus incentives with you as a partner..
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="affilate-page-benefits">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="apage-benefits-heading">Highly-Targeted Benefits for Partners and <br>Referred Friends</h2>
        </div>
        <div class="col-md-12 apage-benefits-inner-container">
          <div class="row">
            <div class="col-md-4 apage-benefits-box">
              <h2>More Profits, More Secured Futures</h2>
            </div>
            <div class="col-md-4 apage-benefits-box">
              <h2>Passive Income and Promotion</h2>
            </div>
            <div class="col-md-4 apage-benefits-box">
              <h2>Passive Income and Promotion</h2>
            </div>
          </div>
        </div>
        <div class="col-md-12 apage-benefits-inner-container">
          <div class="row">
            <div class="col-md-4 p-0 apage-benefits-box">
              <p class="border-bottom">You bring more qualified aspirants to a single point of success.</p>
              <p class="p-2">As a result, you only scale your income.</p>
            </div>
            <div class="col-md-4 p-0 apage-benefits-box">
              <p class="border-bottom">Unlike a sales team working 24/7, you build a passive income and scale your finances.</p>
              <p class="p-2">Refer your friends and family for higher education in APAC countries.</p>
            </div>
            <div class="col-md-4 p-0 apage-benefits-box">
              <p class="p-2">See the smiles on your friends or family s faces after you lead them to their favorite institute.</p>
            </div>
          </div>
        </div>
        <div class="col-md-12 apage-benefits-inner-container">
          <div class="row">
            <div class="col-md-4 p-0 apage-benefits-box">
              <h3>Flexibility</h3>
              <p class="p-2">Own a flexible stream of revenue with no limitations to the income.</p>
            </div>
            <div class="col-md-4 p-0 apage-benefits-box">
              <img class="w-100" src="images/refer.jpg">
            </div>
            <div class="col-md-4 p-0 apage-benefits-box">
              <h3>A Sustained Business Relationship</h3>
              <p class="p-2">Maximize the win for both sides and build an authentic and lasting business relationship</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="affilate-page-performance">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center apage-performance-container">
          <h2>Better the performance, Greater the benefits</h2>
  
          <img src="images/group-icon.png">
          <p>To make this even better for our affiliate partners, You can drip <br>your toe in the MLM module if you <br>perform better.</p>
  
          <img src="images/chart-icon.png">
          <p>You can create as many connections to get qualified leads. In this way, you can get a revenue share from every qualified lead you get but on top of that, you also get to earn from every lead your connection brings to us.</p>
  
          <img src="images/boxes-icon.png">
          <p>Become the envy of your friends with unrestricted access to this module and earn like a pro.</p>
        </div>
      </div>
    </div>
  </section>
  
  <section class="affilate-page-refer-more">
    <div class="container">
      <img class="w-100" src="images/refer-more-img.jpg">
      <div class="col-md-12 apage-refer-more-btn-box">
        <a href="https://affiliate.universitybureau.com/" class="apage-refer-more-btn">Join Affiliate Program</a>
        <img src="images/join-arrow-gif.gif">
      </div>
    </div>
  </section>
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script type="text/javascript">
  /*window.addEventListener('load',function(){
    swal("Good job!", "You clicked the button!", "success");
  });*/
  
</script>