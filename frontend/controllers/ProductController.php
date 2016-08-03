<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/1
 * Time: 20:53
 */

namespace frontend\controllers;
use yii\web\Controller;

class ProductController extends Controller
{
    public $layout = "layout3";

    public function actionIndex(){
        return $this->render("index");
    }
    public function actionDetail(){
        return $this->render("detail");
    }
}