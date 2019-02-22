<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;


class Suc extends Controller
{
    public function suc(Request $request)
    {
    	// 获取支付宝付款成功信息
        $infos = $request->get();
        // 获取商户订单号
        $info['uorder'] = $infos['out_trade_no'];
        // 获取支付宝订单号
        $info['zorder'] = $infos['trade_no'];
        // 付款金额
        $info['price'] = $infos['total_amount'];
        // 付款方式
        $info['type'] = '支付宝';
        // 付款时间
        $info['times'] = $infos['timestamp'];
        // 查找付款订单用户
        $username = Db::table('order')->where('ordernum',$info['uorder'])->find();
        $info['username'] = $username['username'];
        // 查看订单是否存在
        $data = Db::table('pay')->where('zorder',$info['zorder'])->find();
        // 保存已付款信息
       	if($data != true){
          // order中state状态改为1
          $add = Db::table('order')->where('ordernum',$info['uorder'])->update(['state'=>'1']);
          // 添加数据库buy
       		$data = Db::table('pay')->insert($info);
       		$this->redirect('../sucs');
       	}else{
       		$this->redirect('../sucs');
       	}
    }
}