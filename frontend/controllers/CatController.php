<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/1
 * Time: 21:07
 */

namespace frontend\controllers;

use yii\web\Controller;
class CatController extends Controller
{
    public $layout = false;

    /*
     * 前台购物车页面
     */
    public function actionIndex(){
        $this->layout = "layout2";
        return $this->render("index");
    }
}