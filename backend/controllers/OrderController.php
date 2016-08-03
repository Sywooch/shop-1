<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:41
 */

namespace backend\controllers;


use yii\web\Controller;

class OrderController extends Controller
{
    public $layout = 'layout1';
    public function actionDetail(){
        return $this->render('detail');
    }

    public function actionList(){
        return $this->render('list');
    }

    public function actionSend(){
        return $this->render('send');
    }
}