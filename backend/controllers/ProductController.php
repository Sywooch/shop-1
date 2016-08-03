<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:43
 */

namespace backend\controllers;


use yii\web\Controller;

class ProductController extends Controller
{
    public $layout = 'layout1';
    public function actionAdd(){
        return $this->render('add');
    }
    public function actionProducts(){
        return $this->render('products');
    }
}