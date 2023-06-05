<?php
  use yii\helpers\Url;
  use frontend\components\CounterArchiveWidget;
  
 
?>




<!-- search colleges page--------------------------------------------------------------------------------->

<section class="banner-menu mob-inner-height">
  <div class="bg-video-wrap">
    <img src="images/university-detail-banner.png" alt="banner-img" class="desktop-view-only w-100">
    <img src="images/mob-recruiters-banner.jpg" alt="banner-img" class="mob-view-only w-100">
    <div class="container banner-caption mob-inner-caption">
      <div class="banner-text mb-3">
        <h2>Search Program / Colleges</h2>
        <p>Search your dream College and Program to secure your bright future</p>
      </div>
      <a href="<?=URL::to('recruiter')?>" class="banner-btn">View Openings</a>
    </div>
  </div>
</section>

<section class="search-page-search-box">
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-3 mb-3">
        <h2 class="common-heading">Search Your <span class="search-font">Dream College / Universities</span></h2>
          <div class="input-group job-list-search-box">
            <input type="search" class="form-control job-list-search-input" placeholder="Search colleges fess, courses and more..." aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn job-list-search-button">Search</button>
          </div>
        </div>
    </div>
    </div>
</section>

<section class="search-result-grid-box mt-5 mb-5">
  <div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="filter-container">
      <div class="accordion" id="filter-accordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Selected Filters
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#filter-accordion">
            <div class="accordion-body">
                1
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Stream
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#filter-accordion">
            <div class="accordion-body">

            <!-- stream checkbox list ----------------------------------------->

              <div class="stream-filter-container">
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <br>
                  <ul class="list-group" id="myList">
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Management
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Engineering 
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Science
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Arts
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Commerce
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Computer
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Education
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Medical
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Pharmacy
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Paramedical
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Mass Communications 
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Law
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Vocational Courses
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Design
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Hotel Management
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Agriculture
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Architecture
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Animation
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Dental
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Aviation
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                              Veterinary Sciences
                              </label>
                          </div>
                      </li>
                  </ul>
              </div>

            <!-- stream checkbox list ----------------------------------------->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
              State
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#filter-accordion">
            <div class="accordion-body">

            <!-- state checkbox list ----------------------------------------->

              <div class="stream-filter-container">
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <br>
                  <ul class="list-group" id="myList">
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Alberta
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  British Columbia
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Manitoba
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  New Brunswick
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Newfoundland and Labrador
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Northwest Territories
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Nova Scotia
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Nunavut
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Ontario
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Prince Edward Island
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Quebec
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Saskatchewan
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Yukon
                              </label>
                          </div>
                      </li>
                  </ul>
              </div>

            <!-- state checkbox list -------------------------------------->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading5">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
              Sub Stream
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#filter-accordion">
            <div class="accordion-body">

            <!-- sub stream checkbox list ----------------------------------------->

            
              <div class="stream-filter-container">
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <br>
                  <ul class="list-group" id="myList">
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Sub-Stream
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Sub-Stream
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Sub-Stream
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Sub-Stream
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Sub-Stream
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Sub-Stream
                              </label>
                          </div>
                      </li>
                  </ul>
              </div>


            <!-- sub stream checkbox list ----------------------------------------->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading6">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
              city
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#filter-accordion">
            <div class="accordion-body">

            <!-- cities checkbox list ----------------------------------------->

              <div class="stream-filter-container">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <ul class="list-group" id="myList">
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Banff
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Brooks
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Calgary
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Edmonton
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Jasper
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Lethbridge
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Hope
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Kamloops
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Kelowna
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Kimberley
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Kitimat
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Langley
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Nanaimo
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Nelson
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
              </div>

            <!-- cities checkbox list ----------------------------------------->


          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading7">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
              Course
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#filter-accordion">
            <div class="accordion-body">
                
            <!-- Courses checkbox list ----------------------------------------->

              <div class="stream-filter-container">
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <br>
                  <ul class="list-group" id="myList">
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  B.Sc
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  B.Com
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  BE/B.Tech
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  BA
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  BBA/BBM
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  M.Sc
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  ME/M.Tech
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  MCA
                              </label>
                          </div>
                      </li>
                  </ul>
              </div>
            
            <!-- Courses checkbox list ----------------------------------------->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading8">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
              Program Type
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#filter-accordion">
            <div class="accordion-body">
                          
            <!-- Program-type checkbox list ----------------------------------------->

              <div class="stream-filter-container">
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <br>
                  <ul class="list-group" id="myList">
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Full Time
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Part Time
                              </label>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  Distance
                              </label>
                          </div>
                      </li>
                  </ul>
              </div>
                          
            <!-- Program-type checkbox list ----------------------------------------->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading9">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
              Types Of College
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#filter-accordion">
            <div class="accordion-body">
              
            <!-- types of college checkbox list ----------------------------------------->

            <div class="stream-filter-container">
              <input class="form-control" id="myInput" type="text" placeholder="Search..">
              <br>
              <ul class="list-group" id="myList">
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Government
                    </label>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Private
                    </label>
                  </div>
                </li>
              </ul>
            </div>

            <!-- types of college checkbox list ----------------------------------------->


            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading10">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
              Entrance/Exam Accepted
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#filter-accordion">
            <div class="accordion-body">

            <!-- Entrance/Exam checkbox list ----------------------------------------->

            <div class="stream-filter-container">
              <input class="form-control" id="myInput" type="text" placeholder="Search..">
              <br>
              <ul class="list-group" id="myList">
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      GATE
                    </label>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      CAT
                    </label>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      MAT
                    </label>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      CMAT
                    </label>
                  </div>
                </li>
              </ul>
            </div>

            <!-- Entrance/Exam checkbox list ----------------------------------------->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading11">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
              Avg Fee PEr Year (In Rupees)
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#filter-accordion">
            <div class="accordion-body">

            <!-- Avg Fee checkbox list ----------------------------------------->

            <div class="stream-filter-container">
              <input class="form-control" id="myInput" type="text" placeholder="Search..">
              <br>
              <ul class="list-group" id="myList">
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      0 - 25K
                    </label>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      25 - 50K
                    </label>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      50 - 75K
                    </label>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      75K - 1L
                    </label>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      1 - 2L
                    </label>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      ABOVE 2L
                    </label>
                  </div>
                </li>
              </ul>
            </div>


            <!-- Avg Fee checkbox list ----------------------------------------->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading12">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
              Course Type
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#filter-accordion">
            <div class="accordion-body">

                <!-- Course Type checkbox list ----------------------------------------->

                <div class="stream-filter-container">
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <br>
                  <ul class="list-group" id="myList">
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Degree
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Diploma
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Certification
                        </label>
                      </div>
                    </li>
                  </ul>
                </div>

                <!-- Course Type checkbox list ----------------------------------------->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading13">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
              Agency
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#filter-accordion">
            <div class="accordion-body">

                <!--  Agency checkbox list ----------------------------------------->

        

                <!--  Agency checkbox list ----------------------------------------->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading14">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
              Affliation
              <i class="fas fa-angle-down"></i>
            </button>
          </h2>
          <div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14" data-bs-parent="#filter-accordion">
            <div class="accordion-body">
                14
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="row mb-5">
        <div class="col-md-4">
                  <div class="card">
                    <div class="media media-2x1 gd-primary">
                        <img class="blog-image" src="images/blog-1.jpg">
                        <div class="college-title">
                            <label>University of California, Irvine</label>
                            <small>English as a second language</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 bdr-right">
                                <label>$ 4,500.00</label>
                                <small>Tuition Fees</small>
                            </div>
                            <div class="col-md-6">
                                <label>$ 200.00</label>
                                <small>Application Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                                <p><i class="fas fa-map-marker-alt"></i> Irvine, California</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="common-circle-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
        <div class="col-md-4">
                  <div class="card">
                    <div class="media media-2x1 gd-primary">
                        <img class="blog-image" src="images/blog-1.jpg">
                        <div class="college-title">
                            <label>University of California, Irvine</label>
                            <small>English as a second language</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 bdr-right">
                                <label>$ 4,500.00</label>
                                <small>Tuition Fees</small>
                            </div>
                            <div class="col-md-6">
                                <label>$ 200.00</label>
                                <small>Application Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                                <p><i class="fas fa-map-marker-alt"></i> Irvine, California</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="common-circle-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
        <div class="col-md-4">
                  <div class="card">
                    <div class="media media-2x1 gd-primary">
                        <img class="blog-image" src="images/blog-1.jpg">
                        <div class="college-title">
                            <label>University of California, Irvine</label>
                            <small>English as a second language</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 bdr-right">
                                <label>$ 4,500.00</label>
                                <small>Tuition Fees</small>
                            </div>
                            <div class="col-md-6">
                                <label>$ 200.00</label>
                                <small>Application Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                                <p><i class="fas fa-map-marker-alt"></i> Irvine, California</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="common-circle-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-md-4">
                  <div class="card">
                    <div class="media media-2x1 gd-primary">
                        <img class="blog-image" src="images/blog-1.jpg">
                        <div class="college-title">
                            <label>University of California, Irvine</label>
                            <small>English as a second language</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 bdr-right">
                                <label>$ 4,500.00</label>
                                <small>Tuition Fees</small>
                            </div>
                            <div class="col-md-6">
                                <label>$ 200.00</label>
                                <small>Application Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                                <p><i class="fas fa-map-marker-alt"></i> Irvine, California</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="common-circle-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
        <div class="col-md-4">
                  <div class="card">
                    <div class="media media-2x1 gd-primary">
                        <img class="blog-image" src="images/blog-1.jpg">
                        <div class="college-title">
                            <label>University of California, Irvine</label>
                            <small>English as a second language</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 bdr-right">
                                <label>$ 4,500.00</label>
                                <small>Tuition Fees</small>
                            </div>
                            <div class="col-md-6">
                                <label>$ 200.00</label>
                                <small>Application Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                                <p><i class="fas fa-map-marker-alt"></i> Irvine, California</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="common-circle-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
        <div class="col-md-4">
                  <div class="card">
                    <div class="media media-2x1 gd-primary">
                        <img class="blog-image" src="images/blog-1.jpg">
                        <div class="college-title">
                            <label>University of California, Irvine</label>
                            <small>English as a second language</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 bdr-right">
                                <label>$ 4,500.00</label>
                                <small>Tuition Fees</small>
                            </div>
                            <div class="col-md-6">
                                <label>$ 200.00</label>
                                <small>Application Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                                <p><i class="fas fa-map-marker-alt"></i> Irvine, California</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="common-circle-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-md-4">
                  <div class="card">
                    <div class="media media-2x1 gd-primary">
                        <img class="blog-image" src="images/blog-1.jpg">
                        <div class="college-title">
                            <label>University of California, Irvine</label>
                            <small>English as a second language</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 bdr-right">
                                <label>$ 4,500.00</label>
                                <small>Tuition Fees</small>
                            </div>
                            <div class="col-md-6">
                                <label>$ 200.00</label>
                                <small>Application Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                                <p><i class="fas fa-map-marker-alt"></i> Irvine, California</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="common-circle-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
        <div class="col-md-4">
                  <div class="card">
                    <div class="media media-2x1 gd-primary">
                        <img class="blog-image" src="images/blog-1.jpg">
                        <div class="college-title">
                            <label>University of California, Irvine</label>
                            <small>English as a second language</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 bdr-right">
                                <label>$ 4,500.00</label>
                                <small>Tuition Fees</small>
                            </div>
                            <div class="col-md-6">
                                <label>$ 200.00</label>
                                <small>Application Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                                <p><i class="fas fa-map-marker-alt"></i> Irvine, California</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="common-circle-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
        <div class="col-md-4">
                  <div class="card">
                    <div class="media media-2x1 gd-primary">
                        <img class="blog-image" src="images/blog-1.jpg">
                        <div class="college-title">
                            <label>University of California, Irvine</label>
                            <small>English as a second language</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 bdr-right">
                                <label>$ 4,500.00</label>
                                <small>Tuition Fees</small>
                            </div>
                            <div class="col-md-6">
                                <label>$ 200.00</label>
                                <small>Application Fees</small>
                            </div>
                            <div class="col-md-12 bdr-top">
                                <p><i class="fas fa-map-marker-alt"></i> Irvine, California</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="common-circle-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
      </div>
    </div>
    <div class="container">
    <div class="row">
      <div class="col-md-12">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link active" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
      </div>
    </div>
    </div>
  </div>
  </div>
</section>

<?= CounterArchiveWidget::widget(); ?> 

<!-- search colleges page ends--------------------------------------------------------------------------------->



