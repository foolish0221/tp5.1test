<?php

namespace app\index\controller;

use think\Request;

class Error
{
    public function index(Request $r){
        return '此控制器不存在:'.$r->controller();
    }
}