<?php

namespace frontend\modules\student\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\ForStudents;
use common\models\User;
use yii\web\HttpException;

/**
 * Default controller for the `student` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDashboard() {
        $this->layout = 'inner';
        
        return $this->render('dashboard');
    }

    public function actionProfile() {
        $this->layout = 'inner';
        $user_id = Yii::$app->user->identity->id;
      
        $user = $this->findUserModel($user_id);
        $student = $this->findStudentModel($user_id);
        $collegeModel = $this->findCollegeAttendedModel($student->id);
        
        if (Yii::$app->request->isPost) {            
            if( $student->load(Yii::$app->request->post()) && $collegeModel->load(Yii::$app->request->post()) ) {                
                $user->email = $_POST['User']['email'];
                $user->username = $_POST['User']['email'];
                if(!empty($student->study_permit)){
                    $study_permit = implode(',', $student->study_permit);
                }

                $collegeModel->setAttribute('student_id', $student->id);
                $student->setAttribute('study_permit', $study_permit);                
                $student->setAttribute('upload_document', $student->uploadDocuments());                
                
                if($student->save(false)){
                    $collegeModel->save(false);
                    $user->save(false);
                    Yii::$app->session->setFlash('success', "Profile updated successfully!");
                } 
                
            }else{
                Yii::$app->session->setFlash('error', 'Error in data saving'); 
            }           
        }

        return $this->render('profile', [
            'model' => $student,
            'user' => $user,
            'collegeModel' => $collegeModel
        ]);
    }

    public function actionSetting() {
        $this->layout = 'inner';

        if (Yii::$app->request->isPost) { 
            $id = Yii::$app->request->post('user_id');
            $user = $this->findUserModel($id);  
            
            if(!empty(Yii::$app->request->post('new_password'))){                
                
                $current_pass = Yii::$app->request->post('current_password');
                $hash = $user->password_hash;               

                if(!password_verify($current_pass, $hash)){
                    Yii::$app->session->setFlash('error', 'Incorrect current password');
                } else {
                    if( Yii::$app->request->post('new_password') !==  Yii::$app->request->post('confirm_password')){
                        Yii::$app->session->setFlash('error', 'Password doesn\'t match.'); 
                    } else {
                        $new_password = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('new_password'));
                        $user->password_hash = $new_password;
                        if($user->save()){
                            Yii::$app->session->setFlash('success', 'Password changed successfully');
                        }
                    }
                }                
            }
            
            if(!empty( $_FILES['profile_pic']['name'] ) ) {
                $profile_pic = $user->upload_profile_pic();               
                $row = Yii::$app->db->createCommand()->update('user', ['profile_pic' => $profile_pic], 'id = '.$id)->execute();
                
                if($row > 0){
                    Yii::$app->session->setFlash('success', 'Settings updated successfully');
                } else {
                    Yii::$app->session->setFlash('error', 'Profile pic can not upload'); 
                }
            }
        }

        return $this->render('setting');    
    }    

    protected function findUserModel($id)
	{
		if (($model = User::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}

    protected function findStudentModel($id)
	{
		if (($model = ForStudents::findOne(['user_id' => $id])) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}

    protected function findCollegeAttendedModel($id)
	{
		if (($model = \frontend\models\ForSchoolAttendedDetail::findOne(['student_id' => $id])) !== null) {
			return $model;
		} else {
			return $model = new \frontend\models\ForSchoolAttendedDetail();
            //throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
