<?php

namespace app\test\controller;

use think\Controller;
use think\Db;

class Chain extends Controller
{
    public function index(){
        //关联查询
//        $result = Db::name('user')->where([
//                'price'        =>       [60,70,80],
//                'gender'       =>       '男',
//
//        ])->select();
        //索引查询
//        $result = Db::name('user')->where([
//            ['price','>',80],
//            ['gender','=','男']
//        ])->select();
        //封装复杂数据
//        $map[] = ['price','in','60,70,80'];
//        $map[] = ['gender','=','男'];
//        $result = Db::name('user')->where($map)->select();
        //$result = Db::name('user')->where('gender = "男" AND price IN (60,70,80)')->select();
        //$result = Db::name('name')->select();
        //$result = Db::name('user')->field('id,username,email')->select();
        //$result = Db::name("user")->field(['id','username'=>'name'])->select();
        //$result = Db::name("user")->field('SUM(price)')->select();
        //$result = Db::name("user")->field(['id','LEFT(email,5)'=>'email'])->select();
        $result = Db::name("user")->field(['create_time','details',])->select();

        return json($result);

    }
}