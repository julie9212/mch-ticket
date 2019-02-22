<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;

class Buy extends Controller
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

	// 购票信息
    public function index()
    {
    	// 获取用户账号
    	$username = Session::get('username');
    	$info = Db::table('ticket')->where('username',$username)->where('buy',0)->select();
    	// 获取总价格和总票数
    	$zprice = 0;
    	$num = 0;
    	foreach ($info as $key => $value) {
    		$zprice = intval($value['price'])+$zprice;
    		$num++;
    	}
	    //  
	    $zpricenum = number_format($zprice);
    	$this->assign(['info'=>$info,'zpricenum'=>$zpricenum,'zprice'=>$zprice,'num'=>$num]);

        return view();
    }

    function del($id){
    	// ajax删除
    	$info = Db::table('ticket')->where('id',$id)->delete();
    	// return $info['id'];
    	if($info == 1){
    		return 1; //删除成功
    	}else{
    		return 0; //删除失败
    	}
    }

    function order(Request $request){
        // 获取pid 总价 商品个数
        $info = $request->post();
        // pid是ticked商品id号
        !empty($info['pid'])? : $this->error('未添加购买信息');
        $info['pid'] = implode(',',$info['pid']);
        // 订单生成时间
        $info['date'] = date('Y-m-d h:i:s');
        // 购买账号
        $info['username'] = Session::get('username');
        // 自动生成订单号
        $info['ordernum'] = '400'.date('Ymdhis').rand('100000','999999');
        // 订单状态0未购买 1已购买
        $info['state'] = 0;
        // 保存数据库order
        $data = Db::table('order')->insert($info);
        if($data == true){
            // 当前订单号
            Session::set('ordernum',$info['ordernum']);
            $this->redirect('../order');
        }else{
            $this->error('订单提交失败，请重新提交');
        }
    }


}