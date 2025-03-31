<?php

namespace app\model;

use think\Model;
use think\model\concern\SoftDelete;

class User extends Model
{   //设置主键
    protected $pk = 'id';

    //开启自动时间戳
    protected $autoWriteTimestamp = 'datetime';

    use softDelete;
    protected $deleteTime = 'delete_time';
    //数据自动完成
    protected $auto = ['email'];
    protected $insert = ['uid'=>1];
    protected $update = [];
    //设置其他表
   // protected $table = 'tp_one';
    //初始化
//    protected static function init(){
//        echo '初始化！';
//    }
    public function getEmail(){
        return self::where('username','李白')->find()->getAttr('email');
    }
    //创建一个获取器,status字段
    public function getStatusAttr($value){
        echo $value;
        $get = [-1 =>'删除',0 =>'禁用',1 =>'正常',2 =>'待审核'];
        return $get[$value];

    }
    //创建一个虚拟字段的获取器，可以对多字段进行过滤
    public function getNothingAttr($value,$data){
        //return  $data;

    }

    public function scopeGenderMale($query){
        $query->where('gender','男')->limit(5);
    }
    public function scopeEmailLike($query,$value){
        $query->where('email','like','%'.$value.'%');
    }
    public function scopePriceGreater($query,$value){
        $query->where('price','>',$value);
    }
}