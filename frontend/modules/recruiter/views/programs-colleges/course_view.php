
 <main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">
              <div class="row">

                <div class="col-md-12">
                    <div class="dashboard-card mb-5">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>College</th>
                            <th>Program Description</th>
                            <th>Duration</th>
                            <th>Intake</th>
                            <th>Tution Fee</th>
                            <th>Application Fee</th>
                            <th>Entry Requirement</th>
                        </tr>
                        <td><?php echo $model->id?></td>
                        <td><?php echo $model->college->name;?></td>
                        <td><?php echo $model->name?></td>
                        <td><?php echo $model->comment?></td>
                        <td><?php echo $model->discount?></td>
                        <td><?php echo date('M Y',strtotime($model['intake']))?></td>
                         <td><?php echo $model->tution_fee?></td>
                         <td><?php echo $model->application_fee?></td>
                         <td><?php echo $model->entry_requirement?></td>
                         
                    </table>
                    </div>
                    </div>
                    </div>
</main>