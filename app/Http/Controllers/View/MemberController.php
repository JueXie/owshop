<?php

namespace App\Http\Controllers\View;


use App\Http\Controllers\Controller;


class MemberController extends Controller
{
    public function toLogin($value = ''){
        return view('front.login');
    }
    public function toRegister($value = ''){
        return view('front.register');
    }
}
