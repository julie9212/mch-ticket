<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use think\Cookie;
use MESSAGEXsend;

class Code extends Controller
{
    public function code(Request $request)
    {
    	// 获取手机号
    	$phone = $request->post('phone');
    	// 4位随机数
    	$rands = rand(1000,9999);

    	require '/code/app_config.php';
    	require_once('/code/SUBMAILAutoload.php');

    	$submail=new MESSAGEXsend($message_configs);

		$submail->setTo($phone);
    	// 设置短信模板ID
    	$submail->SetProject('clDlQ3');
    	// 添加文本变量
    	$submail->AddVar('code',$rands);
        // 调用 xsend 方法发送短信
		$xsend=$submail->xsend();
		// 打印服务器返回值
		// print_r($xsend);
		

	    if(!empty($xsend)){
	    	Cookie::set('code',$rands,180);
	    }else{
	    	return '验证码发送失败';
	    }

        return $phone;
    }
}
