<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/18
 * Time: 17:14
 */

namespace frontend\models;


use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%order}}";
    }

    public static $status = [
        self::CREATEORDER => '订单初始化',
        self::CHECKORDER  => '待支付',
        self::PAYFAILED   => '支付失败',
        self::PAYSUCCESS  => '等待发货',
        self::SENDED      => '已发货',
        self::RECEIVED    => '订单完成',
    ];

    public function getDetail($data){

    }
}