<?php
  use yii\helpers\Html;
  use yii\bootstrap\ActiveForm;
    $this->title = "Study in Latvia - Universities, Colleges, Courses, Eligibility, Admission Process, Cost";
    $this->registerMetaTag(['name' => 'description', 'content' =>  "Wants to Study in Latvia? Get advice from Latvia Study Abroad Consultant who will provides complete details on Top Latvia Colleges, Universities, 2023 Intakes, Study Programs and Courses, Visa Process and many more"]);
    // $this->registerMetaTag(['name' => 'keywords', 'content' =>  "Study In Latvia"]);

?>

  <section class="banner-menu mob-inner-height lp-banner-height">
    <div class="row lead-form-main">
      <div class="col-md-6 p-0"></div>
      <div class="col-md-6 p-0">
        <div class="lead-form-body">
          <div class="col-md-12 header-section_form">
               <?php $form = ActiveForm::begin([
                'action' => ['studycanadashortform'],
                'method' => 'post',
                ]); ?>
                  <div class="row">
                      <div class="col-md-12">
                          <i class="fas fa-user-tie"></i>
                          <input type="text" id="name" class="form-control"
                                        name="GetInTouchCountry[name]" placeholder="Name*" aria-required="true" required>
                      </div>
                      <div class="col-md-12">
                          <i class="fa fa-envelope"></i>
                          
                          <input type="email" id="email" class="form-control"
                                        name="GetInTouchCountry[email]" aria-required="true" placeholder="Email*" required>
                      </div>
                      <div class="col-md-12">
                          <i class="fa fa-phone-alt"></i>
                          <input type="hidden" value="Latvia" name="GetInTouchCountry[study_country]">
                          <input type="text" id="appliedcouncilstudent-phone" class="form-control"
                                        name="GetInTouchCountry[phone]" aria-required="true" placeholder="Phone*" required>
                        
                      </div>
                          
                      <button type="submit">Get In Touch</button>

                  </div>
              <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-video-wrap-lp">
      <img src="images/latvia-landing-page-banner.jpg" alt="banner-img" class="desktop-view-only w-100">
      <img src="images/latvia-landing-page-banner-mob.jpg" alt="banner-img" class="mob-view-only w-100">
      <div class="landing-page-banner-overlay"></div>
    </div>
  </section> 


