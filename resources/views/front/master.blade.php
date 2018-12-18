<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>@yield('title','demo')</title>
    <link rel="stylesheet" href="/front/style/base.css" type="text/css">
    <link rel="stylesheet" href="/front/style/global.css" type="text/css">
    <link rel="stylesheet" href="/front/style/header.css" type="text/css">
    <link rel="stylesheet" href="/front/style/index.css" type="text/css">
    <link rel="stylesheet" href="/front/style/bottomnav.css" type="text/css">
    <link rel="stylesheet" href="/front/style/footer.css" type="text/css">
    @yield('my-css')
</head>
<body>

@yield('content')
<div id="tipbar" style="display: none; position: absolute; top: 34px; text-align: center; width: 100%;"> <span style="background: #444444; color: #ffffff; padding: 5px 10px; border-radius: 5px; opacity: 0.9;font-size: 36px"></span></div>
<script type="text/javascript" src="/front/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/front/js/header.js"></script>
<script type="text/javascript" src="/front/js/index.js"></script>
@yield('my-js')
</body>
</html>