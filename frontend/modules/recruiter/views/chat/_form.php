<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Chat */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">

	<?php $AssignRecuiterRm=\common\models\AssignRecuiterRm::find()->where(['recruiter_id'=>Yii::$app->user->identity->recruiter->id])->one();
        $User=\common\models\User::findOne($AssignRecuiterRm->rm_id);
        $Userapplication=\common\models\User::find()->where(['username'=>'Litika'])->one();
    ?>
	<div class="col-md-4" style="background: #f8f9fa;border: 1px solid;">
		<p><li><a href="<?=Url::to(['/recruiter/chat/create','id' =>1])?>" style="color: black;
    text-decoration: none;
    cursor: pointer;
    font-weight: bold;">Chat with admin</a></li></p>
		<p><li><a href="<?=Url::to(['/recruiter/chat/create','id' =>$User->id])?>" style="color: black;
    text-decoration: none;
    cursor: pointer;
    font-weight: bold;">Chat with RM <?php echo $User->username.' ('.$User->email.')';?></a></li></p>


    <p><li><a href="<?=Url::to(['/recruiter/chat/create','id' =>$Userapplication->id])?>" style="color: black;
    text-decoration: none;
    cursor: pointer;
    font-weight: bold;">Chat with Application Team <?php echo $Userapplication->username;?></a></li></p>
	</div>
	<div class="col-lg-8">
		<div class="chat-form">
				<div>
					<div class="panel panel-default" style="height: 400px;border: 1px solid #d1b3b3;">
						<div style="height:10px;"></div>
						<span style="margin-left:10px;">Welcome to Chatroom</span><br>
						<div style="height:10px;"></div>
						<div id="chat_area" style="margin-left:10px; max-height:320px; overflow-y:scroll;">
						</div>
					</div>

					<div class="input-group" style="border: 1px solid #d1b3b3;">
						<input type="text" class="form-control" placeholder="Type message..." id="chat_msg">
						<input type="hidden" data-url="<?= Url::to(['fetch_chat'])?>" value="<?php echo $id; ?>"  id="user_id_get">
						<span class="input-group-btn">
						<button class="btn btn-success" type="submit" id="send_msg" data-url="<?= Url::to(['send_message'])?>" value="<?php echo $id; ?>">
						<span class="glyphicon glyphicon-comment"></span> Send
						</button>
						</span>
					</div>
					
				</div>			
			</div>
	</div>
</div>
<?php
$script= <<< JS
$(document).ready(function(){
  displayChat();
  setTimeout(function(){
  	displayChat()}, 5000
  	);
$(document).on('click', '#send_msg', function(){
    var url=$(this).data('url');
			userid = $(this).val();
			if($('#chat_msg').val() == ""){
				alert('Please write message first');
			}else{
				var msg = $('#chat_msg').val();
				$.ajax({
					type: "POST",
					url: url,
					data: {
						msg: msg,
						userid: userid,
					},
					success: function(){
						$('#chat_msg').val("");
						displayChat();
					}
				});
			}	
		});

        $(document).keypress(function(e){
			if (e.which == 13){
			$("#send_msg").click();
			}
		});

   function displayChat(){
		var id = $('#user_id_get').val();
    var url=$('#user_id_get').data('url');
		$.ajax({
			url:url,
			type: 'POST',
			async: false,
			data:{
				id: id,
				fetch: 1,
			},
			success: function(response){
				$('#chat_area').html(response);
				$("#chat_area").scrollTop($("#chat_area")[0].scrollHeight);
				setTimeout(function(){ displayChat() }, 5000);
			}
		});
	}
});
JS;
$this->registerJs($script);
?>