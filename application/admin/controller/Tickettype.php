<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;


class Tickettype extends Controller
{
    public function index(){
    	// 查询数据
        $info = Db::table('tickettype')->select();
        $this->assign('info',$info);
        return view();
    }

    public function alerts(Request $request){
        $id = $request->post();
        $info = Db::table('tickettype')->where('id',$id['id'])->select();
        $this->assign('info',$info);
        return view();
    }

    public function alertss(Request $request){
        $info = $request->post();
        $data = Db::table('tickettype')->update($info);
        if($data == 1){
            $this->success('修改成功','admin/tickettype/index');
        }else{
            $this->error('修改失败');
        }
    }

    // 添加门票类型
    public function add(){
        return view();
    }

    public function adds(Request $request){
        $info = $request->post();
        $data = Db::table('tickettype')->insert($info);
        if($data == 1){
            $this->success('新增成功','admin/tickettype/index');
        }else{
            $this->error('新增失败');
        }
    }



    // 删除票务类型
    public function del($id){
        return 123;
    }

}
