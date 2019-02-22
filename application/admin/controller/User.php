<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;


class User extends Controller
{
    public function index(Request $request){
        $selects = $request->post();
        if(!empty($selects['username'])){
            $user = $selects['username'];
        }else{
            $user = '';
        }
    	// 查询数据
        $info = Db::table('user')->where('username','like','%'.$user.'%')->paginate(8);
        // dump($info);
        $this->assign('info',$info);
        return view();
    }

}
