<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;

class Login extends Controller
{
    public function _initialize()
    {
         $username = Session::has('username');
        if($username == true){
            $this->success('账户已登录', '/ennter');
        }else{
            $tit = 2;
            $this->assign('tit',$tit);
        }
    }
	// 登录页面
    public function login()
    {
        return view();
    }

    // 登录表单验证
    public function validates(Request $request){
    	$username = $request->post('username');
    	$password = md5($request->post('password'));
    	$info = Db::table('user')->where('username',$username)->find();
    	// 有户名是否存在
    	!empty($info)? :$this->error('未找到用户，请重新登录');
    	// 密码是否正确
    	if($password == $info['password']){
    		Session::set('username',$username);
    		$this->redirect('../ticket');
    	}else{
    		$this->error('密码错误，请重新登录');
    	}
    }
}
