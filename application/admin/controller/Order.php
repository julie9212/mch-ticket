<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;


class Order extends Controller
{
    public function index(Request $request){
        $selects = $request->post();
        if(!empty($selects['selects'])){
            $orders = $selects['selects'];
        }else{
            $orders = '';
        }
        
    	// 查询数据
        $info = Db::table('order')->where('ordernum','like','%'.$orders.'%')->paginate(8);
        // dump($info);
        $this->assign('info',$info);
        return view();
    }

    // 已购票
    public function goods(Request $request){
        $pid = $request->post();
        $pid = explode( ',',$pid['pid']);
        foreach ($pid as $key => $value) {
            $info[$key] = Db::table('ticket')->where('id',$value)->find();
        }
        $this->assign('info',$info);
        return view();
    }

    // 购票修改展示页
    public function alerts(Request $request){
        $id = $request->post();
        $id = intval($id['id']);
        $info[] = Db::table('ticket')->where('id',$id)->find();
        $this->assign('info',$info);
        // dump($info);
        return view();
    }

    // 购票信息修改
    public function altertss(Request $request){
        $info = $request->post();
        $data = Db::table('ticket')->where('id',$info['id'])->update($info);
        // dump($data);
        $this->success('修改成功','admin/order/index');
        
    }



}
