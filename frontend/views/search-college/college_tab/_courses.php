  <?php



  ?>




  <!-- courses and fees tab content -->
            
            <div class="tab-pane slide" id="courses" role="tabpanel" aria-labelledby="courses-tab">


               <div class="important-dates-container mt-5 mb-5">
                <table class="table table-bordered important-dates-table">
                  <thead>
                    <tr>
                      <th>Program</th>
                      <th>Tution Fees</th>
                      <th>Application Fees</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach($courses as $course): 

                    $app=$course['application_fee'];
                    $tution=$course['tution_fee'];
                    $prgrm=$course['name'];


                    ?>
                    <tr>
                      <td><?= $prgrm; ?></td>
                      <td><?= $tution; ?></td>
                      <td><?= $app; ?></td>
                    </tr>
                    

                      <?php endforeach; ?>
                    </tbody>
                </table>
                </div>


            </div>
            
            <!-- courses and fees tab content ends-->
            
            