<?php
/**
 * Created by PhpStorm.
 * User: chenzhaojun
 * Date: 2020/7/24
 * Time: 11:01
 */

namespace app\admin\controller;


use think\facade\Request;

class Upload
{

    public function image(){

        /*$res = [
            'errno' => 0,
            'data' => []
        ];

        $data = [];
        $file_arr = $_FILES;
        if($file_arr){
            $domain = Request::domain();
            $mid_path = '/upload/'.date('Ym').'/';
            $new_mid_path = str_replace('\\','/',public_path() .$mid_path);
            foreach($file_arr as $k=>$v){
                $file_arr = explode('.',$v['name']);
                $file_arr = array_reverse($file_arr);
                $file_ext = $file_arr[0];
                $new_file_name = date('His').'_'.md5($v['name']).'.'.$file_ext;
                if(!is_dir($new_mid_path)){
                    mkdir($new_mid_path,0777,true);
                }
                $a = move_uploaded_file($v["tmp_name"], $new_mid_path.$new_file_name);
                if($a){
                    $data[] = $domain .$mid_path.$new_file_name;
                }
            }
            $res['data'] = $data;
        }
        echo json_encode($res);
        exit;*/

        $file_full_name = $_FILES["file"]["name"];
        $file_arr = explode('.',$file_full_name);
        $file_arr = array_reverse($file_arr);
        $file_ext = $file_arr[0];
        $new_file_name = date('His').'_'.md5($_FILES["file"]["name"]).'.'.$file_ext;

        $domain = Request::domain();
        $mid_path = '/upload/'.date('Ym').'/';
        $new_mid_path = str_replace('\\','/',public_path() .$mid_path);

        if(!is_dir($new_mid_path)){
            mkdir($new_mid_path,0777,true);
        }
        $a = move_uploaded_file($_FILES["file"]["tmp_name"], $new_mid_path.$new_file_name);
        if($a){
            echo $domain . $mid_path.$new_file_name;
        }else{
            echo '';
        }
        exit;
    }
}