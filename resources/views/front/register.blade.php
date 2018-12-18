@extends('front.master')

@section('my-css')
    <link rel="stylesheet" href="/front/style/login.css" type="text/css">
    <style type="text/css">
        .btn_sms{border-radius: 5px;color: white!important;background: #e43e41;padding: 7px;font-size: 10px;font-weight: bold;text-decoration: none!important;}
    </style>
@endsection


@section('content')
    <!-- 顶部导航 start -->
    <div class="topnav">
        <div class="topnav_bd w990 bc">
            <div class="topnav_left">
            </div>
            <div class="topnav_right fr">
                <ul>
                    <li>您好，欢迎！[<a href="login">登录</a>] [<a href="register">免费注册</a>] </li>
                    <li class="line">|</li>
                    <li>我的订单</li>
                    <li class="line">|</li>
                    <li>客户服务</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- 顶部导航 end -->

    <div style="clear:both;"></div>


    <!-- 登录主体部分start -->
    <div class="login w990 bc mt50 regist">
        <div class="login_hd">
            <h2>用户注册</h2>
            <b></b>
        </div>
        <div class="login_bd">
            <div class="login_form fl">
                <form id="form1" style="margin-left: 230px">
                    <ul>
                        <li>
                            <label for="">用户名：</label>
                            <input type="text" class="txt" name="nickname" onchange="onCheck()" />
                            <p>输入你的个性用户名</p>
                        </li>
                        <li>
                            <label for="">密码：</label>
                            <input type="password" class="txt" name="password" />
                            <p>6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</p>
                        </li>
                        <li>
                            <label for="">确认密码：</label>
                            <input type="password" class="txt" name="password_cfm" />
                            <p> <span>请再次输入密码</span></p>
                        </li>
                        <li>
                            <label for="">手机号码：</label>
                            <input type="text" class="txt" name="phone" />
                            <p>输入国内11位数手机号码</p>
                        </li>
                        <li class="checkcode">
                            <label for="">验证码：</label>
                            <input type="text"  name="phone_code" />
                            <a id="send_msg" class="btn_sms" style="">点击接收手机验证码</a>
                        </li>
                        <li>
                            <label for="">&nbsp;</label>
                            <input type="checkbox" class="chb" checked="checked" /> 我已阅读并同意《用户注册协议》
                        </li>
                        <li>
                            <label for="">&nbsp;</label>
                            <input value="" class="login_btn" onclick="onRegister()"/>
                        </li>
                    </ul>
                </form>


            </div>

        </div>
    </div>
    <!-- 登录主体部分end -->
    <div style="clear:both;"></div>
    <!-- 底部版权 start -->
    <div class="footer w1210 bc mt15">
        <p class="copyright">
            &copy 2005-2018 鑫欧威商城 版权所有，并保留所有权利。  ICP备案证书号:粤ICP备18041343号
        </p>
    </div>
    <!-- 底部版权 end -->
@endsection

@section('my-js')
    <script type="text/javascript">
        var enable = true;

        $('#send_msg').click(function (event) {
            if(enable == false){
                return;
            }
            var phone = $('input[name=phone]').val();
            if (phone == ''){
                alert('手机号码不能为空');
                return;
            }
            if(phone[0]!=1||phone.length!=11){
                alert('您输入的号码不是手机号码规格或不是11位数的手机号码,请仔细查看清楚');
                return;
            }
            enable = false;
            var num = 60;
			//新建一个变量接受interval的返回值ID。用于销毁
            var interval = window.setInterval(function(){

                $('#send_msg').html(--num+' S 后可以重新发送');
                if(num == 0){
                    enable = true;
                    window.clearInterval(interval);
                    $('#send_msg').html('重新发送');
                }
            },1000)


            $.ajax({
                url:'/service/validate_phone/send',
                dataType:'json',
                cache:false,
                type:'POST',
                data:{phone:phone,_token:'{{csrf_token()}}'},
                success:function (data) {
                    if (data == null){
                        alert('服务端错误');
                        return;
                    }
                    if (data.status !=0){
                        alert(data.message);
                        return;
                    }
                },
            });
        });
    </script>

    <script type="text/javascript">

        function onCheck() {
            var nickname = $('input[name=nickname]').val();
            $.ajax({
                type:'GET',
                url:'/service/checkname',
                dataType:'json',
                cache:false,
                data:{nickname:nickname},
                success:function (data) {
                    $('#tipbar').show();
                    $('#tipbar span').html(data.message);
                    setTimeout(function () {
                        $('#tipbar').hide();
                    },2000);
                },
                error:function (xhr,status,error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }

        function onRegister() {
           var nickname = $('input[name=nickname]').val();
           var password = $('input[name=password]').val();
           var password_cfm = $('input[name=password_cfm]').val();
           var phone = $('input[name=phone]').val();
           var phone_code = $('input[name=phone_code]').val();


           $.ajax({
                type:'POST',
                url:'/service/register',
                dataType:'json',
                cache:false,
                data:{phone:phone,nickname:nickname,password:password,password_cfm:password_cfm,phone_code:phone_code,_token:'{{csrf_token()}}'},
               success:function (data) {
                   if (data.status == 0){
                       alert(data.status+data.message);
                   }
                   if (data.status != 0){
                       alert(data.status+data.message);
                   }
                   if (data == null){
                       alert('服务端错误');
                       return;
                   }
               }
            });
        }


    </script>

@endsection