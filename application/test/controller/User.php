<?php

namespace app\test\controller;
use app\model\User as UserModel;
use think\Controller;
use think\Db;

class User extends Controller
{
    public function index()
    {
        //数据库操作返回的列表是一个二维数组[[]]，而模型操作返回的是一个结果集[{}]
//        $result = UserModel::select();
//        return json($result);
//        UserModel::destroy(79);
//        $result = Db::name('user')->select();
//        print_r($result);
//        $user = UserModel::get(19);
//        return json($user->getData());
//        dump($user->nothing);
        //return $user->status;
        //return json($user);
        //动态获取器
        $reuslt = UserModel::WithAttr('email',function($value){
            return strtoupper($value);//Email全部大写
        })->select();
        return json($reuslt);
    }
    public function insert(){
        $user = new UserModel();
        $user->save([
            'username'      =>      '李白',
            'password'      =>      '123',
            'gender'        =>      '男',
            'email'         =>      'dufu@admin.com',
            'price'         =>      78,
            'details'       =>      '123',
            'uid'           =>      '1019',
            'create_time'   =>      date('Y-m-d H:i:s')
        ]);
        echo $user;

    }
    public function delete(){
//        $user = UserModel::get(239);
//        print_r($user->delete());
//        UserModel::destroy(241);
//        UserModel::destory(function ($query){
//            $query->where('id','>',239)->destory();
//        });
    }
    public function update(){
        $user = userModel::where('id',1019)->findOrFail();
        $user ->update([
            'username'      =>      '李黑',
            'password'      =>      '123',
            'gender'        =>      '男',
            'email'         =>      'lihei@163.com',
            'price'         =>      78,
            'details'       =>      '123',
            'uid'           =>      '1019',
            'create_time'   =>      date('Y-m-d H:i:s')
        ]);
    }
    public function queryScope(){
//        $result = UserModel::scope('gendermale')->select();
        //$result = UserModel::genderMale()->select();
//        return json($result);
        $result = UserModel::scope('emailLike','xiao')->scope('priceGreater',80)->select();

        return json($result);

    }
    public function view(){
        $user = UserModel::get(19);
        $this->assign('user',$user);
        return $this->fetch();
    }
    public function output(){
        $user = UserModel::get(19);
        //($user->hidden(['password','update_time'])->toArray());
        print_r($user->hidden(['password','update_time'])->toJson());
    }
    public function json(){
//        $data = [
//            'username'      =>      '辉夜',
//            'password'      =>      '123',
//            'gender'        =>      '男',
//            'email'         =>      'lihei@163.com',
//            'price'         =>      78,
//            'details'       =>      ['content'=>123],
//            'uid'           =>      '1019',
//            'list'          =>      ['username'=>'李白','gender'=>'男','email'=>'libai@163.com','uid'=>1011]
//        ];
//        Db::name('user')->json(['details'])->insert($data);
//        $user = Db::name('user')->json(['details','list'])->where('id',244)->findOrFail();
        //$user = Db::name('user')->json(['details','list'])->where('list->username','辉夜')->find();
//        $data['list'] = ['username'=>'李黑','gender'=>'女','email'=>'lihei@163.com'];
//        Db::name('user')->json(['details','list'])->where('id',243)->update($data);
//        $data['list->gender'] = '男';
//        Db::name('user')->json(['details','list'])->where('id',243)->update($data);
        //return json($user);
    }
    public function softDelete(){
//        $user = Db::name('user')
//                ->where('id',243)
//                ->useSoftDelete('delete_time',date('Y-m-d H:i:s'))
//                ->delete();
//        $user = UserModel::select();
//        return json($user);
//        $user = UserModel::withTrashed()->select();
//        $user = UserModel::onlyTrashed()->find();
//        $user ->restore();//还原软删除
        //真实删除
//        $user = UserModel::onlyTrashed()->find(243);
//        $user->delete(true);
//        return json($user);

    }

}