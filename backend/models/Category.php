<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/10
 * Time: 16:54
 */

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
class Category  extends ActiveRecord
{
    public static function tableName(){
        return "{{%category}}";
    }
    public function attributeLabels()
    {
        return [
            'parentid'=>'上级分类',
            'title'=>'分类名称',
        ];
    }
    public function rules()
    {
        return [
            ['parentid', 'required', 'message' => '上级分类不能为空'],
            ['title', 'required', 'message' => '标题名称不能为空'],
            ['createtime', 'safe']
        ];
    }

    public function add($data){
        $data['Category']['createtime'] = time();
        if($this->load($data)&& $this->save()){
            return true;
        }
        return false;
    }

    public function getData(){
        $cates = self::find()->all();
        $cates = ArrayHelper::toArray($cates);
        return $cates;
    }

    public function getTree($cates,$pid = 0){
        $tree = [];
        foreach($cates as $cate){
            if($cate['pid'] == $pid){
                $tree[] =$cate;
                $this->getTree($cates,$cate['cateid']);
            }
        }
    }

}