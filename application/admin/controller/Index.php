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
        return $this->fetch();
    }
}