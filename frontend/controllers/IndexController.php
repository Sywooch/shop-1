<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/1
 * Time: 20:44
 */

namespace frontend\controllers;
use yii\web\Controller;

class IndexController extends Controller
{
    public $layout = false;

    public function actionIndex(){
        $this->layout = "layoutIndex";
        return $this->render("index");
    }
}