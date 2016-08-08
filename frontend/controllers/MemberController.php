<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/1
 * Time: 21:21
 */

namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\web\Controller;

class MemberController extends Controller
{
    public $layout = false;

    /*
     * 创建前台登陆页面
     */
    public function actionAuth(){
        $this->layout = "layout3";
        if(Yii::$app->request->isGet){
            $url = Yii::$app->request->referrer;
            if(empty($url)){
                $url = '/';
            }
            Yii::$app->session->setFlash('referrer',$url);
        }
        $model = new User();
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->login($post)){
                $url = Yii::$app->session->getFlash('referrer');
                return $this->redirect($url);
            }
        }
        return $this->render("auth",['model'=>$model]);
    }
    public function actionReg(){
        $model = new User;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->regByMail($post)) {
                Yii::$app->session->setFlash('info', '电子邮件发送成功');
            }
        }
        $this->layout = 'layout2';
        return $this->render('auth', ['model' => $model]);
    }
    public function actionQqlogin()
    {
        require_once("../../vendor/qqlogin/API/qqConnectAPI.php");
        $qc = new \QC();
        $qc->qq_login();
    }
}