<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/20
 * Time: 16:00
 */

namespace app\admin\controller;


use think\facade\View;

class System extends Auth
{


    public function index(){
        $res = [];
        return View::fetch('index',$res);
    }



}