<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/27
 * Time: 16:25
 */

namespace app\index\controller;



use think\facade\Db;
use think\facade\View;

class Article
{


    //文章列表
    public function list(){
        try{
            $page = input('get.page',1);
            $limit = input('get.limit',5);

            $keyword = input('get.keyword');
            $menu_id = input('get.menu_id');
            $where = [['a.status','=',1]];
            if(isset($keyword) && !isset($menu_id)){
                $where[] = ['a.title','like','%'.$keyword.'%'];
            }else if(!isset($keyword) && isset($menu_id)){
                $where[] = ['am.id','=',$menu_id];
            }

            if(!is_empty_parameter([$page,$limit])){
                throw_error();
            }

            $data = Db::table('article')
                ->alias('a')
                ->field('a.*,am.menu_name')
                ->leftJoin('article_menu am','a.article_menu_id = am.id')
                ->where($where)
                ->page($page,$limit)->select()->toArray();
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
            return json_success(1,'success',$res);
        }catch(\Exception $e){
            return json_error($e->getCode(),$e->getMessage());
        }


    }

    //文章详情
    public function detail(){
        try{
            $id = input('get.id',0);
            $data = Db::table('article')
                ->alias('a')
                ->field('a.*,am.menu_name')
                ->leftJoin('article_menu am','a.article_menu_id = am.id')
                ->where(['a.id'=>$id])
                ->find();
            if(!$data){
                throw_error(10001,'null');
            }
            $data['content'] = html_entity_decode($data['content']);
            return View::fetch('detail',$data);
        }catch(\Exception $e){
            return json_error($e->getCode(),$e->getMessage());
        }
    }
}