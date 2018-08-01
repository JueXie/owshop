<?php

namespace App\Http\Controllers\Service;

use App\Tool\Validate\ValidateCode;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Tool\SMS\SendTemplateSMS;
use App\Entity\TempPhone;
use App\Models\M3Result;

class ValidateController extends Controller
{
    public function create($value=''){
        $validateCode = new ValidateCode();
        return $validateCode->doimg();
    }

    public function sendSMS(Request $request){
        $m3result = new M3Result();
        $phone = $request->input('phone','');

        if ($phone == ''){
            $m3result->status = 404;
            $m3result->message = '你的手机号不能为空';
            return $m3result->toJson();
        }

        $sendTemplateSMS = new SendTemplateSMS();
        //生成随机的字符串
        $code = '';
        $charset ="0123456789";
        $_len = strlen($charset) - 1;
        for ($i = 0;$i < 4;++$i) {
            $code .= $charset[mt_rand(0, $_len)];
        }
        $sendTemplateSMS->sendTemplateSMS($phone,array('0555',5),1);

        //新建临时手机验证码表的模型对象，存储数据
        $temp_phone = new TempPhone;
        $temp_phone->phone = $phone;
        $temp_phone->phone_code = $code;
        $temp_phone->deadline = date('Y-m-d H-i-s',time() + 5*60);
        $temp_phone->save();

        $temp_phone->save();
        //返回结果
        $m3result->status = 0;
        $m3result->message = "发送成功";

        return $m3result->toJson() ;
//        return $temp_phone::all() ;

    }
}
