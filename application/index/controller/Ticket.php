<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db; 
use think\Session;
use think\Cookie;

class Ticket extends Controller
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
    public function ticket()
    {
        return view();
    }

    // 数据提交
    public function tickets(Request $request)
    {
    	// 购票信息
    	$infos = $request->post();
    	$infos['username'] = Session::get('username');
    	!empty($infos['type']) ? :$this->error('请选择票务类型');
    	!empty($infos['unit']) ? :$this->error('请输入所在单位');
    	!empty($infos['address']) ? :$this->error('请输所在入单位地址');
    	!empty($infos['name']) ? :$this->error('请输入购票人姓名');
    	!empty($infos['sex']) ? :$this->error('请选择购票人性别');
    	!empty($infos['duties']) ? :$this->error('请输入购票人职务');
    	!empty($infos['phone']) ? :$this->error('请输入手机号');
    	!empty($infos['email']) ? :$this->error('请输入邮箱');

    	// 门票类型获取
    	$ticket = Db::table('tickettype')->where('id',$infos['type'])->find();
   		$infos['type'] = $ticket['type'];
    	// 门票价格获取
		$infos['price'] = $ticket['price'];
		// 未购买0 已购买1
		$infos['buy'] = 0;
    	// 图片上传
    	// 获取表单上传文件 例如上传了001.jpg
	   $file = request()->file('images');
	   // 移动到框架应用根目录/public/uploads/ 目录下
	   $info = $file->rule('uniqid')->move(ROOT_PATH . 'public' . DS . 'uploads/'.date('Ymd'));
	    
	   if($info){
	       // 成功上传后 获取上传信息
	       // 输出 jpg
	        $info->getExtension();
	        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
	        $info->getSaveName();
	        // 输出 42a79759f284b767dfcb2a0197904287.jpg
	        $info->getFilename(); 
	    }else{
	        // 上传失败获取错误信息
	        echo $file->getError();
	    }

	    // 图片名
	    $infos['image'] = $info->getSaveName();
	    // 文件夹名
	    $infos['file'] = date('Ymd');
	    // 添加数据库
	    $data = Db::table('ticket')->insert($infos);
	    $data == 1?$this->success('提交成功','../buy') :$this->error('提交失败，请重新购买');
    }
}
