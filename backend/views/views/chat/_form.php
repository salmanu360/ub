<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Chat */
/* @var $form yii\widgets\ActiveForm */
// $chat=\app\common\models\Chat::find()->all();
?>

<div class="chat-form">
<div class="col-lg-12">
			<div>
				<div class="panel panel-default" style="height: 400px;">
					<div style="height:10px;"></div>
					<span style="margin-left:10px;">Welcome to Chatroom</span><br>
					<div style="height:10px;"></div>
					<div id="chat_area" style="margin-left:10px; max-height:320px; overflow-y:scroll;">
					</div>
				</div>
				
				<div class="input-group">
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
			url:url, //fetch_chat
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