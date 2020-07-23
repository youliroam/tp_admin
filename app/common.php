<?php
// 应用公共文件

/**
 * redis操作函数
 */
if(!function_exists('redis')){
    function redis(){

        return \yl\Redis::getInstance(0);
    }
}

/**
 * json成功返回
 */
if(!function_exists('json_success')){
    function json_success($code=1,$info='success',$data=[]){
        $result_data = [
            'code' => $code,
            'info' => $info,
            'data' => $data,
        ];
        return json_encode($result_data);
    }
}

/**
 * json失败返回
 */
if(!function_exists('json_error')){
    function json_error($code=0,$info='false',$data=[]){
        $result_data = [
            'code' => $code,
            'info' => $info,
            'data' => $data,
        ];
        return json_encode($result_data);
    }
}

/**
 * 验证手机号码是否正确
 */
if(!function_exists('preg_match_phone')){
    function preg_match_phone($phone){
        if(preg_match("/^1[23456789]\d{9}$/", $phone)){
            return true;
        }
        return false;
    }
}

/**
 * 获取毫秒时间
 */
if(!function_exists('time_millisecond')){
    function time_millisecond(){
        list($s1, $s2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }
}

/**
 *	抛出异常
 */
if(!function_exists('throw_error')){
    function throw_error($code=4444,$message='异常'){
        throw new \think\Exception($message, $code);
    }
}


/**
 * 验证银行账号
 */
if(!function_exists('preg_match_bank_account')){
    function preg_match_bank_account($account){
        if(preg_match("/^[123456789]\d{9,30}$/", $account)){
            return true;
        }
        return false;
    }
}

/**
 * 验证是否全部设置过
 */
if(!function_exists('is_set_parameter')){
    function is_set_parameter($parameters){
        foreach($parameters as $k=>$v){
            if(!isset($v)){
                return false;
            }
        }
        return true;
    }
}


/**
 * 验证是否全部设置过并且不为空
 */
if(!function_exists('is_empty_parameter')){
    function is_empty_parameter($parameters){
        foreach($parameters as $k=>$v){
            if(!isset($v) || empty($v)){
                return false;
            }
        }
        return true;
    }
}


/**
 * 生成订单号
 */
if(!function_exists('get_order_id')){
    function get_order_id(){
        $pre = date('YmdHis'); //20200703154850  14位
        $mid = substr(time_millisecond(),10,3); //3位
        $data = $pre.$mid.rand(10,99);  //2020022810101100311 //
        return $data;
    }
}







