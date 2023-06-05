<?php

$this->title = 'Create Chat';
$this->params['breadcrumbs'][] = ['label' => 'Chats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-create">

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Chat */
/* @var $form yii\widgets\ActiveForm */
// $chat=\app\common\models\Chat::find()->all();
?>
<div class="row">

	<?php
     $Userapplication=\common\models\User::find()->where(['username'=>'Litika'])->one();
     $query = \common\models\Chat::find()->select(['from_user_id'])->where(['to_user_id'=>$Userapplication->id])->distinct()->all();
    /* $AssignRecuiterRm=\common\models\AssignRecuiterRm::find()->where(['recruiter_id'=>Yii::$app->user->identity->recruiter->id])->one();
        $User=\common\models\User::findOne($AssignRecuiterRm->rm_id);
        $Userapplication=\common\models\User::find()->where(['username'=>'Litika'])->one(); */
    ?>
	<div class="col-md-4" style="background: #f8f9fa;border: 1px solid;    overflow: scroll;height: 402px;">
		<p>
            <?php foreach($users as $user){
                 $query = \common\models\Chat::find()->select(['from_user_id'])->where(['to_user_id'=>$Userapplication->id])->distinct()->all();
                ?>
                <li>
                    <a href="<?=Url::to(['/chat/allchat','id' =>$user->id])?>" style="color: black;
                    text-decoration: none;
                    cursor: pointer;
                    font-weight: bold;"><?php echo $user->username;?></a>
                </li>
            <?php }?>
    </p>


  
	</div>
	<div class="col-lg-8">
		<div class="chat-form">
				<div>
					<div class="panel panel-default" style="height: 400px;border: 1px solid #d1b3b3;">
						<div style="height:10px;"></div>
						<span style="margin-left:10px;">Chat Room</span><br>
						<div style="height:10px;"></div>
						<div id="chat_area" style="margin-left:10px; max-height:320px; overflow-y:scroll;">
						</div>
					</div>
				</div>			
			</div>
	</div>
	<div class="col-lg-1"></div>
</div>