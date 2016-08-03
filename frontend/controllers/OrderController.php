<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/1
 * Time: 21:12
 */

namespace frontend\controllers;

use yii\web\Controller;
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

}