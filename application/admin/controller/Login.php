<?php 
namespace app\admin\controller;

use think\Controller;
use think\captcha\Captcha;
class Login extends Controller
{
    /**
     * 登录页面
     * @return void
     */
    public function login(){
        return $this->fetch('Login/index');
    }


    public function verify(){
        $captcha = new Captcha();
        return $captcha->entry();
    }

    /**
     * 管理员登录
     */

     public function doLogin(){
        //获取POST提交传递过来的参数
        $data = $this->request->post();

        $rules = [
            'username|用户名' => 'require|length:6,12',
            'password|密码' => 'require|length:6,12',
            // 'verify|验证码' => 'require|captcha'
        ];

        $res = $this->validate($data, $rules);
        if($res){
            
        }
    }
}