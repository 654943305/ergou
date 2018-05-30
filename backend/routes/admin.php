<?php

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:admin')->get('/user', 'Admin\AdminController@getAdminInfo')->name('admin.userInfo');
Route::post('/login', 'Auth\LoginController@login_admin')->name('login.login');
Route::post('/token/refresh', 'Auth\LoginController@refresh')->name('login.refresh');
Route::post('/logout', 'Auth\LoginController@logout_admin')->name('login.logout');
Route::post('/test', 'Admin\SmsController@send')->name('soft.test');
Route::middleware('auth:admin')->group(function() {
    // 用户管理
    Route::Resource('admin', 'Admin\AdminController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
    Route::post('/admin/modify', 'Admin\AdminController@modify' )->name('admin.modify');
    Route::post('/admin/{id}/reset', 'Admin\AdminController@reset')->name('admin.reset');
    Route::post('/admin/uploadAvatar', 'Admin\AdminController@uploadAvatar')->name('admin.uploadAvatar');
    Route::post('/admin/upload', 'Admin\AdminController@upload')->name('admin.upload');
    Route::post('/admin/export', 'Admin\AdminController@export')->name('admin.export');
    Route::post('/admin/exportAll', 'Admin\AdminController@exportAll')->name('admin.exportAll');
    Route::post('/admin/deleteAll', 'Admin\AdminController@deleteAll')->name('admin.deleteAll');

    // 角色管理
    Route::Resource('role', 'Admin\RoleController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
    Route::get('getRoles', 'Admin\RoleController@getRoles')->name('role.get');

    // 其他支持API
    Route::get('/getSession', 'Admin\SessionController@getSession')->name('session.get'); // 获取所有学期
    Route::get('/getDefaultSession', 'Admin\SessionController@getDefaultSession')->name('session.getDefault'); //获得当前学期
    Route::get('/getClassNumByGrade', 'Admin\SessionController@getClassNumByGrade')->name('session.getClassNum'); // 根据年级获取最大班级数


    // 学期管理
    Route::Resource('session', 'Admin\SessionController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
    Route::post('/session/upload', 'Admin\SessionController@upload')->name('session.upload');

    // 程序功能管理
    Route::Resource('permissions', 'Admin\PermissionController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
    Route::post('/permissions/addGroup', 'Admin\PermissionController@addGroup')->name('permissions.addGroup');
    Route::post('/permissions/getGroup', 'Admin\PermissionController@getGroup')->name('permissions.getGroup');
    Route::post('/permissions/deleteAll', 'Admin\PermissionController@deleteAll')->name('permissions.deleteAll') ;
    Route::post('/permissions/getPermissionByTree', 'Admin\PermissionController@getPermissionByTree')->name('Permission.getPermissionByTree');

    // 手机信息管理
    Route::post('/sms/send', 'Admin\SmsController@send')->name('sms.send');
    Route::post('/sms/verify', 'Admin\SmsController@verify')->name('sms.verify');

});
