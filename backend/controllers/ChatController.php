<?php
namespace backend\controllers;
use Yii;
use common\models\Chat;
use common\models\ChatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
/**
 * ChatController implements the CRUD actions for Chat model.
 */
class ChatController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /* public function actionTelecmi(){
        return $this->render('telecmi');
    } */

    /**
     * Lists all Chat models.
     *
     * @return string
     */
    public function actionChats()
    {
        $users=\common\models\User::find()->all();
        $query = \common\models\Notification::find()->where(['module'=>'chat'])->one();
        if($query){
            $this->redirect(['allchat','id'=>$query->receiver_id]);
        }else{
            echo "No any chat found";die;
        }
        return $this->render('allchat', [
            'users' => $users
        ]);
    }

    public function actionIndex()
    {
        $searchModel = new ChatSearch();

        $query = \common\models\Chat::find()->select(['to_user_id'])->distinct();
            $dataProvider = new ActiveDataProvider([
                'query' => $query
            ]);
        //$dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionShowchat($to,$from)
    {
        $to_user_id= $to;
        $from_user_id=$from;
        $getchat=yii::$app->db->createCommand("select * from chat where from_user_id=".$from_user_id." and to_user_id=".$to_user_id." OR from_user_id=".$to_user_id." and to_user_id=".$from_user_id." order by chatid asc")
        ->queryAll(); 
        return $this->render('show_chat', ['getchat' => $getchat,'from_user_id'=>$from_user_id,'to_user_id'=>$to_user_id]);
    }

    public function actionAllchat($id)
    {
        $model = new Chat();
        $users=\common\models\User::find()->all();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'chatid' => $model->chatid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('allchat', [
            'users' => $users,
            'id' => $id,
        ]);
    }

    /* rm chat */
     public function actionShowrmchat($id)
     {
         $query = \common\models\Notification::find()->where(['created_by_id'=>$id])->one();
         $receiver_id= $query->receiver_id;
         $model = new Chat();
 
         if ($this->request->isPost) {
             if ($model->load($this->request->post()) && $model->save()) {
                 return $this->redirect(['view', 'chatid' => $model->chatid]);
             }
         } else {
             $model->loadDefaultValues();
         }
 
         return $this->render('chatapplication', [
             'model' => $model,
             'id' => $receiver_id,
         ]);
     }
    /* rm chat end */
    
     
     public function actionShowapplicationchat()
     {
         $searchModel = new ChatSearch();
         $Userapplication=\common\models\User::find()->where(['username'=>'Litika'])->one();
         $this->redirect(['showapplicationchatroom','id'=>$Userapplication->id]);
     }

     public function actionShowapplicationchatroom($id)
     {
        $query = \common\models\Notification::find()->where(['created_by_id'=>$id])->one();
        $this->redirect(['chatapplication','id'=>$query->receiver_id]);
     }

   
     public function actionChatapplication($id)
     {
         $model = new Chat();
 
         if ($this->request->isPost) {
             if ($model->load($this->request->post()) && $model->save()) {
                 return $this->redirect(['view', 'chatid' => $model->chatid]);
             }
         } else {
             $model->loadDefaultValues();
         }
 
         return $this->render('chatapplication', [
             'model' => $model,
             'id' => $id,
         ]);
     }

    

    /**
     * Displays a single Chat model.
     * @param int $chatid Chatid
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($chatid)
    {
        return $this->render('view', [
            'model' => $this->findModel($chatid),
        ]);
    }

    /**
     * Creates a new Chat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function beforeAction($action) 
{ 
    $this->enableCsrfValidation = false; 
    return parent::beforeAction($action); 
}

    
    public function actionCreate($id)
    {
        $model = new Chat();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'chatid' => $model->chatid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    
    public function actionSend_message()
    {
        
        $model = new Chat();
        $userid=$_POST['userid'];
        $msg=$_POST['msg'];
        $model->message=$_POST['msg'];
        $model->from_user_id=Yii::$app->user->identity->id;
        $model->to_user_id=$_POST['userid']; 
        $model->status=1; 
        // $model->chat_date=date('Y-m-d H:i:s');
        $model->save(false);
        $notification=new \common\models\Notification();
        $notification->created_by='Application ('.Yii::$app->user->identity->username.')';
        $notification->created_at=date('Y-m-d');
        $notification->module='chat';
        $notification->name=$model->message;
        $notification->created_by_id=$model->to_user_id; //primary key
        $notification->receiver_id=Yii::$app->user->identity->id;
        $notification->save(false);
    }

    public function actionFetch_chat()
    {
        $to_user_id= $_POST['id'];
        $from_user_id=Yii::$app->user->identity->id;
        $getchat=yii::$app->db->createCommand("select * from chat where from_user_id=".$from_user_id." and to_user_id=".$to_user_id." OR from_user_id=".$to_user_id." and to_user_id=".$from_user_id." order by chatid asc")
        ->queryAll(); 
        return $this->renderAjax('chat_fetch', ['getchat' => $getchat,'from_user_id'=>$from_user_id,'to_user_id'=>$to_user_id]);
    }

    public function actionFetch_chat_header()
    {
        $to_user_id= $_POST['id'];
        $from_user_id=Yii::$app->user->identity->id;
        $getchat=yii::$app->db->createCommand("select * from chat where from_user_id=".$from_user_id." and to_user_id=".$to_user_id." OR from_user_id=".$to_user_id." and to_user_id=".$from_user_id." order by chatid asc")
        ->queryAll(); 
        foreach($getchat as $row){
            if($row['from_user_id'] == $from_user_id){
                $username='<b class="text-success">You</b>';
            }else{
                $usernames=\common\models\User::findOne($row['from_user_id']);
                $username='<b class="text-danger">'.$usernames['username'].'</b>';
            }

            echo $username;

        } 
    }

    /**
     * Updates an existing Chat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $chatid Chatid
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($chatid)
    {
        $model = $this->findModel($chatid);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'chatid' => $model->chatid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Chat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $chatid Chatid
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($chatid)
    {
        $this->findModel($chatid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Chat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $chatid Chatid
     * @return Chat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($chatid)
    {
        if (($model = Chat::findOne(['chatid' => $chatid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
