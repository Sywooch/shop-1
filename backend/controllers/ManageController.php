<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:38
 */

namespace backend\controllers;


use yii\web\Controller;

class ManageController extends Controller
{
    public $layout = 'layout1';
    public function actionChangeemail(){
        return $this->render('changeemail');
    }

    public function actionChangepass(){
        return $this->render('changepass');
    }

    public function actionMailchangespass(){
        $this->layout = 'layout2';
        return $this->render('mailchangespass');
    }

    public function actionManagers(){
        $this->layout = 'layout2';
        return $this->render('managers');
    }

    public function actionReg(){
        return $this->render('reg');
    }

}