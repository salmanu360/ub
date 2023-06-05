<?php

use common\models\School;  
use common\models\SchoolImage;
 $image = SchoolImage::find()->where(['school_id'=>$model->id])->asArray()->one();


?>

   <!-- home tab content -->

            <div class="tab-pane slide show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h2 class="common-heading">Why Study at <span><?= $model->name; ?> 
              </span> ?</h2>
                <ul class="home-tab-list">

                  <li class="home-tab-list-item">
                    
                    <p>Collges at Canada and USA attracts students from all over the world because of its welcoming professors, career-focused curricula, and incomparable location.</p>
                  </li>
                  <li class="home-tab-list-item">
                    <p>The College's certificate and diploma programs are designed to provide you with the skills and attributes that employers want. Whether you desire to work in hospitality management, international business, or healthcare, College has the ideal curriculum.</p>
                  </li>
                  <li class="home-tab-list-item">
                    <p>The College's ultra-modern classrooms inspire study, while the campus's delicious café and rooftop patio are ideal locations to unwind after class.
					           </p>
                  </li>
                  <li class="home-tab-list-item">
                    <p>The student activity center staff organizes a plethora of free social activities, ensuring that you never run out of things to do or people to meet. Join one of the many student groups, go out to local pubs, or take a trip to a tourist area.</p>
                  </li>
                  <li class="home-tab-list-item">
                    <ul class="p-0">
                    <h4><b>Benefits of attending College?</b></h4>
                    	<li>Part-time employmen 
                    		<p>For overseas students, there are several on-campus and off-campus career options. </p>		
                      </li>
                    	<li>Industry-relevant programs	
                    		<p>Leading firms and organizations contribute to the development of programs. </p>	
                      </li>
                    	<li>Fantastic city	
                    		<p>You will find most vibrant and culturally diverse cities. </p>	
                      </li>
                    </ul>
                  </li>

                  <li class="home-tab-list-item">
                    <ul class="p-0">
                      <h4><b>What it's like to be an international student</b></h4>

                      <li><p>As a international student, you will be a member of a vibrant and varied academic community. You'll be in classes with students from all backgrounds and cultures, which will assist in broadening your education.</p></li>

                      <li><p>Consider engaging in the College's homestay program to immerse yourself in Canadian culture. Living with a local family is an excellent opportunity to improve your language abilities while broadening your perspectives. </p></li>


                      <li><p>A complimentary airport pick-up service is also provided to all homestay students.
                      </p></li>
                    </ul>
                  </li>


                </ul>

               

                <!-- important dates section -->

                

            <!-- important dates section ends-->

            </div>

            <!-- home tab content ends-->