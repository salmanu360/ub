<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
    $this->title = " Study In Canada - Top Universities,Benefits,Eligibility Criteria,Scholorships,Colleges,Fees,Intakes, Admissions,Requirements , With Ilets  Without Ilets ,Popular Courses , Study Visa  - University Bureau";
    $this->registerMetaTag(['name' => 'description', 'content' =>  "Do you want to Study in Canada ?  Get  counselling from our Canada Study Abroad consultant who will guide you : Why study in Canada, Choose top universities in Canada including information related to eligibility criteria, admission procedure popular courses and many more...Benefits of study in Canada"]);
    // $this->registerMetaTag(['name' => 'keywords', 'content' =>  "Study In Canada"]);

?>
<!-------------------------------------------------------- landing page ----------------------------------------------------------------------------------------- -->
 
<section class="banner-menu mob-inner-height">
    <div class="bg-video-wrap">
      <img src="images/canada-landing-page-banner.jpg" alt="banner-img" class="desktop-view-only w-100">
      <img src="images/canada-landing-page-banner.jpg" alt="banner-img" class="mob-view-only w-100">
      <div class="landing-page-banner-overlay"></div>
    </div>
  </section>
  
  
  <div class="landing-page-main-section">
  
      <section class="landing-page-apply-sticky">
        <a href="" data-bs-toggle="modal" data-bs-target="#apply_now"><img id="landing-page-apply-sticky-img" src="images/Apply-now-gif.gif"></a>
      </section>
  
      <section class="landing-page_decription mt-5 mb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12 lpage-decription-container">
              <p>
           <!--  <?php //if (Yii::$app->session->hasFlash('success')): ?>
           <div class="alert alert-success">
              <?//= Yii::$app->session->getFlash('success') ?>
           </div>
            <?php //endif; ?> -->
            
    <?php
                    $st = Yii::$app->session->getFlash('deleteError');
                    if(!empty($st)) { ?>
                        <div class="alert alert-success">
                            <p >  <?=  $st[0]; ?></p>
                        </div>                     
                    <?php } ?>
              </p>
              <p>
                Many students and professionals see Canada as a destination for 
                higher education and job prospects. People prefer Canada to other 
                nations for their future prospects because Canada's quality of life and 
                education inspire foreign students to go there in quest of 
                opportunity.
              </p>
              <p>
                Many overseas students are interested in going to Canada because of 
                its world-class universities, outstanding infrastructure, cultural 
                diversity, and job prospects. Aside from these factors, Canada's 
                welcoming environment, high-quality lifestyle, and opportunities to 
                explore have made it a popular study destination.
              </p>
              <p>
                Many overseas students are interested in going to Canada because of 
                its world-class universities, outstanding infrastructure, cultural 
                diversity, and job prospects. Aside from these factors, Canada's 
                welcoming environment, high-quality lifestyle, and opportunities to 
                explore have made it a popular study destination.
              </p>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-why-study">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="lpage-why-study-heading"> Why Study in <span>Canada</span>?</h2>
              <p>What makes it ideal for so many people?</p>
  
               <div class="lpage-why-study-inner-curve">
                  <p>
                    Canada stands out as a worldwide hub for higher education due to its 
                    advanced education sector, rich culture, and beautiful landscapes. 
                    Canada is also a peace-loving country where overseas students may 
                    feel comfortable and secure
                  </p>
               </div> 
               <div class="lpage-why-study-inner">
                  <p>
                    Canada is one of the most popular study abroad destinations among 
                    Indian students. It is also home to a number of well regarded 
                    universities and colleges with reasonable tuition prices. It becomes 
                    much more enticing as a result of this. The fact that Canada has some 
                    fantastic work prospects is the icing on the cake. In 2021, Canada 
                    welcomed a record-breaking 4,50,000 new overseas students. This 
                    increase in student enrollment is due to their relaxation of travel 
                    limitations and Post-Graduation Work Permit (PWP) criteria. Apart 
                    from that, the scenic beauty, racial variety, and warm people make it 
                    worthwhile
                  </p>
               </div> 
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-benefits">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
  
              <div class="lpage-benefits-heading-container">
                <h2 class="lpage-benefits-heading-curve">Here are some benefits of studying in</h2>
                <div class="lpage-benefits-country">
                  <div class="lpage-benefits-flag"><img src="images/flag-icon.png"></div>
                  <h2 class="mt-3">Canada</h2>
                  <div class="lpage-benefits-flag"><img src="images/flag-icon.png"></div>
                </div>
              </div>
  
              <div class="row">
                <div class="col-md-12 lpage-benefits-inner-container">
                  <h2 class="lpage-benefits-heading text-center">Studying and living costs are <span>reasonable</span></h2>
                  <img src="images/benefits-img-1.png">
                  <p>
                    Canada is relatively inexpensive in terms of studying and living 
                    expenditures when compared to other prominent destinations such as the 
                    United Kingdom and the United States.
                  </p>
                </div>
                <div class="col-md-6 lpage-benefits-inner-container">
                  <h2 class="lpage-benefits-heading text-center">High <span>Living</span> Standards</h2>
                  <img src="images/benefits-img-2.png">
                  <p>
                    Canada has a high level of living and a great quality 
                    of life. One of the reasons many students opt to 
                    study in Canada is this. 
                  </p>
                </div>
                <div class="col-md-6 lpage-benefits-inner-container">
                  <h2 class="lpage-benefits-heading text-center">Home to <span>top universities</span> of the world</h2>
                  <img src="images/benefits-img-3.png">
                  <p>
                    Canada hosts some of the top universities of the 
                    world including the University of Toronto, McGill 
                    University, University of Waterloo, University of 
                    Alberta and many more.
                  </p>
                </div>
                <div class="col-md-12 lpage-benefits-inner-container">
                  <h2 class="lpage-benefits-heading text-center">No <span>Language</span> Barrier</h2>
                  <img src="images/benefits-img-4.png">
                  <p>
                    It is considerably simpler to survive in Canada because English and French are the official 
                    languages. English is virtually universally understood, making it perfect for overseas 
                    students
                  </p>
                </div>
                <div class="col-md-6 lpage-benefits-inner-container">
                  <h2 class="lpage-benefits-heading text-center">High <span> Employability</span> Rate</h2>
                  <img src="images/benefits-img-5.png">
                  <p class="lpage-benefits-small-text">
                    Canada's institutions are well-known for their excellent 
                    graduate employment rates and academic achievements. 
                    The Canadian Ministry of Education encourages overseas 
                    students to enroll in Canadian institutions to foster a 
                    cosmopolitan atmosphere. This makes it simple for 
                    international students to interact with their peers at college. 
                    Canada is also a safe country with an excellent standard of 
                    living for its residents. Canada's colleges and universities 
                    have also been praised for their thorough research in 
                    various subjects, earning them international acclaim
                  </p>
                </div>
                <div class="col-md-6 lpage-benefits-inner-container">
                  <h2 class="lpage-benefits-heading text-center">Internationally Recognized Educational <span>System</span></h2>
                  <img src="images/benefits-img-6.png">
                  <p class="lpage-benefits-small-text">
                    The university system in Canada is one of the causes 
                    behind the country's excellent academic achievements 
                    and inventions. It encourages pupils to talk and express 
                    themselves without reservation. The lectures are also 
                    made engaging to keep the students' attention. Following 
                    their examinations, students receive detailed comments. 
                    These elements contribute to the fact that studying in 
                    Canada, with its program-focused colleges and many 
                    employment opportunities, is a success
                  </p>
                </div>
                <div class="col-md-6 lpage-benefits-inner-container">
                  <h2 class="lpage-benefits-heading text-center"><span>Immigrant</span>-friendly country</h2>
                  <img src="images/benefits-img-7.png">
                  <p class="lpage-benefits-small-text">
                    Canada has welcomed about 15 million immigrants in the 
                    last century and a half. In the 1970s, it was also the first 
                    country to implement multicultural policies
                  </p>
                </div>
                <div class="col-md-6 lpage-benefits-inner-container">
                  <h2 class="lpage-benefits-heading text-center"><span>Financial</span> aid</h2>
                  <img src="images/benefits-img-8.png">
                  <p class="lpage-benefits-small-text">
                    The Canadian government provides international 
                    students with various financial aid and assistance 
                    options. Furthermore, the student visa allows students to 
                    work for 20 hours each week while studying in Canada.
                  </p>
                </div>
              </div>
  
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-apply-now">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="row lpage-apply-banner">
                <div class="col-md-5 lpage-apply-banner-bot"></div>
                <div class="col-md-2 p-0">
                  <img style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#apply_now" class="w-100" src="images/apply-now-banner-btn.gif">
                </div>
                <div class="col-md-5 lpage-apply-banner-top"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <img data-bs-toggle="modal" data-bs-target="#apply_now"  class="w-100 h-100" src="images/counselling-img.jpg">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
            </div>
            <!-- <div class="col-md-7">
  
            </div>
            <div class="col-md-5">
            
              <img src="">
            </div> -->
          </div>
        </div>
      </section>
  
      <section class="landing-page-how-study">
        <div class="container">
          <div class="row">
            <div class="col-md-12 lpage-how-study-container">
              <h2 class="lpage-how-study-heading">How To Study In <span>Canada</span></h2>
              <p>If you want to study in Canada and eventually become a permanent resident, follow the steps below.</p>
  
              <img style="width: 70%" src="images/how-to-study-img.png">
  
              <h2 class="lpage-how-study-heading">Choose a programme</span></h2>
              <p>
                Conduct research to identify the education programme in 
                Canada that you wish to pursue.
              </p>
  
              <h2 class="lpage-how-study-heading">Apply to a Canadian designated learning institution</span></h2>
              <p>
                Once you've decided the education programme you want to 
                apply to, send your application to the designated learning 
                institution (DLI) of your choice in Canada.
              </p>
  
              <h2 class="lpage-how-study-heading">Apply for a study permit</span></h2>
              <p>
                After receiving a letter of acceptance, Cohen Immigration 
                Law may assist you in submitting an application for a study 
                permit to the Government of Canada. The study permit is a 
                document that most individuals require in order to stay in 
                Canada lawfully as a student.
              </p>
  
              <h2 class="lpage-how-study-heading">Investigate your immigration options</h2>
              <p>
                After you've finished your courses, Cohen Immigration Law 
                can assist you in staying in Canada to get further professional 
                job experience and apply for permanent residency.
              </p>
  
              <img class="w-100" src="images/study-abroad-flags.png">
  
              <button class="lpage-how-study-apply-btn" data-bs-toggle="modal" data-bs-target="#apply_now">Apply Now</button>
  
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-what-benefits" style="background-image: url('images/what-benefits-bgimage.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="lpage-what-benefits-heading-curve">What are the Benefits of Studying in <span>Canada</span>?</h2>
  
              <p class="lpage-what-benefits-text text-center">
                With over 600,000 foreign students, Canada has become one of 
                the world's most popular locations for international students. 
                International students are drawn to Canada for the following 
                reasons, according to research
              </p>
  
              <ul class="lpage-what-benefits-text">
                <li>High-quality education provided by Canadian schools</li>
                <li>Opportunities for international students to work during and after their studies, as well as transition to permanent residence</li>
                <li>Studying in English and/or French</li>
                <li>Safety and security</li>
                <li>Multicultural society</li>
                <li>Canada welcomes immigrants and international students from nearly 200 countries each year</li>
                <li>Canada is affordable when compared to other popular international student destinations.</li>
              </ul>
  
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-requirements">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h2 class="lpage-requirements-heading">What are the Requirements of Studying in <span>Canada</span>?</h2>
              <p class="lpage-requirements-text">
                You should be aware of the 
                prerequisites for studying in Canada if 
                you consider traveling there for higher 
                education. Even if different schools and 
                courses have varied criteria and 
                expectations, most universities that 
                provide academic master's degrees for 
                overseas students have certain 
                common requirements.
              </p>
              <a id="readmore-btn-1" class="lpage-requirements-readmore">Read more</a>
            </div>
            <div class="col-md-5 lpage-requirements-img-box">
              <img class="w-100" src="images/requirements-img.png">
            </div>
  
            <div id="readmore-box-1" class="col-md-12 lpage-requirements-readmore-container">
              <ul>
                <li>The preferred university's application form to be filled.</li>
                <li>Documentation certifying the granting of a previous degree, as well as official transcripts.</li>
                <li>Where applicable, official documentation proving professional credentials.</li>
                <li>
                  Two (2) letters of academic recommendation attesting to graduate 
                  school preparation; Letters from companies attesting to a degree of 
                  experience and analytical writing abilities will be acceptable for 
                  people without recent academic experience.
                </li>
                <li>
                  A complete chronological CV that clearly highlights educational 
                  accomplishments, job experience and growth, and other relevant 
                  experience.
                </li>
                <li>A Letter of Intent (LOI) that explains why the applicant is applying and specifies the student's academic aspirations.</li>
                <li>
                  If the applicant presents a certification from an unrecognised school 
                  or if the Admissions Committee requires extra analysis, a credential 
                  evaluation from a recognised service proving equivalence; o Proof of 
                  English language competency.
                </li>
                <li>Scores on the GMAT or GRE for MBA and Master's programmes in Canada.</li>
                <li>You must submit TCF, TEF, DELF, and DALF French Proficiency Tests if you are applying to a French-taught programme.</li>
                <li>Evidence that you have the money to study in Canada.</li>
                <li>English Proficiency Tests Accepted:</li>
                <div class="row text-center mt-3">
                  <div class="col-md-4">
                    <h4>IELTS</h4>
                    <img src="images/ielts-icon.png">
                  </div>
                  <div class="col-md-4">
                    <h4>PTE</h4>
                    <img src="images/pte-icon.png">
                  </div>
                  <div class="col-md-4">
                    <h4>TOEFL</h4>
                    <img src="images/toefl-icon.png">
                  </div>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-alternatives" style="background-image: url('images/alternatives-img.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="lpage-alternatives-heading">Best alternatives to IELTS for studying in <span>Canada</span></h2>
            </div>
            <div class="col-md-12">
              <ul class="lpage-alternatives-text">
                <li>Include scores from supplementary English proficiency assessments, such as the TOEFL and PTE. </li>
                <li>
                  You can study in Canada without taking the IELTS if you have 
                  spent at least four years in an English-medium school and can 
                  demonstrate this through your academic qualifications.
                </li>
                <li>Enroll in the university's English language program.</li>
                <li>Citizens of English-speaking nations are excused from giving IELTS scores in Canada.</li>
  
              </ul>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-top-universities">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="lpage-top-universities-heading">Top Universities to Study in Canada<br> without <span>IELTS</span></h2>
              <p class="lpage-top-universities-text">
                Alternatives to English assessments such as TOEFL, Duolingo English 
                Test, and PTE are readily available to students wishing to study in 
                Canada. Some Canadian institutions enable students to show 
                documentation of their English proficiency, such as a school English 
                certificate, or to enroll in an English language course. IELTS scores are 
                not required for students from English-speaking countries. Here is a 
                list of popular universities in Canada where you may study without 
                taking the IELTS exam
              </p>
            </div>
            <div class="col-md-12 lpage-top-universities-slider">
              <div class="row">
                <div class="3-col-items">
                  <div class="col-md-4"><img class="w-100 p-2" src="images/top-university-img-1.jpg"><h4>University of Winnipeg</h4></div>
                  <div class="col-md-4"><img class="w-100 p-2" src="images/top-university-img-2.jpg"><h4>Brock University</h4></div>
                  <div class="col-md-4"><img class="w-100 p-2" src="images/top-university-img-3.jpg"><h4>University of Saskatchewan</h4></div>
                  <div class="col-md-4"><img class="w-100 p-2" src="images/top-university-img-4.jpg"><h4>Memorial University of Newfoundland and Labrador</h4></div>
                  <div class="col-md-4"><img class="w-100 p-2" src="images/top-university-img-5.jpg"><h4>Cambrian University</h4></div>
                  <div class="col-md-4"><img class="w-100 p-2" src="images/top-university-img-6.jpg"><h4>Okanagan College</h4></div>
                  <div class="col-md-4"><img class="w-100 p-2" src="images/top-university-img-7.jpg"><h4>Concordia University</h4></div>
                  <div class="col-md-4"><img class="w-100 p-2" src="images/top-university-img-8.jpg"><h4>Seneca College</h4></div>
                  <div class="col-md-4"><img class="w-100 p-2" src="images/top-university-img-9.jpg"><h4>Carleton University</h4></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-popular-intakes">
        <div class="container">
          <div class="row">
            <div class="col-md-12 lpage-popular-intakes-container">
              <h2 class="lpage-popular-intakes-heading">Popular <span>Intakes</span></h2>
              <p class="lpage-popular-intakes-text">
                Universities in Canada provide three major entrance points or intakes 
                for applicants to study. Fall, Winter, and Summer are the three 
                seasons. Fall is the most popular intake season in the country, 
                followed by Winter and Summer. Because of the limited courses and 
                people applying to colleges, the summer intake is the least popular.
              </p>
              <img src="images/popular-intakes-img.png">
  
              <div class="row lpage-popular-intakes-icons">
                <div class="col-md-4"><img src="images/intake-icon.png"></div>
                <div class="col-md-4"><img src="images/application-icon.png"></div>
                <div class="col-md-4"><img src="images/month-icon.png"></div>
              </div>
  
              <div class="lpage-popular-intakes-table-box">
                <table class="lpage-popular-intakes-table">
                    <tr class="table-bottom-border">
                      <th>Intakes</th>
                      <th>Applications Begin</th>
                      <th>Starting Month</th>
                    </tr>
                    <tr class="table-bottom-border">
                      <td>Fall</td>
                      <td>June</td>
                      <td>September</td>
                    </tr>
                    <tr class="table-bottom-border">
                      <td>Winter</td>
                      <td>November</td>
                      <td>January</td>
                    </tr>
                    <tr>
                      <td>Summer</td>
                      <td>February</td>
                      <td>April-May</td>
                    </tr>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-education-system">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="lpage-education-system-heading">Education <span>System</span></h2>
  
              <p class="lpage-education-system-text">
                Canada's education system includes public and private institutions 
                that provide high-quality education. Over 10,000 graduate and 
                undergraduate programs in Canada are offered by 213 public colleges 
                and 223 public and private universities. Universities in Canada offer 
                the following degrees:
              </p>
  
              <img src="images/education-system-img.png">
  
              <ul class="lpage-education-system-degree">
                <li>
                  <b>Undergraduate Degree:</b> In Canada, a bachelor's degree is pursued 
                  following the 12th-grade competition. The course type and province 
                  determine the length of the program. In Canada, however, most 
                  undergraduate degrees are four years long.
                </li>
                <li>
                   <b>Associate Degree:</b> An associate degree is an undergraduate degree 
                  that entails one or two years of study in a particular topic or profession. 
                  These programs, however, differ significantly from one institution to 
                  the next and from one region to the next.
                </li>
                <li>
                   <b>Graduate Degree:</b> A graduate degree is a Master of Arts or Master of 
                  Science. A master's degree takes between two and three years to 
                  complete in Canada.
                </li>
                <li>
                   <b>Ph.D:</b> In Canada, a doctorate, sometimes known as a Ph.D., is a 
                  specialized post-graduate degree that can take anywhere from three 
                  to six years to complete.
                </li>
              </ul>
  
              <h2 class="lpage-higher-education-heading">The following is a detailed view of the types of higher education institutions in <span>Canada</span></h2>            
              
              <div class="row lpage-higher-education-container">
                <div class="col-md-12 lpage-higher-education-inner">
                  <img src="">
                  <h2>University</h2>
                  <ul>
                    <li>Both undergraduate and graduate programs.</li>
                    <li>Postgraduate degrees and certificate programs may be available.</li>
                  </ul>
                </div>
                <div class="col-md-12 lpage-higher-education-inner">
                <img src="">
                  <h2>College</h2>
                  <ul>
                    <li>Also known as Community Colleges, Colleges of Applicable Arts or<br> Applied Technology, and Institutes of Technology or Science</li>
                    <li>Provide training in applied fields of work.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-credit-system">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <h2 class="lpage-credit-system-heading">Credit System in <span>Canada</span></h2>
              <p class="lpage-credit-system-text">
                In Canada, all universities 
                follow the same credit system. To compute the 
                outcome, the credits earned by a student 
                during the course are taken into account.
              </p>
              <a id="readmore-btn-2" class="lpage-credit-system-readmore">Read more</a>
            </div>
            <div class="col-md-7 lpage-credit-system-img-box">
              <img src="images/credit-system-img.jpg">
            </div>
  
            <div id="readmore-box-2" class="col-md-12 lpage-credit-system-list-box">
                <ul>
                  <li>
                    An undergraduate degree/degree Bachelor's takes 3-5 credits for each 
                    course. A Bachelor's degree typically requires 90-120 credit hours to 
                    complete.
                  </li>
                  <li>
                    Three to four credits for each course for a Master's degree. In Canada, a 
                    Master's degree requires around 30 credits or more.
                  </li>
                  <li>
                    The grade point average, or GPA, is a measure that ranges from 0.0 to 
                    4.0 that is used in the Canadian educational system to grade students. 
                    These are generated for each semester based on the grades received 
                    in each course and the credits acquired for that semester. A grade of 
                    4.0 corresponds to an A, whereas a grade of 0.0 corresponds to an F.
                  </li>
                </ul>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-cost-living">
        <div class="container">
          <div class="row">
              <div class="col-md-12 lpage-cost-living-container">
                <img src="images/cost-living-img.jpg">
                <div class="lpage-cost-living-heading-box">
                  <h2 class="lpage-cost-living-heading">Cost of studying and living in <span>Canada</span></h2>
                  <p class="lpage-cost-living-text">
                    Though it isn't on the list of requirements, the cost 
                    of studying and living in Canada is a key issue for 
                    many people before they consider studying 
                    abroad. Housing, food, health insurance, travel, 
                    and tuition fees are all included in Canada's total 
                    cost of education.
                  </p>
                </div>
              </div>
  
              <div class="col-md-12 lpage-cost-living-inner">
                <h2>Tuition Fees</h2>
                <img src="images/tuition-icon.png">
                <p>
                  Tuition costs are influenced by the type of qualification and the 
                  university of choice. Every year, the cost of studying in Canada is 
                  estimated to be between CAD 7,000 and CAD 35,000. The cost varies 
                  depending on the type of course you take.
                </p>
              </div>
              <div class="col-md-12 lpage-cost-living-inner">
                <h2>Accommodation</h2>
                <img src="images/accommodation-icon.png">
                <p>
                  Colleges provide on-campus housing for international students. 
                  Students who choose to live off-campus can do so in shared 
                  apartments with other students. On-campus housing can cost 
                  anywhere from CAD 8,000 to CAD 10,000 per year, whereas a shared 
                  apartment might cost anywhere from CAD 400 to CAD 700 per 
                  month, depending on where you live and when you go. It might cost 
                  up to CAD 1000 to CAD 2000 each month in the most attractive areas 
                  and cities.
                </p>
              </div>
              <div class="col-md-12 lpage-cost-living-inner">
                <h2>Living Costs</h2>
                <img src="images/living-icon.png">
                <p>
                  In Canada, a single student budget might range from CAD 6,000 to 
                  CAD 10,000, based on various expenses and living costs, including 
                  communication, transportation, books and supplies, daily essentials, 
                  and so on.
                </p>
              </div>
              <div class="col-md-12 lpage-cost-living-inner">
                <h2>Miscellaneous</h2>
                <img src="images/miscellaneous-icon.png">
                <p>
                  The visa and study permits will set you back around CAD 150. The cost 
                  of health and insurance varies from CAD 300 to CAD 800 per year.
                </p>
              </div>
  
              <p class="lpage-cost-living-bottom-note">
                The above cost ranges are the fundamental cost ranges to give you a sense of what it 
                costs to plan appropriately.
              </p>
          </div>
        </div>
      </section>
  
      <section class="landing-page-scholarships">
        <div class="container">
          <div class="row lpage-scholarships-container">
            <div class="col-md-6">
              <h2 class="lpage-scholarships-heading">Scholarships to<br> Study in <span>Canada</span></h2>
              <p class="lpage-scholarships-text">
                Merit-based scholarships are also available 
                at Canadian universities for students who 
                are unable to pay for their education. When 
                applying for scholarships, keep the 
                following in mind
              </p>
            </div>
            <div class="col-md-6 lpage-scholarships-image-box">
              <img src="images/scholerships-img.png">
            </div>
            
            <div class="col-md-12 lpage-scholarships-list">
              <ul>
                <li>The majority of awards need a good academic score. This, however, varies by city, subject, and grade level.</li>
                <li>Each college receives a different amount of money. Because scholarship applications take time, you should start the procedure at least 8 to 12 months before the start of the course.</li>
              </ul>
              
              <h2 class="lpage-scholarships-inner-heading">Here is a list of scholarships available to students studying in <span>Canada</span></h2>
            </div>
  
            <div class="col-md-12 lpage-scholarships-slider">
              <div class="row">
                <div class="3-col-items">
                  <div class="col-md-4">
                    <h2>1. Vanier Canada Graduate Scholarships</h2>
                    <img src="images/scholarships-slider-img-1.jpg">
                  </div>
                  <div class="col-md-4">
                    <h2>2. Ontario Trillium Scholarship</h2>
                    <img src="images/scholarships-slider-img-2.jpg">
                  </div>
                  <div class="col-md-4">
                    <h2>3. Ontario Graduate Scholarship</h2>
                    <img src="images/scholarships-slider-img-3.jpg">
                  </div>
                  <div class="col-md-4">
                    <h2>4. Go Clean Scholarship</h2>
                    <img src="images/scholarships-slider-img-4.jpg">
                  </div>
                  <div class="col-md-4">
                    <h2>5. Humber College International Entrance Scholarship</h2>
                    <img src="images/scholarships-slider-img-5.jpg">
                  </div>
                  <div class="col-md-4">
                    <h2>6. Waterloo Merit Scholarship</h2>
                    <img src="images/scholarships-slider-img-6.jpg">
                  </div>
                  <div class="col-md-4">
                    <h2>7. UBC International Leader of Tomorrow Award</h2>
                    <img src="images/scholarships-slider-img-7.jpg">
                  </div>
                  <div class="col-md-4">
                    <h2>8. Science and Law School Scholarship</h2>
                    <img src="images/scholarships-slider-img-8.jpg">
                  </div>
                  <div class="col-md-4">
                    <h2>9. Quebec Provincial Government Scholarship</h2>
                    <img src="images/scholarships-slider-img-9.jpg">
                  </div>
                  <div class="col-md-4">
                    <h2>10. University of Manitoba</h2>
                    <img src="images/scholarships-slider-img-10.jpg">
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-md-12 lpage-scholarships-pin">
              <img src="images/scholarships-pin.png">
              <p class="lpage-scholarships-pin-text">
                If you don't have enough funds to study in Canada, you may always take out 
                an education loan. It takes a lot of time and work to get a loan approved. As 
                soon as you obtain confirmation from the university, you must apply for a loan 
                as quickly as possible. You should compute the amount you will be requesting 
                for the loan after you have an estimate of your expenses, including studies 
                and living. Before applying for a loan, do some research to see which banks 
                are offering the greatest prices
              </p>
            </div>
          </div>
        </div>
      </section> 
  
      <section class="landing-page-top-universities-table">
        <div class="container">
          <div class="row">
            <div class="col-md-12 lpage-top-universities-table-box">
              <table class="lpage-top-universities-table-inner">
                <tr>
                  <th>University</th>
                  <th>Location</th>
                  <th>Description</th>
                  <th>Canada Rank</th>
                  <th>Global Rank</th>
                </tr>
                <tr>
                  <td class="lpage-topuniversities-table-title">
                    University of Toronto
                    <img src="images/top-university-table-img-1.jpg">
                  </td>
                  <td>Toronto, Ontario</td>
                  <td>
                    <ul class="lpage-topuniversities-table-list">
                      <li>It is a research-intensive institution with three campuses: Downtown Toronto, Scarborough, and Mississauga. </li>
                      <li>One of the best universities in the world.</li>
                      <li>Master of Science in Applied Computing, MSc Computer Science, Master of Applied Science and Aerospace Engineering, MBA, MA in Psychology, and many other courses are available.</li>
                    </ul>
                  </td>
                  <td>1</td>
                  <td>29</td>
                </tr>
                <tr>
                  <td class="lpage-topuniversities-table-title">
                    McGill University
                    <img src="images/top-university-table-img-2.jpeg">
                  </td>
                  <td>Montreal, Quebec</td>
                  <td>
                    <ul class="lpage-topuniversities-table-list">
                      <li>Hundreds of programs are available to students at the university, ranging from animal science, biochemistry, and communication studies to human nutrition, law, and sociology.</li>
                      <li>MS in Computer Science, MS in Civil Engineering, MSc in Mechanical Engineering, MBA, Master of Law, and many other courses are popular.</li>
                    </ul>
                  </td>
                  <td>2</td>
                  <td>35</td>
                </tr>
                <tr>
                  <td class="lpage-topuniversities-table-title">
                    University of British Columbia
                    <img src="images/top-university-table-img-3.jpg">
                  </td>
                  <td>Vancouver and Kelowna, British Columbia</td>
                  <td>
                    <ul class="lpage-topuniversities-table-list">
                      <li>UBC provides a variety of MS courses, including MS in Computer Science, MS in Materials Engineering, MS in Chemical and Biological Engineering, MS in Nursing, MBA, Master of Physical Therapy, and many others.</li>
                    </ul>
                  </td>
                  <td>3</td>
                  <td>51</td>
                </tr>
                <tr>
                  <td class="lpage-topuniversities-table-title">
                    University of Alberta
                    <img src="images/top-university-table-img-4.jpg">
                  </td>
                  <td>Edmonton, Alberta</td>
                  <td>
                    <ul class="lpage-topuniversities-table-list">
                      <li>University offers courses such as, MS in Mathematical and Statistical Sciences, MSc Civil and Environmental Engineering, MSc in Computing Science, MBA in Finance and MBA in International Business.</li>
                    </ul>
                  </td>
                  <td>4</td>
                  <td>113</td>
                </tr>
                <tr>
                  <td class="lpage-topuniversities-table-title">
                    Université de Montréal
                    <img src="images/top-university-table-img-5.jpg">
                  </td>
                  <td>Montreal, Quebec</td>
                  <td>
                    <ul class="lpage-topuniversities-table-list">
                      <li>This is a public research university located in Quebec. </li>
                      <li>University offers 65 graduate /undergraduate programsand 71 doctoral programs.</li>
                    </ul>
                  </td>
                  <td>5</td>
                  <td>137</td>
                </tr>
                <tr>
                  <td class="lpage-topuniversities-table-title">
                    McMaster University
                    <img src="images/top-university-table-img-6.jpg">
                  </td>
                  <td>McMaster University</td>
                  <td>
                    <ul class="lpage-topuniversities-table-list">
                      <li>The University is home to hundreds of international students from all over the world. </li>
                      <li>University offers various courses such as MSc in Computer Science, MS in Nursing, M.A.Sc in Chemical Engineering and M.A.Sc in Mechanical Engineering, MBA, MD.</li>
                    </ul>
                  </td>
                  <td>6</td>
                  <td>140</td>
                </tr>
                <tr>
                  <td class="lpage-topuniversities-table-title">
                    University of Waterloo
                    <img src="images/top-university-table-img-7.jpeg">
                  </td>
                  <td>Waterloo, Ontario</td>
                  <td>
                    <ul class="lpage-topuniversities-table-list">
                      <li>Home to thousands of students from over 120 different countries of the world.</li>
                      <li>It offers over 100 undergraduate and 190 graduate programs.</li>
                      <li>Courses offered by the University include- Master of Applied Science in Electrical and Computer Engineering, Master of Applied Science in Chemical Engineering and Master of Applied Science in Mechanical and Mechatronics Engineering, MA in Economics, Doctor of Pharmacy.</li>
                    </ul>
                  </td>
                  <td>7</td>
                  <td>173</td>
                </tr>
                <tr>
                  <td class="lpage-topuniversities-table-title">
                    Western University
                    <img src="images/top-university-table-img-8.jpg">
                  </td>
                  <td>London, Ontario</td>
                  <td>
                    <ul class="lpage-topuniversities-table-list">
                      <li>It is a research university located in London, Ontario.</li>
                      <li>The University offers various undergraduate, graduate as well as doctoral programs.</li>
                      <li>Courses this university offers include MS in Computer Science, MESc in Mechanical and Materials Engineering, MESc in Electrical and Computer Engineering, Juris Doctor, MBA, etc.</li>
                    </ul>
                  </td>
                  <td>8</td>
                  <td>211</td>
                </tr>
                <tr>
                  <td class="lpage-topuniversities-table-title">
                    University of Calgary
                    <img src="images/top-university-table-img-9.jpg">
                  </td>
                  <td>Calgary, Alberta</td>
                  <td>
                    <ul class="lpage-topuniversities-table-list">
                      <li>University has 55 departments, 250 undergraduate, graduate, and doctoral programs.</li>
                      <li>It offers various programs such as MS in Computer Science, MBA, MA in Communication and Media Studies, Masters of Nursing, Chemical Engineering and many others.</li>
                    </ul>
                  </td>
                  <td>9</td>
                  <td>233</td>
                </tr>
                <tr>
                  <td class="lpage-topuniversities-table-title">
                    Queen s University
                    <img src="images/top-university-table-img-10.jfif">
                  </td>
                  <td>Kingston, Ontario</td>
                  <td>
                    <ul class="lpage-topuniversities-table-list">
                      <li>Queen s University is one of the oldest universities in Canada.</li>
                      <li>University is home to 28000+ students.</li>
                      <li>The University offers various courses such as- MS in Management, full-time MBA, Master of Management Analytics, Juris Doctor, MS in Nursing etc.</li>
                    </ul>
                  </td>
                  <td>10</td>
                  <td>239</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-affordable">
        <div class="container">
          <div class="row lpage-affordable-container">
            <div class="col-md-6">
              <h3  class="lpage-affordable-heading">Affordable Universities in <span>Canada</span></h3>
              <p class="lpage-affordable-text">
                Merit-based scholarships are also available 
                at Canadian universities for students who 
                are unable to pay for their education. When 
                applying for scholarships, keep the 
                following in mind
              </p>
            </div>
            <div class="col-md-6">
              <img src="images/affordable-img-1.jpeg">
              <h2>1. University of Northern British Columbia</h2>
            </div>
  
            <div class="col-md-4">
              <img src="images/affordable-img-2.jpg">
              <h2>2. Brandon University</h2>
            </div>
            <div class="col-md-4">
              <img src="images/affordable-img-3.jpg">
              <h2>3. University of Guelph</h2>
            </div>
            <div class="col-md-4">
              <img src="images/affordable-img-4.jpg">
              <h2>4. Memorial University of Newfoundland</h2>
            </div>
  
            <div class="col-md-4">
              <img src="images/affordable-img-5.jpg">
              <h2>5. Canadian Mennonite University</h2>
            </div>
            <div class="col-md-4">
              <img src="images/affordable-img-6.jpg">
              <h2>6. University of St. Boniface</h2>
            </div>
            <div class="col-md-4">
              <img src="images/affordable-img-7.jpg">
              <h2>7. McGill University</h2>
            </div>
            
            <div class="col-md-4">
              <img src="images/affordable-img-8.jpg">
              <h2>8. Humber College</h2>
            </div>
            <div class="col-md-4">
              <img src="images/affordable-img-9.jpg">
              <h2>9. University of Calgary</h2>
            </div>
            <div class="col-md-4">
              <img src="images/affordable-img-10.gif">
              <h2>10. University of Northern British Columbia</h2>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-course">
        <div class="container">
          <div class="row">
            <div class="col-md-12 lpage-course-heading-box">
              <img src="images/books-icon.png">
              <h2 class="lpage-course-heading">Course options<br> in <span>Canada</span></h2>
            </div>
            <div class="col-md-12">
              <p class="lpage-course-text">
                In Canada, there are several course alternatives to choose from. Universities provide a high-quality education with internationally recognized degrees. Bachelor's, Master's, Doctoral, Diploma, and Certificate degrees are available in Canada. International students can choose their preferred programme level. The top Canadian universities provide a variety of programs at each level.<br>
                Canada's top programs include business and finance, nursing, dentistry, engineering, and pharmacy. Management, engineering, health, science, media, journalism, and many more areas have courses available at various levels. In Canada, courses range from entry-level to top-of-the-line programs that combine straightforward approaches with on-field applications. In Canada, courses incorporate the most up-to-date educational methodologies, including the latest in technical advancement and practical application.
              </p>
            </div>
  
            <div class="col-md-6 lpage-course-text-container">
              <h2>•	Business and Finance</h2>
              <p>
                When it comes to international applicants, business management degrees are the most popular. The MBA programme is one of the most popular in this industry. Banking, management consulting, and investment finance are all industries that never go out of vogue. The needfor management heads in many economic areas continues to rise. However, it is preferable to specialise in Statistics, Accounting, or Finance than to get a standard MBA because it has more specialised value. McGill University, Centennial College, Humber College, and Concordia University are the finest places to look.
              </p>
            </div>
            <div class="col-md-6 lpage-course-img-container">
              <img src="images/course-img-1.png">
            </div>
            
            <div class="col-md-6 lpage-course-img-container">
              <img src="images/course-img-2.png">
            </div>
            <div class="col-md-6 lpage-course-text-container">
              <h2>•	Nursing</h2>
              <p>
                Nursing is the second most popular healthcare career among overseas students. Although a certificate or an undergraduate degree in nursing are both available, it is usually preferable to pursue the latter. Emergency nursing, paediatric nursing, oncology nursing, and other specialist nursing courses are available. Registered nurses must have completed a school nursing programme and passed a national licensure test. It should be mentioned that to be eligible for a Masters degree in Nursing in Canada, you must have 1-2 years of practical experience as a registered nurse. Toronto University, Alberta University, McMaster University, and others are among the finest nursing schools in the area.
              </p>
            </div>
  
            <div class="col-md-6 lpage-course-text-container">
              <h2>•	Dentistry</h2>
              <p>
                Dentistry is one of the most well-paid professions in Canada. To begin practising, however, one must have exceptionally high credentials and, as a result, several years of school in the same subject. Instead of becoming a general practitioner, it is also feasible to specialise in fields such as Oral Pathology, Orthodontics, or Paediatric Dentistry after completing a master's degree. In order to qualify for a DDS (Doctor of Dental Surgery) or a DMD, one must pass the DAT, or Dental Aptitude Test, in addition to the associated undergraduate course (Doctor of Medicine in Dentistry).
              </p>
            </div>
            <div class="col-md-6 lpage-course-img-container">
              <img src="images/course-img-3.jpg">
            </div>
  
            <div class="col-md-6 lpage-course-img-container">
              <img src="images/course-img-4.jpg">
            </div>
            <div class="col-md-6 lpage-course-text-container">
              <h2>•	Engineering</h2>
              <p>
                Engineering and the information technology industry have traditionally been highly recognized in Canada. Software or Computer Engineering, Mechanical Engineering, and Chemical Engineering are some of the greatest courses. This industry pays the greatest wages in and around Central Canada, particularly in Ontario and Quebec. Those with industry-standard software skills are assured employment with salaries that never fall below $51,000, with the majority of employees earning more than that. Toronto University, the University of Waterloo, McGill University, and McMaster University are the top engineering schools in Canada.
              </p>
            </div>
  
            <div class="col-md-6 lpage-course-text-container">
              <h2>•	Pharmacy</h2>
              <p>
                This profession necessitates a high level of expertise. Most persons working in this profession in Canada have at least a PhD degree. It is mostly a research-based field. There are also a range of employment alternatives available, such as community pharmacist, hospital pharmacist, educational institution pharmacist, and so on. To become a pharmacist, you must have a lot of practical experience. International Pharmacy Graduates, or IPGs, must follow their own set of rules in order to obtain licensure in Canada. Toronto University, the University of British Columbia, and the Bredin Institute are all relevant institutions.
              </p>
            </div>
            <div class="col-md-6 lpage-course-img-container">
              <img src="images/course-img-5.jpg">
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-programs-table">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="lpage-programs-table-heading">
                Let's take a look at some of the most popular programs,<br> duration and tution fee for students in Canada:
              </h2>
            </div>
  
            <div class="col-md-4 lpage-programs-table-img-box">
              <img src="images/bookmark-icon.png">
            </div>
            <div class="col-md-4 lpage-programs-table-img-box">
              <img src="images/date-icon.png">
            </div>
            <div class="col-md-4 lpage-programs-table-img-box">
              <img src="images/expense-icon.png">
            </div>
  
            <div class="col-md-12">
              <table class="lpage-programs-table-container">
                <tr>
                  <th>Program</th>
                  <th>Duration</th>
                  <th>Average Tuition Fees</th>
                </tr>
                <tr>
                  <td>BSc Nursing</td>
                  <td>2-4 years</td>
                  <td>CAD 33,000/ year</td>
                </tr>
                <tr>
                  <td>MEng Aerospace and Engineering</td>
                  <td>3 years</td>
                  <td>CAD 38,000/ year</td>
                </tr>
                <tr>
                  <td>MEng Industrial Systems Engineering</td>
                  <td>2 years</td>
                  <td>CAD 45,000/ year</td>
                </tr>
                <tr>
                  <td>MSc Nursing</td>
                  <td>2 years</td>
                  <td>CAD 44,000/ year</td>
                </tr>
                <tr>
                  <td>MA Media Studies</td>
                  <td>2 years</td>
                  <td>CAD 35,000/ year</td>
                </tr>
                <tr>
                  <td>MSc Business Management</td>
                  <td>1 year</td>
                  <td>CAD 29,000/ year</td>
                </tr>
                <tr>
                  <td>MBA</td>
                  <td>1-2 years</td>
                  <td>CAD 38,000/ year</td>
                </tr>
                <tr>
                  <td>LLM</td>
                  <td>1-2 years</td>
                  <td>CAD 20,000/ year</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-how-apply">
        <div class="container">
          <div class="row">
            <div class="col-md-12 lpage-how-apply-heading-box">
              <img src="images/stamp-icon.png">
              <h2 class="lpage-how-apply-heading">How to apply for a<br> study visa in <span>Canada</span>?</h2>
            </div>
            <div class="col-md-12 lpage-how-apply-text-box">
              <p>
                International students can study in Canada at recognized learning institutes with a Study Permit. Before applying for the permission, make sure you have all the necessary documentation. A study permit isn't the same as a visa. A temporary resident visa must be applied for individually. A study permit is valid for the term of your course plus an additional 90 days. This extra time allows you to depart or request an extension.
              </p>
              <p>
                Before you arrive to Canada, you need to apply for a study permit. Only a few persons are eligible to apply for a study permit in Canada. Additionally, you can apply when you arrive in Canada.
                Applying online is one alternative for submitting an application. The permission is completed quickly with the online application, preventing any delays. If they require any more papers, they may be added online instantly, saving time from having to courier them. You may also use your account to stay up to date on the status of your application.
                When applying for a study visa, you must submit the following 
              </p>
  
              <h4><img src="images/docs-icon.png"> Documents :</h4>
  
              <ul>
                <li>Proof of university acceptance</li>
                <li>Proof of identity, including a valid passport, pictures, and any other identifying documents</li>
                <li>Proof of financial assistance, such as proof of college loan or a bank statement from the last four months, or any other document that meets the criteria.</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-visa-documents">
        <div class="container">
          <div class="row">
            <div class="col-md-12 lpage-visa-documents-heading-box">
              <img src="images/document-icon.png">
              <h2 class="lpage-visa-documents-heading">Essential documents for<br> Canadian Student Visa:</h2>
            </div>
            <div class="col-md-12 lpage-visa-documents-text-container">
              <p>
                Once you get a letter of admission from the college, you should apply for a student visa. You should start the visa application procedure as soon as possible. The following documents are required for this:
              </p>
  
              <h4>1.Valid passport</h4>
              <p>To apply for a Study Permit, you must have a valid passport. According to the Canadian High Commission, you must have a passport that is valid for the period of your anticipated stay in Canada, which is at least your course term.</p>
  
              <h4>2.Proof of the Institute's Acceptance</h4>
              <p>You'll need the admission letter from the university or institute. A Designated Learning Institute is one that has been approved by the Immigration Department.</p>
  
              <h4>3. Proof of Funds</h4>
              <p>You'd have to produce proof of your financial situation. Its purpose is to demonstrate that you are financially capable of covering both your tuition and living expenses. A student must produce a minimum of $10,000 in Canadian funds for each year of their stay in Canada, according to Canadian Immigration.</p>
  
              <h4>4.Photographs in Passport Size</h4>
              <p>According to the guidelines, you'll require two passport-sized pictures.</p>
  
              <h4>5. Immigration Medical Exam (IME)</h4>
              <p>International students from India are required by Canadian Immigration to complete a mandatory Immigration Medical Examination by impanelled doctors. It is recommended that they schedule an appointment with one of the specified physicians for a medical checkup at least a week before they begin their Visa application. This allows the doctor sufficient time to review and upload the necessary documentation.</p>
  
              <h4>6.Score on the English Language Proficiency Exam</h4>
              <p>For admission to a Canadian university, you must submit your English language proficiency score. TOEFL, IELTS, are all recognised.</p>
  
              <h4>7.Statement of Purpose</h4>
              <p>When applying for a Canadian Study Permit, you must submit a statement explaining the objective of your trip and why you chose this specific institute.</p>
  
              <h4>8.Credit Card</h4>
              <p>
                The fee for applying for a visa in Canada is CAD $160, and it must be paid online. The system will only take credit cards.
                <br>
                <br>
                If you're filling out an online application, you'll need to scan all of the above-mentioned documents and upload them digitally. If you want to fill out an application offline, you'll need genuine copies of all of the above documents.
                <br>
                <br>
                A large number of Canadian colleges are known for having a global viewpoint, since they provide opportunity for students from all backgrounds and nations to interact with one another, learn from one another, and share ideas, resulting in a cosmopolitan culture in the institution.
                <br>
                <br>
                After Graduating from any of the programs of studies, you may be able to work temporarily in Canada to gain some work experience. For this, you will have to apply for a work permit which later on qualifies you for a permanent residence. There are certain norms that have to be followed for this procedure. And, although these are long term plans but if you apply for a Post-Graduation Work Permit, you may be allowed to work in Canada for up to three years after you graduate.
              </p>
              <p>After graduating from one of the programmes, you may be eligible to work in Canada for a period of time to gain experience. To do so, you'll need to apply for a work permit, which will eventually qualify you for permanent residency. For this, there are few guidelines that must be followed. Although these are long-term ambitions, you may be able to work in Canada for up to three years after graduation if you apply for a Post-Graduation Work Permit.</p>
            
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-residence">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="lpage-residence-heading">Study Pathways to Permanent<br> Residence <span>(PR)</span></h2>
            </div>
            <div class="col-md-12 lpage-residence-text-container">
              <img src="images/residence-img.png">
  
              <p>International students who complete post-secondary education in Canada have several options for extending their stay and eventually moving to Canada permanently.</p>
              <p>When it comes to securing permanent residency in Canada, your education in Canada may provide you an edge. Candidates with Canadian education and job experience are valued in several federal and provincial immigration schemes.</p>
              <p>You can earn Canadian work experience after completing your studies in Canada by acquiring a Post-Graduation Work Permit (PGWP), which allows you to work in Canada for up to three years depending on your Canadian academic degree.</p>
              <p>You can then seek a number of federal and provincial permanent residency options while holding a PGWP, including:</p>
  
              <h4>Express Entry</h4>
              <p>Submitting an Express Entry profile is one of the most popular ways to apply for permanent residence. Express Entry is Canada's primary system for processing economic immigration applications.</p>
              <p>The Comprehensive Ranking System is used to evaluate Express Entry applicants. Candidates that are young, have Canadian education and job experience, and have high English and/or French fluency are rewarded by the Comprehensive Ranking System. Many international students in Canada exhibit these qualities.</p>
              <p>Former international students may be eligible for the famous Canadian Experience Class (CEC) programme, which allows tens of thousands of former international students and temporary foreign employees to become permanent citizens each year, thanks to Express Entry.</p>
  
              <h4>Provincial Nominee Program (PNP)</h4>
              <p>The Provincial Nominee Program (PNP) permits provinces and territories across Canada to find immigrants who match their specific economic requirements. Many PNP streams honour candidates who have worked with foreign students in the past or who are committed to help international students.</p>
  
              <h4>Quebec</h4>
              <p>Quebec is Canada's second-largest province, and Montreal, its capital, is a favorite foreign student destination. The province has its own immigration system, with programs that differ from those given by the federal government and those covered by the PNP. Former international students are also encouraged to make the move to permanent residency in Quebec. The Quebec Experience Program is one of the main ways it aims to do this.</p>
  
              <h4>Other Federal Programs</h4>
              <p>The federal government controls other economic class immigration programs in addition to the three Express Entry categories. International students can take advantage of specific tracks in the programmes, as well as waivers from Canadian work experience requirements. The Atlantic Immigration Program and the Rural and Northern Immigration Pilot are two of them.</p>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-student-know">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="lpage-student-know-heading">
                So, here's a rundown of everything an overseas student<br> should know about studying in Canada:
              </h2>
            </div>
            <div class="col-md-12">
              <table class="lpage-student-know-table">
                <tr>
                  <td>
                    <h4>Language of Instruction</h4>
                  </td>
                  <td> English, French</td>
                </tr>
                <tr>
                  <td>
                    <h4>Average Cost of Study</h4>
                  </td>
                  <td>CAD 25,000/ year</td>
                </tr>
                <tr>
                  <td>
                    <h4>Average Cost of Living</h4>
                  </td>
                  <td>CAD 15,000/ year</td>
                </tr>
                <tr>
                  <td>
                    <h4>Sources of Funding</h4>
                  </td>
                  <td>Scholarships, Grants, Bursaries and Part-Time Jobs</td>
                </tr>
                <tr>
                  <td>
                    <h4>Exam Required</h4>
                  </td>
                  <td> IELTS, TOEFL, PTE, GRE, GMAT</td>
                </tr>
                <tr>
                  <td>
                    <h4>Intakes</h4>
                  </td>
                  <td>3 times a year - Fall, Spring and Summer</td>
                </tr>
                <tr>
                  <td>
                    <h4>Types of Visa</h4>
                  </td>
                  <td>Canadian Student Visa or Canadian Study Permit</td>
                </tr>
                <tr>
                  <td>
                    <h4>Top Courses</h4>
                  </td>
                  <td>
                    Business and Finance, Computer Science and IT Engineering,
                    Physical, Earth Sciences and Renewable Energy, Engineering,
                    Health and Medicine, Media and Journalism
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Types of Degrees</h4>
                  </td>
                  <td>Associate Degree, Undergraduate Degree, Graduate degree, Doctorate Degree</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </section>
  
      <section class="landing-page-our-counsellor">
        <div class="container">
          <div class="row">
            <div class="col-md-12 lpage-our-counsellor-container">
              <h2 class="lpage-our-counsellor-heading">Speak to our counsellor</h2>
              <button class="lpage-our-counsellor-button" data-bs-toggle="modal" data-bs-target="#apply_now">Get Expert Counselling</button>
            </div>
          </div>
        </div>
      </section>
  </div>
  
  <!-- apply now Modal -->
<div class="modal fade" id="apply_now" tabindex="-1" aria-labelledby="apply_nowLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-4">

      <div class="col-12 ask-question-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal-header justify-content-end p-0">
                        <button type="button" class="close common-btn-close"
                            data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="avtar">
                                <img src="images/apple-touch-icon.png">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="avtar-title">
                                <h4 class="common-heading">University Bureau</h4>
                                <p> <b>Get Expert Counselling</b></p>

                            </div>
                        </div>
                    </div>
                </div>

                <?php $form = ActiveForm::begin([
                // 'action' => ['index'],
                'method' => 'post',
                ]); ?>
                <!-- <form action="<?php //echo yii::$app->request->baseUrl;?>/country/studycanada" method="post"> -->
                
                    <div class="col-md-12 mt-3">

                        <div class="row">

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group field-appliedcouncilstudent-name required">
                                    <label class="control-label" for="appliedcouncilstudent-name">Name</label>
                                    <input type="text" id="appliedcouncilstudent-name" class="form-control"
                                        name="AppliedCouncilStudent[name]" aria-required="true" required>

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group field-appliedcouncilstudent-email required">
                                    <label class="control-label" for="appliedcouncilstudent-email">Email</label>
                                    <input type="email" id="appliedcouncilstudent-email" class="form-control"
                                        name="AppliedCouncilStudent[email]" aria-required="true" required>

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group field-appliedcouncilstudent-phone required">
                                    <label class="control-label" for="appliedcouncilstudent-phone">Phone</label>
                                    <input type="text" id="appliedcouncilstudent-phone" class="form-control"
                                        name="AppliedCouncilStudent[phone]" aria-required="true" required>

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group field-appliedcouncilstudent-city required">
                                    <label class="control-label" for="appliedcouncilstudent-city">City</label>
                                    <input type="text" id="appliedcouncilstudent-city" class="form-control"
                                        name="AppliedCouncilStudent[city]" aria-required="true" required>

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group field-appliedcouncilstudent-state required">
                                    <label class="control-label" for="appliedcouncilstudent-state">State</label>
                                    <input type="text" id="appliedcouncilstudent-state" class="form-control"
                                        name="AppliedCouncilStudent[state]" aria-required="true" required>

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group field-appliedcouncilstudent-zip_code required">
                                    <label class="control-label" for="appliedcouncilstudent-zip_code">Zip Code</label>
                                    <input type="text" id="appliedcouncilstudent-zip_code" class="form-control"
                                        name="AppliedCouncilStudent[zip_code]" aria-required="true" required>

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">

                            </div>

                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group field-appliedcouncilstudent-college_id ">

                                    <input type="hidden" id="appliedcouncilstudent-college_id" class="form-control"
                                        name="AppliedCouncilStudent[college_id]" value="1">

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 mt-3">

                                <div class="form-group field-appliedcouncilstudent-additional_message required">
                                    <label class="control-label"
                                        for="appliedcouncilstudent-additional_message">Additional Message</label>
                                    <input type="text" id="appliedcouncilstudent-additional_message"
                                        class="form-control" name="AppliedCouncilStudent[additional_message]"
                                        aria-required="true" required>

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                        </div>

                        <br>

                    </div>
                    <button type="submit" name="submit" class="common-btn w-100 btn-success">Submit</button>
                    <?php ActiveForm::end(); ?>
            </div>


        </div>
      </div>
    
    </div>
  </div>
</div>
  <a id="lpage-back-to-top"><i class="fas fa-angle-up"></i></a>
  