<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:41
 */

namespace backend\controllers;

use Yii;
use frontend\models\Order;
use yii\data\Pagination;
use yii\web\Controller;

class OrderController extends Controller
{
    public $layout = 'layout1';
    public function actionDetail(){
        return $this->render('detail');
    }

    public function actionList(){
        $model = Order::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['order'];
        $pager = new Pagination(['totalCount'=>$count,'pageSize'=>$pageSize]);
        $data = $model->offset($pager->offset)->limit($pager->limit)->all();
        $data = Order::getDetail($data);
        return $this->render('detail',['pager' => $pager, 'orders' => $data]);
    }

    public function actionSend(){
        return $this->render('send');
    }
}