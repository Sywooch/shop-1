<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/1
 * Time: 21:21
 */

namespace frontend\controllers;


use yii\web\Controller;

class MemberController extends Controller
{
    public $layout = false;

    /*
     * 创建前台登陆页面
     */
    public function actionAuth(){
        $this->layout = "layout3";
        return $this->render("auth");
    }
}