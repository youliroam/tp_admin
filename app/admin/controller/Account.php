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
use app\admin\model\Account as AccountModel;

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
            $verify_code = input('post.verify_code');

            $verify_code_service = Session::get('VerifyCode');

            if(!is_set_parameter([$username,$password,$verify_code])){
                throw_error(40001,'参数错误');
            }

            if($verify_code != $verify_code_service){
                dump($verify_code,$verify_code_service);
                throw_error(40002,'验证码错误');
            }

            if($username != 'admin' || $password != '123456'){
                throw_error(40003,'密码错误');
            }
            Session::set('user_info',['username'=>$username,'password'=>$password]);
            return json_success();
        }catch(\Exception $e){
            return json_error($e->getCode(),$e->getMessage());
        }

    }

    //注销登录
    public function logout(){
        Session::delete('user_info');
        return redirect('/admin/account/login');
    }

    //图形验证码
    public function graphic_verification(){

        $account = new AccountModel();
        $a = $account->vCode(4,20);
        return $a;
    }


    //密码设置
    public function password(){
        $res = [];
        return View::fetch('password',$res);
    }



}