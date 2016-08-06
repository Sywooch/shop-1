<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
class Admin extends ActiveRecord
{
    public $adminuser;
    public $adminpass;
    public $adminemail;
    public $repass;
    public $rememberMe = true;
    public static function tableName()
    {
        return '{{%shop_admin}}';
    }

    public function rules()
    {
        return [
            ['adminuser','required','message'=>'账号不能为空','on'=>['login','seekpass','changepass']],
            ['adminpass','required','message'=>'密码不能为空','on'=>['login','changepass']],
            ['rememberMe','boolean','on'=>'login'],
            // password is validated by validatePassword()
            ['adminpass','validatePass','on'=>'login'],
            ['adminemail','required','message'=>'邮箱不能为空','on'=>'seekpass'],
            ['adminemail','email','message'=>'电子邮箱格式不正确','on'=>'seekpass'],
            ['adminemail','validateEmail','on'=>'seekpass'],
            ['repass','required','message'=>'验证密码不能为空','on'=>'changepass'],
            ['repass', 'compare', 'compareAttribute' => 'adminpass', 'message' => '两次密码输入不一致','on'=>'changepass']
        ];
    }

    //验证登陆
    public function validatePass(){
        if(!$this->hasErrors()){
            $data = self::find()->where('adminuser = :user and adminpass = :pass',[":user"=>$this->adminuser,":pass"=>md5($this->adminpass)])->one();
            if(!is_null($data)){
                return true;
            }else{
                $this->addError('adminpass','密码错误');
            }
        }
        return false;
    }
    //验证Email
    public function validateEmail(){
        if(!$this->hasErrors()){
            $data = self::find()->where('adminuser = :user and adminemail = :email',[":user"=>$this->adminuser,":email"=>$this->adminemail])->one();
            if(!is_null($data)){
                return true;
            }else{
                $this->addError('adminemail','用户名或邮箱不正确');
            }
        }
        return false;
    }
    //验证
    //登陆
    public function login($data){
        $this->scenario = 'login';
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

    //找回密码
    public function seekPass($data){
        $this->scenario = 'seekpass';
        if($this->load($data) && $this->validateEmail()){
            $time = time();
            $token = $this->createToken($data['Admin']['adminuser'],$time);
            $mailer = Yii::$app->mailer->compose('seekpass',['adminuser'=>$data['Admin']['adminuser'],'time'=>$time,'token'=>$token]);
            $mailer->setFrom("evil3344@sina.com");
            $mailer->setTo($data['Admin']['adminemail']);
            $mailer->setSubject("immoc-shop：找回密码");
            if($mailer->send()){
                return true;
            }
        }
        return false;
    }

    //创建Token
    public function createToken($adminuser,$time){
        return md5(md5($adminuser).base64_encode(Yii::$app->request->userIP).md5($time));
    }
    //

    public function changePass($data){
        $this->scenario = 'changepass';
        if($this->login($data) && $this->validate()){
            return (bool)$this->updateAll(['adminpass'=>md5($this->adminpass)],'adminuser = :user', [':user'=>$this->adminuser]);
        }
        return false;
    }
}