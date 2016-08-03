<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:34
 */

namespace backend\controllers;


use yii\web\Controller;

class CategoryController extends Controller
{
    public $layout = 'layout1';
    public function actionAdd(){
        return $this -> render('add');
    }
    public function actionCates(){
        return $this -> render('cates');
    }
}