<style>
table {
  width: 100%;
}
table, th, td {
  border: 1px solid;
}
</style>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Unique ID</th>
            <th>Name</th>
            <th>Country</th>
            <th>RM Name</th>
            <th>Intake</th>
            <th>Level</th>
            <th>Application Status</th>
            <th>Created Date</th>
           
        </tr>
    </thead>
    <tbody>
        <?php 
        $i=0;
        foreach($model as $student){
            $country_of_interest=\common\models\Country::findOne($student->country_of_interest);
            $LevelEducation=\common\models\LevelEducation::find()->where(['country_id' => $student->country_of_education])->one();
            $LeadStatuses=\common\models\LeadStatuses::findOne($student->lead_status);
            $rmName=\common\models\User::findOne($student->rm_id);
            $i++;?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $student->ID?></td>
            <td><?php echo $student->first_name.' '.$student->last_name?></td>
            <td><?php echo ($country_of_interest->name)?$country_of_interest->name:'N/A'?></td>
            <td><?php 
                if(!empty($rmName->username)){
                   echo $rmName->username .' ('.$rmName->email.')';
                }else{
                    echo 'N/A';
                }?></td>
            <td><?php echo ($student->intake)?date('d-m-Y',strtotime($student->intake)):'N/A'?></td>
            <td><?php echo ($LevelEducation->edu_name)?$LevelEducation->edu_name:'N/A'?></td>
            <td><?php echo ($LeadStatuses->name)?$LeadStatuses->name:'New'?></td>
            <td><?php echo date('d-m-Y',strtotime($student->created_date))?></td>
        </tr>
        <?php }?>
    </tbody>
</table>