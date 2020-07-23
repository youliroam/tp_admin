<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/21
 * Time: 16:23
 */

namespace app\admin\controller;


use app\admin\model\ArticleModel;
use think\facade\Db;
use think\facade\View;

class Article extends Auth
{
    //添加文章
    public function add_article(){

        $res = [];
        $id = input('request.id');
        if($id){
            $data = Db::table('article')->where(['id'=>$id])->find();
            if($data){
                $res = $data;
            }
        }
        return View::fetch('add',$res);
    }

    //文章分类列表
    public function menu_list(){

        $res = [];
        return View::fetch('menu_list',$res);
    }

    //文章分类列表
    public function menuList(){

        try{
            $article = new ArticleModel();
            $data = $article->articleMenu(1,10000);

            $res = [
                'code'=>0,
                'data'=>$data
            ];
            return $res;
        }catch(\Exception $e){
            return ['code'=>-1,'msg'=>$e->getMessage(),'data'=>[]];
        }
    }



    //文章列表
    public function list(){

        $res = [];
        return View::fetch('list',$res);
    }

    //文章列表
    public function articleList(){
        try{
            $page = input('get.page');
            $limit = input('get.limit');
            if(!is_empty_parameter([$page,$limit])){
                throw_error();
            }
            $article = new ArticleModel();
            $data = $article->articleList($page,$limit);

            $res = [
                'code'=>0,
                'data'=>$data
            ];
            return $res;
        }catch(\Exception $e){
            return ['code'=>-1,'msg'=>$e->getMessage(),'data'=>[]];
        }
    }

    //获取菜单
    public function getMenu(){
        try{
            $article = new ArticleModel();
            $data = $article->articleMenu(1,1000);

            return json_success(1,'success',$data);
        }catch(\Exception $e){
            return json_error($e->getCode(),$e->getMessage());
        }
    }


    //添加文章
    public function addArticle(){
        try{
            $article_title = input('post.article_title');
            $article_menu = input('post.article_menu');
            $article_create_time = input('post.article_create_time');
            $article_author = input('post.article_author');
            $article_status = input('post.article_status');
            $article_content = input('post.article_content');
            if(!is_set_parameter([$article_title,$article_menu,$article_create_time,$article_author,$article_status,$article_content])){
                throw_error(4001,'参数错误');
            }

            $sql = [
                'title' => $article_title,
                'content' => $article_content,
                'article_menu' => $article_menu,
                'author' => $article_author,
                'status' => $article_status,
                'create_time' => $article_create_time
            ];
            $insert_flag = Db::table('article')->insert($sql);
            if($insert_flag){
                return json_success();
            }
            return json_error(1002,'操作失败');
        }catch(\Exception $e){
            return json_error($e->getCode(),$e->getMessage());
        }
    }


    //硬删除数据
    public function delete_data(){
        try{
            $id = input('post.id');
            if(!is_empty_parameter([$id])){
                throw_error(4001,'参数错误');
            }

            $insert_flag = Db::table('article')->where(['id'=>$id])->delete();
            if($insert_flag){
                return json_success();
            }
            return json_error(1002,'操作失败');
        }catch(\Exception $e){
            return json_error($e->getCode(),$e->getMessage());
        }
    }
}