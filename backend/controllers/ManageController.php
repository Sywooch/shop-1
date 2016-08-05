<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:38
 */

namespace backend\controllers;

use Yii;
use backend\models\Admin;
use yii\web\Controller;

class ManageController extends Controller
{
    public $layout = 'layout1';
    public function actionChangeemail(){
        return $this->render('changeemail');
    }

    public function actionChangepass(){
        return $this->render('changepass');
    }

    public function actionMailchangepass(){
        $this->layout = 'layout2';
        $time =Yii::$app->request->get("timestamp");
        $adminuser = Yii::$app->request->get("adminuser");
        $token = Yii::$app->request->get("token");
        $model = new Admin;
        $myToken = $model->createToken($adminuser,$time);
        if ($token!= $myToken){
            $this->redirect('public/login');
            Yii::$app->end();
        }
        if(time() - $time > 300){
            $this->redirect('public/login');
            Yii::$app->end();
        }
        $model->adminuser = $adminuser;
        return $this->render('mailchangepass',['model'=>$model]);
    }

    public function actionManagers(){
        $this->layout = 'layout2';
        return $this->render('managers');
    }

    public function actionReg(){
        return $this->render('reg');
    }

}