<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/7
 * Time: 15:55
 */

namespace common\models;


use yii\db\ActiveRecord;

class Profile extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%profile}}";
    }
}