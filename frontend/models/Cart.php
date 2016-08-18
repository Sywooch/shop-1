<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/18
 * Time: 14:09
 */

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%cart}}";
    }

    public function rules()
    {
        return [
            [['productid','productnum','userid','price'], 'required'],
            ['createtime', 'safe']
        ];
    }


}