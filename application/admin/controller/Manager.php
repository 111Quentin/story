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

        // 获取管理员信息
        $manager = new ManagerModel();

        // 定义每页显示最大条数
        $limit = 1;

        $data = $manager::where('id','>',0)->paginate($limit,false,['query' => request()->param(),'type' => 'page\Page','var_page'  => 'page']);
        $page = $data->render();
        
        
        // 变量输出模板
        $this->assign([
            'limit' =>$limit,
			'page' =>$page,
            'data' => $data
        ]);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        // 显示页面
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
        // 获取当前管理员信息
        $manager = ManagerModel::where('id','=',$id)->find()->toArray();
        $this->assign('manager',$manager);
        return $this->fetch();
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
        //获取，传递过来的参数
        $post_data = $request->param();
        $manager = new ManagerModel();
        $update_data = array(
            'phone'      =>     $post_data['phone'],
            'email'      =>     $post_data['email'],
            'gender'     =>     $post_data['gender'],
        );
        $res = $manager->save($update_data,['id' => $post_data['id']]);
        return $res ? 1 : 0;
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $res = ManagerModel::where('id','=',$id)->delete();
        return $res ? 1 : 0;
    }
}
