<?php 
namespace app\admin\controller;
use think\Controller;


use think\facade\Session;

class Index extends Controller
{
    /**
     * 后台首页
     * @return void
     */
    public function index(){
         // 检查是否登录
        check();
        $username =Session::get('admin_name');
        $this->assign('username',$username);
        return $this->fetch();
    }
}