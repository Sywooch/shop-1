<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:36
 */

namespace backend\controllers;


use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'layout1';
    public function actionIndex(){
        return $this->render('index');
    }
}