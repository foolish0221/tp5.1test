<?php

namespace app\index\controller;

use app\model\User;
use think\Controller;
use think\Db;
use think\db\exception\DataNotFoundException;
use think\response\Json;

class DataTest extends Controller
{
    public function index(){
//        $data = Db::table('tp_user')->find();
//        $data = Db::table('tp_user')->where('id',27)->find();
//
//        try{
//            $data = Db::table('tp_user')->where('id',127)->findOrFail();
//
//        }catch (DataNotFoundException $e){
//            return '查询不到数据';
//        }
//        return Db::getLastSql();
//        $data = Db::table('tp_user')->limit(0,5)->select();
//        $data = Db::name('user')->limit(0,5)->select();
//        $data = \db('user')->selectOrFail();
//        $data = Db::name('user')->where('id','27')->value('username');
//        $data = Db::name('user')->column('username');
//        $data = Db::name('user')->column('username','id');
//        print_r(Db::name("user")->where('id','>',27)->order('id','desc')->select());
//        $data1 = Db::name("user")->where('id','>',27)->order('id','desc')->select();
//        $data2 = Db::name('user')->select();
        $user = Db::name('user');
        $data1 = $user->where('id','>',70)->order('id','asc')->select();
        $data2 = $user ->select();
        return json($data1);
       // return json($data);
    }
    public function insert(){
        $data = [
            'username'      =>      '杜甫',
            'password'      =>      '109',
            'gender'        =>      '女',
            'email'         =>      'dufu@admin.com',
            'price'         =>      78,
            'details'       =>      '123',
            'create_time'   =>      date('Y-m-d H:i:s'),
        ];
        //Db::name('user')->insert($data);
        $insert = Db::name('user')->data($data)->insert();
        return json($insert);

    }
    //批量新增
    public function insertAll()
    {
        $dataAll = [
            [
                'username'      =>      '杜甫',
                'password'      =>      '123',
                'gender'        =>      '男',
                'email'         =>      'dufu@admin.com',
                'price'         =>      78,
                'details'       =>      '123',
                'create_time'   =>      date('Y-m-d H:i:s')
            ],
            [
                'username'      =>      '王维',
                'password'      =>      '456',
                'gender'        =>      '男',
                'email'         =>      'wangwei@admin.com',
                'price'         =>      75,
                'details'       =>      '123',
                'create_time'   =>      date('Y-m-d H:i:s'),
            ]
        ];
        Db::name('user')->insertAll($dataAll);
    }
    public function update(){
        $data = [
            'username'          =>      '李白',
            'price'             =>      Db::raw('price-3'),
            'email'             =>      Db::raw('UPPER(email)'),
            'id'                =>      '76'
        ];
        //Db::name('user')->where('id',76)->update($data);
        //Db::name('user')->inc('price',3)->where('id',76)->update();
        //Db::name('user')->exp('email','UPPER(email)')->update($data);
        //Db::name('user')->update($data);
        Db::name('user')->where('id',76)->setField('username','李商隐');
    }
    public function delete(){
        //Db::name('user')->where('id',76)->delete();
        //Db::name('user')->delete([233,234,235,236]);
    }
    public function getNoModelData()
    {
        $data = Db::table('tp_user')->select();
        return json($data);
    }
    public function getModelData()
    {
       $data =  User::select();
       return json($data);
    }
}