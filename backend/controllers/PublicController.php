<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:43
 */

namespace backend\controllers;


use yii\web\Controller;

class PublicController extends Controller
{
    public $layout ="layout2";
    public function actionLogin(){
        return $this->render('login');
    }

    public function actionSeekpassword(){
        return $this->render('seekpassword');
    }
}