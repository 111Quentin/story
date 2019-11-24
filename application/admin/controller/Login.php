<?php 
namespace app\admin\controller;

use think\Request;
use think\Controller;
use think\captcha\Captcha;

use app\admin\model\ManagerModel;

use think\facade\Session;

class Login extends Controller
{
    /**
     * 登录页面
     * @return void
     */
    public function login(){
        echo Session::get('admin_id');
       
        return $this->fetch('Login/index');
    }


    public function verify(){
        $config = array(
            // 验证码字体大小(px)
            'fontSize' => 25,
            // 验证码长度
            'length'   => 4,
            // 是否画混淆曲线
            'useCurve' => false,
            // 验证成功后是否重置
            'fontttf'  => '1.ttf',
        );
        $captcha = new Captcha($config);
        return $captcha->entry();
    }

    /**
     * 管理员登录
     */

     public function doLogin(){
        //获取POST提交传递过来的参数
        $data = $this->request->post();
        $username = $this->request->post('username');
        $password = $this->request->post('password');
        $password = md5("story_2019".md5($password));
        $verify = $this->request->post('verify');

        // 获取参数(也可以用Request类 $this->request->param())
     

        // 查询管理员信息
        $where = [];
        $where['username'] = ['username','=',$username];
        $where['password'] = ['password','=',$password];
        $manager_info = ManagerModel::where($where)->find();
        if(!$manager_info){
            return $this->error("用户名或密码错误!");
        }else{
            // 校验验证码
            if(!captcha_check($verify)){
                return $this->error("验证码错误!");
            }else{
                // 保存到session
                session('admin_id',$manager_info->id);
                session('admin_name',$manager_info->username);
                return $this->redirect('/admin/Index/index');
            }
        }
        
    }

    /**
     * 注销
     * @return void
     */
    public function logout(){
        session('admin_id', '');
        session('admin_name', '');
        Session::delete('admin_id');
        Session::delete('admin_name');
        return $this->redirect('/admin/Login/index');
    }
}