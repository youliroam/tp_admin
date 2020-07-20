<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/8
 * Time: 11:47
 */

namespace app\admin\controller;


use app\BaseController;
use think\facade\Session;
use think\facade\View;

class Account
{

    public function index(){
        $data = [
            'page' => 'login'
        ];

        return View::fetch('index',$data);
    }


    //登录页面
    public function login(){
        $data = [
            'page' => 'login'
        ];

        return View::fetch('login',$data);
    }


    //登录验证
    public function login_handle(){
        try{
            $username = input('post.username');
            $password = input('post.password');

            $login_flag = true;
            if($username != 'admin' && $password != '123456'){
                $login_flag = false;
            }
            if($login_flag){
                Session::set('user_info',['username'=>$username,'password'=>$password]);
                return json_success();
            }
            return json_error(0,'密码错误');
        }catch(\Exception $e){
            return json_error($e->getCode(),$e->getMessage());
        }

    }

    //注销登录
    public function logout(){
        Session::delete('user_info');
        return redirect('/admin/account/login');
    }



    //密码设置
    public function password(){
        $res = [];
        return View::fetch('password',$res);
    }



}