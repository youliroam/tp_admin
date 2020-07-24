<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/22
 * Time: 16:48
 */

namespace app\admin\model;


use think\facade\Db;

class ArticleModel
{

    public $a=[];
    //文章目录
    public function articleMenu($page=1,$limit=10){
        $data = Db::table('article_menu')->page($page,$limit)->where(['status'=>1])->select()->toArray();
        $res = $this->menuHandle($data,0);
        return $this->a;
    }


    //文章列表
    public function articleList($page=1,$limit=10){
        $data = Db::table('article')
            ->alias('a')
            ->field('a.*,am.menu_name')
            ->leftJoin('article_menu am','a.article_menu = am.id')
            ->where(['a.status'=>1])->page($page,$limit)->select()->toArray();
        return $data;
    }


    //特殊递归
    public function menuHandle($data,$parent_id=0){
        $a = [];
        foreach($data as $k=>$v){
            if($v['parent_id'] == $parent_id){
                //$v['children'] = $this->menuHandle($data,$v['id']);
                //$a[] = $v;
                $this->a[] = $v;
                $this->menuHandle($data,$v['id']);
            }
        }
        return $a;
    }


}