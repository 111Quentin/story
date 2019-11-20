<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


// 默认路由
Route::get('/','admin/Login/login');

// Admin
Route::group('admin',function(){
    Route::get('/login','admin/Login/login');
    Route::get('/verify','admin/Login/verify');
    
    // 管理员
    Route::resource('/manager','admin/Manager');

    // 管理员列表
    // Route::get('/manager/list','admin/Manager/index');
    // 添加管理员页面
    // Route::get('/manager/add','admin/Manager/add');
});


