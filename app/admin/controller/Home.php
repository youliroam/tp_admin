<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/8
 * Time: 15:09
 */

namespace app\admin\controller;



use think\App;
use think\facade\View;

class Home extends Auth
{
    public $user_info;
    public function __construct(App $app)
    {
        parent::__construct($app);
        $this->user_info = $this->get_user_info();
    }

    //管理系统主页面（菜单页面）
    public function index(){


        $data = [
            'user_info' => $this->user_info
        ];

        return View::fetch('index',$data);
    }

    //管理系统内部页面
    public function home(){
        $data = [
            'user_info' => $this->user_info
        ];

        return View::fetch('home',$data);
    }


    //获取菜单
    public function menu(){
        $home = new \app\admin\model\Home();
        $res = $home->menu();
        return json_success(1,'success',$res);
    }
}