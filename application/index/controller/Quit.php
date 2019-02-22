<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;

class Quit extends Controller
{

    public function _initialize()
    {
        $username = Session::has('username');
        if($username == true){
            $tit = 1;
            $username = Session::get('username');
            $this->assign(['tit'=>$tit,'username'=>$username]);
        }else{
            $this->redirect('/login');
        }
    }

	// 退出
    public function index()
    {
    	Session::delete('username');
        $this->redirect('/index');
    }

}