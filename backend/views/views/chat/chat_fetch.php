<?php foreach($getchat as $row){
            if($row['from_user_id'] == $from_user_id){
                $username='<b class="text-success">You</b>';
            }else{
                $usernames=\common\models\User::findOne($row['from_user_id']);
                $username='<b class="text-danger">'.$usernames['username'].'</b>';
            }?>

<div>
    <span style="font-size:10px; position:relative; top:7px; left:15px;"><i>
    <?php echo date('M-d-Y h:i A',strtotime($row['timestamp']));?></i></span>
    <br>
    <span style="font-size:11px; position:relative; top:-2px; left:50px;">
    <strong><?php echo $username;?></strong>: <?php echo $row['message'];?></span>
</div>
<?php }?>