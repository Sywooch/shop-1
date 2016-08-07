<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:43
 */

namespace backend\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\User;
class UserController extends Controller
{
    public $layout = 'layout1';

    public function actionUsers()
    {
        $model = User::find()->joinWith('profile');
        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['user'];
        $pager = new Pagination(['totalCount' => $count,'pageSize'=>$pageSize]);
        $users = $model->offset($pager->offset)->limit($pager->limit)->all();
        $this->layout = "layout1";
        return $this->render('users', ['users' => $users, 'pager' => $pager]);
    }

    public function actionReg(){
        $model = new User();
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->reg($post)){
                Yii::$app->session->setFlash('info','添加成功');
            }
        }
        $model->userpass = '';
        $model->repass = '';
        return $this->render('reg',['model'=>$model]);
    }

    public function actionDel(){
        $userid = (int)Yii::$app->request->get('userid');
        if(empty($userid)){
            $this->redirect(['user/users']);
        }
        $model = new User();
        if($model->deleteAll('userid = :id',[':id'=>$userid])){
            Yii::$app->session->setFlash('info','删除成功');
            $this->redirect(['user/users']);
        }
    }


}