@extends('front.master')

@section('my-css')
    <link rel="stylesheet" href="/front/style/login.css" type="text/css">
@endsection

@section('content')

    <!-- 顶部导航 start -->
    <div class="topnav">
        <div class="topnav_bd w990 bc">
            <div class="topnav_left">

            </div>
            <div class="topnav_right fr">
                <ul>
                    <li>您好，欢迎来到京西！[<a href="login.html">登录</a>] [<a href="register.html">免费注册</a>] </li>
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

    <!-- 页面头部 start -->
    <div class="header w990 bc mt15">
        <div class="logo w990">
            <h2 class="fl"><a href="index.html"><img src="/front/images/logo.png" alt="京西商城"></a></h2>
        </div>
    </div>
    <!-- 页面头部 end -->

    <!-- 登录主体部分start -->
    <div class="login w990 bc mt10">
        <div class="login_hd">
            <h2>用户登录</h2>
            <b></b>
        </div>
        <div class="login_bd">
            <div class="login_form fl">
                <form action="service/login" method="post">

                    <ul>
                        <li>{{ csrf_field() }}
                            <label for="">用户名：</label>
                            <input type="text" class="txt" name="nickname" placeholder="输入用户名" />
                        </li>
                        <li>
                            <label for="">密码：</label>
                            <input type="password" class="txt" name="password" />
                            <a href="">忘记密码?</a>
                        </li>
                        <li class="checkcode">
                            <label for="">验证码：</label>
                            <input type="text"  name="validate_code" />
                            <img src="service/validate_code/create" alt="" />
                            <span>看不清？<a href="">换一张</a></span>
                        </li>
                        <li>
                            <label for="">&nbsp;</label>
                            <input type="checkbox" class="chb"  /> 保存登录信息
                        </li>
                        <li>
                            <label for="">&nbsp;</label>
                            <input type="submit" value="" class="login_btn" />
                        </li>
                    </ul>
                </form>

                <div class="coagent mt15">
                    <dl>
                        <dt>使用合作网站登录商城：</dt>
                        <dd class="qq"><a href=""><span></span>QQ</a></dd>
                        <dd class="weibo"><a href=""><span></span>新浪微博</a></dd>
                        <dd class="yi"><a href=""><span></span>网易</a></dd>
                        <dd class="renren"><a href=""><span></span>人人</a></dd>
                        <dd class="qihu"><a href=""><span></span>奇虎360</a></dd>
                        <dd class=""><a href=""><span></span>百度</a></dd>
                        <dd class="douban"><a href=""><span></span>豆瓣</a></dd>
                    </dl>
                </div>
            </div>

            <div class="guide fl">
                <h3>还不是商城用户</h3>
                <p>现在免费注册成为商城用户，便能立刻享受便宜又放心的购物乐趣，心动不如行动，赶紧加入吧!</p>

                <a href="register" class="reg_btn">免费注册 >></a>
            </div>

        </div>
    </div>
    <!-- 登录主体部分end -->

    <div style="clear:both;"></div>
    <!-- 底部版权 start -->
    <div class="footer w1210 bc mt15">
        <p class="links">
            <a href="">关于我们</a> |
            <a href="">联系我们</a> |
            <a href="">人才招聘</a> |
            <a href="">商家入驻</a> |
            <a href="">千寻网</a> |
            <a href="">奢侈品网</a> |
            <a href="">广告服务</a> |
            <a href="">移动终端</a> |
            <a href="">友情链接</a> |
            <a href="">销售联盟</a> |
            <a href="">京西论坛</a>
        </p>
        <p class="copyright">
            &copy 2005-2013 鑫欧威商城 版权所有，并保留所有权利。  ICP备案证书号:粤ICP备18041343号
        </p>
    </div>
    <!-- 底部版权 end -->

@endsection



@section('my-js')
    <script type="text/javascript">

        $('login_btn').click(function(event){
            var nickname = $('input[name=nickname]').val();
            var password = $('input[name=password]').val();
            var validate_code = $('input[name=validate_code]').val();
            $.ajax({
                url:'/service/login',
                dataType:'json',
                cache:false,
                type:'POST',
                data:{nickname:nickname,password:password,validate_code:validate_code,_token:'{{csrf_token()}}'},
            });
        });

    </script>

@endsection