<?php
namespace frontend\modules\recruiter\controllers;
use Yii;
use common\models\Chat;
use common\models\ChatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'logout' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'create', 'fetch_chat'],
                'rules' => [
                    // deny all POST requests
                    /*[
                        'allow' => false,
                        'verbs' => ['POST']
                    ],*/
                    // allow authenticated users
                    [
                        'actions' => ['index', 'create', 'fetch_chat'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all Chat models.
     *
     * @return string
     */
    public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
    }
    public function actionIndex()
    {
        $searchModel = new ChatSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
    public function actionCreate($id)
    {
        $this->layout = 'inner';
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
        error_reporting(0);
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
        $notification->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
        $notification->created_at=date('Y-m-d');
        $notification->module='chat';
        $notification->name=$model->message;
        $notification->created_by_id=$model->to_user_id; //primary key
        $notification->receiver_id=Yii::$app->user->identity->id;
        $notification->save(false);
    }

    public function actionFetch_chat()
    {
        error_reporting(0);
        $to_user_id= $_POST['id'];
        $from_user_id=Yii::$app->user->identity->id;
        $getchat=yii::$app->db->createCommand("select * from chat where from_user_id=".$from_user_id." and to_user_id=".$to_user_id." OR from_user_id=".$to_user_id." and to_user_id=".$from_user_id." order by chatid asc")
        ->queryAll(); 
       return $this->renderAjax('chat_fetch', ['getchat' => $getchat,'from_user_id'=>$from_user_id,'to_user_id'=>$to_user_id]);
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
