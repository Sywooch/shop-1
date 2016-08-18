<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/1
 * Time: 20:53
 */

namespace frontend\controllers;

use common\models\Product;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
class ProductController extends Controller
{
    public $layout = "layout3";

    public function actionIndex(){
        return $this->render("index");
    }
    public function actionDetail(){
        $productid = Yii::$app->request->get('productid');
        $product = Product::find()->where('productid = :pid',[':pid'=>$productid])->asArray()->one();
        $data['all'] = Product::find()->where('ison = "1"')->orderBy('createtime desc')->limit(7)->all();
        return $this->render("detail",['product'=>$product,'data'=>$data]);
    }
}