<div class="landing-page-main-section">

    <section class="landing-page-apply-sticky">
        <a  data-bs-toggle="modal" data-bs-target="#apply_now" href=""><img id="landing-page-apply-sticky-img" src="images/Apply-now-gif.gif"></a>
    </section>
    <!-- lat -->
    <section class="landing-page_decription mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 lpage-decription-container">
                    <p>
                        A broad curriculum and a global perspective are features of Latvian education that give students
                        the knowledge and skills they need to launch themselves into a better future. The possibility
                        for cross-cultural exposure and personal growth is provided by studying in Latvia.
                        <br>
                        <br>
                        Due to its prestigious globally recognised degrees; government-approved universities; exchange
                        semesters or internships abroad; affordable tuition fees; on-campus housing provided; moderate
                        living costs; and abundance of recreational and sporting opportunities, Latvia continues to be a
                        fantastic country for studying abroad in Europe.
                        <br>
                        <br>
                        A multi-ethnic nation, Latvia is rich in numerous cultural and educational traditions. In a wide
                        range of academic subjects, Latvia's higher education institutions participate in international
                        collaboration. Researchers and academic professionals from many nations are available in Latvia
                        for study and research. Universities also provide academic and professional bachelor's and
                        master's degrees taught in English. The cost of living and tuition are typically lower than in
                        most "Western Countries." University graduates with a strong background in engineering and
                        information technology are well renowned. Since Latvia is an EU member, its degrees are similar
                        to those from other EU nations, making it simpler to have credentials recognised.
                        <br>
                        <br>
                        You will enjoy all the advantages of living in a European nation at a cost that is cheaper than
                        many westernised EU nations.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-why-study">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="lpage-why-study-heading">Why Study in <span>Latvia</span>?</h2>
                    <p>What makes it ideal for so many people?</p>

                    <div class="lpage-why-study-inner-curve">
                        <p>
                            Due to its reputation as a country that sings, Latvians assert that their home is a symphony
                            of sights, sounds, and sensations. The Latvian government has placed a high priority on
                            education and has implemented various educational reforms that have helped to make it a
                            prime location for study abroad programmes.
                        </p>
                    </div>
                    <div class="lpage-why-study-inner text-start">
                        <ul style="list-style: none;">
                            <li class="pb-3">
                                <p>Universities in Latvia provide both state-funded and fee-paying higher education
                                    options. To ensure that the most deserving students receive government funding,
                                    scholarship programmes carefully select their applicants. In Latvia, there are two
                                    different kinds of higher education programmes available: academic and professional.
                                    Both of these degrees are offered by Latvian universities, however there are a
                                    number of non-university-type institutions there that exclusively provide students
                                    with a professional education.</p>
                            </li>
                            <li class="pb-3">
                                <p>
                                    Higher education adheres to the Bologna System, which is broken down into three
                                    distinct levels: bachelor's studies, master's studies, and doctoral studies. After
                                    three or four years of regular study, a bachelor's degree is granted. On the other
                                    hand, a master's degree can only be earned after getting a bachelor's and completing
                                    an additional year or two of study. Students should hold a master's degree or a
                                    diploma equivalent before enrolling in doctoral programmes. Advanced coursework and
                                    the creation of a doctoral thesis are required during the three to four years of
                                    doctoral studies.
                                    <br>
                                    <br>
                                    The fact that schooling is so reasonably priced in Latvia is one of the main
                                    benefits. In comparison to many Western countries, the cost of living is lower,
                                    including tuition. In Latvia, engineering is a very popular field of study, and the
                                    country's universities are renowned for turning out excellent engineering and IT
                                    graduates. A degree from Latvia is equivalent to one from any other EU nation
                                    because it is a member of the EU as well.
                                    <br>
                                    <br>
                                    So even with far lower living expenses and other fees, you can still pursue a higher
                                    education in a European nation.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-benefits">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="lpage-benefits-heading-container">
                        <h2 class="lpage-benefits-heading-curve">Here are some benefits of studying in the</h2>
                        <div class="lpage-benefits-country">
                            <div class="lpage-benefits-flag"><img src="images/lat-flag-icon.png"></div>
                            <h2>Latvia</h2>
                            <div class="lpage-benefits-flag"><img src="images/lat-flag-icon.png"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 lpage-benefits-inner-container">
                            <h2 class="lpage-benefits-heading text-center">Internationally recognized Degree</span></h2>
                            <img src="images/lat-benefits-img-1.png">
                            <p class="lpage-benefits-small-text text-start">
                                Not only will studying in Latvia deliver a high-quality education, but it will also
                                result in a degree that is acknowledged around the world. Students who choose to study
                                in Latvia will experience a top-notch education while living in a nation with a booming
                                economy. In terms of internet speed, Latvia is rated seventh in the world. Latvia is a
                                great place to study because it has a booming economy and a variety of sectors.
                            </p>
                        </div>
                        <div class="col-md-6 lpage-benefits-inner-container">
                            <h2 class="lpage-benefits-heading text-center">Get Quality education at Affordable Fees</h2>
                            <img src="images/lat-benefits-img-2.png">
                            <p class="lpage-benefits-small-text">
                                Most individuals think that higher-quality education will cost more money. What if,
                                however, the same higher education was available for less money? Studying in Latvia will
                                cost Indian students roughly as much as studying here in India. Latvia offers all of the
                                courses at very reasonable tuition costs, whether they are Bachelors, Masters, or
                                Doctoral Level courses. In Latvia, there are numerous public, commercial, and technical
                                institutions that help students develop into better versions of themselves.
                            </p>
                        </div>
                        <div class="col-md-6 lpage-benefits-inner-container">
                            <h2 class="lpage-benefits-heading text-center">Study in Advanced Education System</h2>
                            <img src="images/lat-benefits-img-3.png">
                            <p class="lpage-benefits-small-text">
                                The Bologna Education System, which is in line with the American Credit System and thus
                                recognised throughout Europe, the US, and other countries, is used in Latvia and offers
                                students a higher-level, higher-quality education. The universities and higher education
                                institutions in Latvia have effective infrastructure, high-caliber faculty, and courses
                                that are structured to enable students to collaborate in international teams both at
                                home and abroad and to successfully compete in the global marketplace.
                            </p>
                        </div>
                        <div class="col-md-12 lpage-benefits-inner-container">
                            <h2 class="lpage-benefits-heading text-center">Work along with studying</h2>
                            <img src="images/lat-benefits-img-4.png">
                            <p class="lpage-benefits-small-text">
                                Depending on their grades and other factors, some universities in Latvia offer their
                                students the chance to intern. Students are permitted to work while pursuing their
                                education. Students will benefit financially from this as well as have the opportunity
                                to engage with European companies. Additionally, it is permissible for students to work
                                a 20-hour per week part-time job while they are in school, which will enable them to
                                budget their spending.
                            </p>
                        </div>
                        <div class="col-md-6 lpage-benefits-inner-container">
                            <h2 class="lpage-benefits-heading text-center">After study options</h2>
                            <img src="images/lat-benefits-img-5.png">
                            <p class="lpage-benefits-small-text">
                                After completing your studies, you have two options: either stay in your native country
                                or return with a degree that is internationally recognised, giving you an advantage over
                                other applicants and expanding your work options. If you plan to stay in any European
                                nation, you can apply for a job search visa that is valid for six months after which you
                                can work there and eventually seek for permanent residency. In addition, this degree
                                will give you a lot of chances if you decide to relocate outside of the European Union.
                            </p>
                        </div>
                        <div class="col-md-6 lpage-benefits-inner-container">
                            <h2 class="lpage-benefits-heading text-center">Study in Midst of nature</h2>
                            <img src="images/lat-benefits-img-6.png">
                            <p class="lpage-benefits-small-text">
                                Who would refuse the chance to attend school in one of the world's top 50 greenest
                                nations? Latvia is a country rich in natural wonders, with expansive woods and a lengthy
                                coastline. Latvia has a clean environment as a result of its wealth in natural
                                resources. Along with stunning natural scenery, Latvia also offers some spectacular
                                architectural designs.
                            </p>
                        </div>
                        <div class="col-md-6 lpage-benefits-inner-container">
                            <h2 class="lpage-benefits-heading text-center">Wide range of course options</h2>
                            <img src="images/lat-benefits-img-7.png">
                            <p class="lpage-benefits-small-text">
                                Students have many different course options in Latvia. Latvia offers its students a wide
                                range of possibilities, from mechanical to electrical to public health to management.
                                Depending on their interests, students can select a course option. There are numerous
                                specialisation possibilities available in Latvian universities in the fields of finance,
                                human resource management, project management, etc.
                            </p>
                        </div>
                        <div class="col-md-6 lpage-benefits-inner-container">
                            <h2 class="lpage-benefits-heading text-center">Scholarships</h2>
                            <img src="images/lat-benefits-img-8.png">
                            <p class="lpage-benefits-small-text">
                                Scholarships from Latvian Institutes are available to students based on their academic
                                performance. Additionally, government scholarships are offered to support several
                                international students.
                            </p>
                        </div>
                        <div class="col-md-6 lpage-benefits-inner-container">
                            <h2 class="lpage-benefits-heading text-center">Entry Requirements</span>
                            </h2>
                            <img src="images/lat-benefits-img-9.png">
                            <p class="lpage-benefits-small-text">
                                It is challenging to get accepted into institutions because one must take tests like
                                CMAT, CAT, JEE, etc. if they want to study in a reputable institution. Additionally, if
                                one wishes to get in, they must compete against many other applicants. On the other
                                side, Latvian institutions offer a very quick and straightforward admissions process
                                that makes it simple for students to obtain an international degree.
                            </p>
                        </div>
                        <div class="col-md-6 lpage-benefits-inner-container">
                            <h2 class="lpage-benefits-heading text-center">No IELTS, not a problem</h2>
                            <img src="images/lat-benefits-img-10.png">
                            <p class="lpage-benefits-small-text">
                                If you wish to study abroad, having a low IELTS score is no longer a roadblock. The
                                entry criteria for Latvian educational institutions state that the student's most recent
                                education was completed in English.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-apply-now">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row lpage-apply-banner">
                        <div class="col-md-5 lpage-apply-banner-bot"></div>
                        <div class="col-md-2 p-0">
                            <img class="w-100" src="images/apply-now-banner-btn.gif">
                        </div>
                        <div class="col-md-5 lpage-apply-banner-top"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <img class="w-100 h-100" src="images/counselling-img.jpg">
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
    <!-- lat -->
    <section class="landing-page-how-study">
        <div class="container">
            <div class="row">
                <div class="col-md-12 lpage-how-study-container">
                    <h2 class="lpage-how-study-heading">How To Study In <span>Latvia</span></h2>
                    <p>Secondary education and higher education are both parts of the Latvian educational system. In
                        Latvia, general education lasts a total of 12 years, including the required 9 years of basic
                        education and 3 years of secondary education.</p>

                    <img src="images/lat-how-to-study-img.png">

                    <p class="text-start">
                        In Latvia, there are academic and professional programmes available. The majority of higher
                        education institutions provide both academic and professional higher education credentials.
                        <br>
                        <br>
                        Academic higher education programmes tend to focus more on preparing graduates for independent
                        research and for professional activities by giving them a theoretical foundation. Programs for
                        academic education are carried out in accordance with national criteria for academic education.
                        They result in Bachelor's and Master's Degrees and each step concludes with a thesis.
                        <br>
                        <br>
                        In-depth knowledge in specific subjects is typically provided through professional higher
                        education degree programmes, training graduates for creation or enhancement of systems,
                        products, and technologies as well as preparing them for creative, research, and teaching
                        activities in these fields.
                        <br>
                        <br>
                        A bachelor's degree programme may last three or four years. The combined duration of a full-time
                        Bachelor's and Master's programme is at least five years. Three to four years are needed to
                        complete a doctorate.
                        <br>
                        <br>
                        Professional studies in medicine, dentistry, and pharmacy (5 and 6 year studies) are equivalent
                        to master's degree programmes, and graduates of these programmes are eligible to enrol in
                        doctoral level programmes.
                        <br>
                        <br>
                        Admission to doctorate studies requires a master's degree or its equivalent. A doctoral degree
                        is granted following the successful completion of exams in the selected scientific field and the
                        public defence of a doctoral thesis. The results of original research as well as brand-new
                        understandings in the field of science must be included in the PhD thesis. Doctoral study lasts
                        for three to four years.
                        <br>
                        <br>
                        Congratulations on your decision to pursue your Bachelor's or Master's degree in Latvia, one of
                        Europe's greenest nations. You may take advantage of some of the world's fastest internet
                        connections as well as breathtaking natural scenery.
                        <br>
                        <br>
                        But what are the essential procedures that prospective foreign students from outside of Latvia
                        should adhere to? Let's see!
                    </p>

                    <h2 class="lpage-how-study-heading">1. Find a Latvian university to apply to</span></h2>
                    <p class="text-start">
                        Here are a few of Latvia's finest universities to get you started:
                        <br>
                        1. Riga Technical University
                        <br>
                        2. Riga Stradins University
                        <br>
                        3. University of Latvia
                        <br>
                        4. Latvia University of Life Sciences and Technologies
                    </p>

                    <h2 class="lpage-how-study-heading">2. Learn where to submit your university application</span></h2>
                    <p class="text-start">
                        Latvia doesn't use a system of universal application. If you're an international student, you
                        should research each university's policies. <br>
                        Filling out an online application form and providing your documents—typically translated
                        copies—by mail or online are both possible steps in this process.
                    </p>

                    <h2 class="lpage-how-study-heading">3. Meet the university entry requirements</h2>
                    <p class="text-start">
                        Some of the most typical requirements for admission to universities in Latvia are given below:
                        <br>
                        >> submitted application form
                        <br>
                        >> proof of paying the application fee (if applicable)
                        <br>
                        >> high school diploma (to apply for a Bachelor's)
                        <br>
                        >> Bachelor's diploma (to apply for a Master's)
                        <br>
                        >> transcript of records
                        <br>
                        >> proof of English proficiency
                        <br>
                        >> proof of financial resources (to live and study there)
                        <br>
                        >> medical certificate
                        <br>
                        >> passport-sized photo(s)
                        <br>
                        >> copy of valid passport and/or personal ID
                        <br>
                        >> letter(s) of recommendation
                        <br>
                        >> personal statement
                        <br>
                        >> online interview (only at some universities)

                    </p>

                    <h2 class="lpage-how-study-heading">4. Meet the language requirements</h2>
                    <p class="text-start">
                        You must show that your language proficiency is strong enough to enrol in a degree program in
                        Latvia that is taught in English. You must ace one of the following international exams to
                        qualify for this:
                        <br>
                        <br>
                        • IELTS Academic
                        <br>
                        • PTE Academic
                        <br>
                        • TOEFL iBT
                    </p>

                    <h2 class="lpage-how-study-heading">5. Apply before the application deadlines</h2>
                    <p class="text-start">
                        There are two primary admissions periods for institutions in Latvia:
                        <br>
                        autumn intake: deadlines in July-August
                        <br>
                        winter intake: deadlines in December-January
                        <br>
                        Keep an eye on the official dates at all times because any university may alter these schedules.
                        Don't be afraid to ask the university for further details before applying because in some
                        circumstances, deadlines can vary based on your nationality.
                    </p>
                    <h2 class="lpage-how-study-heading">6. Confirm your enrolment after receiving the acceptance
                        letter/university offer</h2>
                    <p class="text-start">
                        Study in Latvia requirements
                        <br>
                        >> A filled Long Stay Visa Application Form of the Republic of Latvia.
                        <br>
                        >> One passport size photo (size 35mm x 45 mm), taken during visa submission
                        <br>
                        >> A Valid Passport
                        <br>
                        >> Copies of the identification and information pages of previously issued visas (if any)
                        <br>
                        >> OCMA approved invitation.
                        <br>
                        >> Study Agreement 
                        <br>
                        >> Written certification issued by the higher education institution or college
                        <br>
                        >> Proof of sufficient financial means
                        <br>
                        >> Proof of Accommodation
                        <br>
                        >> Proof of Sponsorship  
                        <br>
                        >> Proof of the Previous Education
                        <br>
                        >> Ticket Reservation
                        <br>
                        >> Travel Medical Insurance of minimum coverage of 42,600 EUR.
                        <br>
                        >> Visa fee of 60 EUR (Masters and PhD students exempted)
                        <br>
                        >> Confirmation slip
                    </p>

                    <img class="w-100" src="images/study-abroad-flags.png">

                    <button class="lpage-how-study-apply-btn" data-bs-toggle="modal" data-bs-target="#apply_now">Apply
                        Now</button>

                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-top-universities">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="lpage-top-universities-heading">Top Universities to Study in Latvia</span>
                    </h2>
                </div>
                <div class="col-md-12 lpage-top-universities-slider">
                    <div class="row">
                        <div class="3-col-items" style="display: flex; flex-wrap: wrap;">
                            <div class="col-md-4" style="padding-bottom: 25px;"><img class="w-100 p-2 h-100"
                                    src="images/lat-top-university-img-1.jpg">
                                <h4>Latvijas Universitate</h4>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 25px;"><img class="w-100 p-2 h-100"
                                    src="images/lat-top-university-img-2.jpg">
                                <h4>Rigas Tehniska universitate</h4>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 25px;"><img class="w-100 p-2 h-100"
                                    src="images/lat-top-university-img-3.jpg">
                                <h4>Latvijas Lauksaimniecibas universitate</h4>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 25px;"><img class="w-100 p-2 h-100"
                                    src="images/lat-top-university-img-4.jpg">
                                <h4>Rezeknes Tehnologiju Akademija</h4>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 25px;"><img class="w-100 p-2 h-100"
                                    src="images/lat-top-university-img-5.jpg">
                                <h4>Rigas Stradina Universitate</h4>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 25px;"><img class="w-100 p-2 h-100"
                                    src="images/lat-top-university-img-6.jpg">
                                <h4>Biznesa augstskola Turiba</h4>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 25px;"><img class="w-100 p-2 h-100"
                                    src="images/lat-top-university-img-7.jpg">
                                <h4>Daugavpils Universitate</h4>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 25px;"><img class="w-100 p-2 h-100"
                                    src="images/lat-top-university-img-8.jpg">
                                <h4>Latvijas Makslas akademija</h4>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 25px;"><img class="w-100 p-2 h-100"
                                    src="images/lat-top-university-img-9.jpg">
                                <h4>Rigas Ekonomikas augstskola</h4>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 25px;"><img class="w-100 p-2 h-100"
                                    src="images/lat-top-university-img-10.jpg">
                                <h4>Liepajas Universitate</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-popular-intakes">
        <div class="container">
            <div class="row">
                <div class="col-md-12 lpage-popular-intakes-container">
                    <h2 class="lpage-popular-intakes-heading">Popular <span>Intakes</span></h2>
                    <p class="lpage-popular-intakes-text">
                        The primary intake in Latvia is the September Semester, sometimes known as the September intake.
                        Other secondary intakes, such as those in November, January-February, and March-April, are
                        provided by a few universities in Latvia. The smallest number of courses and universities
                        providing them would be in the summer intake. A lot of them only provide language instruction
                        during the summer. Since there are the most courses available for that intake only,
                        international students should aim for the September intake.
                    </p>
                    <img src="images/lat-popular-intakes-img.jpg">
                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-cost-living">
        <div class="container">
            <div class="row">
                <div class="col-md-12 lpage-cost-living-container">
                    <img src="images/lat-cost-living-img.jpg">
                    <div class="lpage-cost-living-heading-box">
                        <h2 class="lpage-cost-living-heading">Cost of studying and living in <span>Latvia</span></h2>
                        <p class="lpage-cost-living-text">
                            The average cost of living, according to polls, should be between €450 and €750, but don't
                            forget that it varies depending on your choice of housing, transportation, daily
                            necessities, energy costs, food, and clothing. The tuition at Latvian universities may vary
                            slightly based on the course and the institution you select, so students who enjoy seeing
                            new areas should plan to pay more. However, as is the case in the majority of study abroad
                            locations, there is a disparity between the fees paid by students from Latvia and those from
                            other nations.
                        </p>
                    </div>
                </div>

                <div class="col-md-12 lpage-cost-living-inner text-start">
                    <br>
                    <h2>Education in Latvia</h2>
                    <li style="list-style: none;">
                        In comparison to universities in other EU nations, Latvian universities still have comparatively
                        low and inexpensive tuition rates. As was previously mentioned, your choice of programme and
                        university will have a small impact on the programme expenses in Latvia. The tuition costs that
                        Latvian students pay locally and those that students from other European nations pay vary. In
                        general, non-EU students are expected to spend much more money than students from their own
                        countries and other EU nations.
                    </li>
                    <li>For an undergraduate degree programme, Latvian universities typically charge between EUR 3000
                        and EUR 5000, or USD 3,600 and USD 6,100.</li>
                    <li>The cost of obtaining a medical degree is greater, up to EUR 15,000 (USD 18,400) each year.</li>
                    <li>In contrast, if a domestic or European student wishes to pursue an MS degree, the cost ranges
                        from EUR 1,700 (USD 2,095) per year, which is significantly less than in other nations.</li>

                    <br>

                    <li style="list-style: none;">You will receive a conditional acceptance letter from the university
                        or institute after they have processed your application and granted you admission; you must sign
                        the letter to confirm your enrollment in a Latvian university. Before receiving official
                        authorisation to come to Latvia for studies, you must pay the whole first year's tuition. Some
                        colleges or institutions may require you to deposit a security sum as proof that you have the
                        necessary cash. Therefore, these are the processes and formalities a student must adhere to in
                        order to enrol at Latvian colleges.</li>
                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-scholarships">
        <div class="container">
            <div class="row lpage-scholarships-container">
                <div class="col-md-6">
                    <h2 class="lpage-scholarships-heading">Scholarships to<br> Study in <span>Latvia</span></h2>
                    <p class="lpage-scholarships-text">
                        Latvia is a great place for international students to study since it provides some of the best
                        opportunities
                        to earn a degree. The fact that Latvia is affordable for most people is
                        just one factor that makes it a popular choice for international students.
                    </p>
                </div>
                <div class="col-md-6 lpage-scholarships-image-box">
                    <img src="images/scholerships-img.png">
                </div>

                <div class="col-md-12 lpage-scholarships-list">

                    <h4><b>1. Liepaja University Scholarships for International Students</b></h4>
                    <li style="list-style: none;">
                        If you're thinking about studying abroad, especially in Latvia, the Liepaja University is a
                        wonderful choice. This Liepaja-based institution provides a wide variety of bachelor's,
                        master's, and doctoral degrees to students from throughout the world. They also enjoy a solid
                        academic reputation both domestically and abroad. The university's scholarship programme strives
                        to provide these students with financial assistance.
                        <br>
                        <br>
                        There are two categories of Latvian scholarships available to international students. The first
                        is a scholarship provided by the government of Latvia. The government provides scholarships,
                        which are also given out by the Liepaja University to their chosen candidates.
                        <br>
                        <br>
                        The European Social Fund Scholarships are the university's second scholarship category. Students
                        pursuing a master's degree in new media art and information technology are eligible for this
                        grant.
                    </li>
                    <br>
                    <br>
                    <h4><b>2. Latvian State Scholarships</b></h4>
                    <li style="list-style: none;">
                        • Scholarship Amount: €500 per month for Bachelor's and Master's degree holders and €670 per
                        month for Ph.D. students for the duration of the scholarship (10 – 11 months)
                        <br>
                        • Bachelor's, Master's, and Ph.D. degrees are acceptable degrees.
                        <br>
                        <br>
                        The bilateral agreements between the governments of Latvia and other nations on cooperation in
                        education and science include the Latvian State Scholarships. International students from
                        nations that have a contract with Latvia's Ministry of Education and Science are eligible for
                        these scholarships. Students pursuing bachelor's, master's, and doctoral degrees are eligible
                        for the scholarship.
                        <br>
                        <br>
                        Please make sure your nation is included before submitting your scholarship application.
                        Following that, you can start your online application on the website. Attachments should include
                        things like your curriculum vitae, a letter from your school, a copy of your passport, your
                        research plan, letters of inspiration, and recommendations. The scholarship link has a complete
                        list of the required paperwork. Kindly prepare your paperwork in either English or Latvian.
                        <br>
                        <br>
                        The student's academic background, motivation, and aptitude for studying in Latvia will all be
                        considered in the evaluation and awarding of this Latvia scholarship. You may view the complete
                        set of standards and credits that will be applied in judging your scholarship application on
                        their website. In addition to your academic history, the Latvian programme will take into
                        account the extracurricular activities you have participated in and the programme you have
                        chosen.
                    </li>
                    <br>
                    <br>
                    <h4><b>3. Latvian Research Fellowship</b></h4>
                    <li style="list-style: none;">
                        • Scholarship Amount: €300 for lodging expenses and €30 per day for personal use.
                        <br>
                        • Ph.D.s are acceptable degrees
                        <br>
                        <br>
                        One of the top scholarships in Latvia for overseas students, the Latvian Research Fellowship, is
                        also covered by bilateral agreements between the governments of other nations on collaboration
                        in education and science. However, unlike the state-sponsored scholarships, this prize is only
                        available to overseas students who are engaged in research and who wish to use the money for
                        that purpose.
                        <br>
                        <br>
                        Before applying, kindly prepare the following documents: a copy of your passport, a resume, a
                        motivation letter, and a letter from your college or research organisation. Additionally, you
                        must submit some study-related documents, like your research goal and relevance. The website has
                        templates that need to be used. The materials you submit need to be translated into either
                        English or Latvian.
                        <br>
                        <br>
                        Your study proposal and your desire to work in Latvia will be taken into consideration when
                        evaluating your scholarship application. International students would also benefit from applying
                        to or enrolling in research projects related to Latvian language, literature, and culture
                        because they will receive bonus points for doing so. Email notifications will be sent to those
                        who are chosen.
                    </li>
                    <br>
                    <br>
                    <h4><b>4. Turība University Scholarships for International Students</b></h4>
                    <li style="list-style: none;">
                        • Scholarship Amount: €600 or full tuition reimbursement
                        <br>
                        A Bachelor's degree is required to qualify.
                        <br>
                        <br>
                        The largest business school in Latvia, Turiba University, which was founded in 1993, has five
                        locations throughout the nation. This university is renowned for turning out top-notch business
                        graduates. Additionally, they belong to worldwide associations and groups that support high
                        standards in education.
                        <br>
                        <br>
                        Turiba University provides scholarships to overseas undergraduates enrolled in any of the
                        university's bachelor's programmes in order to further this objective. Every international
                        undergraduate student's academic success is acknowledged, and they award scholarships to 2nd,
                        3rd, and 4th-year students. On the website, you can begin your application.
                    </li>
                    <br>
                    <br>
                    <h4><b>5. University of Latvia</b></h4>
                    <li style="list-style: none;">
                        • Bachelor's, Master's, and Ph.D. degrees are acceptable degrees.
                        <br>
                        <br>
                        The University of Latvia, which was founded in 1919 and is located in Riga, Latvia, is one of
                        the biggest and best research universities in the Baltics and provides a wide range of
                        undergraduate, graduate, and doctoral degrees. They enjoy a top academic reputation among
                        universities. More than 14,000 students currently attend this university, which offers a variety
                        of faculties and departments. This university offers a wide range of educational options to its
                        international students.
                        <br>
                        <br>
                        These international students may apply for scholarships at the University of Latvia. One of the
                        best scholarships in Latvia is the patron scholarship, which is available to nationals of Europe
                        and developing nations. These awards are intended to honour outstanding overseas students as
                        well as those who require financial assistance for their education.
                    </li>
                    <br>
                    <br>
                    <h4><b>6. The Friedrich Ebert Foundation Award</b></h4>
                    <li style="list-style: none;">
                        The Friedrich-Ebert-Stiftung scholarship is an additional choice to advance social democracy by
                        providing
                        financial aid for academic pursuits. The fellowship is open to international candidates enrolled
                        in a state-
                        or state-recognized university of applied sciences in Latvia and pursuing their doctorate. These
                        pupils are
                        anticipated to perform academically above average. This is a good alternative for people who
                        work in the
                        humanities, social sciences, or politics.
                        <br>
                        <br>
                        Even if the course you attend is in English, you must show that you have exceptional German
                        language skills to
                        qualify for this award. Only 40 persons from Africa, Asia, Latin America, and Eastern Europe
                        will enroll in
                        this funding program each year. Thus there are a limited number of spots available. Scholarship
                        recipients
                        enrolled in undergraduate programs will get a monthly payment of 830 euros. The monthly stipend
                        for master's
                        degree candidates is 850 euros, plus health insurance fees.
                    </li>
                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-top-universities-table">
        <div class="container">
            <div class="row">
                <div class="col-md-12 lpage-top-universities-table-box">
                    <table class="lpage-top-universities-table-inner">
                        <tr>
                            <th>University</th>
                            <th>Latvia Rank</th>
                            <th>Town</th>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Latvijas Universitate
                                <img src="images/lat-top-university-table-img-1.jpg" style="width:280px;">
                            </td>
                            <td>1</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Rigas Tehniska universitate
                                <img src="images/lat-top-university-table-img-2.jpg" style="width:280px;">
                            </td>
                            <td>2</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Latvijas Lauksaimniecibas universitate
                                <img src="images/lat-top-university-table-img-3.jpg" style="width:280px;">
                            </td>
                            <td>3</td>
                            <td>Jelgava</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Rezeknes Tehnologiju Akademija
                                <img src="images/lat-top-university-table-img-4.jpg" style="width:280px;">
                            </td>
                            <td>4</td>
                            <td>Rezekne</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Rigas Stradina Universitate
                                <img src="images/lat-top-university-table-img-5.jpg" style="width:280px;">
                            </td>
                            <td>5</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Biznesa augstskola Turiba
                                <img src="images/lat-top-university-table-img-6.jpg" style="width:280px;">
                            </td>
                            <td>6</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Daugavpils Universitate
                                <img src="images/lat-top-university-table-img-7.jpg" style="width:280px;">
                            </td>
                            <td>7</td>
                            <td>Daugavpils</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Latvijas Makslas akademija
                                <img src="images/lat-top-university-table-img-8.jpg" style="width:280px;">
                            </td>
                            <td>8</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Rigas Ekonomikas augstskola
                                <img src="images/lat-top-university-table-img-9.jpg" style="width:280px;">
                            </td>
                            <td>9</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Liepajas Universitate
                                <img src="images/lat-top-university-table-img-10.jpg" style="width:280px;">
                            </td>
                            <td>10</td>
                            <td>Liepaja</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Rigas Juridiska augstskola
                                <img src="images/lat-top-university-table-img-11.jpg" style="width:280px;">
                            </td>
                            <td>11</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Baltijas Starptautiska akademija
                                <img src="images/lat-top-university-table-img-12.jpg" style="width:280px;">
                            </td>
                            <td>12</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Ventspils Augstskola
                                <img src="images/lat-top-university-table-img-13.jpg" style="width:280px;">
                            </td>
                            <td>13</td>
                            <td>Ventspils</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Vidzemes Augstskola
                                <img src="images/lat-top-university-table-img-14.jpg" style="width:280px;">
                            </td>
                            <td>14</td>
                            <td>Valmiera</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Jazepa Vitola Latvijas muzikas akademija
                                <img src="images/lat-top-university-table-img-15.jpg" style="width:280px;">
                            </td>
                            <td>15</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Latvijas Kulturas akademija
                                <img src="images/lat-top-university-table-img-16.jpg" style="width:280px;">
                            </td>
                            <td>16</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Transporta un sakaru instituts
                                <img src="images/lat-top-university-table-img-17.jpg" style="width:280px;">
                            </td>
                            <td>17</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Banku augstskola
                                <img src="images/lat-top-university-table-img-18.jpg" style="width:280px;">
                            </td>
                            <td>18</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Informacijas sistemu menedžmenta augstskola
                                <img src="images/lat-top-university-table-img-19.jpg" style="width:280px;">
                            </td>
                            <td>19</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Rigas Starptautiska ekonomikas un biznesa administracijas augstskola
                                <img src="images/lat-top-university-table-img-20.jpg" style="width:280px;">
                            </td>
                            <td>20</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Ekonomikas un kulturas augstskola
                                <img src="images/lat-top-university-table-img-21.jpg" style="width:280px;">
                            </td>
                            <td>21</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Latvijas Sporta pedagogijas akademija
                                <img src="images/lat-top-university-table-img-22.jpg" style="width:280px;">
                            </td>
                            <td>22</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Latvijas Kristiga akademija
                                <img src="images/lat-top-university-table-img-23.jpg" style="width:280px;">
                            </td>
                            <td>23</td>
                            <td>Jurmala</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Starptautiska praktiskas psihologijas augstskola
                                <img src="images/lat-top-university-table-img-24.jpg" style="width:280px;">
                            </td>
                            <td>24</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Latvijas Juras akademija
                                <img src="images/lat-top-university-table-img-25.jpg" style="width:280px;">
                            </td>
                            <td>25</td>
                            <td>Riga</td>
                        </tr>
                        <tr>
                            <td class="lpage-topuniversities-table-title"
                                style="display:flex;flex-direction:column;align-items:center;">
                                Rigas Aeronavigacijas instituts
                                <img src="images/lat-top-university-table-img-26.jpg" style="width:280px;">
                            </td>
                            <td>26</td>
                            <td>Riga</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-affordable">
        <div class="container">
            <div class="row lpage-affordable-container">
                <div class="col-md-6">
                    <h3 class="lpage-affordable-heading">Affordable Universities in <span>Latvia</span></h3>
                    <p class="lpage-affordable-text">
                        For the convenience of Indian students wishing to pursue their higher education in Latvia, the
                        following is a
                        list of affordable public universities in Latvia.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="images/lat-affordable-img-1.jpg">
                    <h2>1. Ventspils University of Applied Sciences</h2>
                </div>

                <div class="col-md-4">
                    <img src="images/lat-affordable-img-2.jpg">
                    <h2>2. Latvia University of Life Sciences and Technologies</h2>
                </div>
                <div class="col-md-4">
                    <img src="images/lat-affordable-img-3.jpg">
                    <h2>3. EKA University of Applied Sciences</h2>
                </div>
                <div class="col-md-4">
                    <img src="images/lat-affordable-img-4.jpg">
                    <h2>4. University of Latvia (Latvijas Universitāte)</h2>
                </div>

                <div class="col-md-4">
                    <img src="images/lat-affordable-img-5.jpg">
                    <h2>5. University of Liepāja</h2>
                </div>
                <div class="col-md-4">
                    <img src="images/lat-affordable-img-6.jpg">
                    <h2>6. University of Daugavpils</h2>
                </div>
                <div class="col-md-4">
                    <img src="images/lat-affordable-img-7.jpg">
                    <h2>7. Vidzeme University of Applied Sciences</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-course">
        <div class="container">
            <div class="row">
                <div class="col-md-12 lpage-course-heading-box">
                    <img src="images/books-icon.png">
                    <h2 class="lpage-course-heading">Course options<br> in <span>Latvia</span></h2>
                </div>

                <div class="col-md-12 lpage-course-text-container">
                    <p>
                        In Latvia, there are a few well-known degree programmes. In Latvia, there are several options
                        accessible whether you want to get a bachelor's, master's, or doctoral degree.
                    </p>
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Information Technology</b></h3>
                    <img src="images/lat-course-img-1.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Hotel Management</b></h3>
                    <img src="images/lat-course-img-2.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Mechanical Engineering</b></h3>
                    <img src="images/lat-course-img-3.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Health Management</b></h3>
                    <img src="images/lat-course-img-4.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Environmental Science</b></h3>
                    <img src="images/lat-course-img-5.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Medical Physics</b></h3>
                    <img src="images/lat-course-img-6.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Business Management</b></h3>
                    <img src="images/lat-course-img-7.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Aviation Transport</b></h3>
                    <img src="images/lat-course-img-8.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Computer Systems</b></h3>
                    <img src="images/lat-course-img-9.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Medicine</b></h3>
                    <img src="images/lat-course-img-10.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Geomatics</b></h3>
                    <img src="images/lat-course-img-11.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Chemistry</b></h3>
                    <img src="images/lat-course-img-12.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Electrical Technologies</b></h3>
                    <img src="images/lat-course-img-13.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Telecommunications</b></h3>
                    <img src="images/lat-course-img-14.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Food Science</b></h3>
                    <img src="images/lat-course-img-15.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Civil Engineering</b></h3>
                    <img src="images/lat-course-img-16.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Real Estate</b></h3>
                    <img src="images/lat-course-img-17.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Construction Management</b></h3>
                    <img src="images/lat-course-img-18.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Technical Translation</b></h3>
                    <img src="images/lat-course-img-19.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Mechatronics</b></h3>
                    <img src="images/lat-course-img-20.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Agriculture</b></h3>
                    <img src="images/lat-course-img-21.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Pedagogy</b></h3>
                    <img src="images/lat-course-img-22.png" style="width:60%;">
                </div>

                <div class="col-md-6 lpage-course-img-container text-center">
                    <h3><b>Entrepreneurship & Management</b></h3>
                    <img src="images/lat-course-img-23.png" style="width:60%;">
                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-how-apply">
        <div class="container">
            <div class="row">
                <div class="col-md-12 lpage-how-apply-heading-box">
                    <img src="images/stamp-icon.png">
                    <h2 class="lpage-how-apply-heading">How to apply for a<br> study visa in <span>Latvia</span>?</h2>
                </div>
                <div class="col-md-12 lpage-how-apply-text-box">
                    <p>
                        A student visa is required to study in Latvia. Read the detailed Latvia Student Visa
                        Requirements and Process along with the list of necessary papers. Take caution, as even a small
                        error could result in the denial of your visa.
                    </p>

                    <h4>Step-1: Original documents required from students (Apostille)</h4>
                    <p>
                        ⦁ ESL Application form
                        <br>
                        ⦁ Passport
                        <br>
                        ⦁ Photo with white background (35/ 45 size)
                        <br>
                        ⦁ All educational documents- X, XII/PUC and Bachelors Certificates and Marksheet.
                        <br>
                        ⦁ Provisional certificate not accepted
                        <br>
                        ⦁ Grade should be 50% and above
                        <br>
                        ⦁ IELTS, TOFEL, Medium of Instruction certificate or any English Proficiency Certificate
                        <br>
                        ⦁ CV
                    </p>

                    <h4>Step 2: After obtaining the aforementioned paperwork, ESL will handle acceptance.</h4>

                    <h4>Step 3: A Conditional Acceptance Letter and an Invoice for the Application Fee will be sent to
                        the applicant.</h4>
                    <p>
                        ⦁ You should exercise caution when transferring the fee because it is one of the most crucial
                        steps of the Latvia Student Visa requirements.
                        <br>
                        ⦁ Application fees range from 180 to 300 euros, depending on the university and program, and are
                        non-refundable. Payment will be sent directly to the university's account.
                    </p>

                    <h4>Step 4: The candidate should take either an online test or a Skype interview.</h4>
                    <p>
                        ⦁ Some universities don't require any entrance exams.
                        <br>
                        ⦁ ESL will assist pupils who lack confidence in online assessments. ESL will provide preparation
                        for a Skype interview.
                    </p>

                    <h4>Step 5: The Academic Information Centre (AIC) will receive the Educational Documents for the
                        university's review.</h4>
                    <p>
                        ⦁ Some colleges do not require AIC; duration: minimum 2 weeks, maximum 4 weeks.
                    </p>

                    <h4>Step 6: The university will give the following information after obtaining the AIC statement:
                    </h4>
                    <p>
                        ⦁ Final admission letter; study contract; tuition invoice (between 2000 and 3400 euros,
                        depending on the subject and university);
                        <br>
                        ⦁ Security deposit invoice, which ranges from 500 to 700 euros depending on the course and
                        university
                        <br>
                        ⦁ In the event that a visa application is denied, tuition and security fees are refunded.
                    </p>

                    <h4>Step-7:</h4>
                    <p>
                        After the tuition has been paid in full, submit your application for a residence permit. Only
                        applicants at the Bachelor level should send the following original documents to ESL through
                        courier or DHL. To continue processing Latvian student visa applications
                    </p>

                    <table class="lpage-programs-table-container">
                        <tbody>
                            <tr>
                                <th>Bachelor level</th>
                                <th>Masters Level</th>
                            </tr>
                            <tr>
                                <td>Data Page of Passport with Apostille</td>
                                <td>NA</td>
                            </tr>
                            <tr>
                                <td>3 Photos (35/45)-white background</td>
                                <td>NA</td>
                            </tr>
                            <tr>
                                <td>
                                    Bank Statement of 5000 Euro. The following should be mentioned in bank solvency
                                    certificate
                                    <br>
                                    • Your Name, surname
                                    <br>
                                    • Date of Birth
                                    <br>
                                    • Passport Number
                                    <br>
                                    • Amount in Euro
                                    <br>
                                    <br>
                                    International debit card from the same bank.
                                </td>
                                <td>NA</td>
                            </tr>
                            <tr>
                                <td>Police clearance certificate with Apostille (Legalized by ministry of foreign
                                    affairs)</td>
                                <td>NA</td>
                            </tr>
                            <tr>
                                <td>X and XII/PUC Certificates and Mark sheets Legalized with Apostille (Legalized by
                                    ministry of foreign affairs)</td>
                                <td>NA</td>
                            </tr>
                            <tr>
                                <td>Residence permit form-ESL will provide. It must be signed with blue pen.</td>
                                <td>NA</td>
                            </tr>
                            <tr>
                                <td>Signed Study Contract</td>
                                <td>NA</td>
                            </tr>
                            <tr>
                                <td>Any legal documents such as marriage certificate, name change affidavit needs
                                    Apostille</td>
                                <td>NA</td>
                            </tr>
                            <tr>
                                <td>Rest of documents, university will provide (study contract, invitation letter,
                                    accommodation contract)</td>
                                <td>NA</td>
                            </tr>
                            <tr>
                                <td>
                                    Payment of Residence Permit fee (Swift copy)
                                    <br>
                                    Fee - for 5 Working Days -355 Euro, 10 Working Days -214, 30 days -72 Euro
                                    <br>
                                    • Applicants should transfer to the university.
                                    <br>
                                    • It is non-refundable
                                </td>
                                <td>NA</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>The institution will give the following visa supporting documentation following successful
                        tuition payment:</p>
                    <br>
                    <table class="lpage-programs-table-container">
                        <tbody>
                            <tr>
                                <th>Bachelor level</th>
                                <th>Masters Level</th>
                            </tr>
                            <tr>
                                <td>Invitation letter</td>
                                <td>Invitation letter</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Visa Grantee letter</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Accommodation confirmation letter</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4>Step-8: To the Latvian Embassy in Delhi, applicants must bring the following documents and
                        prepare for an interview.</h4>
                    <table class="lpage-programs-table-container">
                        <tbody>
                            <tr>
                                <th>Bachelor level</th>
                                <th>Masters Level</th>
                            </tr>
                            <tr>
                                <td>
                                    (Applicants will appear for Residence Permit Interview)
                                    <br>
                                    Consular Fee: Rs. 4,600/- by bank draft in favour of Embassy of Latvia
                                </td>
                                <td>
                                    (Applicants will appear for Visa Interview)
                                    <br>
                                    Visa Fee: Rs. 4,600/- by bank draft in favour of Embassy of Latvia
                                </td>
                            </tr>
                            <tr>
                                <td>Original Passport</td>
                                <td>C type visa application form-ESL</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4>The application process for a student visa to Latvia is more difficult than it appears; one
                        error could result in the denial of your visa. As a result, carefully read each step that is
                        listed.</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- lat -->
    <section class="landing-page-residence">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="lpage-residence-heading">Study Pathways to Permanent<br> Residence <span>(PR)</span></h2>
                </div>
                <div class="col-md-12 lpage-residence-text-container">
                    <img src="images/residence-img.png">

                    <p>
                        The gem of the Baltic Sea, Latvia, is a member of the European Union and a Schengen State.
                        Latvia draws investors from all over the world as a result of its strategically significant
                        geographic location. Latvia is a developed economy with high GDP rates and incomes.
                        Opportunities for employment after graduation are crucial for international students studying
                        abroad. Since Latvia has loosened its immigration laws since 2010, the majority of students who
                        study there want jobs there. As a result, expats who wish to stay in Latvia now only need to
                        meet the bare minimum of financial requirements.
                        <br>
                        <br>
                        After receiving their degree from a Latvian university, international students are required to
                        sign an employment contract with a Latvian-based employer without being restricted to a
                        particular job title or starting pay. In order to provide students with the necessary practical
                        experience, the majority of Latvian colleges establish internship programmes during the summer
                        breaks at local businesses and firms. After graduating from a Latvian university, it gets easier
                        to find work there, especially after getting experience through internships.
                    </p>
                    <p>
                        <b>Latvian Post-Graduation Work Permit for International Students </b>
                        <br>
                        <br>
                        Your Latvian student visa expires after your course of study is finished, and you must leave the
                        country once you have successfully earned your degree. If they have located a job contract, they
                        must take the actions listed below to obtain a Latvian work permit.
                        <br>
                        <br>
                        <b>How Non-EU/Third Country Nationals Can Obtain a Short-Term Work Permit in Latvia:</b>
                        <br>
                        ⦁ The employer will notify the employment agency of a necessary job opening in his organisation.
                        <br>
                        ⦁ Following the employee's selection, the employer will apply for the employee's invitation to
                        work in Latvia at the Office of Citizenship and Migration Affairs. Employment contracts,
                        academic transcripts, and information about the chosen employee's qualifications are additional
                        documents that must be submitted with the application.
                        <br>
                        ⦁ If the application is accepted by the Office of Citizenship and Migration Affairs. There will
                        be a letter of invitation issued in the employee's name. The employee will go to the Latvian
                        Embassy or Consulate in their nation and present the necessary paperwork for the visa. In a
                        visa, the right to work is granted.
                        <br>
                        ⦁ The employee will register with the State Revenue Service as a tax payer after arriving in
                        Latvia.
                        <br>
                        <br>
                        <b>Steps to Attain Long Term Work Permit of Latvia for Non-EU/Third Country Nationals:</b>
                        <br>
                        A study abroad applicant must obtain an education loan before applying for a visa because
                        financial
                        documentation is required to get one. Education loans are essential for covering the cost of
                        studying abroad.
                        <br>
                        ⦁ The employer will submit the necessary job position/vacancy information to the Employment
                        Agency for his organisation.
                        <br>
                        ⦁ After choosing a foreign worker, the employer will submit an application for an invitation to
                        the Office of Citizenship and Migration Affairs together with the employee's employment
                        contract, information about the position, qualifications, and academic records.
                        <br>
                        ⦁ If the application is approved by the Office of Citizenship and Migration Affairs following
                        verification, an invitation letter will be provided in the employee's name.
                        <br>
                        ⦁ After obtaining an invitation letter, the employee will visit the Latvian Embassy or Consulate
                        in their nation and submit the necessary paperwork for a residence permission and an employment
                        permit in Latvia. The Office of Citizenship and Migration Affairs will issue the residency
                        permit together with the right to work.
                        <br>
                        ⦁ The employee must register with the State Revenue Service as a tax payer after arriving in
                        Latvia.
                        <br>
                        <br>
                        <b>Required Documents for Latvian Work Permit:</b>
                        <br>
                        ⦁ Valid Passport
                        <br>
                        ⦁ Two recently taken passport size photographs
                        <br>
                        ⦁ Completed and signed employment permit application form
                        <br>
                        ⦁ Medical examination certificate
                        <br>
                        ⦁ Visa application fee paid receipt
                        <br>
                        ⦁ If the applicant is taking spouse and kids along they will provide marriage certificate and
                        relevant birth certificates of children.
                        <br>
                        ⦁ Employment Contract
                        <br>
                        ⦁ Invitation Letter from Employer
                        <br>
                        ⦁ Letter of intent from employer
                        <br>
                        <br>
                        <b>Terms and Conditions of Latvian Work Permit:</b>
                        <br>
                        It is the employer's duty to offer accommodations and health care to any third-country nationals
                        hired as employees, whether on a temporary or permanent basis. The work permit can be extended
                        after a year if the employment agreement is still in effect. The holders of long-term work
                        permits also acquire a Latvian temporary residency permit. If an employee switches jobs, they
                        must present a letter of no objection from their old employer as well as their new employer's
                        employment contract. The citizens of third countries are permitted to have multiple jobs at
                        once, but each employer must notify the immigration authorities separately.
                        <br>
                        The foreign national living in Latvia on a work permit may invite their family to join them
                        during this time if they can demonstrate sufficient financial resources to cover the costs of
                        their spouse and minor children. The family will be granted a resident permit as well, with the
                        same duration of validity as the employee's resident permit. The employment agreement may be
                        renewed for an additional five years. The national of a third country may apply for permanent
                        residency in Latvia after living there continuously for five years with a valid resident permit.
                        Since Latvia is a member of the Schengen Agreement, those who have a resident permit or a work
                        permit are eligible to travel to and remain in other Schengen countries without a visa for up to
                        90 days. 
                        <br>
                        <br>
                        <b>In Latvia, how do you get an internship?</b>
                        <br>
                        On a student visa, you can only work 90 full days or 180 half days per year. If you work for the
                        university as
                        a research assistant or a professor's assistant, this restriction does not apply to you. The
                        visa laws let you
                        participate in required internships, typically 12 weeks long and part of your program. You may
                        work longer
                        than 90 consecutive days if you have a semester off.
                        <br>
                        <br>
                        <b>Permanent Residency of Latvia</b>
                        <br>
                        A citizen of a third country who has been legally residing in Latvia for the last five years may
                        apply for permanent residency in Latvia. The five-year validity period of the permanent
                        residency card. For a permanent residency card, the applicant must present the following
                        documents to the Latvian Office of Citizenship and Migration Affairs:
                        <br>
                        ⦁ Current passport (with details of previous visa stamps and resident permit stamps indicating 5
                        years long legal stay in Latvia).
                        <br>
                        ⦁ The candidate's personal information, such as their marital status, number of children,
                        parents, education, and language skills; and their Latvian residential address
                        <br>
                        ⦁ Records of tax payments
                        <br>
                        ⦁ Evidence of finances (previous employment details, received salary details, present employment
                        contract details)
                        <br>
                        ⦁ Verification from Latvian legal authorities attesting to the candidate's lack of criminal
                        history and that, while residing there, he has behaved responsibly as a citizen by abiding by
                        all laws and regulations.
                        <br>
                        ⦁ Health insurance coverage (if supported by employer, the details of health insurance coverage
                        paid by employer)
                        <br>
                        ⦁ A properly filled-out and signed application for permanent residency
                        <br>
                        ⦁ The candidate must demonstrate his linguistic ability and familiarity with Latvian history and
                        culture. The immigration department may take a test to demonstrate Latvian language ability.
                        <br>
                        <br>
                        <b>Rights of Permanent Resident:</b>
                        <br>
                        ⦁ In accordance with newly updated laws, individuals who hold a Latvian permanent resident card
                        are not needed to remain in Latvia for a specific period of time in order to maintain their PR
                        status.
                        <br>
                        ⦁ Permanent residency is valid for five years, but it must be renewed annually.
                        <br>
                        ⦁ People who hold Permanent Resident cards are free to visit and remain in other Schengen
                        nations.
                        <br>
                        ⦁ People who hold a PR card are not required to report their present residence to the
                        immigration service and are free to work any job and live anywhere in Latvia.
                        <br>
                        ⦁ The spouse and minor children (those under the age of 18) of a permanent resident holder are
                        also eligible for residency.
                        <br>
                        <br>
                        <b>Citizenship of Latvia 2021</b>
                        <br>
                        Holders of permanent residency cards and their families are eligible to petition for citizenship
                        through neutralization of Latvia after five years of residence in Latvia with a PR card. 
                        <br>
                        For citizenship of Latvia the PR Card holders must meet following requirements:
                        <br>
                        ⦁ The candidates must supply information on their residence over the previous five years.
                        <br>
                        ⦁ The applicants must demonstrate a specific level of fluency in Latvian, knowledge of the
                        Latvian Constitution, knowledge of the national anthem's lyrics, and familiarity with Latvia's
                        history and culture.
                        <br>
                        ⦁ The applicants must demonstrate that their revenue is legal.
                        <br>
                        ⦁ If required by their home country's law, applicants must show that they have officially given
                        up their prior citizenship by presenting an expiration permission. Refugees and stateless people
                        must also show that they do not hold any other citizenship.
                        <br>
                        ⦁ Along with their parents, children under 15 who reside in Latvia with them will receive
                        Latvian citizenship.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="landing-page-our-counsellor">
        <div class="container">
            <div class="row">
                <div class="col-md-12 lpage-our-counsellor-container">
                    <h2 class="lpage-our-counsellor-heading">Speak to our counsellor</h2>
                    <button class="lpage-our-counsellor-button" data-bs-toggle="modal" data-bs-target="#apply_now">Get
                        Expert Counselling</button>
                </div>
            </div>
        </div>
    </section>
