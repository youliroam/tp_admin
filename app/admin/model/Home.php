<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/8
 * Time: 17:01
 */

namespace app\admin\model;


use think\facade\Db;

class Home
{

    public $res = [];
    public function menu(){

        $data = Db::table('sys_menu')->where(['status'=>1])->order('sort','asc')->select()->toArray();
        if($data){
            return $this->menu_handle($data);
        }
        return [];
    }


    private function menu_handle($data){
        return $this->dg($data,0);
    }


    private function dg($data,$parent_id){
        $res = [];
        foreach($data as $k=>$vv){
            if($vv['parent_id'] == $parent_id){
                $vv['child'] = $this->dg($data,$vv['id']) ?:[];
                $res[] = $vv;
            }
        }
        return $res;
    }




}