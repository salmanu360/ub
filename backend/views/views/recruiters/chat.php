<?php
            echo \sintret\chat\ChatRoom::widget([
                    'url' => \yii\helpers\Url::to(['/chat/send-chat']),
                    'userModel'=>  \app\modules\user\models\User::className(),
                    'userField'=>'avatarImage'
                ]
            );
            ?>