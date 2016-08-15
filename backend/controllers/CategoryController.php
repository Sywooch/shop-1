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
use yii\base\Exception;
use yii\web\Controller;

class CategoryController extends Controller
{
    public $layout = 'layout1';

    public function actionList(){
        $model = new Category();
        $cates = $model->getTreeList();
        return $this -> render('cates',['cates'=>$cates]);
    }

    public function actionAdd(){
        $model = new Category();
        $list = $model->getOptions();
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->add($post)){
                Yii::$app->session->setFlash('info','添加成功');
            }
        }
        return $this -> render('add',['list'=>$list,'model'=>$model]);
    }

    public function actionMod()
    {
        $cateid = Yii::$app->request->get("cateid");
        $model = Category::find()->where('cateid = :id', [':id' => $cateid])->one();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->load($post) && $model->save()) {
                Yii::$app->session->setFlash('info', '修改成功');
            }
        }
        $list = $model->getOptions();
        return $this->render('add', ['model' => $model, 'list' => $list]);
    }

    public function actionDel(){
        try{
            $cateid = Yii::$app->request->get("cateid");
            if(empty($cateid)){
                throw new \Exception('参数错误');
            }
            $data = Category::find()->where('parentid = :pid',[':pid'=>$cateid])->one();
            if($data){
                throw new \Exception('该分类下有子类，不允许删除');
            }
            if(!Category::deleteAll('cateid = :id',['id'=>$cateid])){
                throw new \Exception('删除失败');
            }
        }catch (\Exception $e){
            Yii::$app->session->setFlash('info',$e->getMessage());
        }
        return $this->redirect(['category/list']);
    }
}