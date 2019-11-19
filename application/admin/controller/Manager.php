<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

use app\admin\model\ManagerModel;

class Manager extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        // 新增管理员
        $manager = new ManagerModel();
        $password = md5("story_2019".md5($request->param('password')));
        $insert_arr = array(
            'username'      => $request->param('username'),
            'password'      => $password,
            'gender'        => $request->param('gender'),
            'mobile'        => $request->param('mobile'),
            'email'         => $request->param('email'),
            'role_id'       => 1,
            'created_at'    => date('Y-m-d h:i:s',time()),
            'status'        => 1,   // 1激活，2注销
        );

        $result = $manager->data($insert_arr)->save();
        return $result ? '1' : '0';
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
