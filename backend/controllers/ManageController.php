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
        $model = Admin::find()->where('adminuser = :user',[':user'=>Yii::$app->session['admin']['adminuser']])->one();
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->changeEmail($post)){
                Yii::$app->session->setFlash('info','修改成功');
            }
        }
        return $this->render('changeemail',['model'=>$model]);
    }

    public function actionChangepass(){
        $model = Admin::find()->where('adminuser = :user',[':user'=>Yii::$app->session['admin']['adminuser']])->one();
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->changePass($post)){
                Yii::$app->session->setFlash('info','修改成功');
            }
        }
        $model->adminpass = '';
        $model->repass = '';
        return $this->render('changepass',['model'=>$model]);
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
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->changePass($post)){
                Yii::$app->session->setFlash('info','密码修改成功');
            }
        }
        $model->adminuser = $adminuser;
        return $this->render('mailchangepass',['model'=>$model]);
    }

    public function actionManagers(){
        $managers = Admin::find()->all();
        return $this->render('managers',['managers'=>$managers]);
    }

    public function actionReg(){
        $model = new Admin();
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->reg($post)){
                Yii::$app->session->setFlash('info','添加成功');
            }else{
                Yii::$app->session->setFlash('info','添加失败');
            }
        }
        $model->adminpass = '';
        $model->repass = '';
        return $this->render('reg',['model'=>$model]);
    }

    public function actionDel(){
        $adminid = (int)Yii::$app->request->get('adminid');
        if(empty($adminid)){
            $this->redirect(['manage/managers']);
        }
        $model = new Admin();
        if($model->deleteAll('adminid = :id',[':id'=>$adminid])){
            Yii::$app->session->setFlash('info','删除成功');
            $this->redirect(['manage/managers']);
        }
    }

}