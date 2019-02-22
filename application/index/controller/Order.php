<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;

class Order extends Controller
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

	// 购票订单信息
    public function index()
    {
    	// 获取订单内容
        $ordernum = Session::get('ordernum'); 
        // 订单
        $info = Db::table('order')->where('ordernum',$ordernum)->find();
        // 总价int格式(支付用)
        $info['zprice'] = intval($info['zprice']); 
        // 总价string格式
        $info['zprices'] = number_format($info['zprice']); 
        // 购票信息
        // !empty($info['pid'])? : $this->error('未添加购买信息');
        $pid = explode(",",$info['pid']);
        foreach ($pid as $key => $value) {
            // 商品标为已生成订单状态
            $data = Db::table('ticket')->where('id',$value)->update(['buy'=>1]);
            $tickets[] = Db::table('ticket')->where('id',$value)->find();
        }
        // dump($info);
        $this->assign(['info'=>$info,'tickets'=>$tickets]);
        return view();
    }




}
