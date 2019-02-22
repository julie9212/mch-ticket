<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;

class Passback extends Controller
{
    public function _initialize()
    {
        $username = Session::has('username');
        if($username == true){
            $this->success('账户已登录', '/ticket');
        }else{
            $tit = 2;
            $this->assign('tit',$tit);
        }
    }
	// 注册页面
    public function passback()
    {
        return view();
    }

    // 注册form信息
    public function passval(Request $request){
    	$info = $request->except('yzm');
        $yzm = $request->post('yzm');;
        $code = Cookie::get('code');
        // 匹配验证码
        Cookie::has('code')? :$this->error('请获取短信验证码');
        $yzm == $code ? :$this->error('验证码错误');
        // 验证数据是否完成
        !empty($info['username']) ? :$this->error('手机号为空，请重新填写');
        !empty($info['password']) ? :$this->error('密码为空，请重新填写');
        // 密码加密
        $info['password'] = md5($info['password']);
        dump($info);
        // 数据验证
        $datauser = Db::table('user')->where('username',$info['username'])->find();
        !empty($datauser)? :$this->error('手机号未注册，请返回注册');
        dump($datauser);
        // 数据修改
        $data = Db::table('user')->where('username',$info['username'])->select();
        $data = Db::table('user')->where('username',$info['username'])->setField('password',$info['password']);
        dump($data);
        // // 影响行数为1，成功
        if($data == 1){
            // Session::set('username',$info['username']);
            $this->success('密码修改成功，请登录', '/login');
        }else{
            $this->error('密码修改失败，请重新注册');
        }
    }
}
