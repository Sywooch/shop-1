<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:34
 */

namespace backend\controllers;

use Yii;
use backend\models\Category;
use yii\web\Controller;

class CategoryController extends Controller
{
    public $layout = 'layout1';

    public function actionList(){
        return $this -> render('cates');
    }

    public function actionAdd(){
        $list = ['添加顶级分类'];
        $model = new Category();
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->add($post)){
                Yii::$app->session->setFlash('info','添加成功');
            }
        }
        return $this -> render('add',['list'=>$list,'model'=>$model]);
    }

}