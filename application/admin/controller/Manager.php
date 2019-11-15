<?php 
namespace app\admin\controller;

use think\Request;
use think\Controller;
use think\captcha\Captcha;

use app\admin\model\ManagerModel;
class Manager extends Controller
{
    /**
     * 管理员列表
     * @return void
     */
   public function index(){
        return $this->fetch();
   } 


   /**
    * 添加管理员页面
    * @return void
    */
   public function add(){
        return $this->fetch();
   }
}