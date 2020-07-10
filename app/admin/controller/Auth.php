<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/8
 * Time: 14:37
 */

namespace app\admin\controller;


use app\BaseController;
use think\App;
use think\facade\Session;

class Auth extends BaseController
{

    public function __construct(App $app)
    {
        parent::__construct($app);
        if(!Session::get('user_info')){
            Header("Location: /admin/account/login");
            exit;
        }
        return true;
    }

    //获取用户信息
    public function get_user_info(){
        $user_info = Session::get('user_info');
        return $user_info;
    }
}