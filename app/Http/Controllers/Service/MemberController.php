<?php

namespace App\Http\Controllers\Service;

use App\Tool\SQLQuery\SqlQuery;
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
            if($phone_code == '' || strlen($phone_code) != 4) {
                $jp_result->status = 5;
                $jp_result->message = '手机验证码为4位';
                return $jp_result->toJson();
            }
            $tempPhone = TempPhone::where('phone', $phone)->first();
            if($tempPhone->phone_code == $phone_code) {
                if (time() > strtotime($tempPhone->deadline)) {
                    $jp_result->status = 7;
                    $jp_result->message = '手机验证码不正确';
                    return $jp_result->toJson();
                }


				$membertest = Member::where('nickname',$nickname)->first();
				if ($membertest != null){
					$jp_result->status = 504;
					$jp_result->message = "用户已存在";
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
    }

    public function login(Request $request){
        $nickname = $request->get('nickname','');
        $password = $request->get('password','');
        $validate_code = $request->get('validate_code','');

        $jp_result = new M3Result();


        //判断验证码
        $validate_code_session = $request->session()->get('validate_code');
        if ($validate_code != $validate_code_session){
            $jp_result->status = 8;
            $jp_result->message = '验证码不正确';
            return $jp_result->toJson();
        }
        $member = Member::where('nickname',$nickname)->first();
	    if ($member == null){
		    $jp_result->status = 9;
		    $jp_result->message = '该用户不存在';
		    return $jp_result->toJson();
	    }else{
		    if (md5($password) != $member->password) {
			    $jp_result->status = 11;
			    $jp_result->message = '密码不正确';
			    return $jp_result->toJson();
		    }
	    }
        $request->session()->put('member',$member);
        $jp_result->status = 0;
        $jp_result->message = '登陆成功';
        return $jp_result->toJson();
    }

    public function checkname(Request $request){
    	$nickname = $request->get('nickname','');

    	$member = Member::where('nickname',$nickname)->first();
	    $jp_result = new M3Result();
	    if ($nickname == ''){
		    $jp_result->status = 8000;
		    $jp_result->message = '用户存在';
	    }
    	if ($member != null){
    		$jp_result->status = 504;
		    $jp_result->message = '用户存在';
		    return $jp_result->toJson();
	    }else{
		    $jp_result->status = 0;
		    $jp_result->message = '可用账户';
		    return $jp_result->toJson();
	    }
    }

    public function memberAdd(Request $request){
	    $nickname = $request->get('nickname','');
	    $password = $request->get('password','');
	    $phone = $request->get('phone','');

	    $jp_result = new M3Result();
	    $membertest = Member::where('nickname',$nickname)->first();
	    if ($membertest != null){
		    $jp_result->status = 504;
		    $jp_result->message = "用户已存在";
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

    public function deleteMember(Request $request){
	    $memberId = $request->get('id','');
	    $member = Member::find($memberId);
	    $member->delete();
	    $jp_result = new M3Result();
	    $jp_result->status = 21312321;
	    $jp_result->message = '删除成功';
	    return $jp_result->toJson();
    }

    public function memberStatus(Request $request){
	    $memberId = $request->get('id','');
	    $status = $request->get('status','');
	    $jp_result = new M3Result();
	    $member = Member::find($memberId);
	    if ($status == 0){
	    	$member->status = 1;
	    	$member->save();
	    	$jp_result->status = 10000;
	    	$jp_result->message = '已禁用';
	    	return $jp_result->toJson();
	    }else{
		    $member->status = 0;
		    $member->save();
		    $jp_result->status = 10001;
		    $jp_result->message = '已开启';
		    return $jp_result->toJson();
	    }
    }

   public function changePassword(Request $request){
		$password = $request->get('password','');
		$id = $request->get('id','');
		$member = Member::find($id);
		$member->password = md5($password);
		$member->save();
		$jp_result = new M3Result();
		$jp_result->status = 100000;
		$jp_result->message = '修改成功';
		return $jp_result->toJson();
   }
}
