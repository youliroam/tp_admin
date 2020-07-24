<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/8
 * Time: 16:25
 */

namespace app\admin\middleware;


use think\facade\Session;

class Auth
{

    public function __construct(){
        if(!Session::get('user_info')){
            dump(Session::get('user_info'));
            Header("Location: /admin/account/login");
            //return redirect('/admin/account/login');
            exit;
        }
        return true;
    }

    //获取用户信息
    public function get_user_info(){
        $user_info = Session::get('user_info');
        return $user_info;
    }

    public function handle($request, \Closure $next)
    {
        $request->hello = 'ThinkPHP';

        return $next($request);
    }
}