<?php

namespace App\Http\Controllers\Service;

use Illuminate\Support\Facades\DB;
use App\Entity\TempPhone;
use App\Entity\Member;
use App\Http\Controllers\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    public function register(Request $request){
        //获取前端传过来的用户,密码,手机,手机验证码
        $nickname = $request->input('nickname','');
        $password = $request->input('password','');
        $password_cfm = $request->input('password_cfm','');
        $phone = $request->input('phone','');
        $phone_code = $request->input('phone_code','');


        //新建一个状态类
        $jp_result = new M3Result();

        //后台验证方法
        if ($password != $password_cfm){
            $jp_result->status = 1000;//确认密码与密码不匹配状态码
            $jp_result->message = '你两次输入的密码不匹配';
            return $jp_result->toJson();
        }
        if ($nickname == null && $password == null && $password_cfm == null && $phone == null && $phone_code == null){
            $jp_result->status = 1001;//昵称,用户,密码,确认密码,手机,手机号码其中一项或多项为空的状态码
            $jp_result->message = '昵称,用户,密码,确认密码,手机,手机号码其中一项或多项为空';
            return $jp_result->toJson();
        }

        if($phone != '') {
            echo $phone_code;
            if($phone_code == '' || strlen($phone_code) != 4) {
                $jp_result->status = 5;
                $jp_result->message = '手机验证码为4位';
                return $jp_result->toJson();
            }
            $tempPhone = TempPhone::where('phone', $phone)->orderBy('id', 'desc')->first();
            if($tempPhone->phone_code == $phone_code) {
                if (time() > strtotime($tempPhone->deadline)) {
                    $jp_result->status = 7;
                    $jp_result->message = '手机验证码不正确';
                    return $jp_result->toJson();
                }



                //新建member表的模型并保存
                $member = new Member();
                $member->nickname = $nickname;
                $member->password = md5($password);
                $member->phone = $phone;
                $member->save();

                $jp_result->status = 0;
                $jp_result->message = '注册成功,数据库录入成功';
                return $jp_result->toJson();
            }
        }else{
            $jp_result->status = 7;
            $jp_result->message = '手机验证码不正确';
            return $jp_result->toJson();
        }
//        DB::table('member') ->insert(['nickname'=>$nickname,'password'=>$password,'phone'=>$phone]);
    }
}
