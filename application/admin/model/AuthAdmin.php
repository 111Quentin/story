<?php

/**
 * AuthAdmin模型
 */



 namespace app\admin\model;
 use think\Model;

 class AuthAdmin extends Model{
    protected $pk = 'id';
    //验证规则
    public $_rules = [
        'username|用户名' => 'required|unique',
        'password|密码' => 'required|compare:repassword|md5'
    ];
 }