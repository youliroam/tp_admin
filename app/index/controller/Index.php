<?php
namespace app\index\controller;

use app\BaseController;
use think\facade\Db;
use think\facade\View;

class Index extends BaseController
{

    public function index()
    {
        $keyword = input('get.keyword');
        $menu_id = input('get.menu_id');
        $where = [['a.status','=',1]];
        if(isset($keyword) && !isset($menu_id)){
            $where[] = ['a.title','like','%'.$keyword.'%'];
        }else if(!isset($keyword) && isset($menu_id)){
            $where[] = ['am.id','=',$menu_id];
        }
        $data = Db::table('article')
            ->alias('a')
            ->field('a.*,am.menu_name')
            ->leftJoin('article_menu am','a.article_menu_id = am.id')
            ->where($where)
            ->page(1,5)->select()->toArray();
        $account = Db::table('article')
            ->alias('a')
            ->field('a.*,am.menu_name')
            ->leftJoin('article_menu am','a.article_menu_id = am.id')
            ->where($where)
            ->count('a.id');
        foreach($data as $k=>$v){
            $data[$k]['content'] = html_entity_decode($v['content']);
        }
        $res = [
            'data' => $data,
            'count' => $account
        ];
        return View::fetch('index',$res);
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }



    //获取菜单
    public function menu(){
        $res = $this->get_menu();
        return json_success(1,'success',$res);
    }

    //处理菜单
    private function get_menu(){
        $data = Db::table('article_menu')->where(['status'=>1])->order('sort','asc')->select()->toArray();
        if($data){
            return $this->dg($data,0);
        }
        return [];
    }

    //递归查询所有子菜单
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
