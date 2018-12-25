<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//H5前台视图路由
Route::get('/', 'View\FrontViewController@toIndex');
Route::get('/login', 'View\MemberController@toLogin');
Route::get('/register', 'View\MemberController@toRegister');
//接口
Route::group(['prefix'=>'service'],function (){
	//**************************前台service*******************************
	//生成验证码
	Route::any('validate_code/create', 'Service\ValidateController@create');
	//手机验证信息发送
	Route::post('validate_phone/send', 'Service\ValidateController@sendSMS');
	//前台用户注册
	Route::post('register', 'Service\MemberController@register');
	//前台用户登陆
	Route::post('login', 'Service\MemberController@login');

	Route::get('checkname','Service\MemberController@checkname');
	Route::any('upload/{type}', 'Service\UploadController@uploadFile');


	//**************************后台service*******************************
	//-----------------------------用户---------------------------------
	//后台添加
	Route::post('memberadd', 'Service\MemberController@memberAdd');
	//修改用户状态“禁用”，“启动”
	Route::post('memberstatus','Service\MemberController@memberStatus');
	//后台修改用户密码
	Route::post('changepassword','Service\MemberController@changePassword');
	//后台删除用户“软删除”
	Route::post('memberdel','Service\MemberController@deleteMember');
	//-----------------------------分类---------------------------------
	//分类的添加
	Route::post('categoryadd','Service\CategoryController@categoryAdd');
	Route::post('categorystatus','Service\CategoryController@categoryStatus');
	Route::post('categoryedit','Service\CategoryController@categoryEdit');
});






//H5后台视图路由
Route::get('/admin','View\AdminViewController@toAdmin');
Route::get('/admin/welcome','View\AdminViewController@toWelcome');
Route::get('/admin/memberList','View\AdminViewController@toMemberList');
Route::get('/admin/member-add','View\AdminViewController@toMemberAdd');
Route::get('/admin/memberShow/{id}', 'View\AdminViewController@toMemberShow');
//Route::get('/admin/memberEdit', 'View\AdminViewController@toMemberEdit');
Route::get('/admin/changePassword/{id}', 'View\AdminViewController@toChangePassword');
Route::get('/admin/category','View\AdminViewController@toCategory');
Route::get('/admin/categoryadd','View\AdminViewController@toCategoryAdd');
Route::get('/admin/memberDel','View\AdminViewController@toMemberDel');
Route::get('/admin/categorydel','View\AdminViewController@toCategoryDel');
Route::get('/admin/categoryedit/{id}','View\AdminViewController@toCategoryEdit');



//测试路由
Route::get('/test', function (){
	return view('test');
});

