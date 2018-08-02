<?php

use App\Entity\Member;
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

Route::get('/', 'View\CategoryController@toIndex');




Route::any('service/validate_code/create', 'Service\ValidateController@create');
Route::post('service/validate_phone/send', 'Service\ValidateController@sendSMS');
Route::post('service/register', 'Service\MemberController@register');
Route::post('service/login', 'Service\MemberController@login');


Route::get('/login', 'View\MemberController@toLogin');
Route::get('/register', 'View\MemberController@toRegister');




