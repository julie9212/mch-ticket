<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];



use think\Route;

// 测试
Route::rule('test','test/test');
Route::rule('tests','test/index');




// index
Route::rule('index','index/index');
// 登录
Route::rule('login','login/login');
Route::rule('validate','login/validates');
// 注册
Route::rule('register','register/register');
Route::rule('validates','register/validates');
// 忘记密码
Route::rule('passback','passback/passback');
Route::rule('passval','passback/passval');
// 验证码code
Route::rule('code','code/code');
// 选择进入
Route::rule('ennter','ennter/ennter');
// 购票信息
Route::rule('ticket','ticket/ticket');
Route::rule('tickets','ticket/tickets');
// 确认购票
Route::rule('buy','buy/index');
Route::rule('buydel','buy/del');
Route::rule('buyor','buy/order');//生成订单存储
// 确认订单
Route::rule('order','order/index');
// Route::rule('buydel','buy/del');

// 支付宝
Route::rule('zhifubao','zhifubao/index');
// 支付成功异步通知
Route::rule('suc','suc/suc');

// 支付成功页面
Route::rule('sucs','sucs/sucs');

// 退出
Route::rule('quit','quit/index');