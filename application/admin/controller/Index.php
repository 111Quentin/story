<?php 
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    /**
     * 后台首页
     * @return void
     */
    public function index(){
         // 检查是否登录
         check();
        return $this->fetch();
    }
}