</div>

<a id="lpage-back-to-top"><i class="fas fa-angle-up"></i></a>

<!-- apply now Modal -->
<div class="modal fade" id="apply_now" tabindex="-1" aria-labelledby="apply_nowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">

            <div class="col-12 ask-question-form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal-header justify-content-end p-0">
                                <button type="button" class="close common-btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">×</button>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="avtar">
                                        <img src="images/apple-touch-icon.png">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="avtar-title">
                                        <h4 class="common-heading">Univaersity Bureau</h4>
                                        <p> <b>Get Expert Counselling</b></p>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php $form = ActiveForm::begin([
                // 'action' => ['index'],
                'method' => 'post',
                ]); ?>

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
                                            <input type="text" id="appliedcouncilstudent-email" class="form-control"
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
                                            <label class="control-label" for="appliedcouncilstudent-zip_code">Zip
                                                Code</label>
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

                                        <div class="form-group field-appliedcouncilstudent-college_id required">

                                            <input type="hidden" id="appliedcouncilstudent-college_id"
                                                class="form-control" name="AppliedCouncilStudent[college_id]" value="1">

                                            <p class="help-block help-block-error"></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 mt-3">

                                        <div class="form-group field-appliedcouncilstudent-additional_message required">
                                            <label class="control-label"
                                                for="appliedcouncilstudent-additional_message">Additional
                                                Message</label>
                                            <input type="text" id="appliedcouncilstudent-additional_message"
                                                class="form-control" name="AppliedCouncilStudent[additional_message]"
                                                aria-required="true" required>

                                            <p class="help-block help-block-error"></p>
                                        </div>
                                    </div>
                                </div>

                                <br>

                            </div>

                            <button type="submit" class="common-btn w-100 btn-success">Submit</button>

                            <?php ActiveForm::end(); ?>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
