<?php

namespace frontend\modules\recruiter\controllers;

use Yii;
use common\models\StudentCollegeApplied;
use frontend\models\StudentApplication;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use Razorpay\Api\Api;
use common\models\PaymentHistory;
use yii\data\ActiveDataProvider;

/**
* This is the class for controller "StudentApplicationController".
*/
class StudentApplicationController extends \frontend\modules\recruiter\controllers\base\StudentApplicationController
{
    public $api_key = 'rzp_test_UkVmyXlRNwy30V';
    public $api_secret = 'DTC6d2IBJtI7Ry36IN98OT4T';
    
    public function actionIndex(){
        $this->layout = 'inner';

        $searchModel  = new StudentApplication;
        $dataProvider = $searchModel->search($_GET);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
        'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id){
        $this->layout = 'inner';

        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
        'model' => $this->findModel($id),
        ]);
    }

    public function actionPayment(){
        $this->layout = 'inner';

        $api = new Api($this->api_key, $this->api_secret);

        $query = $api->payment->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('payment', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPaymentResponse() {
        $api = new Api($this->api_key, $this->api_secret);
        echo "<pre>";
        var_dump($api->payment->fetch('pay_JXUaBHVvcQBQhY'));
        //var_dump($api->payment->all());
        die();
    }

    public function actionPaymentSuccess() {
        if( !empty($_POST['razorpay_payment_id']) ){
            $razorpay_payment_id = $_POST['razorpay_payment_id'];
            $amount = $_POST['totalAmount'];
            $application_id  = $_POST['application_id'];
            $payment_type  = $_POST['type'];

            if($_POST['type'] == 'application_fee'){
                Yii::$app->db->createCommand()
                ->update('student_school_applied', [
                    'application_fee_status' => StudentCollegeApplied::STATUS_APP_FEE_PAID,
                    'payment_date' => time()
                ], "id = $application_id")
                ->execute();
            } elseif($_POST['type'] == 'visa_fee'){
                Yii::$app->db->createCommand()
                ->update('student_school_applied', [
                    'visa_fee_status' => StudentCollegeApplied::STATUS_VISA_FEE_PAID,
                    'payment_date' => time()
                ], "id = $application_id")
                ->execute();
            }

            $applied = StudentCollegeApplied::findOne(['id' => $application_id]);
            $student_id = $applied->student_id;
            $student = \common\models\Student::findOne(['ID' => $student_id]);
            $student_name = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;

            $college_id = $applied->college_id;
            $college = \common\models\School::findOne(['id' => $college_id]);

            $course_id = $applied->course_id;
            $course = \common\models\Course::findOne(['id' => $course_id]);

            $recruiter_id = $applied->recruiter_id;
            $recruiter = \common\models\Recruiters::findOne(['id' => $recruiter_id]);
            $recruiter_name = $recruiter->owner_first_name . ' ' . $recruiter->owner_last_name;

            $api = new Api($this->api_key, $this->api_secret);
            $payment = $api->payment->fetch($razorpay_payment_id);

            /* var_dump($payment);
            die(); */
            
            $amount = $payment->amount;  // done
            $currency = $payment->currency;  // done
            $payment_method = $payment->method;  // done

            $data = [
                'application_id' => $application_id,
                'razorpay_payment_id' => $razorpay_payment_id,
                'student_id' => $student_id,
                'student' => $student_name,
                'course_id' => $course_id,
                'course' => $course->name,
                'college_id' => $college_id,
                'college' => $college->name,
                'recruiter_id' => $recruiter_id,
                'recruiter' => $recruiter_name,
                'amount' => $amount,
                'currency' => $currency,
                'payment_method' => $payment_method,
                'payment_date' => time(),
                'payment_type' => $payment_type,
                'status' => 1
            ];

            
            $paymentModel = new PaymentHistory();
            $paymentModel->setAttributes($data, false);
            /* var_dump($paymentModel->validate());
            var_dump($paymentModel->getErrors());
            die(); */
            $paymentModel->save(false);

            $arr = ['msg' => 'Payment successfully credited', 'status' => true];            
            echo json_encode($arr);  
        }
    }

}
