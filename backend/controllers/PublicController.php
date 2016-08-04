<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:43
 */

namespace backend\controllers;


use yii\web\Controller;
use backend\models\Admin;
class PublicController extends Controller
{
    public $layout ="layout2";
    public function actionLogin(){
        $model = new Admin;
        return $this->render("login",['model' => $model]);
    }

    public function actionSeekpassword(){
        return $this->render('seekpassword');
    }
}