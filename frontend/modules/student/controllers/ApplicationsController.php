<?php

namespace frontend\modules\student\controllers;

use Yii;
use frontend\models\ForStudentApplications;
use frontend\models\ForStudentApplicationsSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use Razorpay\Api\Api;
use frontend\models\ForPaymentHistory;

/**
* This is the class for controller "ApplicationsController".
*/
class ApplicationsController extends \frontend\modules\student\controllers\base\ApplicationsController
{
    public $api_key = 'rzp_test_UkVmyXlRNwy30V';
    public $api_secret = 'DTC6d2IBJtI7Ry36IN98OT4T';

    public function actionIndex() {
        $this->layout = 'inner';

        $searchModel  = new ForStudentApplicationsSearch;
        $dataProvider = $searchModel->search($_GET);
        $dataProvider2 = $searchModel->search2($_GET);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dataProvider2' => $dataProvider2,
            'searchModel' => $searchModel,
        ]);
    }

    /**
    * Displays a single ForStudentApplications model.
    * @param integer $id
    *
    * @return mixed
    */
    public function actionView($id) {
        $this->layout = 'inner';

        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
        'model' => $this->findModel($id),
        ]);
    }

    public function actionPaymentSuccess() {
        if( !empty($_POST['razorpay_payment_id']) ){
            $razorpay_payment_id = $_POST['razorpay_payment_id'];
            $amount = $_POST['totalAmount'];
            $application_id  = $_POST['application_id'];
            $payment_type  = $_POST['type'];

            if($_POST['type'] == 'application_fee'){                
                \Yii::$app->db->createCommand()
                ->update('for_student_applications', [
                    'application_fee_status' => ForStudentApplications::STATUS_APP_FEE_PAID,
                    'payment_date' => time()
                ], "id = $application_id")
                ->execute();
            } elseif($_POST['type'] == 'visa_fee'){
                \Yii::$app->db->createCommand()
                ->update('for_student_applications', [
                    'visa_fee_status' => ForStudentApplications::STATUS_VISA_FEE_PAID,
                    'payment_date' => time()
                ], "id = $application_id")
                ->execute();
            }

            $applied = ForStudentApplications::findOne(['id' => $application_id]);
            $student_id = $applied->student_id;
            $student = \frontend\models\ForStudents::findOne(['id' => $student_id]);
            $student_name = $student->first_name . ' ' . $student->last_name;

            $college_id = $applied->college_id;
            $college = \common\models\School::findOne(['id' => $college_id]);

            $course_id = $applied->course_id;
            $course = \common\models\Course::findOne(['id' => $course_id]);

            $api = new Api($this->api_key, $this->api_secret);
            $payment = $api->payment->fetch($razorpay_payment_id);
            
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
                'amount' => $amount,
                'currency' => $currency,
                'payment_method' => $payment_method,
                'payment_date' => time(),
                'payment_type' => $payment_type,
                'status' => 1
            ];

            
            $paymentModel = new ForPaymentHistory();
            $paymentModel->setAttributes($data, false);             
            $paymentModel->save(false);

            $arr = ['msg' => 'Payment successfully credited', 'status' => true];            
            echo json_encode($arr);  
        }
    }
}
