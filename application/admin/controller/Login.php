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


    /**
     * 管理员登录
     */

     public function doLogin(){
        //获取POST提交传递过来的参数
        $data = $this->request->post();
        dump($data);
    }
}