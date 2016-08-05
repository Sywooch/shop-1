<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:43
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Admin;
class PublicController extends Controller
{
    public $layout ="layout2";
    public function actionLogin(){
        $model = new Admin;
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->login($post)){
                $this->redirect(['default/index']);
                Yii::$app->end();
            }
        }
        return $this->render("login",['model' => $model]);
    }

    public function actionSeekpassword(){
        $model = new Admin;
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->seekPass($post)){
                Yii::$app->session->setFlash('info','电子邮件发送成功，请查收');
            }
        }
        return $this->render('seekpassword',['model'=>$model]);
    }
    public function actionLogout(){
        Yii::$app->session->removeAll();
        if(!isset(Yii::$app->session['admin']['isLogin'])){
            $this->redirect(['public/login']);
            Yii::$app->end();
        }else{
            $this->goBack();
        }
    }

}