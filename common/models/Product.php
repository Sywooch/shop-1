<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/16
 * Time: 11:44
 */

namespace common\models;


use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Product extends ActiveRecord
{
    const AK = 'SO2latd9Rjvmxg25BXlYa2C51uzhf0hJ8jHiuoAA';
    const SK = 'PNpX7cMvZvXNGXQM2QrsBH67agl_ajpSw3D9C1cs';
    const DOMAIN = '7xo7nf.com1.z0.glb.clouddn.com';
    const BUCKET = 'videos';
    public $cate;
    public function rules()
    {
        return [
            ['title', 'required', 'message' => '标题不能为空'],
            ['descr', 'required', 'message' => '描述不能为空'],
            ['cateid', 'required', 'message' => '分类不能为空'],
            ['price', 'required', 'message' => '单价不能为空'],
            [['price','saleprice'], 'number', 'min' => 0.01, 'message' => '价格必须是数字'],
            ['num', 'integer', 'min' => 0, 'message' => '库存必须是数字'],
            [['issale','ishot', 'pics', 'istui'],'safe'],
            [['cover'], 'required'],
        ];
    }

    public static function tableName()
    {
        return "{{%product}}";
    }
    public function attributeLabels()
    {
        return [
            'cateid' => '分类名称',
            'title'  => '商品名称',
            'descr'  => '商品描述',
            'price'  => '商品价格',
            'ishot'  => '是否热卖',
            'issale' => '是否促销',
            'saleprice' => '促销价格',
            'num'    => '库存',
            'cover'  => '图片封面',
            'pics'   => '商品图片',
            'ison'   => '是否上架',
            'istui'   => '是否推荐',
        ];
    }
    public function add($data){
        if($this->load($data) && $this->save()){
            return true;
        }
        return false;
    }
}