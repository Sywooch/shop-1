<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/1
 * Time: 21:12
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Order;
class OrderController extends Controller
{
    public $layout = false;
    /*
     * 前台用户订单中心页面
     */
    public function actionIndex(){
        $this->layout ="layout3";
        return $this->render("index");
    }

    /*
     * 前台收银台页面
     */
    public function actionCheck(){
        $this->layout ="layout2";
        return $this->render("check");
    }

    public function actionAdd(){
        if(Yii::$app->session['isLogin'] !=1){
            return $this->redirect(['member/auth']);
        }
        $transaction = Yii::$app->db->beginTransaction();
        try{
            if(Yii::$app->request->isPost){
                $post = Yii::$app->request->post();
                $order = new Order();
            }
        }catch (\ErrorException $e){

        }
    }

}