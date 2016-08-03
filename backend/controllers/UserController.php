<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:43
 */

namespace backend\controllers;


use yii\web\Controller;

class UserController extends Controller
{
    public $layout = 'layout1';
    public function actionReg(){
        return $this->render('reg');
    }
    public function actionUsers(){
        return $this->render('Users');
    }
}