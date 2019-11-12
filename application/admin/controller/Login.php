<?php 
namespace app\admin\controller;

use think\Controller;

class Login extends Controller
{
    /**
     * 登录页面
     * @return void
     */
    public function login(){
        return $this->fetch('Login/index');
    }
}