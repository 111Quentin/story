<?php

namespace app\admin\model;
use think\Validate;
use think\Model;
class ManagerModel extends Model{
    protected $pk = 'id'; //定义主键ID

    // 设置当前模型对应的完整数据表名称
    protected $table = 'manager';

    // // 定义验证规则
    // protected $rule = [
    //     'username|用户名' => 'require|length:6,12',
    //     'password|密码' => 'require|length:6,12',
    // ];

    // // 定义报错信息
    // protected $message  =   [
    //     'username.require' => '必须输入用户名',
    //     'password.require' => '必须输入用户名',
    //     'username.length'  => '用户名的长度必须是6-12位长度',
    //     'password.length'  => '密码的长度必须是6-12位长度', 
    // ];
}