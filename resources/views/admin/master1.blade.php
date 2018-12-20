<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <LINK rel="Bookmark" href="/favicon.ico" >
    <LINK rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/adminasset/lib/html5.js"></script>
    <script type="text/javascript" src="/adminasset/lib/respond.min.js"></script>
    <script type="text/javascript" src="/adminasset/lib/PIE_IE678.js"></script>
    <![endif]-->
    <link href="/adminasset/css/H-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="/adminasset/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
    <link href="/adminasset/lib/Hui-iconfont/1.0.6/iconfont.css" rel="stylesheet" type="text/css" />
    <link href="/adminasset/skin/default/skin.css" rel="stylesheet" type="text/css" id="skin" />
    <link href="/adminasset/css/style.css" rel="stylesheet" type="text/css" />
    <title>H-ui.admin v2.3</title>
    <meta name="keywords" content="H-ui.admin v2.3,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v2.3，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
@yield('content')
<script type="text/javascript" src="/adminasset/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/adminasset/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/adminasset/js/H-ui.js"></script>
<script type="text/javascript" src="/adminasset/js/H-ui.admin.js"></script>
@yield('my-js')
<script type="text/javascript">
    /*资讯-添加*/
    function article_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*图片-添加*/
    function picture_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*产品-添加*/
    function product_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*用户-添加*/
    function member_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
</script>
</body>
</html>