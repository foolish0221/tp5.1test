<?php

namespace app\test\controller;
use think\Db;
class Search
{
    public function index(){
        //$result = Db::name('user')->where('id','>',76)->select();

        //Db::name('user')->where('email','like','%xiao%')->select();
        //$result = Db::name('user')->where('email','like',['xiao%',"wu%"],'or')->select();
        //$result = Db::name('user')->whereLike('email','xiao%')->select();
        //$result = Db::name('user')->whereBetween('id',[20,79])->select();
        //$result = Db::name('user')->whereIn('id',[19,20,79])->select();
        //$result = Db::name('user')->whereNull('uid')->select();
        //return Db::getLastSql();
        //$result = Db::name('user')->where('create_time','>',"2018")->select();
        //$result = Db::name('user')->where('create_time','between time',['2019-1','2025-12'])->select();
        $result = Db::name('user')->whereTime('create_time',"w")->select();

        return json($result);
    }

}