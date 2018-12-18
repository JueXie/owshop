<?php

use App\Entity\Member;
use App\Http\Requests;
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
//H5前台路由
Route::get('/', 'View\FrontViewController@toIndex');

Route::group(['prefix'=>'service'],function (){
	Route::any('validate_code/create', 'Service\ValidateController@create');
	Route::post('validate_phone/send', 'Service\ValidateController@sendSMS');
	Route::post('register', 'Service\MemberController@register');
	Route::post('login', 'Service\MemberController@login');
	Route::get('checkname','Service\MemberController@checkname');
	Route::get('checkmember','Service\MemberController@checkmember');

	//后台添加
	Route::post('memberadd', 'Service\MemberController@memberAdd');
});


Route::get('/login', 'View\MemberController@toLogin');
Route::get('/register', 'View\MemberController@toRegister');



//H5后台路由
Route::get('/admin','View\AdminViewController@toAdmin');
Route::get('/admin/welcome','View\AdminViewController@toWelcome');
Route::get('/admin/memberList','View\AdminViewController@toMemberList');
Route::get('/admin/member-add','View\AdminViewController@toMemberAdd');
Route::get('/admin/memberShow', 'View\AdminViewController@toMemberShow');



//测试路由
Route::get('/test', function (){
	return view('test');
});

