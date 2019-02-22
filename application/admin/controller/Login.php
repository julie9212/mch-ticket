<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;


class Login extends Controller
{
    public function login(){
    	// login页面
        return view();
    }

    public function proving(Request $request){
    	$info = $request->post();
    	$info['password'] = md5($info['password']);
    	// 验证登录信息
    	$data = Db::table('admin_user')->where('username',$info['username'])->find();
    	$data == true ? :$this->error('用户名错误');
    	$info['password'] == $data['password'] ? : $this->error('密码错误');
    	// 验证码
    	if(!captcha_check($info['code'])){
		 	//验证失败
		 	$this->error('验证码错误');
		}
		// 保存用户名到session
		Session::set('user',$info['username']);
    	$this->success('登录成功', 'admin/index/index');

    }


}
