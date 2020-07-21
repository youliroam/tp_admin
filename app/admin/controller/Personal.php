<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/21
 * Time: 14:57
 */

namespace app\admin\controller;


use think\facade\Db;
use think\facade\Request;
use think\facade\View;

class Personal extends Auth
{

    //密码设置
    public function password(){
        if(!Request::isPost()){
            $res = [];
            return View::fetch('password',$res);
        }else{

            try{
                $user_info = $this->get_user_info();
                $old_password = input('post.old_password');
                $new_password = input('post.new_password');
                $confirm_password = input('post.confirm_password');

                if(!is_empty_parameter([$old_password,$new_password,$confirm_password])){
                    throw_error(40001,'参数错误');
                }

                if($new_password !== $confirm_password){
                    throw_error(40002,'两次密码不一致');
                }
                $u = Db::table('u_admin')->where(['username'=>$user_info['username'],'password'=>md5($old_password)])->find();
                if(!$u){
                    throw_error(10001,'密码错误');
                }

                $flag = Db::table('u_admin')->where(['username'=>$user_info['username']])->update(['password'=>md5($confirm_password)]);
                if($flag === false){
                    throw_error(10002,'密码设置失败');
                }
                return json_success();
            }catch(\Exception $e){
                return json_error($e->getCode(),$e->getMessage());
            }
        }
    }

}