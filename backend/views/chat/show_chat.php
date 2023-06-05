<?php 
$formchat=\common\models\User::find()->where(['id'=>$from_user_id])->one();
$tochat=\common\models\User::find()->where(['id'=>$to_user_id])->one();
?>
<div><h2><strong>Chat between <?php echo $formchat->username .'('.$formchat->email.')';?> and <?php echo $tochat->username .'('.$tochat->email.')';?></strong> </h2></div>
<div class="chat-form">
<div class="col-lg-12">
                <div>
                    <div class="panel panel-default" style="height: 400px;">
                        <?php foreach($getchat as $row){
                            $usertable=\common\models\User::find()->where(['id'=>$from_user_id])->one();
                            if($row['from_user_id'] == $from_user_id){
                                $username='<b class="text-success">'.$usertable->username.'</b>';
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
				</div>
			</div>			
		</div>
</div>


