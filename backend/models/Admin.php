<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
class Admin extends ActiveRecord
{
    public $adminuser;
    public $adminpass;
    public $rememberMe = true;
    public static function tableName()
    {
        return '{{%shop_admin}}';
    }

    public function rules()
    {
        return [
            [['adminuser','adminpass'],'required','message'=>'账号和密码不能为空'],
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['adminpass','validatePass'],
        ];
    }

    public function validatePass(){
        if(!$this->hasErrors()){
            $data = self::find()->where('adminuser = :user and adminpass = :pass',[":user"=>$this->adminuser,":pass"=>md5($this->adminpass)])->one();
            if(!is_null($data)){
                return true;
            }else{
                $this->addError('adminpass','用户名或密码错误');
            }
        }
    }

    public function login($data){
        if ($this->load($data) && $this->validatePass()){
            $lifetime = $this->rememberMe ? 24*3600 :0;
            $session =Yii::$app->session;
            session_set_cookie_params($lifetime);
            $session['admin']=[
                'adminuser'=>$this->adminuser,
                'isLogin'=>1,
            ];
            $this->updateAll(['logintime'=>time(),'loginip'=>ip2long(Yii::$app->request->userIP)],'adminuser = :user',[':user'=>$this->adminuser]);
            return (bool)$session['admin']['isLogin'];
        }
        return false;
    }
}